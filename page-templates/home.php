<?php
/**
* Template Name: Home
*
* @package ilestunefois
*/

get_header('home');
?>
<div class="home-content page-content">
	<?php if(!empty(get_field('cta_home_link')) && !empty(get_field('cta_home_button_text'))): ?>
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
				<div class="row">
					<div class="col-12 text-center link">
						<div class="cta read-more">
							<a href="mailto:contact@ilestunefois.com" class="cta-btn"><?php the_field('cta_home_button_text'); ?></a>
						</div>
					</div>
				</div>
			</div><!-- .container-fluid -->
		</div><!-- #cta-home -->
	<?php endif; ?>
	<div id="services-illustr">
		<h2 class="mb-5">Services</h2>
	</div>
	<div id="home-services" class="section py-5">
		<div class="section limited">
			<div class="container-fluid">
				<!-- <div class="row">
					<div class="col-12 text-center">
						<h2 class="mb-5">Services</h2>
					</div>
				</div> -->
				<?php
					$args = array(
						'post_type' => 'service',
						'posts_per_page' => -1,
						'post_status' => 'publish'
					);

					$query = new WP_Query($args);

					if($query->have_posts()): ?>
						<div class="row justify-content-center">
							<?php while($query->have_posts()): $query->the_post();  ?>
							<div class="col-12 col-sm-6 col-lg-4 col-xl-3 text-center">
								<div class="item">
									<h3><a href="<?php the_field('lien'); ?>"><?php the_title(); ?></a></h3>
								</div>
							</div>
							<?php endwhile; wp_reset_postdata(); ?>
						</div>
					<?php endif; ?>
			</div>	
		</div>
	</div>
	

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
						?>
						<div style="padding-bottom:1.5em;">
	
							<div class="testimonial-container">
						
								<?php if( !empty( $img_profil ) ): ?>    
									<div class="testimonial-profil">
										<img style="width:150px;margin:0 auto;" class="noresp circle-image" src="<?php echo esc_url($img_profil['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($img_profil['alt']); ?>" />
									</div>
								<?php endif; ?>	
	
								<?php if( !empty( $review ) ): ?>    
									<p class="testimonial-review"><?php echo $review; ?></p>
								<?php endif; ?>	

								<?php if( !empty( $full_name ) ): ?>    
									<div class="testimonial-fullname"><?php echo $full_name; ?></div>
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
						<a href="https://www.sortlist.fr/agency/david-baudry?ref=review-widget-1" title="Accueil" target="_blank"><img  src="https://www.sortlist.com/widget/david-baudry/review?ref=review-widget-1" alt="Click here to view the agency's profile on Sortlist" /></a>
				</div>
			</div><!-- .column -->
		</div><!-- .flex -->
	</div><!-- #slider-section --> 

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
<?php if(have_rows('faq')): ?>
	<?php get_template_part('template-parts/content' , 'faq'); ?>
<?php endif; ?>

<?php get_footer(); ?>