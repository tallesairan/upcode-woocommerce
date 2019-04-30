<?php

  /* ----------------------------------------------------- */
  /* Criando Custom Post Type */
  /* ----------------------------------------------------- */
  add_action( 'init', 'register_cpt_galeria' );

  function register_cpt_galeria() {
    $labels = array(
      'name' => _x( 'Galerias', 'upcode' ),
      'singular_name' => _x( 'Galeria', 'upcode' ),
      'add_new' => _x( 'Adicionar nova', 'upcode' ),
      'add_new_item' => _x( 'Adicionar nova galeria', 'upcode' ),
      'edit_item' => _x( 'Editar galeria', 'upcode' ),
      'new_item' => _x( 'Nova galeria', 'upcode' ),
      'view_item' => _x( 'Ver galeria', 'upcode' ),
      'search_items' => _x( 'Buscar galeria', 'upcode' ),
      'not_found' => _x( 'Nenhum galeria encontrado', 'upcode' ),
      'not_found_in_trash' => _x( 'Nenhum galeria encontrado no Lixo', 'upcode' ),
      'parent_item_colon' => _x( 'Parent galeria:', 'upcode' ),
      'menu_name' => _x( 'Galerias', 'upcode' ),
    );

    $args = array(
      'labels' => $labels,
      'hierarchical' => false,
      'taxonomies' => array( 'ctgaleria' ),
      'public' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'menu_position' => 5,
      'menu_icon' => 'dashicons-admin-generic',
      'show_in_nav_menus' => true,
      'publicly_queryable' => true,
      'exclude_from_search' => false,
      'has_archive' => true,
      'query_var' => true,
      'can_export' => true,
      'rewrite' => true,
      'capability_type' => 'post',
      'supports' => [
        'title', 
        'editor', 
        'thumbnail'
      ]
    );
    register_post_type( 'galeria', $args );

    // register custom taxonomy
    $labels = array(
      'name' => _x( 'Categorias galerias', 'taxonomy general name' ),
      'singular_name' => _x( 'Tag', 'taxonomy singular name' ),
      'search_items' =>  __( 'Buscar Types' ),
      'all_items' => __( 'Todas Tags' ),
      'parent_item' => __( 'Parent Tag' ),
      'parent_item_colon' => __( 'Parent Tag:' ),
      'edit_item' => __( 'Editar Tags' ),
      'update_item' => __( 'Atualizar Tag' ),
      'add_new_item' => __( 'Adicionar nova categoria' ),
      'new_item_name' => __( 'Nova nome de tag' ),
    );
    register_taxonomy('ctgaleria',array('galeria'), array(
      'hierarchical' => true,
      'labels' => $labels,
      'show_ui' => true,
      'query_var' => true,
    ));
  }