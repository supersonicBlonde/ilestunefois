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
	
		<div class="row justify-content-center">
			<div class="col-12 col-lg-7">
				<div class="video-demo">
					<div class="embed-responsive embed-responsive-16by9">
						<?php the_sub_field('video'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>	
	<?php if(!empty(get_sub_field('texte_cta')) && !empty(get_sub_field('lien_cta'))): ?>
		<div class="container-fluid py-3 mt-3" style="background-color: #750D37;">
			<div class="row align-items-center text-center text-xl-left">
				<div class="col-xl-12 col-12 text-center">
					<div class="cta read-more my-0">
						<a href="<?php the_sub_field('lien_cta'); ?>"><?php the_sub_field('texte_cta'); ?></a>
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<?php endwhile; ?>
	<?php endif; ?>

	<?php get_template_part('template-parts/content' , 'agencyList'); ?>

	<?php get_template_part('template-parts/content' , 'servicesList'); ?>
	


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