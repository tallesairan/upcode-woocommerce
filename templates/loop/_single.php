<?
	if (is_product()) : get_template_part( 'templates/loop/_woo' );
	else :
	get_template_part( 'templates/partials/_h-page' );
?>
	<main id="content" role="main">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
						<article <?php post_class( 'post single' ); ?> >
							<div class="meta d-flex justify-content-center align-items-center">
								<span class="cat">Em <? the_category(', '); ?> · <?php echo get_the_date('d F Y'); ?></span>
							</div>
							<div class="entry-content col-md-12 mx-auto">
								<? the_content(); ?>
							</div>
 
						</article>

					<?php endwhile; ?>
				</div>
				<?php //get_sidebar(); ?>
			</div>
		</div>
	</main>
<?php endif; ?>