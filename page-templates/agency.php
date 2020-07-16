<?php
/**
* Template Name: Agence
*
* @package ilestunefois
*/

get_header();
?>
<div class="agence-content page-content">

	<?php get_template_part('template-parts/content-subheader'); ?>

		<div id="first-profiles" class="section limited">

			<div class="container-fluid">

				<?php if( have_rows('profils_first_section_agency') ): ?>

					<div class="profils-container">

						

						    <?php while ( have_rows('profils_first_section_agency') ) : the_row(); ?>

						    	<?php $video = get_sub_field('video_first_section_agency'); ?>

						    	<div class="row">

									<div class="col-md-6 col-12 column">
								        <div class="profil-image">
								        	 <?php echo $video; ?>
								        </div>
							    	</div>
							    	<div class="col-md-6 col-12 column-bg column">
							    		<div class="profils-content">
							    			<h4><?php the_sub_field('titre_first_section_agency'); ?></h4>
							    			<p><?php the_sub_field('paragraphe_first_section_agency'); ?></p>
							    		</div>
							    	</div>

								</div><!-- .row -->


						 	<?php  endwhile; ?>

					</div><!-- .profils-container -->

				<?php endif; ?>

			</div><!-- .container-fluid -->

		</div><!-- .section limited -->



		<div id="team-slider">

			<div class="section limited">
				
				<div class="container-fluid">

					<div class="row">
					
						<div class="col-12 column">
							
							<h2 class="team-title"><?php the_field('title_team_section'); ?></h2>
						
						</div>
					
					</div>

					<?php

					$args = array(
						'post_type' => 'team',
						'posts_per_page' => -1
					);

					
					$team  = new WP_Query($args);

					if($team->have_posts() ):
					?>

							<div class="row team_slider-container justify-content-between">

								<?php while($team->have_posts()): $team->the_post();  ?>

									<?php $profil_image = get_field('image_team'); ?>
									<div class="col-md-3 col-12 column">
										<div class="team_slider-single">
											<div>
												<img src="<?php echo esc_url($profil_image['url']); ?>" alt="<?php echo esc_attr($profil_image['alt']); ?>" />
											</div>
											<h4><?php the_title(); ?></h4>
											<h5><?php the_field('job_title_team'); ?></h5>
											<div class="paragraphe">
												<p><?php the_field('paragraphe_team') ?></p>
											</div>
										</div>
									</div><!-- .col -->

								<?php endwhile; ?>
								
							</div><!-- .team_slider-container -->

						

					<?php endif; ?>

				</div><!-- .container-fluid -->

			</div><!-- .section.limited -->

		</div><!-- #team-slider -->
</div>


<?php get_footer(); ?>