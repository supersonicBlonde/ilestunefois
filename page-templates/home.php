<?php
/**
* Template Name: Home
*
* @package ilestunefois
*/

get_header('home');
?>
<div class="home-content page-content">
		<div id="cta-home">
			<div class="container-fluid bloc-padding" id="cta-home-bg" style="background-color: #750D37;">
				<div class="row align-items-center text-center text-xl-left">
					<div class="col-xl-12 col-12 text-center">
						<h3 class="white"><?php the_field('cta_home_title'); ?></h3>
						<p class="white"><?php the_field('cta_home_paragraphe'); ?></p>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<?php get_template_part('template-parts/slider' , 'logo'); ?>
					</div>
				</div>
				<?php // if(!empty(get_field('cta_home_button_text'))): ?>
			<!-- 	<div class="row">
					<div class="col-12 text-center link">
						<div class="cta read-more">
							<a href="mailto:contact@ilestunefois.com" class="cta-btn"><?php the_field('cta_home_button_text'); ?></a>
						</div>
					</div>
				</div> -->
				<?php // endif; ?>
			</div><!-- .container-fluid -->
		</div><!-- #cta-home -->

	<?php if(have_rows('bloc_video')): ?>
		<?php while(have_rows('bloc_video')): the_row(); ?>
		<div class="container-fluid" id="bloc_video">
			<?php get_template_part('template-parts/content' , 'video'); ?>
		</div>	
	<?php if(!empty(get_sub_field('texte_cta')) && !empty(get_sub_field('lien_cta'))): ?>
		<div class="container-fluid py-3 mt-lg-n5" style="background-color: #750D37;">
			<div class="row align-items-center text-center text-xl-left">
				<div class="col-xl-12 col-12 text-center">
					<div class="cta read-more my-0 pt-lg-5">
						<a href="<?php the_sub_field('lien_cta'); ?>"><?php the_sub_field('texte_cta'); ?></a>
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<?php endwhile; ?>
	<?php endif; ?>

	<?php  //get_template_part('template-parts/content' , 'agencyList'); ?>

	<?php //get_template_part('template-parts/content' , 'ctablock'); ?>

	<?php //get_template_part('template-parts/content' , 'servicesList'); ?>
	
	<div id="slider-section" class="section">
		<div class="flex">
			<div class="testimonial-slider-container ">
				<?php if(have_rows('testimonial_slider')): ?>
	
				<div class="testimonial-slider">

				<?php while(have_rows('testimonial_slider')): the_row(); ?>
						<?php 
						$img_profil = get_sub_field('image_profil'); 
						$full_name = get_sub_field('full_name');
						$review = get_sub_field('review');
						$titre = get_field('title_home_testimonials');
						$video = get_sub_field('video');
						$thumbnail = get_sub_field('thumbnail');
						$videoId = get_sub_field('video_id');
						?>
						<div style="padding-bottom:1.5em;">
	
							<div class="testimonial-container position-relative justify-content-between" style="display:flex; flex-direction: column; height: 100%;">
								<div>
								<?php if( !empty( $img_profil ) ): ?>    
									<div class="testimonial-profil">
										<img style="width:150px;margin:0 auto;" class="noresp circle-image" src="<?php echo esc_url($img_profil['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($img_profil['alt']); ?>" />
									</div>
								<?php endif; ?>	
	
								<?php if( !empty( $review ) ): ?>    
									<p class="testimonial-review mt-4"><?php echo $review; ?></p>
								<?php endif; ?>	

								<?php if( !empty( $full_name ) ): ?>    
									<div class="testimonial-fullname"><?php echo $full_name; ?></div>
								<?php endif; ?>	
								</div>
							
								<?php if( !empty( $videoId ) && !empty( $thumbnail ) ): ?>  	
								
									<div class="video-slide position-relative" style="margin-top: auto;" data-video-id="<?php echo $videoId; ?>">
										<img src="<?php echo $thumbnail; ?>" alt="Video Thumbnail">
										<img class="youtube-logo" src="<?php echo get_template_directory_uri(); ?>/img/youtube-icon.svg" alt="">
									</div>
									
								<?php endif; ?>	
	
							</div><!-- .testimonial-container -->
	
						</div>
	
					<?php endwhile; ?>

				</div><!-- .testimonial-slider -->
				<?php endif; ?>
			</div><!-- .testimonial-slider-container -->
			<div class="left-2 column">
				<?php if(!empty($titre)): ?>
				<h3>
					<?php echo $titre; ?>
				</h3>
				<?php endif; ?>
					<div id="sortlist_widget">
						<?php echo do_shortcode( '[grw id="7587"]' ); ?>
						<a href="https://www.sortlist.fr/agency/david-baudry?ref=review-widget-1" title="Accueil" target="_blank"><img  src="https://www.sortlist.com/widget/david-baudry/review?ref=review-widget-1" alt="Click here to view the agency's profile on Sortlist" /></a>
						<div><img class="shadow"src="<?php echo get_template_directory_uri()?>/img/awards.jpg" alt="" style="width:250px"></div>
				</div>
				<div>
				</div>
			</div><!-- .column -->
		</div><!-- .flex -->
	</div><!-- #slider-section --> 

	<?php if(!empty(get_field('bloc_video_2'))): ?>
	<div class="bg-pink pb-5 mb-4" style="margin-top: 7em;">
		<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12 col-lg-7">
					<div style="margin-top:-3em;">
						<div class="embed-responsive embed-responsive-16by9">
							<?php echo get_field('bloc_video_2'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>
	<?php endif ?>

<?php
$number_of_posts = wp_is_mobile()?3:-1;
$args = array('post_type' => 'project' , 'posts_per_page' => $number_of_posts);
$projects =  new WP_Query($args); 
if($projects->have_posts()):
	if(!wp_is_mobile()):
?>
 <div id="current-projects" class="section limited">
	<div class="container-fluid">
			<div class="row">
				<div class="col-12">
						<h3 class="mb-5 text-center"><?php the_field("titre_projet_recents"); ?></h3>
				</div>
			</div>
			<div class="row">
				<?php $count = 1; while($projects->have_posts()): $projects->the_post(); ?>
					<div class="col-12 col-xl-4 mb-4">
						<div class="bg" style="background-image:url(<?php echo ilestunefois_get_attachment(); ?>)">
							<div class="bottom">
								<div class="count"><?php echo "0".$count; ?></div>
									<div class="content">
										<h4 class="mb-1"><?php the_title(); ?></h4>
										<p><?php the_field('paragraphe'); ?></p>
									</div>
								</div>
						</div>
					</div>
				<?php $count++; endwhile; wp_reset_postdata(); ?>
			</div>
			<div class="row">
				<div class="col-12 text-center mt-3">
					<div class="read-more">
						<a href="/portfolio">Voir tous les projets</a>
					</div>
				</div>
			</div>
	</div>					
</div> 
<?php else: ?>
	<div id="current-projects-mobile" class="section">
		<div class="container-fluid">
				<div class="row">
					<div class="col-12">
							<h3 class="mb-5 text-center"><?php the_field("titre_projet_recents"); ?></h3>
					</div>
				</div>
		</div>
	<div id="slider-projects">
	<?php $count = 1; while($projects->have_posts()): $projects->the_post(); ?>
		<div class="bg" style="margin:0 1em; background-image:url(<?php echo ilestunefois_get_attachment(); ?>)">
			<div class="bottom">
				<div class="count"><?php echo "0".$count; ?></div>
					<div class="content">
						<h4 class="mb-1"><?php the_title(); ?></h4>
						<p><?php the_field('paragraphe'); ?></p>
					</div>
				</div>
		</div>
		<?php $count++; endwhile; wp_reset_postdata(); ?>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12 text-center mb-2">
				<div class="read-more">
					<a href="/portfolio">Voir tous les projets</a>
				</div>
			</div>
		</div>
	</div>
</div>
	<?php endif; ?>
<?php endif; ?>

<?php // get_template_part('template-parts/logo' , 'section'); ?>

<?php 
$args = array('post_type' => 'post' , 'posts_per_page' => 3);
$posts =  new WP_Query($args); 
if($posts->have_posts()):
?>

<div id="bg-back"></div>
<div id="latest-posts" class="section limited">
	<div class="container-fluid">
			<div class="row">
				<div class="col-12">
						<h3 class="mb-5 text-center">Dernières news</h3>
				</div>
			</div>
			<div class="row">
				<?php $count = 1; while($posts->have_posts()): $posts->the_post(); ?>
					<div class="col-12 col-xl-4 mb-4 mb-xl-0">
						<a href="<?php the_permalink(); ?>">
							<div class="bg" style="background-image:url(<?php echo get_the_post_thumbnail_url( get_the_ID(), 'projects'); ?>)"></div>
							<div class="content mh">
								<h4 class="mb-1"><?php the_title(); ?></h4>
							</div>
						</div>
						</a>
					<?php endwhile; ?>
			</div>
			<div class="row">
				<div class="col-12 text-center mt-3">
					<div class="read-more">
						<a href="/news">Voir toutes les news</a>
					</div>
				</div>
			</div>
	</div>					
</div>
<?php endif; wp_reset_postdata(); ?>
</div>

<?php get_template_part('template-parts/content' , 'bloctextseo');?>


<?php if(have_rows('faq')): ?>
	<?php get_template_part('template-parts/content' , 'faq'); ?>
<?php endif; ?>

<?php get_footer(); ?>