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

					<?php $bg_color = !empty(get_field('background_color_header_standard'))?get_field('background_color_header_standard'):"#8daa94"; ?>
					
					<header class="header-pages header-container" style="background-color:<?php echo $bg_color; ?>" id="header-container">
						
						<?php if(!empty(get_field('video_header_standard'))): ?>
							<video poster="<?php //echo $poster; ?>" id="bgvid" playsinline autoplay muted loop>
								<source src="<?php the_field('video_header_standard') ?>" type="video/mp4">
								I'm sorry; your browser doesn't support HTML5 video in WebM with VP8 or MP4 with H.264.
							</video>
						<?php endif; ?>
						
						<?php get_template_part( 'template-parts/nav', 'navbar' ); ?>

						<div class="header-content">
							<?php if(!is_single() && !is_tax() && !is_archive()): ?>
								<h1 class="size-title"><?php the_title(); ?></h1>
							<?php elseif(is_tax()): 
								$term = get_term_by( 'slug', get_query_var('term'), get_query_var('taxonomy') ); ?>
								<h1 class="size-title"><?php echo $term->name; ?></h1>
							<?php elseif(is_archive()): ?>
								<?php 
								$category = get_the_category();
								$current_category = $category[0];
 							?>
 							<h1 class="size-title"><?php echo $category[0]->name; ?></h1>
							<?php endif; ?>
						</div><!-- .header-content -->
						
						<!-- <div class="mouse"></div> --><!-- .mouse -->
					
					</header><!-- .header-container -->
					
				</div><!-- .col-xs-12 -->
			</div><!-- .row -->

		</div><!-- .container-fluid -->

		<div class="content-container">