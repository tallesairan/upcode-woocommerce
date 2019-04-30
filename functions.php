<?php
	// use App\AcfUp;
  // require_once ('vendor/autoload.php'); // uncomment this line if you want to use composer
  //WP_Dependency_Installer::instance()->run( __DIR__ );
  
	define('UP_PARTIALS_PATH', get_stylesheet_directory() . '/templates/partials/');
	define('UP_LOOP_PATH', get_stylesheet_directory() . '/templates/loop/');
  // Defines funcionts of the framework
  require_once ('functions/_setup.php');
  require_once ('functions/_custom.php');
  require_once ('functions/_navwalker.php');

  // Defines functions about wp-admin
  require_once ('functions/_admin.php');

  // Defines custom functions
  require_once ('functions/_acf.php');
  require_once ('functions/_options.php');

  // customization woocommerce css
  require_once ('functions/_f-woo.php');
	add_filter( 'image_size_names_choose', 'my_custom_sizes' );
	
	function my_custom_sizes( $sizes ) {
		return array_merge( $sizes, array(
			'gallery-thumb' => __( 'Gallery Thumb' ),
			'medium-square' => __( 'Medium Square' )
		) );
	}


