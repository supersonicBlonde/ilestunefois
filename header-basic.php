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
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php if( is_singular() && pings_open( get_queried_object() ) ): ?>
			<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif; ?>
		<?php wp_head(); ?>
	<meta name="google-site-verification" content="_EDB06er9X8jXLNQL31UeKi0P9va4dIR6R4ZDvUifX0" />
	<meta name="ahrefs-site-verification" content="3913f6fb3b7d6c49b85abded2945714d940d8664f2ff554f16e11f6af94efee0">

	</head>
	

<body <?php body_class(); ?>>
	<!-- <div class="noise"></div> -->
	<div class="scale">
		<div>
			<div>
				<div>

					<?php $bg_color = !empty(get_field('background_color_header_standard'))?get_field('background_color_header_standard'):"#8daa94"; ?>
					
					<header class="header-pages header-container" style="height: auto; background-color:<?php echo $bg_color; ?>" id="header-container">
						
						<?php get_template_part( 'template-parts/nav', 'navbar' ); ?>
                <div class="container">
                  <div class="row">
                    <div class="col-12">
                      <h1 class="size-title"><?php the_title(); ?></h1>
                    </div>
                  </div>
                </div>
								
						
						<!-- <div class="mouse"></div> --><!-- .mouse -->
					
					</header><!-- .header-container -->
					
				</div><!-- .col-xs-12 -->
			</div><!-- .row -->

		</div><!-- .container-fluid -->

		<div class="content-container">