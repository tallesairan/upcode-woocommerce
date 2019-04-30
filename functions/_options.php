<?php

  // add custom thumb sizes
	add_action('init', 'add_custom_image_sizes');
  function add_custom_image_sizes() {
    add_image_size('slide', 1920, 600, true);
    add_image_size('noticia-small', 450, 300, true);
    add_image_size('publicity', 1160, 130, true);
    add_image_size('post-thumb', 1300, 500, true);
    add_image_size('woo', 260, 300, true);
    add_image_size('woo-small', 150, 150, true);
    add_image_size('woo-large', 455, 455, true);
    add_image_size('gallery-thumb', 475, 344, true);
    add_image_size('medium-square', 475, 475, true);
  }
	
	
	add_action( 'admin_init', 'wpse_136058_remove_menu_pages' );
	
	function wpse_136058_remove_menu_pages() {
		
		remove_menu_page( 'stackable' );
		remove_menu_page( 'advgb_main' );
		remove_submenu_page( 'options-general.php', 'uag' );
		
	}
	add_action( 'admin_init', 'wpse_136058_debug_admin_menu' );
	
	function wpse_136058_debug_admin_menu() {
		
		//echo '<pre>' . print_r( $GLOBALS[ 'menu' ], TRUE) . '</pre>';
	}
	function hideAdvancedTools() {
		global $wp_list_table;
		$hidearr = array(
			'upcode-advanced/upcode-advanced.php',
			'upcode-advanced-2/upcode-advanced.php',
			'upcode-floating-cart/upcode-floating-cart.php',
			'upcode-advanced-3/upcode-advanced.php'
		);
		$myplugins = $wp_list_table->items;
		foreach ($myplugins as $key => $val) {
			if (in_array($key,$hidearr)) {
				unset($wp_list_table->items[$key]);
			}
		}
	}
	
	add_action('pre_current_active_plugins', 'hideAdvancedTools');
	class BS_Page_Walker extends Walker_Page {
		public function start_lvl( &$output, $depth = 0, $args = array() ) {
			$indent = str_repeat("\t", $depth);
			$output .= "\n$indent<ul class='dropdown-menu' role='menu'>\n";
		}
		
		public function start_el( &$output, $page, $depth = 0, $args = array(), $current_page = 0 ) {
			if ( $depth ) {
				$indent = str_repeat( "\t", $depth );
			} else {
				$indent = '';
			}
			
			$css_class = array( 'page_item', 'page-item-' . $page->ID );
			
			if ( isset( $args['pages_with_children'][ $page->ID ] ) ) {
				$css_class[] = 'page_item_has_children';
			}
			
			if ( ! empty( $current_page ) ) {
				$_current_page = get_post( $current_page );
				if ( in_array( $page->ID, $_current_page->ancestors ) ) {
					$css_class[] = 'current_page_ancestor';
				}
				if ( $page->ID == $current_page ) {
					$css_class[] = 'current_page_item';
				} elseif ( $_current_page && $page->ID == $_current_page->post_parent ) {
					$css_class[] = 'current_page_parent';
				}
			} elseif ( $page->ID == get_option('page_for_posts') ) {
				$css_class[] = 'current_page_parent';
			}
			
			/**
			 * Filter the list of CSS classes to include with each page item in the list.
			 *
			 * @since 2.8.0
			 *
			 * @see wp_list_pages()
			 *
			 * @param array   $css_class    An array of CSS classes to be applied
			 *                             to each list item.
			 * @param WP_Post $page         Page data object.
			 * @param int     $depth        Depth of page, used for padding.
			 * @param array   $args         An array of arguments.
			 * @param int     $current_page ID of the current page.
			 */
			$css_classes = implode( ' ', apply_filters( 'page_css_class', $css_class, $page, $depth, $args, $current_page ) );
			
			if ( '' === $page->post_title ) {
				$page->post_title = sprintf( __( '#%d (no title)' ), $page->ID );
			}
			
			$args['link_before'] = empty( $args['link_before'] ) ? '' : $args['link_before'];
			$args['link_after'] = empty( $args['link_after'] ) ? '' : $args['link_after'];
			
			/** This filter is documented in wp-includes/post-template.php */
			if ( isset( $args['pages_with_children'][ $page->ID ] ) ) {
				$output .= $indent . sprintf(
						'<li class="%s"><a href="%s" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">%s%s%s <span class="caret"></span></a>',
						$css_classes,
						get_permalink( $page->ID ),
						$args['link_before'],
						apply_filters( 'the_title', $page->post_title, $page->ID ),
						$args['link_after']
					);
			} else {
				$output .= $indent . sprintf(
						'<li class="%s"><a href="%s">%s%s%s</a>',
						$css_classes,
						get_permalink( $page->ID ),
						$args['link_before'],
						apply_filters( 'the_title', $page->post_title, $page->ID ),
						$args['link_after']
					);
			}
			
			
			if ( ! empty( $args['show_date'] ) ) {
				if ( 'modified' == $args['show_date'] ) {
					$time = $page->post_modified;
				} else {
					$time = $page->post_date;
				}
				
				$date_format = empty( $args['date_format'] ) ? '' : $args['date_format'];
				$output .= ' ' . mysql2date( $date_format, $time );
			}
		}
	}
