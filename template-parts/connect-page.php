<div class="connect-content text-left">
	<div class="section">
		<div class="container-fluid">
			<div class="row">	
				<div class="col-12">
					<h2><?php the_field('intro_texte', 'option'); ?></h2>
				</div>
			</div>
			<div class="row">	
				<div class="col-md-6 col-12">	
					<?php get_template_part('template-parts/connect' , 'form'); ?>
				</div>
				<div class="col-md-6 col-12">
					<?php wp_nav_menu( array(
						'menu'  => 'Social Connect',
						'container'       => false,
						'menu_class'      => 'social-menu'
						) ); ?>
					<!-- <ul class="social-menu">
						<li><a href="">Youtube</a></li>
						<li><a href="">Instagram</a></li>
						<li><a href="">Facebook</a></li>
						<li><a href="">Linkedin</a></li>
					</ul> -->
					<p class="tel"><a href="tel:+123456789"><?php the_field('tel', 'option'); ?></a></p>
				</div>
			</div>
		</div>

	</div>
</div>	

