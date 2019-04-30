<?php
	function html5_insert_image($html, $id, $caption, $title, $align, $url, $size) {
		$src = wp_get_attachment_image_src( $id, $size, false );
		$srclarge = wp_get_attachment_image_src( $id, 'large', false );
		$srcmedium = wp_get_attachment_image_src( $id, 'medium', false );
		$srcsmall = wp_get_attachment_image_src( $id, 'thumbnail', false );
		$html5 = "<figure id='post-$id media-$id' class='align$align'>";
		$html5 .= "<img src='$src[0]' srcset='";
		$html5 .= "$srcsmall[0] 320w, ";
		$html5 .= "$srcmedium[0] 640w, ";
		$html5 .= "$srclarge[0] 1100w";
		$html5 .= "' alt='$title' />";
		$html5 .= "<figcaption>$caption</figcaption>";
		$html5 .= "</figure>";
		return $html5;
	}
	add_filter( 'image_send_to_editor', 'html5_insert_image', 10, 9 );
	
	/* load js files */
	/* ----------------------------------------- */
		function upcode_loadJS(){
			if (!is_admin()){
				// desregistrando o jquery nativo e registrando o do CDN do Google.
				wp_deregister_script('jquery');
					wp_register_script('jquery', '//cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js', false, '3.3.1');
				wp_enqueue_script('jquery');

				$js = get_template_directory_uri() . '/assets/js/';

				wp_enqueue_script('bootstrap-min', $js .'bootstrap.bundle.min.js', ['jquery']);
				wp_enqueue_script('bsnav', $js.'bsnav.js', ['jquery']);
//				wp_enqueue_script('fancybox', '//cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.js', ['jquery']);
				wp_enqueue_script('slick', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.min.js', ['jquery']);
//				wp_enqueue_script('maps', '//maps.googleapis.com/maps/api/js?key=AIzaSyB1P-H_fyEh6IaGS_mdIAPnMUIiQhKON2s', ['jquery']);
				wp_enqueue_script('acf-maps', $js . 'maps.js', ['jquery']);
				wp_enqueue_script('mask', $js . 'jquery.mask.min.js', ['jquery']);
				wp_enqueue_script('main', $js . 'main.js', ['jquery']);
			}
		}
		add_action( 'wp_print_scripts', 'upcode_loadJS' );
	/* ----------------------------------------- load js files */

	/* load css files */
	/* ----------------------------------------- */
		function upcode_loadCSS(){
			$css = get_template_directory_uri() . '/assets/css/';
//			wp_enqueue_style( 'fancybox', '//cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css' );

//			wp_enqueue_style( 'pe-icon-7', $css . 'pe-icon-7-stroke.css' );
			// wp_enqueue_style( 'ccss', admin_url('admin-ajax.php').'?action=ccss');
		}
		add_action('wp_enqueue_scripts', 'upcode_loadCSS');
	/* ----------------------------------------- load css files */

	/* warn wordpress to run the function upcode_setup() when 'after_setup_theme' hook run */
	/* ----------------------------------------- */
		add_action( 'after_setup_theme', 'upcode_setup' );
		if ( ! function_exists( 'upcode_setup' ) ):
			function upcode_setup() {
				add_editor_style('assets/css/editor-style.css');
				add_theme_support( 'post-thumbnails' );
				register_nav_menus( array(
					'global' => __( 'Navegação Global', 'partner-programmer' ),
					'local' => __( 'Navegação Local', 'partner-programmer' ),
				) );
				register_nav_menu('institucional',__( 'Institucional Rodapé' ));
				register_nav_menu('categorias',__( 'Categorias Rodapé' ));


			}
		endif;
	/* ------------------ warn wordpress to run the function upcode_setup() when 'after_setup_theme' hook run */


	/* register widgetized areas, including two sidebars and four widget-ready columns in the footer.
	/* ----------------------------------------- */
		function twentyten_widgets_init() {
			register_sidebar( array(
				'name' => __( 'Sidebar', 'twentyten' ),
				'id' => 'sidebar-principal',
				'description' => __( 'Arraste os itens desejados até aqui. ', 'twentyten' ),
				'before_widget' => '<div class="widget %2$s" id="%1$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3>',
				'after_title' => '</h3>',
			) );
		}
		add_action( 'widgets_init', 'twentyten_widgets_init' );
	/* ----------------------------------------- */


	/* add editor on body-class if user is editor */
	/* --------------------------------------------------- */
		function role_user_body_class( $classes ) {
			if( current_user_can('editor') ) { $classes .= ' editor'; }
			return trim( $classes );
		}
		add_filter( 'admin_body_class', 'role_user_body_class' );
	/* --------------------------------------------------- add editor on body-class if user is editor */

	/* create pages on start theme */
	/* ----------------------------------------- */
		function the_slug_exists($post_name) {
			global $wpdb;
			if($wpdb->get_row("SELECT post_name FROM wp_posts WHERE post_name = '" . $post_name . "'", 'ARRAY_A')) {
				return true;
			} else {
				return false;
			}
		}

		function create_pages() {
			$paginas = [
				// [Title, Content, 'Slug']
				['Home', '', 'home'],
				['Institucional', '', 'institucional'],
				['Contato', '', 'contato'],
			];
			foreach ($paginas as $pagina) {
				$page_check = get_page_by_title($pagina[0]);
				if(!isset($page_check->ID) && !the_slug_exists($pagina[2])){
					$newPageId = wp_insert_post(array(
						'post_type' => 'page',
						'post_title' => $pagina[0],
						'post_content' => $pagina[1],
						'post_status' => 'publish',
						'post_author' => 1,
						'post_slug' => $pagina[2]
					));
					if ($pagina[0] == 'Home') { update_option( 'page_on_front', $newPageId ); update_option( 'show_on_front', 'page' ); }
					if ($pagina[0] == 'Blog') { update_option( 'page_for_posts', $newPageId ); }
				}
			}

			// delet example page
			$checkExample = get_page_by_title('Página de exemplo');
			if(is_object( $checkExample)):
				$exampleID = $checkExample->ID;
				wp_delete_post( $exampleID );
			endif;
		}
//		add_action( 'after_setup_theme', 'create_pages' );
	/* ----------------------------------------- create pages on start theme */

	// Add Shortcode
	function getAddress() {
		$html = '';
		$html .= '<span class="addr">'.get_field('address_info',get_option('page_on_front')).'</span>';
		$html .= '<span class="mask-phone phone-mask">'.get_field('phone_info',get_option('page_on_front')).'</span>';
		return $html;
	}
	add_shortcode( 'address_info', 'getAddress' );