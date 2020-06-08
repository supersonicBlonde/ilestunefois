<?php
/**
* Template Name: Home
*
* @package ilestunefois
*/

get_header();
?>
<div class="home-content">

	<div id="first-section" class="text-img-block section limited">
		<div class="container-fluid">
				<div class="row">
					<div class="col-6 column">
						<h3>Consectur adipiscing elit sed do eiusmod</h3>
						<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
						</p>
						<div class="read-more">
						<a href="">Lorem ipsum dolor sit amet</a>
						</div>
					</div>
					<div class="col-6 text-center position-relative column">
							<img src="<?php echo get_template_directory_uri().'/img/illustr.png'; ?>" class="position-absolute">
					</div>
				</div>
		</div>
	</div>

	<div id="slider-section">
		<div class="flex">
			<div class="testimonial-slider-container">
				<?php if(have_rows('testimonial_slider')): ?>
	
				<div class="testimonial-slider">
	
	
				<?php while(have_rows('testimonial_slider')): the_row(); ?>
						<?php 
						$img_profil = get_sub_field('image_profil'); 
						$full_name = get_sub_field('full_name');
						$review = get_sub_field('review');
						?>
						<div style="padding-bottom:1.5em;">
	
							<div class="testimonial-container">
						
								<?php if( !empty( $img_profil ) ): ?>    
									<div class="testimonial-profil">
								    	<img class="noresp circle-image" src="<?php echo esc_url($img_profil['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($img_profil['alt']); ?>" />
									</div>
								<?php endif; ?>	
	
								<?php if( !empty( $full_name ) ): ?>    
									<div class="testimonial-fullname"><?php echo $full_name; ?></div>
								<?php endif; ?>	
	
								<?php if( !empty( $review ) ): ?>    
									<p class="testimonial-review"><?php echo $review; ?></p>
								<?php endif; ?>	
	
							</div>
	
						</div>
	
					<?php endwhile; ?>
	
					
				</div>
				<?php endif; ?>
			</div>
			<div class="left-2"><h3>Testimonials</h3></div>
		</div>
	</div>
	
	<div id="logo-section" class="section limited">
		<div class="container-fluid">
			<div class="section-container">
				<div class="row">
					<div class="col-6 column">
						<div>
							<?php if(have_rows('logos_clients')): ?>
								<ul>
								<?php while(have_rows('logos_clients')):the_row(); 
									$img_logo = get_sub_field('image_logo'); ?>
									<?php if( !empty( $img_logo ) ): ?>    
										<li>
									    	<img src="<?php echo esc_url($img_logo['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($img_profil['alt']); ?>" />
										</li>
									<?php endif; ?>	
								<?php endwhile; ?>
								</ul>
							<?php endif; ?>
						</div>
					</div>
					<div class="col-6 position-relative column">
						<div>
							<h3>Nos clients</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
							<div class="arrow"></div>
						</div>
					</div>
				</div>
			</div>
		</div>	
		<div class="flex">
			<div>
				<div>
					
				</div>
			</div>
			<div></div>
		</div>
	</div> 
	

</div>


<?php get_footer(); ?>