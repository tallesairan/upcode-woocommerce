 <div class="col-md-3 d-flex justify-content-end align-items-center">
	 <ul class="social-networks">
		 <?php
			 if(!empty(get_field('socials_instagram', 'option'))):
				 ?>
				 <li>
					
					 <a href="https://instagram.com/<?php the_field('socials_instagram', 'option'); ?>" target="_blank">
						 <img class="img-fluid" src="<?php  images_url( 'instagram.png');  ?>" alt="">
					
					 </a>
				 </li>
			 <?php
			 endif;
		 ?>
		 <li>
			 <a href="https://facebook.com/<?php the_field('socials_facebook', 'option'); ?>" target="_blank">
				 <img src="<?php images_url( 'facebook.png'); ?>" alt="" class="img-fluid">
			 </a>
		 </li>
	
	 </ul>

 </div>
 