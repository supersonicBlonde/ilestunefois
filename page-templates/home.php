<?php
/**
* Template Name: Home
*
* @package ilestunefois
*/

get_header('home');
?>
<div class="home-content">

	<?php
		$titre = get_field('title_home_first_section');
		$paragraphe = get_field('p_home_first_section');
		$texte_btn = get_field('texte_bouton_home_first_section');
		$url = get_field('lien_bouton_home_first_section');
	?>
	<div id="first-section" class="text-img-block section limited">
		<div class="container-fluid">
				<div class="row">
					<div class="col-md-6 col-12 column">
						<?php if(!empty($titre)): ?>
						<h3>
							<?php echo $titre; ?>
						</h3>
						<?php endif; ?>
						<?php if(!empty($paragraphe)): ?>
						<p>
						<?php echo $paragraphe; ?>
						</p>
						<?php endif; ?>
						<?php if(!empty($texte_btn) && !empty($url)): ?>
						<div class="read-more">
						<a href="<?php echo $url;  ?>"><?php echo $texte_btn; ?></a>
						</div>
						<?php endif; ?>
					</div>
					<div class="col-md-6 col-12 text-center position-relative column">
							<img  src="<?php echo get_template_directory_uri().'/img/illustr.png'; ?>">
					</div>
				</div>
		</div>
	</div> 

	<?php
		$titre = get_field('title_home_testimonials');
	?>
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
			<div class="left-2">
				<?php if(!empty($titre)): ?>
				<h3>
					<?php echo $titre; ?>
				</h3>
				<?php endif; ?>
			</div>
		</div>
	</div>
	
	<?php
		$titre = get_field('title_home_logos_clients');
		$paragraphe = get_field('p_home_logos_clients');
		
	?>
	<div id="logo-section" class="section limited">
		<div class="container-fluid">
			<div class="section-container">
				<div class="row">
					<div class="col-6 column">
							<div id="slider-logo-container">
							<?php if(have_rows('logos_clients')): ?>
								<?php 
									$my_fields = get_field_object('logos_clients');
							   		$totalItem = (count($my_fields['value'])); 
									$totalItemPerLine = 8;
								
	
	   								
	   								?>
								<div id="slider-logos">
									
										
									<?php while(have_rows('logos_clients')):the_row(); 
										$img_logo = get_sub_field('image_logo'); 
										$logos_ar[] = $img_logo;
										$html= "";
										
									 endwhile;
	
	
	
									for($i = 0; $i < $totalItem; $i++)
									{
									    if($i % $totalItemPerLine == 0)
									    {
									        $html .= '<ul class="slide-logo-container">'; // OPEN ROW
									    }
	
									    $html .= '<li><img src="'.esc_url($logos_ar[$i]['sizes']['thumbnail']).'" alt="'.esc_attr($logos_ar[$i]['alt']).'" />
											</li>';
	
									    if($i % $totalItemPerLine == ($totalItemPerLine-1))
									    {
									        $html .= '</ul>'; // CLOSE ROW
									    }
									}
	
									echo $html;
									  ?>
									
								
							</div>
								
							<?php endif; ?>
						</div>
						
					</div>
					<div class="col-6 position-relative column">
						<div>
							<?php if(!empty($titre)): ?>
							<h3>
								<?php echo $titre; ?>
							</h3>
							<?php endif; ?>
							<?php if(!empty($paragraphe)): ?>
							<p>
								<?php echo $paragraphe; ?>
							</p>
							<?php endif; ?>
							<div class="arrow"></div>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div> 
	

</div>


<?php get_footer(); ?>