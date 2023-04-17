<div class="connect-content text-left">
	<div class="section">
		<div class="container">
			<div class="row">	
				<div class="col-xl-5 offset-xl-1 col-12">	
					<div class="my-5">
						<div class="label-email">Email</div> 
						<div>
							<a href="mailto:contact@ilestunefois.com" class="contact-email">contact@ilestunefois.com</a>
						</div>
					</div>
					<div>
						<div class="label-email">Visio</div>
					</div>
					<div>
						<a href="https://calendly.com/dbaudry" target="_blank" class="contact-email">calendly.com/dbaudry</a>
					</div> 
				</div>
				<div class="col-xl-5 col-12 mt-5 mt-xl-0">
					<?php wp_nav_menu( array(
						'menu'  => 'Social Connect',
						'container'       => false,
						'menu_class'      => 'social-menu'
						) ); ?>
						
						<p class="tel"><a href="tel:<?php the_field('tel' , 'options'); ?>"><?php the_field('tel' , 'options'); ?></a></p>
				</div>
			</div>
		</div>

	</div>
</div>	

