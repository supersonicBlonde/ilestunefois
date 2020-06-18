<?php
/**
* Template Name: Portfolio
*
* @package ilestunefois
*/

get_header();
?>
<div class="portfolio-content">

	<div id="first-section" class="section limited background-image" style="background:url(<?php echo get_field('background_image_header_standard'); ?>)">

	</div>


	<?php
	$title = get_field('main_title_portfolio');
	$paragraphe = get_field('paragraphe_introduction_portfolio');
	?>
	<div id="second-section" class="section limited">
		<div class="container-fluid">
			<div class="row">
				<div class="col-8 offset-4">
					<?php if(!empty($title)): ?>
						<h2><?php echo $title; ?></h2>
					<?php endif; ?>
				</div>
			</div>
			<div class="row">
				<div class="col-6 offset-6">
					<?php if(!empty($paragraphe)): ?>
						<p><?php echo $paragraphe; ?></p>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>

	<?php

	$args = array(
		'post_type' => 'portfolio',
		'posts_per_page' => 6,
		'paged' => $paged
	);

	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
	$portfolio = new WP_Query($args);

	if($portfolio->have_posts() ):
	?>

	<div id="portfolio" class="section limited">

		<?php $terms = get_terms( 'videos-category', array('hide_empty' => true) ); ?>

		<div class="container-fluid">
			
			<div class="row">
				
				<div class="col-12 text-right">
					
					<?php if(count($terms) > 0): ?>

						<ul class="videos-categories">
						
						<?php foreach($terms as $term): ?>

							<li><a href=""><?php echo $term->name; ?></a></li>

						<?php endforeach;  ?>

						</ul>

					<?php endif; ?>

				</div>

			</div>

		</div>


		<div class="container-fluid">
			<div class="videos-container">
				
				<?php while($portfolio->have_posts()): $portfolio->the_post(); ?>

					<?php

					// Load value.
					$iframe = get_field('embed_code_portfolio_video');

					// Use preg_match to find iframe src.
					preg_match('/src="(.+?)"/', $iframe, $matches);
					$src = $matches[1];

					// Add extra parameters to src and replcae HTML.
					$params = array(
					    'height'  => 515,
					);
					$new_src = add_query_arg($params, $src);
					$iframe = str_replace($src, $new_src, $iframe);

					// Add extra attributes to iframe HTML.
					$attributes = 'frameborder="0"';
					$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

				
					?>

					<?php $poster = get_field('poster_gif_portfolio_video'); ?>

					<div class="video-item">
						<div class="embed-container">
							<div class="video-embedded"><?php echo $iframe; ?></div>
							<!-- <div class="poster"><img src="<?php echo $poster; ?>"></div> -->
							<div class="poster"><video id="video1" loop="" muted="" playsinline="" poster="<?php echo $poster; ?>"> <source src="http://ilestunefois.localhost/wp-content/uploads/2020/06/CYCLYK.mp4" type="video/mp4"> </video></div>
						</div>
						<h3><?php the_title(); ?></h3>
						<p><?php the_field('paragraphe_portfolio_video'); ?></p>
						<div class="post-cat">
							<?php 
								echo ilesunefois_echo_cpt_taxonomies(get_the_ID(), array('videos-category')); 
							?>
						</div>


					</div>
				

				<?php endwhile; ?>


			</div>

		</div>

	</div>

	<?php endif; ?>

	<div class="pagination">
	    <?php 
	        echo paginate_links( array(
	            'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
	            'total'        => $portfolio->max_num_pages,
	            'current'      => max( 1, get_query_var( 'paged' ) ),
	            'format'       => '?paged=%#%',
	            'show_all'     => false,
	            'type'         => 'plain',
	            'end_size'     => 2,
	            'mid_size'     => 1,
	            'prev_next'    => true,
	            'prev_text'    => sprintf( '<i></i> %1$s', __( '', 'text-domain' ) ),
	            'next_text'    => sprintf( '%1$s <i></i>', __( '', 'text-domain' ) ),
	            'add_args'     => false,
	            'add_fragment' => '',
	        ) );
	    ?>
	</div>

</div>


<?php get_footer(); ?>