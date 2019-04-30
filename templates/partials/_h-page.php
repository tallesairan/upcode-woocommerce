<?php
	if (is_tax(['product_cat']) ) :
		$query = get_queried_object();
	endif;
?>
<div class="h-page">
	<div class="container">
		<div class="content">
			<?php
				if ( is_product() ) : the_title('<h1>', '</h1>'); yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
				elseif ( is_shop() ) : echo '<h1>Loja</h1>'; yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
				elseif ( is_search() ) : echo '<h1>Resultados de busca para: <strong>' . esc_html( get_search_query( false ) ) . '</strong></h1>'; yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
				elseif ( is_tax(['product_cat'])) : echo '<h1>'.$query->name.'</h1>'; yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
				elseif ( is_singular('post') ) : the_title('<h1>', '</h1>'); echo '<a class="text-white" href="'.get_permalink(6).'"><i class="fas fa-angle-left"></i> Voltar para o blog</a>'; yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
				elseif ( is_home() || is_archive()) : echo '<h1>Blog</h1>'; yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
				elseif(is_page()) :
					global $post;
					if($post->post_parent === 0){
						echo '<h1>'.get_the_title().'</h1>';
						echo '<a class="text-white" href="'.get_permalink(6).'"><i class="fas fa-angle-left"></i> Voltar para Página inicial</a>';
						
					}else{
						$pp = get_post($post->post_parent);
						$pps = get_posts(['post_type'=>'page','post_parent'=>$post->post_parent]);
						$pps = $pps[0];
						echo '<h1>'.$pp->post_title.' - '.get_the_title().'</h1>';
						echo '<a class="text-white" href="'.get_permalink($pps->ID).'"><i class="fas fa-angle-left"></i> Voltar para '.$pp->post_title.'</a>';
						
					}
				yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
				else : the_title('<h1>', '</h1>'); yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
				endif;
			?>
		</div>
	</div>
</div>