<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.1
 */
if(!is_page(6)):
?>
<section class="goBack">
	<div class="container">
		<div class="row">
			<div class="col-md-4 text-center mx-auto col-12">
				<a href="#" onclick="window.history.go(-1)" class="goBackBtn">voltar</a>
			</div>
		</div>
	</div>
</section>
<?php
	endif;
?>
	<footer id="newsletter">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-3 d-flex align-items-center justify-content-md-start justify-content-center">
				<?php
					$logotipo_footer = get_field('logotipo', 'option');
					if (!empty($logotipo_footer)) : ?>
						<a class="logotipo_footer" href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><img src="<?php echo $logotipo_footer; ?>" class="img-fluid" /></a>
					<?php endif; ?>
			</div>
			<div class="col-md-3 col-12 d-flex">
				<div class="newsletter-meta d-flex align-items-center justify-content-between w-100">
					<img src="<? images_url('icon-news.png');?>" alt="">
					<h2>Cadastre-se em nossa <strong class="d-block">Newsletter</strong></h2>
				</div>
			</div>
			<div class="col-md-6 pt-4">
				<div class="newsletter-box">
					<?php echo do_shortcode( '[contact-form-7 id="123" title="newsletter"]' ); ?>
				</div>
			</div>
		</div>
	
	</div>
	</footer>

	<footer id="footer" role="contentinfo">
				<div class="container">
					<div class="row">
						<div class="col-md-4 borderedCol d-flex align-items-center">
							<p class="d-flex align-items-center justify-content-start w-100 m-0">
								<img src="<?php images_url( 'pin.png');?>"><span class="pl-3 mask-address address_info"><?=get_field('address_info','option');?></span>
							</p>
						</div>
						<div class="col-md-4 mx-auto borderedCol d-flex align-items-center">
							<a href="tel:<?=get_field('phone_info','option');?>" class="d-flex align-items-center justify-content-between w-100">
								<img src="<?php images_url( 'icon-fone-footer.png');?>"><span class="mask-phone phone_info"><?=get_field('phone_info','option');?></span> | <span class="mask-phone phone_info"><?=get_field('whatsapp_info','option');?></span>
							</a>
						</div>
						<div class="col-md-4 mr-auto d-flex align-items-center">
							<a href="https://gosites.com.br" target="_blank" class="w-100 copy d-flex flex-column align-items-end"><span>Desenvolvido por</span><img src="<? images_url('gosites.png');?>" alt="GoSites" class="img-fluid"></a>
						</div>
					</div>
				</div>
	</footer>

<?php wp_footer(); ?>
</body>
</html>