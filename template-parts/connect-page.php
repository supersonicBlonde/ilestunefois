<div class="connect-content text-left">
	<div class="section">
		<div class="container-fluid">
			<div class="row">	
				<div class="col-12">
					<h2><?php the_field('intro_texte' , 'options'); ?></h2>
				</div>
			</div>
			<div class="row">	
				<div class="col-6">	
					<?php get_template_part('template-parts/connect' , 'form'); ?>
				</div>
				<div class="col-6">
					<?php wp_nav_menu( array(
						'menu'  => 'Social Connect',
						'container'       => false,
						'menu_class'      => 'social-menu'
						) ); ?>
					<p class="tel"><a href="tel:<?php the_field('intro_texte' , 'options'); ?>"><?php the_field('intro_texte' , 'options'); ?></a></p>
				</div>
			</div>
		</div>

	</div>
</div>	

