<div class="container-fluid">
	<?php if( have_rows('profils_first_section_agency') ): ?>

		<div class="profils-container">


					<?php while ( have_rows('profils_first_section_agency') ) : the_row(); ?>

						<?php $video = get_sub_field('video_first_section_agency'); ?>

						<div class="row">

						<div class="col-xl-6 col-12 column profile-video">
									<div class="profil-image">
										<div class="embed-container">
											<?php echo $video; ?>
										</div>
									</div>
							</div>
							<div class="col-xl-6 col-12 column-bg column py-5 py-lg-0">
								<div class="profils-content">
									<h4><?php the_sub_field('titre_first_section_agency'); ?></h4>
									<p><?php the_sub_field('paragraphe_first_section_agency'); ?></p>
									<?php if(!empty(get_sub_field('linkedin'))): ?>
										<div class="linkedin-link"><a href="<?php echo get_sub_field('linkedin'); ?>" target="_blank"><i class="fi flaticon-linkedin"></i></a></div>
									<?php endif; ?>
								</div>
							</div>

					</div><!-- .row -->


				<?php  endwhile; ?>

		</div><!-- .profils-container -->

	<?php endif; ?>
</div>