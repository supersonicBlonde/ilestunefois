<?php
/**
* Template Name: Page Standard
*
* @package ilestunefois
*/

get_header();
?>
<div class="page-standard-content page-content">

	<?php

		if( have_rows('standard_layout') ):

		    // Loop through rows.
		    while ( have_rows('standard_layout') ) : the_row();

		        // Case: Image text alignment vertical
		        if( get_row_layout() == 'image_text_alignment_vertical' ):
		            $bg = get_sub_field('image');
		            $video = get_sub_field('video');
		            $title = get_sub_field('title');
		            $link = empty(get_sub_field('link'))?"#":get_sub_field('link');
		            $paragraphe = get_sub_field('paragraphe');

		        ?>
				
				<div id="image_text_alignment_vertical" class="section limitedext module">

					<div class="container-fluid">
						
						<div class="row">
							<div class="col-12">
								
								<?php if(!empty($bg) && empty($video)): ?>
									<div class="bg" style="background: url(<?php echo $bg; ?>)"></div>
								<?php elseif(!empty($video)): ?>
									<div class="bg embed-container">
										<?php echo $video; ?>
									</div>
								<?php endif; ?>
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
		        elseif( get_row_layout() == 'three_col_element' ): 

		        ?>
		            
				<div class="three_col_element section limited module">

					<div class="container-fluid">

						<div class="row">

						<?php	

						$count = count(get_row('colonne')['colonne']);

							 if(have_rows('colonne')): 

								

								

								while(have_rows('colonne')): the_row();	 

								$video = get_sub_field('video');
								$image = get_sub_field('image');
					            $title = get_sub_field('titre');
					            $paragraphe = get_sub_field('paragraphe');
					            ?>
								
								<div class="col-12 <?php echo $count == 2?'col-md-6':'col-md-4'; ?>">
									
									<?php if((!empty($video) && empty($image)) || (!empty($video) && !empty($image))): ?>	
										<div class="embed-responsive embed-responsive-16by9 mh"><?php echo $video ?></div>
									<?php elseif(empty($video) && !empty($image)): ?>
										<div style="text-align:center;" class="mh"><img style="max-height: 233px;" src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /></div>
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
		        elseif( get_row_layout() == 'call_to_action' ): 
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
								<a href="<?php echo $link;  ?>"><?php echo $text_btn; ?></a>
							</div>	
							</div>
							

						</div>
					</div>

				</div>

				<?php
				// Case: 3 colonnes
		        elseif( get_row_layout() == 'bloc_texte_simple' ): 
		        	
		        	$paragraphe = get_sub_field('texte');
		        ?>

		        <div id="bloc_texte_simple" class="section limitedext module">

		        	<div class="container-fluid">
		        		<div class="row">
		        			<div class="col-12">
		        				<p><?php echo $paragraphe; ?></p>
		        			</div>
		        		</div>
		        	</div>
		        	
		        </div>

		       <?php endif;

		    // End loop.
		    endwhile;

		// No value.
		else :
			echo "no content";
		    // Do something...
		endif;
	?>

	<div id="share">
		<div class="section limited">
			<div class="container-fluid">
					<div class="row">
						<div class="col-12">
							<div class="share-container">
								<div class="share"><?php echo __('Share' , 'ilestunefois'); ?></div>
								<?php get_template_part('template-parts/template', 'sharing-box'); ?>
							</div><!-- .share-container -->
						</div><!-- .column -->
					</div><!-- .row -->
			</div>
		</div>
	</div>


<?php get_footer(); ?>