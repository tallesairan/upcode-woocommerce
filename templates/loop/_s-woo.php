<?php get_template_part( 'templates/partials/_h-page' ); ?>
  <div class="woocommerce">
    <main id="content" role="main">
      <div class="container">
        <div class="row">
          <div class="col-md-3 order-1 order-md-0">
            <aside id="sidebar-shop">
              <?php
                the_widget( 'WP_Widget_Search', ['title' => 'Procurar produtos:'] );
                the_widget( 'WC_Widget_Price_Filter', ['title' => 'Filtrar por Preço:'] );
                the_widget( 'WC_Widget_Products', ['title' => 'Últimos Produtos:'] );
              ?> 
            </aside>
          </div>
          <div class="col-md-9 order-0 order-md-1">
            <div class="woocommerce columns-3">
					    <ul class="products columns-3">
                <?php
                  if ( have_posts() ) {
                    while ( have_posts() ) : the_post();
                      wc_get_template_part( 'content', 'product' );
                    endwhile;
                  } else {
                    echo __( 'No products found' );
                  }
                  wp_reset_postdata();
                ?>
              </ul>
                </div>
          </div>
        </div>
      </div>
    </main>
  </div>

<?php
  get_footer();