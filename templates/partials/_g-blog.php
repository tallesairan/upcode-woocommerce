<section class="blog-mansory">
  <div class="container">
    <div class="row">
      <?php
        $counter = 1;
        $total_posts = $wp_query->found_posts;
        while ( have_posts() ): the_post();
        $dateD = get_the_date('d');
        $dateM = get_the_date('M');
	        ?>
	        <article class="post post-index">
		        <a href="<?= get_permalink(); ?>" class="fig">
			        <figure>
				        <?php
					        the_post_thumbnail( 'noticia-small', [ 'class' => 'img-fluid' ] );
				        ?>
				        <figcaption>
					        <span><?=$dateD;?></span>
					        <small class="text-uppercase uppercase"><?=$dateM;?></small>
				        </figcaption>
			        </figure>
				 
		        </a>
		        <header>
			        <a href="<?= get_permalink(); ?>"><h3><?php the_title(); ?></h3>
				        <?php echo content(222).'[+]'; ?>

			        </a>
		        </header>
	        </article>
	        <?
        $counter ++;
        endwhile;
      ?>
    </div>
  </div>
</section>