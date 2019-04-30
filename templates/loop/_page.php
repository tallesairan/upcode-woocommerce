<? get_template_part( 'templates/partials/_h-page' ); ?>

<main id="content" role="main">
	<div class="container">
		
		<?php if ( have_posts() ) {
			while ( have_posts() ) : the_post(); ?>
				

					<div class="row">
						<div class="col-md-12">
							<article class="page single paged <?php if ( is_cart() ) : echo "woo-cart"; endif; ?>">
								<div class="content">
									<? the_content(); ?>
								</div>
							</article>
						</div>
					
					</div>
		
		
			<?php endwhile;
		} ?>
	
	</div>
</main>