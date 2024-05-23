<?php
/**
* Template Name: Page Standard
*
* @package ilestunefois
*/

get_header();
?>
<?php $marginTop = !get_field('show_sub_header_block') ? '' : 'mt-0' ?>
<div class="page-standard-content page-content <?php echo $marginTop; ?>">

	<?php get_template_part('template-parts/content-subheader'); ?>


	<?php

        if(have_rows('standard_layout')):

            // Loop through rows.
            while (have_rows('standard_layout')) : the_row();

                // Case: Image text alignment vertical
                if(get_row_layout() == 'image_text_alignment_vertical'):
                    $bg = get_sub_field('image');
                    $video = get_sub_field('video');
                    $title = get_sub_field('title');
                    $link = empty(get_sub_field('link')) ? "#" : get_sub_field('link');
                    $paragraphe = get_sub_field('paragraphe');

                    ?>
				
				<div id="image_text_alignment_vertical" class="section limitedext">

					<div class="container-fluid">
						
						<div class="row">
							<div class="col-12">
								
								
								<div class="module-content">
									<?php if(!empty($title)): ?>
										<h2><a href="<?php echo $link; ?>"><?php echo $title; ?></a></h2>
									<?php endif; ?>
								 	<?php if(!empty($paragraphe)): ?>
								 		<p><?php echo $paragraphe; ?></p>
								 	<?php endif; ?>
								 </div>
							</div>
						</div>
					</div>
					
				</div>

		        
		        <?php


                    // Case: 3 colonnes
                elseif(get_row_layout() == 'three_col_element'):

                    ?>
		            
				<div class="three_col_element section limited">

					<div class="container-fluid">

						<div class="row">

						<?php


                                 if(have_rows('colonne')):


                                     while(have_rows('colonne')): the_row();

                                         $video = get_sub_field('video');
                                         if(!empty($video)):
                                             preg_match('/src="(.+?)"/', $video, $matches);
                                             if(isset($matches[1])) {
                                                 $src = $matches[1];
                                                 // Add extra parameters to src and replace HTML.
                                                 $params = array(
                                                         'controls'  => 1,
                                                         'hd'        => 1

                                                 );
                                                 $new_src = add_query_arg($params, $src);

                                                 // Directly modifying the src attribute for lazy loading
                                                 $video = str_replace('src="', 'src="' . $new_src . '" loading="lazy"', $video);

                                                 // Add extra attributes to iframe HTML.
                                                 $attributes = 'frameborder="0"'; // Removed loading="lazy" since it's already added
                                                 $video = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $video);
                                             }



                                         endif;
                                         $image = get_sub_field('image');
                                         $title = get_sub_field('titre');
                                         $paragraphe = get_sub_field('paragraphe');
                                         ?>
								
								<div class="col-12 col-lg column">
									
									<?php if((!empty($video) && empty($image)) || (!empty($video) && !empty($image))): ?>	
								<div class="embed-responsive embed-responsive-16by9 mh" style="max-width:640px;margin:0 auto;"><?php echo $video ?></div>
									<?php elseif(empty($video) && !empty($image)): ?>
										<div style="text-align:center;"><img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /></div>
									<?php endif; ?>
									<div class="module-content">
										<?php if(!empty($title)): ?>
											<h3><?php echo $title; ?></h3>
										<?php endif; ?>
									 	<?php if(!empty($paragraphe)): ?>
									 		<p><?php echo $paragraphe; ?></p>
									 	<?php endif; ?>
								 	</div>

								</div>
							

							<?php endwhile; endif; ?>

						</div>
					</div>

				</div>

				<?php
                // Case: 3 colonnes
                elseif(get_row_layout() == 'call_to_action'):
                    $title = get_sub_field('titre');
                    $paragraphe = get_sub_field('paragraphe');
                    $link = get_sub_field('lien');
                    $text_btn = get_sub_field('text_btn');
                    ?>
		            
				<div id="call_to_action" class="section limitedext module">

					<div class="container-fluid">

						<div class="row">

							<div class="col-12 column">
								<?php if(!empty($title)): ?>
									<h3><?php echo $title; ?></h3>
								<?php endif; ?>
								<?php if(!empty($paragraphe)): ?>
								 		<h4><?php echo $paragraphe; ?></h4>
								<?php endif; ?>
							<div class="read-more">
								<a href="mailto:contact@ilestunefois.com" class="cta-btn"><?php echo $text_btn; ?></a>
							</div>	
							</div>
							

						</div>
					</div>

				</div>

				<?php
                    // Case: 3 colonnes
                    elseif(get_row_layout() == 'bloc_texte_simple'):

                        $paragraphe = get_sub_field('texte');
                        ?>

		        <div id="bloc_texte_simple" class="section limitedext">

		        	<div class="container-fluid">
		        		<div class="row">
		        			<div class="col-12">
		        				<p><?php echo $paragraphe; ?></p>
		        			</div>
		        		</div>
		        	</div>
		        	
		        </div>

		        <?php
                        // Case: 3 colonnes
                    elseif(get_row_layout() == 'testimonial'):

                        $image = get_sub_field('image');

                        $full_name = get_sub_field('full_name');
                        $job = get_sub_field('job');
                        $paragraphe = get_sub_field('paragraphe');
                        ?>


		        <div class="module-testimonial standard section limitedext module">
		        	<div class="container-fluid">
		        		<div class="row">
		        			<div class="col-xl-3 col-lg-4 col-12 column">
								<?php if(!empty($image)): ?>
									<div class="d-flex d-md-block align-items-center justify-content-around">
										<div class="image">
											<img src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>" class="rounded-circle">
										</div>
										<div>
											<div class="name"><?php echo $full_name; ?></div>
											<div class="job"><?php echo $job ?></div>
										</div>
									</div>
								<?php endif; ?>
		        			</div>
		        			<div class="col-xl-9 col-lg-8 col-12 column pt-0">
		        				<div class="quotes">
		        					<p>"</p>
		        					<p>"</p>
		        				</div>
		        				<p class="paragraphe"><?php echo $paragraphe; ?></p>
		        			</div>
		        		</div>
		        	</div>
		        </div>

						 <?php
                                // Case: profils collaborateurs
                        elseif(get_row_layout() == 'profils'):
                            ?>
						<div id="first-profiles">
							<?php get_template_part('template-parts/content', 'collaborateurs'); ?>		
						</div>

						<?php elseif(get_row_layout() == 'bloc_fin_de_page'): ?>

						<div>
							<?php get_template_part('template-parts/content', 'bottomblock');  ?>
						</div>

						<?php elseif(get_row_layout() == 'section_logo'): ?>

						<div>
							<?php  get_template_part('template-parts/logo', 'section'); ?>
						</div>

		       <?php

						elseif(get_row_layout() == 'module_video_centered'): ?>

						<div class="container-fluid my-5">
