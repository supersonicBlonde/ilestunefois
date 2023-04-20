<?php 
	
	/*
		This is the template for the hedaer
		
		@package ilestunefois
	*/
	
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-116585477-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-116585477-1');
</script>
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
	</head>

<body <?php body_class(); ?>>
     <!-- Google Tag Manager (noscript) -->
		 <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PKBWBX8"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->  
	<div class="scale">
		<div>

			<div>
				<div>
					<?php 
						$poster = get_field('poster_header_video');
					?>

					<header class="header-container text-center background-image" id="header-container">
						
						<?php if(!empty(get_field('video_mp4_header_video'))): ?>
						<video class="i-delete-this-on-mobile" poster="<?php echo $poster; ?>" id="bgvid" playsinline autoplay muted loop>
								<?php if(!empty(get_field('video_webm_header_video'))): ?>
									<source src="<?php the_field('video_webm_header_video') ?>" type="video/webm"> 
								<?php endif; ?>
								<source src="<?php the_field('video_mp4_header_video') ?>" type="video/mp4">
								I'm sorry; your browser doesn't support HTML5 video in WebM with VP8 or MP4 with H.264.
							</video>
						<!-- 	<video class="i-delete-this-on-desktop" poster="<?php echo $poster; ?>" id="bgvid" playsinline autoplay muted loop>
								<source src="<?php the_field('video_mp4_header_video_mobile') ?>" type="video/mp4">
								I'm sorry; your browser doesn't support HTML5 video in WebM with VP8 or MP4 with H.264.
							</video> -->
						<?php endif; ?>
						
						<?php get_template_part( 'template-parts/nav', 'navbar' ); ?>



						<div class="header-content">
							<h1 class="size-title" style="margin-left: 0;font-size: 4em;padding:0 1em;"><?php echo __('La société de production audiovisuelle<br>qui engage votre audience' , 'ilestunefois'); ?></h1>
							<!-- <h2 class="site-description data-scroll"><?php echo bloginfo('description');  ?><span><?php the_field('subdescription'); ?></span></h2> -->
							<h2 class="site-description data-scroll" style="font-size: 2.5em;color: #8dab9d;"><?php echo __('Video - Motion Design - Live' , 'ilestunefois'); ?></span></h2>
						
						</div><!-- .header-content -->
						
						<!-- <div class="mouse"></div> --><!-- .mouse -->
					
					</header><!-- .header-container -->
					
				</div><!-- .col-12 -->
			</div><!-- .row -->

		</div><!-- .container-fluid -->

		<div class="content-container">