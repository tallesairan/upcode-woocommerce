<!doctype html>
<html <?php language_attributes(); ?> class="no-js">

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>"/>
	
	<link rel="profile" href="http://gmpg.org/xfn/11"/>
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>"/>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"/>
	<!-- <link href="<?php echo get_template_directory_uri() ?>/assets/images/favicon.ico" rel="shortcut icon" type="image/x-icon" /> -->
<!--	<title>--><?php //if($post->post_parent) { 	$parent_title = get_the_title($post->post_parent); 	echo $parent_title.' - '; 	} ?><!----><?php //wp_title( '|', true, 'right' ); ?><!--</title>-->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php wp_head(); ?>
</head>
<?php get_template_part( 'main' ) ?>

<body <?php body_class(); ?>>
<h1 class="d-none"><?php bloginfo( 'name' ); ?> | <?php bloginfo( 'description' ); ?></h1>
<header id="header">
	<div class="container">
		<div class="row">
			<div class="col-9 col-md-3 d-flex align-items-center order-2 order-md-1">
				<?php
					$logotipo = get_field( 'logotipo', 'option' );
					if ( ! empty( $logotipo ) ) : ?>
						<a class="logotipo" href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo $logotipo; ?>"
						                                                                                                                                               class="img-fluid"/></a>
					<?php endif; ?>
			</div>
			<?php
				if ( wp_is_mobile() ):
					?>
					<div class="col-3 order-1">
						<?php
							_partials( '_nav' );
						
						?>
					</div>
				<?php
				endif;
			?>
			<div class="col-12 col-md-9 d-flex flex-column order-0 order-md-2">
				<div class="row align-items-center justify-content-between">
					<div class="col-md-8 mr-auto col-12">
						<ul class="d-flex align-items-center justify-content-between m-0 list-unstyled phones-list">
							<li class="p-1 d-flex justify-content-baseline align-items-center w-md-50">
								<a href="tel: <?= get_field( 'phone_info', 'option' ); ?>" class="d-flex align-items-center justify-content-between w-md-100 flex-column flex-md-row">
									<div class="ic">
										<img src="<?php images_url( 'fone-topo.png' ); ?>">
									</div>
									<div class="d-flex flex-column flex-md-row">
										<span class="mask-phone phone_info"><?= get_field( 'phone_info', 'option' ); ?> | </span>
										<span class="mask-phone whatsapp_info"><?= get_field( 'whatsapp_info', 'option' ); ?></span>
									</div>
							
								</a>
							</li>
							<li class="p-1 d-flex justify-content-between align-items-center w-md-50 ">
								<a href="mailto://<?= get_field( 'email_info', 'option' ); ?>&amp;subject=Contato via escola agos" target="_blank"
								   class="d-flex align-items-center justify-content-around w-md-100 flex-column flex-md-row">
									<div class="ic">
										<img src="<?php images_url( 'contato-topo.png' ); ?>" />
									</div>
									<span class="mask-mail"><?= get_field( 'email_info', 'option' ); ?></span>
								</a>
							</li>
						</ul>
					</div>
					<?php
						if ( ! wp_is_mobile() ):
							?>
							<?php _partials( '_s-networks' ); ?>
							<div class="col-12">
								<hr class="custom-row">
							</div>
							<div class="col-12 ccol">
								<?php
									if ( ! wp_is_mobile() ) {
										_partials( '_nav' );
									} ?>
							</div>
						<?php
						endif;
					?>
				</div>
			
			</div>
		</div>
</header>