<nav class="navbar navbar-expand-lg bsnav bsnav-upcode h-100">
  <button class="navbar-toggler toggler-spring"><span class="navbar-toggler-icon"></span></button>
  <?php
	  $navArgs=[
		  'menu'            => 'principal',
		  'theme_location'  => 'top',
		  'container'       => 'div',
		  'container_class' => 'collapse navbar-collapse',
		  'menu_id'         => false,
		  'menu_class'      => 'navbar-nav navbar-mobile mr-0 justify-content-between w-100',
		  'depth'           => 3,
		  'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
		  'walker'          => new wp_bootstrap_navwalker()
	  ];
	  if(wp_is_mobile()){
	  	$navArgs['fallback_cb']='bs4navwalker::fallback';
	  	$navArgs['walker']=new bs4Navwalker();
	  }
    wp_nav_menu($navArgs);
  ?>
</nav>
<div class="bsnav-mobile">
  <div class="bsnav-mobile-overlay"></div>
  <div class="navbar"></div>
</div>