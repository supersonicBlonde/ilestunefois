<?php
/**
* Template Name: New Photographies
*
* @package ilestunefois
*/

get_header();
?>
<div class="portfolio-content photo">

	<?php

	// get the 6 videos of portfolio
	$title = get_field('main_title_portfolio');
	$paragraphe = get_field('paragraphe_introduction_portfolio');
	?>
	<div id="second-section" class="section limited">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8 offset-md-4 col-12">
					<?php if(!empty($title)): ?>
						<h2><?php echo $title; ?></h2>
					<?php endif; ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 offset-md-6 col-12">
					<?php if(!empty($paragraphe)): ?>
						<p><?php echo $paragraphe; ?></p>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>

	<?php

	$playerList = [];

	$args = array(
		'post_type' => 'portfoliophoto',
		'posts_per_page' => 6,
		'paged' => $paged
	);

	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
	$portfolio = new WP_Query($args);

	if($portfolio->have_posts() ): 
	?>

	<div id="portfolio">

		<?php $terms = get_terms( 'photos-category', array('hide_empty' => true) ); ?>
	
		<div class="section limited" id="cat-list">

			<div class="container-fluid" >
				
				<div class="row">
					
					<div class="col-12">
						
						<?php if(count($terms) > 0): ?>

							<ul class="videos-categories">
							
							<?php foreach($terms as $term): ?>

								<li><a href="/photos-category/<?php echo $term->slug ;?>"><?php echo $term->name; ?></a></li>

							<?php endforeach;  ?>

							</ul>

						<?php endif; ?>

					</div><!-- .col-12 container-cat-list -->

				</div>

			</div><!-- .container-fluid -->

		</div><!-- #cat-list -->

		<div class="container-fluid">
			
			<div class="videos-container">

			<?php 

			// creating the array of posts in the loop
			$count = 0;

			while($portfolio->have_posts()): $portfolio->the_post(); 

			$playerList[$count]["title"] = get_the_title();
			$playerList[$count]["id"] = get_the_ID();
			$playerList[$count]["paragraphe"] = get_field('paragraphe_photo_video');
			$playerList[$count]["album"] = get_field('portfolio_photos');


			$count++;

			endwhile; 
			/*********************************/
			?>	
			<div class="section limited">
	<div class="container-fluid">
		<div class="row" id="photo-list">	


				<div class="col-md-6 col-12 column">
					<?php if($playerList[0]):  ?>
					<div class="video-item">
						<div class="poster poster-slider">
						
							<?php if($playerList[0]['album'] > 0):
								foreach($playerList[0]['album'] as $album): 
								?>
								<img src="<?php echo $album['portfolio_photo']; ?>">
								<?php endforeach; 
							endif; ?>
							</div>
							<h3><?php echo $playerList[0]['title']; ?></h3>
							<p><?php echo $playerList[0]['paragraphe']; ?></p>
							<div class="post-cat">
								<?php 
								echo ilesunefois_echo_cpt_taxonomies('photos-category', $playerList[0]['id'], array('photos-category')); 
								?>
							</div></div>
							<?php endif; ?>
						<?php if($playerList[2]):  ?>
					<div class="video-item">
						<div class="poster poster-slider">
							<?php if($playerList[2]['album'] > 0):
								foreach($playerList[2]['album'] as $album): 
								?>
								<img src="<?php echo $album['portfolio_photo']; ?>">
								<?php endforeach; 
							endif; ?>
							</div>
							<h3><?php echo $playerList[2]['title']; ?></h3>
							<p><?php echo $playerList[2]['paragraphe']; ?></p>
							<div class="post-cat">
								<?php 
								echo ilesunefois_echo_cpt_taxonomies('photos-category', $playerList[2]['id'], array('photos-category')); 
								?>
							</div></div>
							<?php endif; ?>
						<?php if($playerList[4]):  ?>
					<div class="video-item">
						<div class="poster poster-slider">
							
							<?php if($playerList[4]['album'] > 0):
								foreach($playerList[4]['album'] as $album): 
								?>
								<img src="<?php echo $album['portfolio_photo']; ?>">
								<?php endforeach; 
							endif; ?>
							</div>
							<h3><?php echo $playerList[4]['title']; ?></h3>
							<p><?php echo $playerList[4]['paragraphe']; ?></p>
							<div class="post-cat">
								<?php 
								echo ilesunefois_echo_cpt_taxonomies('photos-category', $playerList[4]['id'], array('photos-category')); 
								?>
							</div>	</div>
							<?php endif; ?>
				
				</div>

				<div class="col-md-6 col-12">
					<?php if($playerList[1]):  ?>
						<div class="video-item">
						
						<div class="poster poster-slider">
							<?php if($playerList[1]['album'] > 0):
								foreach($playerList[1]['album'] as $album): 
								?>
								<img src="<?php echo $album['portfolio_photo']; ?>">
								<?php endforeach; 
							endif; ?>
							</div>
							<h3><?php echo $playerList[1]['title']; ?></h3>
							<p><?php echo $playerList[1]['paragraphe']; ?></p>
							<div class="post-cat">
								<?php 
								echo ilesunefois_echo_cpt_taxonomies('photos-category', $playerList[1]['id'], array('photos-category')); 
								?>
							</div>
						</div>
					<?php endif; ?>
				  
					<?php if($playerList[3]):  ?>
					<div class="video-item">
						<div class="poster poster-slider">
							<?php if($playerList[3]['album'] > 0):
								foreach($playerList[3]['album'] as $album): 
								?>
								<img src="<?php echo $album['portfolio_photo']; ?>">
								<?php endforeach; 
							endif; ?>
							</div>
							<h3><?php echo $playerList[3]['title']; ?></h3>
							<p><?php echo $playerList[3]['paragraphe']; ?></p>
							<div class="post-cat">
								<?php 
								echo ilesunefois_echo_cpt_taxonomies('photos-category', $playerList[3]['id'], array('photos-category')); 
								?>
							</div>
						</div>
					<?php endif; ?>
					<?php if($playerList[5]):  ?>
					<div class="video-item">
						<div class="poster poster-slider">
							
							<?php if($playerList[5]['album'] > 0):
								foreach($playerList[5]['album'] as $album): 
								?>
								<img src="<?php echo $album['portfolio_photo']; ?>">
								<?php endforeach; 
							endif; ?>
							</div>
							<h3><?php echo $playerList[5]['title']; ?></h3>
							<p><?php echo $playerList[5]['paragraphe']; ?></p>
							<div class="post-cat">
								<?php 
								echo ilesunefois_echo_cpt_taxonomies('photos-category', $playerList[5]['id'], array('photos-category')); 
								?>
							</div></div>
							<?php endif; ?>
				
						</div></div>
					<div class="pagination">
			    <?php 
			        echo paginate_links( array(
			            'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
			            'total'        => $portfolio->max_num_pages,
			            'current'      => max( 1, get_query_var( 'paged' ) ),
			            'format'       => '?paged=%#%',
			            'show_all'     => false,
			            'type'         => 'plain',
			            'end_size'     => 2,
			            'mid_size'     => 1,
			            'prev_next'    => true,
			            'prev_text'    => sprintf( '<i></i> %1$s', __( '', 'text-domain' ) ),
			            'next_text'    => sprintf( '%1$s <i></i>', __( '', 'text-domain' ) ),
			            'add_args'     => false,
			            'add_fragment' => '',
			        ) );
			    ?>
				</div><!-- .pagination -->
				</div><!-- .section -->

				

			</div><!-- .videos-container -->


		</div><!-- .container-fluid-->


	<?php endif; ?>

	</div><!-- #portfolio -->

</div>

<?php wp_reset_postdata(); ?>
<?php if(!empty(get_field('text_cta_module'))): ?>
	<div id="call_to_action" class="section limitedext module" style="margin:4em 0;">
		<div class="row justify-content-center">
			<div class="col-8 column">
				<div>
					<?php if(!empty(get_field('titre_cta'))): ?>
					<h3><?php echo get_field('titre_cta'); ?></h3>
					<?php endif; ?>
					<?php if(!empty(get_field('paragraphe_cta'))): ?>
					<h4><?php echo get_field('paragraphe_cta') ?></h4>
					<?php endif; ?>
					<div class="read-more">
						<a href="#" class="cta-btn"><?php echo get_field('text_cta_module'); ?></a>
					</div>	
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>

<?php get_footer(); ?>