<div class="connect-content text-left">
	<div class="section">
		<div class="container-fluid">
			<div class="row">	
				<div class="col-xl-6 col-12">	
					<?php get_template_part('template-parts/connect' , 'form'); ?>
				</div>
				<div class="col-xl-6 col-12">
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