<<<<<<< HEAD
							<div class="row justify-content-center">
								<div class="col-12 col-lg-7">
									<div class="video-demo">
										<div class="embed-responsive embed-responsive-16by9">
											<?php the_sub_field('video'); ?>
										</div>
									</div>
								</div>
							</div>
=======
							<?php get_template_part('template-parts/content' , 'video'); ?>
>>>>>>> b12ac9f5cf3b1243c1db26022f676ca9f79a38b0
						</div>
					
					<?php endif;



                // End loop.
            endwhile;

endif;
?>
	

	<div id="share">
		<div class="section limited">
			<div class="container-fluid">
					<div class="row">
						<div class="col-12">
							<div class="share-container">
								<div class="share"><?php echo __('Share', 'ilestunefois'); ?></div>
								<?php get_template_part('template-parts/template', 'sharing-box'); ?>
							</div><!-- .share-container -->
						</div><!-- .column -->
					</div><!-- .row -->
			</div>
		</div>
	</div>
	

	<div class="section limited">

		<div class="container-fluid">

			<div class="row">

				<div class="col-12">

						<?php

                        /* Start the Loop */
                        while (have_posts()) :
                            the_post(); ?>

								<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="margin-bottom: 1em;">
					
									<div class="entry-content">
										<?php
                                    the_content();
                            ?>
									</div><!-- .entry-content -->

								</article><!-- #post-<?php the_ID(); ?> -->


							<?php endwhile; // End of the loop.
?>

				</div>
				
			</div>

		</div>
		
	</div>


	<?php if(have_rows('faq')): ?>
			<?php get_template_part('template-parts/content', 'faq'); ?>
		<?php endif; ?>


<?php get_footer(); ?>