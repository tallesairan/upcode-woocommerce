<?php
	
	/* key acf google maps
	/* ----------------------------------------- */
	function my_acf_init() {
		acf_update_setting( 'google_api_key', 'AIzaSyB1P-H_fyEh6IaGS_mdIAPnMUIiQhKON2s' );
	}
	
	add_action( 'acf/init', 'my_acf_init' );
	/* ----------------------------------------- key acf google maps */
	
	/* Taxonomy background
	/* ----------------------------------------- */
	function taxonomy_thumbnail_bg( $nomeField ) {
		global $post;
		$queried_object = get_queried_object();
		$taxonomy       = $queried_object->taxonomy;
		$term_id        = $queried_object->term_id;
		
		if ( get_field( $nomeField, $queried_object ) ) : $src = get_field( $nomeField, $queried_object );
		else : return;
		endif;
		
		echo 'style="background-image: url(' . $src . ' );"';
	}
	
	/* ----------------------------------------- Taxonomy background */
	
	/* Acf field backgound
	/* ----------------------------------------- */
	function cover( $nomeField = 'img_cover' ) {
		global $post;
		$src = get_field( 'img_cover', 'option' );
		echo 'style="background-image: url(' . $src . ' );"';
	}
	
	/* ----------------------------------------- Acf field backgound */
	
	/* Acf sub_field backgound
	/* ----------------------------------------- */
	function acf_sub_thumbnail_bg( $nomeField ) {
		global $post;
		if ( get_sub_field( $nomeField ) ) : $src = get_sub_field( $nomeField );
		else : return;
		endif;
		
		echo 'style="background-image: url(' . $src . ' );"';
	}
	
	/* ----------------------------------------- Acf sub_field backgound */
	
	/* ACF page options
	/* ----------------------------------------- */
	// create fields acf
	function create_fields() {
		if ( function_exists( 'acf_add_local_field_group' ) ):
			acf_add_local_field_group( array(
				'key'                   => 'group_5615778308582',
				'title'                 => 'Logotipo',
				'fields'                => array(
					array(
						'key'               => 'field_561577915ca7d',
						'label'             => 'Insira o logotipo do topo do site:',
						'name'              => 'logotipo',
						'type'              => 'image',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'return_format'     => 'url',
						'preview_size'      => 'full',
						'library'           => 'all',
						'min_width'         => '',
						'min_height'        => '',
						'min_size'          => '',
						'max_width'         => '',
						'max_height'        => '',
						'max_size'          => '',
						'mime_types'        => '',
					),
					array(
						'key'               => 'field_5b8d2b3b59e60',
						'label'             => 'Insira o logotipo do rodapé do site:',
						'name'              => 'logotipo_footer',
						'type'              => 'image',
						'instructions'      => 'Não coloque imagens brancas nessa parte, pois o fundo ja é branco',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'return_format'     => 'url',
						'preview_size'      => 'full',
						'library'           => 'all',
						'min_width'         => '',
						'min_height'        => '',
						'min_size'          => '',
						'max_width'         => '',
						'max_height'        => '',
						'max_size'          => '',
						'mime_types'        => '',
					),
				),
				'location'              => array(
					array(
						array(
							'param'    => 'options_page',
							'operator' => '==',
							'value'    => 'acf-options-opcoes-do-tema',
						),
					),
				),
				'menu_order'            => 1,
				'position'              => 'side',
				'style'                 => 'seamless',
				'label_placement'       => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen'        => array(
					0 => 'the_content',
					1 => 'featured_image',
				),
				'active'                => 1,
				'description'           => '',
			) );
			
			acf_add_local_field_group( array(
				'key'                   => 'group_561578035a638',
				'title'                 => 'Campos gerais',
				'fields'                => array(
					array(
						'key'               => 'field_5558515e1186e93dx',
						'label'             => 'Slideshow',
						'name'              => '',
						'type'              => 'tab',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'placement'         => 'left',
						'endpoint'          => 0,
					),
					array(
						'key'               => 'field_295561215760144bb1',
						'label'             => 'Adicione os slides:',
						'name'              => 'repeater_slide',
						'type'              => 'repeater',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'collapsed'         => '',
						'min'               => 0,
						'max'               => 0,
						'layout'            => 'block',
						'button_label'      => 'Adicionar slide',
						'sub_fields'        => array(
							array(
								'key'               => 'field_5615763f44bb2',
								'label'             => 'Insira a imagem:',
								'name'              => 'slide_image',
								'type'              => 'image',
								'instructions'      => '',
								'required'          => 0,
								'conditional_logic' => 0,
								'wrapper'           => array(
									'width' => '50',
									'class' => '',
									'id'    => '',
								),
								'return_format'     => 'url',
								'preview_size'      => 'slide',
								'library'           => 'all',
								'min_width'         => '',
								'min_height'        => '',
								'min_size'          => '',
								'max_width'         => '',
								'max_height'        => '',
								'max_size'          => '',
								'mime_types'        => '',
							),
							array(
								'key'               => 'field_5615768d44bb4',
								'label'             => 'Insira o link:',
								'name'              => 'slide_link',
								'type'              => 'url',
								'instructions'      => '',
								'required'          => 0,
								'conditional_logic' => 0,
								'wrapper'           => array(
									'width' => '50',
									'class' => '',
									'id'    => '',
								),
								'default_value'     => '',
								'placeholder'       => '',
							),
						),
					),
					array(
						'key'               => 'field_58515e186e93d',
						'label'             => 'Capa do Site',
						'name'              => '',
						'type'              => 'tab',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'placement'         => 'left',
						'endpoint'          => 0,
					),
					array(
						'key'               => 'field_5615760144bb1',
						'label'             => 'Adicione a imagem de capa do site:',
						'name'              => 'img_cover',
						'type'              => 'image',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'return_format'     => 'url',
						'preview_size'      => 'slide',
						'library'           => 'all',
						'min_width'         => '',
						'min_height'        => '',
						'min_size'          => '',
						'max_width'         => '',
						'max_height'        => '',
						'max_size'          => '',
						'mime_types'        => '',
					),
					array(
						'key'               => 'field_5c94c8a9f31cc',
						'label'             => 'Produtos em destaque',
						'name'              => '',
						'type'              => 'tab',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'placement'         => 'left',
						'endpoint'          => 0,
					),
					array(
						'key'               => 'field_5c94c85bf31cb',
						'label'             => 'Selecione os produtos em destaque:',
						'name'              => 'featured_products',
						'type'              => 'relationship',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'post_type'         => array(
							0 => 'product',
						),
						'taxonomy'          => '',
						'filters'           => array(
							0 => 'search',
						),
						'elements'          => array(
							0 => 'featured_image',
						),
						'min'               => '',
						'max'               => '',
						'return_format'     => 'object',
					),
					array(
						'key'               => 'field_5615781729a4c',
						'label'             => 'Dados da empresa',
						'name'              => '',
						'type'              => 'tab',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'placement'         => 'left',
						'endpoint'          => 0,
					),
					array(
						'key'               => 'field_561578d429a51',
						'label'             => 'Informe o endereço:',
						'name'              => 'address_info',
						'type'              => 'textarea',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '50',
							'class' => '',
							'id'    => '',
						),
						'default_value'     => '',
						'placeholder'       => '',
						'maxlength'         => '',
						'rows'              => 3,
						'new_lines'         => 'br',
					),
					array(
						'key'               => 'field_5615790629a53',
						'label'             => 'Informe o e-mail:',
						'name'              => 'email_info',
						'type'              => 'text',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '50',
							'class' => '',
							'id'    => '',
						),
						'default_value'     => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
						'maxlength'         => '',
					),
					array(
						'key'               => 'field_561578f429a52',
						'label'             => 'Informe o telefone:',
						'name'              => 'phone_info',
						'type'              => 'text',
						'instructions'      => 'Insira apenas números, sem espaço nem parênteses.
              Ex: 6200000000',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '50',
							'class' => '',
							'id'    => '',
						),
						'default_value'     => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
						'maxlength'         => '',
					),
					array(
						'key'               => 'field_5ae5d0637c061',
						'label'             => 'Caso queira, informe o Whatsapp:',
						'name'              => 'whatsapp_info',
						'type'              => 'text',
						'instructions'      => 'Insira apenas números, sem espaço nem parênteses.
              Ex: 6200000000',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '50',
							'class' => '',
							'id'    => '',
						),
						'default_value'     => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
						'maxlength'         => '',
					),
					array(
						'key'               => 'field_5615791829a54',
						'label'             => 'Adicione a localização pelo mapa:',
						'name'              => 'map_info',
						'type'              => 'google_map',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'center_lat'        => '',
						'center_lng'        => '',
						'zoom'              => 14,
						'height'            => 250,
					),
					array(
						'key'               => 'field_5615783829a4d',
						'label'             => 'Redes sociais',
						'name'              => '',
						'type'              => 'tab',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'placement'         => 'left',
						'endpoint'          => 0,
					),
					array(
						'key'               => 'field_561578a1229aa50',
						'label'             => 'Usuário Facebook:',
						'name'              => 'socials_facebook',
						'type'              => 'text',
						'instructions'      => 'Insira o usuário do facebook',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '50',
							'class' => '',
							'id'    => '',
						),
						'default_value'     => '',
						'placeholder'       => '',
					),
					array(
						'key'               => 'field_5615718a12ba50',
						'label'             => 'Usuário Instagram:',
						'name'              => 'socials_instagram',
						'type'              => 'text',
						'instructions'      => 'Insira o usuário do instagram',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '50',
							'class' => '',
							'id'    => '',
						),
						'default_value'     => '',
						'placeholder'       => '',
					),
					array(
						'key'               => 'field_5b8d221be0b5d',
						'label'             => 'Newsletter',
						'name'              => '',
						'type'              => 'tab',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'placement'         => 'left',
						'endpoint'          => 0,
					),
					array(
						'key'               => 'field_5b8d2225e0b5e',
						'label'             => 'Insira um background:',
						'name'              => 'news_bg',
						'type'              => 'image',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '50%',
							'class' => '',
							'id'    => '',
						),
						'return_format'     => 'url',
						'preview_size'      => 'slide',
						'library'           => 'all',
						'min_width'         => '',
						'min_height'        => '',
						'min_size'          => '',
						'max_width'         => '',
						'max_height'        => '',
						'max_size'          => '',
						'mime_types'        => '',
					),
					array(
						'key'               => 'field_5b8d2252121233',
						'label'             => 'Permitir telefone?',
						'name'              => 'newsletter_phone',
						'type'              => 'true_false',
						'instructions'      => 'Permita que o telefone seja capturado na newsletter',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '50%',
							'class' => '',
							'id'    => '',
						),
						'message'           => '',
						'default_value'     => 0,
						'ui'                => 0,
						'ui_on_text'        => '',
						'ui_off_text'       => '',
					),
					array(
						'key'               => 'field_15b8d221be0b5dd',
						'label'             => 'Home',
						'name'              => '',
						'type'              => 'tab',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'placement'         => 'left',
						'endpoint'          => 0,
					),
					array(
						'key'               => 'field_15b8d2225e0b5e',
						'label'             => 'Noticias Titulo:',
						'name'              => 'news_title',
						'type'              => 'text',
						'instructions'      => 'Titulo da seção noticias na home',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '50',
							'class' => '',
							'id'    => '',
						),
						'placeholder'       => 'Sessão noticias'
					),
					array(
						'key'               => 'field_515b8d2225e0b5e',
						'label'             => 'TV Agos Vídeo:',
						'name'              => 'tv_agos',
						'type'              => 'oembed',
						'instructions'      => 'Vídeo do TV Agos',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '50',
							'class' => '',
							'id'    => '',
						),

					)
			
				
				),
				'location'              => array(
					array(
						array(
							'param'    => 'options_page',
							'operator' => '==',
							'value'    => 'acf-options-opcoes-do-tema',
						),
					),
				),
				'menu_order'            => 2,
				'position'              => 'normal',
				'style'                 => 'default',
				'label_placement'       => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen'        => '',
				'active'                => 1,
				'description'           => '',
			) );
		endif;
	}
	
	$optionsPage = [
		/* (string) The title displayed on the options page. Required. */
		'page_title'  => 'Opções do Tema',
		
		/* (string) The title displayed in the wp-admin sidebar. Defaults to page_title */
		'menu_title'  => 'Opções do tema',
		
		/* (string) The slug name to refer to this menu by (should be unique for this menu).
		Defaults to a url friendly version of menu_slug */
		'menu_slug'   => '',
		
		/* (string) The capability required for this menu to be displayed to the user. Defaults to edit_posts.
		Read more about capability here: http://codex.wordpress.org/Roles_and_Capabilities */
		'capability'  => 'edit_posts',
		
		/* (int|string) The position in the menu order this menu should appear.
		WARNING: if two menu items use the same position attribute, one of the items may be overwritten so that only one item displays!
		Risk of conflict can be reduced by using decimal instead of integer values, e.g. '63.3' instead of 63 (must use quotes).
		Defaults to bottom of utility menu items */
		'position'    => 1,
		
		/* (string) The slug of another WP admin page. if set, this will become a child page. */
		'parent_slug' => '',
		
		/* (string) The icon url for this menu. Defaults to default WordPress gear */
		'icon_url'    => false,
		
		/* (boolean) If set to true, this options page will redirect to the first child page (if a child page exists).
		If set to false, this parent page will appear alongside any child pages. Defaults to true */
		'redirect'    => true,
		
		/* (int|string) The '$post_id' to save/load data to/from. Can be set to a numeric post ID (123), or a string ('user_2').
		Defaults to 'options'. Added in v5.2.7 */
		'post_id'     => 'options',
		
		/* (boolean)  Whether to load the option (values saved from this options page) when WordPress starts up.
		Defaults to false. Added in v5.2.8. */
		'autoload'    => false,
	];
	
	if ( function_exists( 'acf_add_options_page' ) ) {
		acf_add_options_page( $optionsPage );
		// add_action( 'init', 'create_fields' );
	}
	function get_youtube_video_ID( $youtube_video_url ) {
		/**
		 * Pattern matches
		 * http://youtu.be/ID
		 * http://www.youtube.com/embed/ID
		 * http://www.youtube.com/watch?v=ID
		 * http://www.youtube.com/?v=ID
		 * http://www.youtube.com/v/ID
		 * http://www.youtube.com/e/ID
		 * http://www.youtube.com/user/username#p/u/11/ID
		 * http://www.youtube.com/leogopal#p/c/playlistID/0/ID
		 * http://www.youtube.com/watch?feature=player_embedded&v=ID
		 * http://www.youtube.com/?feature=player_embedded&v=ID
		 */
		$pattern =
			'%
    (?:youtube                    # Match any youtube url www or no www , https or no https
    (?:-nocookie)?\.com/          # allows for the nocookie version too.
    (?:[^/]+/.+/                  # Once we have that, find the slashes
    |(?:v|e(?:mbed)?)/|.*[?&]v=)  # Check if its a video or if embed
    |youtu\.be/)                  # Allow short URLs
    ([^"&?/ ]{11})                # Once its found check that its 11 chars.
    %i';
		// Checks if it matches a pattern and returns the value
		if ( preg_match( $pattern, $youtube_video_url, $match ) ) {
			return $match[1];
		}
		
		// if no match return false.
		return false;
	}
	/* ----------------------------------------- ACF page options */