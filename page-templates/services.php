<?php
/**
* Template Name: Services
*
* @package ilestunefois
*/

get_header();
?>
<div class="service-content">

	<div id="portfolio">


		<div class="container-fluid">
			
			<div class="services-container">
				
			<?php
			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			$args = array(
				'post_type' => 'service',
				'posts_per_page' => 8,
				'post_status' => 'publish',
				'paged' => $paged
			);

			$query = new WP_Query($args);

			if($query->have_posts()): ?>

				<div class="section">
				
					<div class="container">
						<div class="row" id="services-list">

							<?php	while($query->have_posts()): $query->the_post(); ?>

								<div class="col-md-6 col-12 column">
									<div class="service-item">
										<a href="<?php the_field('lien'); ?>">
											<div class="service-bg" style="background-image:url(<?php the_field('image_service') ?>)"></div>
											<div class="content">
												<h2 class="mb-3"><?php the_title(); ?></h2>
												<div><?php the_field('paragraphe_service'); ?></div>
											</div>
										</a>
									</div><!-- .video-item -->
								</div><!-- .col -->
							
							<?php endwhile; ?>

							<?php wp_reset_postdata(); ?>

				  	</div><!-- #videos-list -->
				 	</div><!-- .container-fluid -->


					 <div class="pagination">
			    <?php 
			         echo paginate_links( array(
			            'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
			            'total'        => $query->max_num_pages,
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

						<?php endif; ?>

				
				</div><!-- .videos-container -->

		</div><!-- .container-fluid -->
		<?php if(have_rows('process_de_production')): ?>
			<?php while(have_rows('process_de_production')): the_row(); ?>
				<?php $bg = get_sub_field('background_image'); ?>
				<div id="process">
					<div class="row">
						<div class="col-12">
							<div class="bg-process" style="background-image:url(<?php echo $bg['sizes']['large']; ?>)">
									<h3 class="text-center"><?php the_sub_field('titre'); ?></h3>
									<?php $steps = get_sub_field('etapes'); ?>
									<div class="container step-container">
										<div class="row">
										<?php	$count = 1; foreach($steps as $step): ?>
											<div class="col-12 col-lg-6 step-item">
												<h4 class="mb-3"><?php echo $count.". ".$step['titre']; ?></h4>
												<p><?php echo $step['paragraphe']; ?></p>
											</div>
										<?php $count++;endforeach;  ?>
										</div>
									</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12 text-center">
									<div class="read-more">
										<a href="#" class="cta-btn"><?php the_sub_field('texte_cta'); ?></a>
									</div>
						</div>
					</div>
				</div>
		<?php endwhile; endif; ?>
	</div><!-- #portfolio -->
</div><!-- .portfolio-content -->

<?php get_footer(); ?>