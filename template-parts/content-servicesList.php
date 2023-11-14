	<?php if(have_rows('service_section')): 
		 while(have_rows('service_section')): the_row(); ?>
				<div class="services-illustr" style="background-image:url(<?php echo get_sub_field('illustration'); ?>);">
					<h2 class="mb-5"><?php the_sub_field('title_section'); ?></h2>
				</div>
				<div class="home-services section py-5">
					<div class="section limited">
						<div class="container-fluid">
									<div class="row justify-content-center">
									<?php while(have_rows('service_list')): the_row(); ?>
										<?php $service = get_sub_field('service'); ?>
										<div class="col-12 col-sm-6 col-lg-4 col-xl-3 text-center">
											<div class="item">
											<?php if($service): ?>
													<h3 class="py-2"><a href="/<?php echo $service->post_name; ?>"><?php echo esc_html( $service->post_title ); ?></a></h3>
											<?php endif; ?>
											</div>
										</div>
										<?php endwhile; ?>
									</div>
						</div>	
					</div>
				</div>
		<?php endwhile; ?>
	<?php endif; ?>