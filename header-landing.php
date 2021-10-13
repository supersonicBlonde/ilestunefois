<?php 
	
	/*
		This is the template for the hedaer
		
		@package ilestunefois
	*/
	
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<title><?php wp_title(); ?></title>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
				<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php if( is_singular() && pings_open( get_queried_object() ) ): ?>
			<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif; ?>
		<?php wp_head(); ?>
	<meta name="ahrefs-site-verification" content="3913f6fb3b7d6c49b85abded2945714d940d8664f2ff554f16e11f6af94efee0">

	</head>
	

<body <?php body_class(); ?>>
	<!-- <div class="noise"></div> -->
	<div class="scale">
		<div>
			<div>
				<div>

					<?php $bg_color = "#8daa94"; ?>
					
					<header class="header-pages header-container" style="background-color:<?php echo $bg_color; ?>" id="header-container">
						
						<?php get_template_part( 'template-parts/nav', 'navbar' ); ?>

						<div class="header-content landing-page">
								<div class="section limitedext">
									<div class="container-fluid">
										
									<?php if(have_rows('header_landing_page')): while(have_rows('header_landing_page')): the_row(); ?>
									
										<div class="row">
											<div class="col-12">
												<h1><?php the_sub_field('titre'); ?></h1>
											</div>
										</div>
										<div class="row">
											<div class="col-12">
												<div class="cta_white read-more">
													<a href="#" class="cta-btn white"><?php the_sub_field("texte_bouton"); ?></a>
												</div>
											</div>
										</div>

									<?php endwhile; endif; ?>
								</div>
							</div>
						</div><!-- .header-content -->
						
						<!-- <div class="mouse"></div> --><!-- .mouse -->
					
					</header><!-- .header-container -->
					
				</div><!-- .col-xs-12 -->
			</div><!-- .row -->

		</div><!-- .container-fluid -->

		<div class="content-container">