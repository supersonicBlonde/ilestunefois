<?php

get_header();
?>
<div class="portfolio-content page-content">
  
	<?php

	$playerList = [];
  
	

	if(have_posts() ):
	?>

	<div id="portfolio">

		<?php $terms = get_terms( 'photos-category', array('hide_empty' => true) );  ?>
	
		<div class="section limited" id="cat-list">

			<div class="container-fluid" >
				<div class="row">
					
					<div class="col-12 text-right">
						
						<?php if(count($terms) > 0): ?>

							<ul class="videos-categories">

								<li><a href="/photographies"><?php echo __('Tous'); ?></a></li>
							
							<?php foreach($terms as $term): ?>

								<li><a href="/photos-category/<?php echo $term->slug ;?>"><?php echo $term->name; ?></a></li>

							<?php endforeach;  ?>

							</ul>

						<?php endif; ?>

					</div><!-- .col-12 container-cat-list -->

				</div>

			</div><!-- .container-fluid -->

		</div><!-- #cat-list -->
		
		<script> let playerInfoList = []; </script>

		<div class="container-fluid">
			
			<div class="videos-container">
				
				<?php 

				// creating the array of posts in the loop
				$count = 0;

				while(have_posts()): the_post(); 

						$playerList[$count]["title"] = get_the_title();
						$playerList[$count]["id"] = get_the_ID();
						$playerList[$count]["paragraphe"] = get_field('paragraphe_photo_video');
						$playerList[$count]["poster"] = get_field('portfolio_photos');
					?>
					

				  <?php	$count++;



				 endwhile; 
				 /*********************************/
				?>	

				<div class="section limited">
					<div class="container-fluid">
						<div class="row" id="videos-list">	

						<?php  
							// Display the videos	
							$count = 0; 

							foreach($playerList as $player): ?>

								<div class="col-md-6 col-12 column">
				 	
									<div class="video-item">
									
											<div id="<?php echo "player".$count; ?>"></div>
										
									 	<div class="poster poster-slider">
												<?php foreach($playerList[$count]['poster'] as $poster): ?>
													<img src="<?php echo $poster['portfolio_photo']; ?>" style="height:400px;">
													<?php endforeach; ?>
                      </div>
								
										<h3><?php echo $player['title']; ?></h3>
										<p><?php echo $player['paragraphe']; ?></p>
										<div class="post-cat">
										<?php 
											echo ilesunefois_echo_cpt_taxonomies('photos-category', $player['id'], array('photos-category')); 
										?>
										</div>
									</div><!-- .video-item -->

								</div><!-- .column -->
			
							<?php $count++; endforeach; 
							/*************************************/
							?>

					

						</div><!-- #videos-list -->
					</div><!-- .container-fluid -->

					<div class="pagination">
			    <?php 
			    	global $wp_query;
			       echo paginate_links( array(
			            'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
			            'total'        => $wp_query->max_num_pages,
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

<?php get_footer(); ?>

