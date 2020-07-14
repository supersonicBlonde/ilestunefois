<?php 
	
	/*
		This is the template for the hedaer
		
		@package ilestunefois
	*/
	
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<title><?php bloginfo('name'); wp_title(); ?></title>
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php if( is_singular() && pings_open( get_queried_object() ) ): ?>
			<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif; ?>
		<?php wp_head(); ?>
	</head>

<body <?php body_class(); ?>>
	<div class="noise"></div>
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
						<nav class="navbar navbar-expand-lg navbar-dark navbar-fixed-top" id="navbarNav-container">
						  <div class="connect-mobile"><i class="fi flaticon-send"></i></div>
						  <a class="navbar-brand" href="/"><svg id="logo" data-name="logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 386.28 194.7"><defs></defs><polygon class="cls-1" points="337.35 35.68 337.35 0 0 0 0 35.68 9.92 35.68 9.92 9.92 327.43 9.92 327.43 35.68 337.35 35.68"/><polygon class="cls-1" points="0 162.12 0 194.7 337.35 194.7 337.35 162.12 327.43 162.12 327.43 184.78 9.92 184.78 9.92 162.12 0 162.12"/><polygon class="cls-1" points="265.53 95.43 299.66 48.06 286.8 48.06 259.1 86.58 231.09 48.06 218.27 48.06 252.66 95.52 214.57 148.47 227.32 148.47 259.09 104.38 291.04 148.47 304.1 148.47 265.53 95.43"/><polygon class="cls-1" points="36.45 130.73 36.45 148.81 46.53 148.81 46.53 130.73 46.53 45.89 36.45 45.89 36.45 130.73"/><polygon class="cls-1" points="174.55 130.73 174.55 148.81 184.63 148.81 184.63 130.73 184.63 45.89 174.55 45.89 174.55 130.73"/><polygon class="cls-1" points="81.26 88.22 81.26 98.3 91.55 98.3 139.82 98.3 139.82 88.22 91.55 88.22 81.26 88.22"/><polygon class="cls-1" points="91.55 138.69 81.26 138.69 81.26 148.81 139.82 148.81 139.82 138.74 91.55 138.74 91.55 138.69"/><polygon class="cls-1" points="81.26 55.97 91.55 55.97 140.24 55.97 140.24 45.89 81.26 45.89 81.26 55.97"/><path class="cls-2" d="M435.82,141.93a5.23,5.23,0,0,0-2.39-4.4l-48.7-31.59a5.22,5.22,0,0,0-5.36-.21,5.25,5.25,0,0,0-2.75,4.61v63.17a5.23,5.23,0,0,0,2.75,4.61,5.18,5.18,0,0,0,5.34-.21l48.72-31.58A5.25,5.25,0,0,0,435.82,141.93Zm-48.7,21.93V120l33.82,21.93Z" transform="translate(-49.54 -44.58)"/></svg></a>
						  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
						    <i class="fi flaticon-text-edit"></i>
						  </button>
						  <div class="collapse navbar-collapse navbar-ilestunefois" id="navbarNav">
						  	<?php wp_nav_menu( array(
						  		'theme_location'  => 'primary',
						  		'container'       => false,
						  		'menu_class'      => 'navbar-nav ml-auto',
						  		'walker'          => new wp_bootstrap_navwalker(),
						  	) ); ?>
						  </div>
						</nav>
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