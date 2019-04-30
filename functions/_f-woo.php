<?php

  function wcThemeSupport() {
    add_theme_support( 'woocommerce' );
    // add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-slider' );
    // add_theme_support( 'wc-product-gallery-lightbox' );
  }
	add_action( 'after_setup_theme', 'wcThemeSupport' );
  
  add_filter('woocommerce_show_page_title', false);

  // remove tabs on product admin
  function remove_tab($tabs){
    // unset($tabs['inventory']); // it is to remove inventory tab
    //unset($tabs['advanced']); // it is to remove advanced tab
   // unset($tabs['linked_product']); // it is to remove linked_product tab
    //unset($tabs['attribute']); // it is to remove attribute tab
    //unset($tabs['variations']); // it is to remove variations tab
    return($tabs);
  }
  add_filter('woocommerce_product_data_tabs', 'remove_tab', 10, 1);

  function remove_metaboxes() {
    // remove_meta_box( 'postcustom' , 'product' , 'normal' );
    //remove_meta_box( 'postexcerpt' , 'product' , 'normal' );
    //remove_meta_box( 'commentsdiv' , 'product' , 'normal' );
    //remove_meta_box( 'wpseo_meta' , 'product' , 'normal' );
    // remove_meta_box( 'tagsdiv-product_tag' , 'product' , 'normal' );
  }
  add_action( 'add_meta_boxes' , 'remove_metaboxes', 50 );

  // customization woocommerce css
  add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
  // add the tag figure on loop woocommerce
  if ( ! function_exists( 'woocommerce_get_product_thumbnail' ) ) {
    function woocommerce_get_product_thumbnail( $size = 'product-loop', $placeholder_width = 0, $placeholder_height = 0  ) {
      global $post, $woocommerce;
      $output = '<figure>';
      if ( has_post_thumbnail() ) : $output .= get_the_post_thumbnail( $post->ID, 'woo' ); endif;
      $output .= '</figure>';
      return $output;
    }
  }

  /** Display price with discount */
  function price_dicount() {
    $product = get_product();
    if ( $product->get_price_including_tax() ) {
      $valor = $product->get_price_including_tax();
      $juro = $product->get_price_including_tax() * 0;
      $total = $valor + $juro;
      $percent = 0.1;
      $price = $total - ($percent * $total);
      $total = woocommerce_price( $price );
      return $total;
    }
  }

  function cs_product_parceled() {
    $product = get_product();
    if ( $product->get_price_including_tax() ) {
      $valor = $product->get_price_including_tax();
      $juro = $product->get_price_including_tax() * 0;
      $total = $valor + $juro;
      $total = woocommerce_price( $total / 6);
      return $total;
    }
  }

  $bankBilletDiscount = false;
  if ( $bankBilletDiscount ) :
    // echo '<pre>'. print_r($order->get_payment_method(), 1) . '</pre>';
    function cs_product_parceled_loop() {
      $product = get_product();
      echo '<span class="price">';
        echo '<p class="full-price"> '.$product->get_price_html().'</p>';
        echo '<p class="discount"><span> ' . price_dicount() . ' </span><span class="obs"> 10% de desconto Transferência ou Depósito bancário!</span></p>';
      echo '</span>';
    }
    //remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
    //add_action( 'woocommerce_after_shop_loop_item_title', 'cs_product_parceled_loop', 10 );

    function cs_product_parceled_single() {
      $product = wc_get_product();
    ?>
      <div itemprop="offers" itemscope itemtype="http://schema.org/Offer" class="details-product">
        <!-- <figure><img src="<?php //images_url('ico-plots.png'); ?>" class="img-fluid"></figure> -->
        <div class="content">
          <p class="full-price"><?php echo $product->get_price_html(); ?></p>
          <p class="discount"><span><?php echo price_dicount(); ?></span><span class="obs"> 10% de desconto Transferência ou Depósito bancário!</span></p>
        </div>
      </div>
    <?php
    }
    //remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
    //add_action( 'woocommerce_single_product_summary', 'cs_product_parceled_single', 10 );
  endif;

  // function the_dramatist_price_show() {
  //   global $product;
  //   if( $product->is_on_sale() ) { return $product->get_sale_price(); }
  //   return $product->get_regular_price();
  // }

  add_filter('loop_shop_columns', 'loop_columns');
  if (!function_exists('loop_columns')) :
    function loop_columns() {
      if ( is_product_category() || is_search() ) : return 3;
      else : return 4;
      endif;
    }
  endif;

  // change label button
  add_filter( 'woocommerce_product_add_to_cart_text', function () { return __('', 'woocommerce'); });
  add_filter( 'woocommerce_product_single_add_to_cart_text', function() { return __( 'Adicionar ao carrinho', 'woocommerce' ); });

  // remove tabs, and add product description on summary
  function remove_woocommerce_product_tabs( $tabs ) {
    unset( $tabs['description'] );
    unset( $tabs['reviews'] );
    unset( $tabs['additional_information'] );
    return $tabs;
  }
  //add_filter( 'woocommerce_product_tabs', 'remove_woocommerce_product_tabs', 98 );
  //remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
  //add_action( 'woocommerce_single_product_summary', 'woocommerce_product_description_tab', 20 );


  //add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
  //add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
  //add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
  //add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
  remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count',0);
  remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering',30);
//  remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
 
 
  

  // remove quick edit
  //add_filter( 'post_row_actions', 'my_disable_quick_edit', 10, 2 );
  //add_filter( 'page_row_actions', 'my_disable_quick_edit', 10, 2 );
  function my_disable_quick_edit( $actions = array(), $post = null ) {
    if ( isset( $actions['inline hide-if-no-js'] ) ) { unset( $actions['inline hide-if-no-js'] ); }
    return $actions;
  }