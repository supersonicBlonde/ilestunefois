<?php
/**
* Template Name: Blog
*
* @package ilestunefois
*/

get_header();
?>
<div class="blog-content page-content">

	<div class="section limitedext">

		<div class="container-fluid">
			<div class="row">
				<div class="col-12">

					<?php 

					if( have_posts() ):

						while( have_posts() ): the_post();

					?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<?php if( ilestunefois_get_attachment() ): ?>

						<div class="standard-featured background-image" style="background-image: url(<?php echo ilestunefois_get_attachment(); ?>);"></div>
									
						<?php endif; ?>
						
						<header class="entry-header">

							<div class="post-cat cat-single">
								<?php 
								$category = get_the_category();
								echo $category[0]->cat_name;
								 ?>
							</div>
							
							<?php the_title( '<h1 class="entry-title">', '</h1>'); ?>
							
						</header>
						
						<div class="entry-content clearfix">
							
							<?php the_content(); ?>
							
						</div><!-- .entry-content -->
						
					</article>


				<?php endwhile; endif;?>

				</div><!-- .column -->

			</div><!-- .row -->

			<div class="row">
				<div class="col-12">
					<div class="share-container">
						<div class="share"><?php echo __('Share' , 'ilestunefois'); ?></div>
						<?php get_template_part('template-parts/template', 'sharing-box'); ?>
					</div><!-- .share-container -->
				</div><!-- .column -->
			</div><!-- .row -->
		</div><!-- .container-fluid -->
	</div><!-- .section -->

	

	<?php
	global $post;
	$current = $post->ID;
	$args = array('posts_per_page' => 2, 'orderby' => 'rand', 'post__not_in' => array( $current));
	$related = new WP_Query($args);
	?>

	<?php if($related->have_posts()): ?>
	<div id="related-posts">
		<div class="bg-bottom"></div>
		<div class="section limited">
			<div class="container-fluid">
				<div class="row">
					<?php
					
					while($related->have_posts()): $related->the_post(); ?>
						<div class="col-6 column">
							<div class="related-single">
								<?php if( ilestunefois_get_attachment() ): ?>
									<a class="standard-featured-link" href="<?php the_permalink(); ?>">
										<div class="related-bg standard-featured background-image" style="background-image: url(<?php echo ilestunefois_get_attachment(); ?>);"></div>
									</a>
								<?php endif; ?>
								<div class="related-content">
									<a class="standard-featured-link" href="<?php the_permalink(); ?>">
										<?php the_title( '<h2 class="entry-title"><a href="'. esc_url( get_permalink() ) .'" rel="bookmark">', '</a></h2>'); ?>
									</a>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
				</div><!-- .row -->
			</div><!-- .container-fluid -->
		</div><!-- .section -->
	</div><!-- #related-posts -->
<?php endif; ?>

</div><!-- .page-content -->


<?php get_footer(); ?>