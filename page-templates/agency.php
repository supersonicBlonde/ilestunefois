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

	<?php if(!empty(get_field('video'))): ?>
	<div class="my-5 section limited">
		<div class="container-fluid">
			<div class="row justify-content-center">
				<div class="col-8">
					<div class="embed-container">
						<?php the_field('video'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>


		<div id="first-profiles" class="section limited">


			<div class="container-fluid">

				<?php if(!empty(get_field('text_cta_module'))): ?>
				<div id="call_to_action" class="section limitedext module" style="margin:2em 0 8em 0;">
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

			<?php get_template_part('template-parts/content' , 'chooseus'); ?>

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
							    	<div class="col-xl-6 col-12 column-bg column">
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

			</div><!-- .container-fluid -->

		</div><!-- .section limited -->

		<div style="margin:3em;"></div>


		<?php if(!empty(get_field('text_cta'))): ?>
		<div id="call_to_action" class="section limitedext module">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12 column">
					<div class="read-more">
						<a href="#" class="cta-btn"><?php echo get_field('text_cta'); ?></a>
					</div>	
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>

		<?php  get_template_part('template-parts/logo' , 'section'); ?>

		<?php get_template_part('template-parts/content' , 'bottomblock') ?>

		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="map-responsive">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2625.936107132036!2d2.332964710871306!3d48.84035740185733!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e116302ad03%3A0x7302900dd3a82b8c!2sIL%20EST%20UNE%20FOIS%20-%20production%20audiovisuelle%20Paris!5e0!3m2!1sen!2sfr!4v1681996487104!5m2!1sen!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					</div>
				</div>
			</div>
		</div>

</div>


<?php get_footer(); ?>