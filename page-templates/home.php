<?php
/**
* Template Name: Home
*
* @package ilestunefois
*/

get_header('home');
?>
<div class="home-content page-content">

	<?php
		$titre = get_field('title_home_first_section');
		$paragraphe = get_field('p_home_first_section');
		$texte_btn = get_field('texte_bouton_home_first_section');
		$url = get_field('lien_bouton_home_first_section');
	?>

	<?php if(!empty(get_field('cta_home_link')) && !empty(get_field('cta_home_button_text'))): ?>
		<div id="cta-home" class="section limited mb-5">
			<div class="container-fluid bloc-padding" id="cta-home-bg" style="background-color: #750D37;">
				<div class="row align-items-center text-center text-xl-left">
					<div class="col-xl-6 col-12">
						<h3 class="white"><?php the_field('cta_home_title'); ?></h3>
						<p class="white"><?php the_field('cta_home_paragraphe'); ?></p>
					</div><!-- .col -->
					<div class="col-xl-6 col-12 text-center mt-3 mt-xl-0">
						<div class="cta read-more">
							<a href="<?php the_field('cta_home_link') ?>" class="cta-btn"><?php the_field('cta_home_button_text'); ?></a>
						</div><!-- .read-more -->
					</div><!-- .col -->
				</div><!-- .row -->
			</div><!-- .container-fluid -->
		</div><!-- #cta-home -->
	<?php endif; ?>

<!-- 	<div id="first-section" class="text-img-block section limited">
		<div class="container-fluid">
				<div class="row">
					<div class="col-xl-6 col-12 column">
						<?php if(!empty($titre)): ?>
						<h3>
							<?php echo $titre; ?>
						</h3>
						<?php endif; ?>
						<?php if(!empty($paragraphe)): ?>
						<p>
						<?php echo $paragraphe; ?>
						</p>
						<?php endif; ?>
						<?php if(!empty($texte_btn) && !empty($url)): ?>
						<div class="read-more">
							<a href="<?php echo $url;  ?>"><?php echo $texte_btn; ?></a>
						</div>
						<?php endif; ?>
					</div>
					<div class="col-xl-6 col-12 text-center mx-auto position-relative column">
						<img src="https://www.ilestunefois.com/wp-content/uploads/2021/06/IMAGE-HOME-SITE.png" alt="">
					</div>
				</div><
		</div>
	</div> -->


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

<?php
		$titre = get_field('title_home_logos_clients');
		$paragraphe = get_field('p_home_logos_clients');
?>
<div id="logo-section" class="section limited">
	<div class="container-fluid">
		<div class="section-container">
			<div class="row">
				<div class="col-xl-6 col-12 column">
						<div id="slider-logo-container">
						<?php if(have_rows('logos_clients')): ?>
							<?php 
								$my_fields = get_field_object('logos_clients');
						   		$totalItem = (count($my_fields['value'])); 
								$totalItemPerLine = 8;

								while(have_rows('logos_clients')):the_row(); 
									$img_logo = get_sub_field('image_logo'); 
									$logos_ar[] = $img_logo;
									$html = $html_desk = "";
								 endwhile;
   								
   								?>


   							<div class="hideonmobile">
								<div class="slider-logos">
									
									<?php 

									for($i = 0; $i < $totalItem; $i++)
									{
									    if($i % $totalItemPerLine == 0)
									    {
									        $html_desk .= '<ul class="slide-logo-container">'; // OPEN ROW
									    }

									    $html_desk .= '<li><img src="'.esc_url($logos_ar[$i]['sizes']['thumbnail']).'" alt="'.esc_attr($logos_ar[$i]['alt']).'" />
											</li>';

									    if($i % $totalItemPerLine == ($totalItemPerLine-1))
									    {
									        $html_desk .= '</ul>'; // CLOSE ROW
									    }
									}

									echo $html_desk;
									  ?>
								</div>
							</div>

							<div class="hideondesktop">
								<div class="slider-logos">
									
									<?php 

									for($i = 0; $i < $totalItem; $i++)
									{

									    $html .= '<div><img src="'.esc_url($logos_ar[$i]['sizes']['thumbnail']).'" alt="'.esc_attr($logos_ar[$i]['alt']).'" /></div>';

									}

									echo $html;
									  ?>
								</div>
							</div>
							
						<?php endif; ?>
					</div>
					
				</div>
				<div class="col-xl-6 col-12 position-relative column">
					<div>
						<?php if(!empty($titre)): ?>
						<h3>
							<?php echo $titre; ?>
						</h3>
						<?php endif; ?>
						<?php if(!empty($paragraphe)): ?>
						<p>
							<?php echo $paragraphe; ?>
						</p>
						<?php endif; ?>
						<div class="arrow"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><!-- #logo-section -->

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
<?php endif; ?>

</div>

<?php get_footer(); ?>