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
	</head>

<body <?php body_class(); ?>>
	<!-- <div class="noise"></div>  -->
	<div class="scale">
		<div>

			<div>
				<div>
					<?php 
						$poster = get_field('poster_header_video');
					?>

					<header class="header-container text-center background-image" id="header-container">
						
						<?php if(!empty(get_field('video_mp4_header_video'))): ?>
							<video poster="<?php echo $poster; ?>" id="bgvid" playsinline autoplay muted loop>
								<?php if(!empty(get_field('video_webm_header_video'))): ?>
									<source src="<?php the_field('video_webm_header_video') ?>" type="video/webm"> 
								<?php endif; ?>
								<source src="<?php the_field('video_mp4_header_video') ?>" type="video/mp4">
								I'm sorry; your browser doesn't support HTML5 video in WebM with VP8 or MP4 with H.264.
							</video>
						<?php endif; ?>
						
						<?php get_template_part( 'template-parts/nav', 'navbar' ); ?>

						<div class="header-content">
							<h1 class="size-title">Il est une fois</h1>
							<h2 class="site-description data-scroll"><?php echo bloginfo('description');  ?><span><?php the_field('subdescription'); ?></span></h2>
						
						</div><!-- .header-content -->
						
						<!-- <div class="mouse"></div> --><!-- .mouse -->
					
					</header><!-- .header-container -->
					
				</div><!-- .col-12 -->
			</div><!-- .row -->

		</div><!-- .container-fluid -->

		<div class="content-container">