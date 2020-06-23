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

					    	<?php $profil_image = get_sub_field('image_first_section_agency'); ?>

					    	<div class="row">

								<div class="col-6 column">
							        <div class="profil-image">
							        	 <img src="<?php echo esc_url($profil_image['url']); ?>" alt="<?php echo esc_attr($profil_image['alt']); ?>" />
							        </div>
						    	</div>
						    	<div class="col-6 column-bg column">
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
	


<?php get_footer(); ?>