<?php
  get_header();
  get_template_part( 'templates/partials/_h-page' );
?>

  <main id="content" role="main">
    <div class="container">
      <div class="row">
        <?php if (is_product_category( )) : ?>
          <div class="col-md-3 order-1 order-md-0">
            <aside id="sidebar-shop">
              <?php
                the_widget( 'WP_Widget_Search', ['title' => 'Procurar produtos:'] );
                the_widget( 'WC_Widget_Price_Filter', ['title' => 'Filtrar por Preço:'] );
                the_widget( 'WC_Widget_Products', ['title' => 'Últimos Produtos:'] );
              ?> 
            </aside>
          </div>
        <?php endif; ?>

        <div class="<?php echo (is_product_category()) ? 'col-md-9 order-0 order-md-1' : 'col-md-12'; ?>">
          <article <?php post_class( 'page woocommerce p-woo' ); ?> >
            <?php woocommerce_content() ?>
          </article>
        </div>
      </div>
    </div>
  </main>

<?php
  get_footer();