<?php
	/**
	 * Created by PhpStorm.
	 * User: talles
	 * Date: 26/04/19
	 * Time: 08:41
	 */
	$queriedObject = get_queried_object();
	$parentId =  $queriedObject->post_parent;
	if ($parentId === 8 or $parentId === 51 or $parentId === 56 or get_field('hasAside')):
		$parent = get_post( $queriedObject->post_parent );
		$tit = $parent->post_title;
		$parentIdd = $parent->ID;
		$linker=false;
		if($parent->post_parent <> 0):
			$parentt=get_post($parent->post_parent );
			if($parentt->ID === 56){
//				$tit = 'Eventos - '.$parent->post_title;
//				$parentIdd = 56;
				$linker = $parentt->ID;

			}
			if($parentt->ID === 57){
				$linker = $parentt->ID;
//				$tit = 'Serviços - '.$parent->post_title;
//				$parentIdd = 57;
			}
		endif;

		
		?>
		<aside class="aside-parent col-md-3 order-md-0 order-1 col-12" role="aside">
			<div class="aside-box">
				<h2><?= apply_filters( 'the_title', $tit ); ?></h2>
				<div class="aside-content">
					<ul class="nav navbar-nav">
						<?php
							if($linker):
						?>
								<li class="page_item page-item-352 current_page_item">
									<a href="<?=get_permalink($linker);?>"><i class="fa fa-chevron-left"></i> Voltar</a>
								</li>
						<?php
								endif;
							wp_list_pages( array(
								'depth'        => 0,
								'show_date'    => '',
								'date_format'  => get_option( 'date_format' ),
								'child_of'     => $parentIdd,
								'exclude'      => '',
								'title_li'     => '',
								'echo'         => 1,
								'authors'      => '',
								'sort_column'  => 'menu_order, post_title',
								'link_before'  => '',
								'link_after'   => '',
								'item_spacing' => 'preserve',
								'walker' => new BS_Page_Walker(),
							) );
						?>
					</ul>
				</div>
			</div>
		</aside>
	<?php
	endif;
