<?php
		$titre = get_field('title_home_logos_clients', 9);
		$paragraphe = get_field('p_home_logos_clients', 9);
?>
<div id="logo-section" class="section limited mb-5">
	<div class="container-fluid">
		<div class="section-container">
			<div class="row">
				<div class="col-xl-6 col-12 column">
						<div id="slider-logo-container">
              
						<?php if(have_rows('logos_clients', 9)): ?>
							<?php 
								$my_fields = get_field_object('logos_clients', 9);
						   		$totalItem = (count($my_fields['value'])); 
								$totalItemPerLine = 8;

								while(have_rows('logos_clients', 9)):the_row(); 
									$img_logo = get_sub_field('image_logo'); 
									$logos_ar[] = $img_logo;
									$html = $html_desk = "";
								 endwhile;
   								
   								?>


   							<div class="hideonmobile">
								<div class="slider-logos">
									
									<?php 

									for($i = 0; $i < $totalItem; $i++)
									{
									    if($i % $totalItemPerLine == 0)
									    {
									        $html_desk .= '<ul class="slide-logo-container">'; // OPEN ROW
									    }

									    $html_desk .= '<li><img src="'.esc_url($logos_ar[$i]['sizes']['thumbnail']).'" alt="'.esc_attr($logos_ar[$i]['alt']).'" />
											</li>';

									    if($i % $totalItemPerLine == ($totalItemPerLine-1))
									    {
									        $html_desk .= '</ul>'; // CLOSE ROW
									    }
									}

									echo $html_desk;
									  ?>
								</div>
							</div>

							<div class="hideondesktop">
								<div class="slider-logos">
									
									<?php 

									for($i = 0; $i < $totalItem; $i++)
									{

									    $html .= '<div><img src="'.esc_url($logos_ar[$i]['sizes']['thumbnail']).'" alt="'.esc_attr($logos_ar[$i]['alt']).'" /></div>';

									}

									echo $html;
									  ?>
								</div>
							</div>
							
						<?php endif; ?>
					</div>
					
				</div>
				<div class="col-xl-6 col-12 position-relative column">
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
</div><!-- #logo-section -->