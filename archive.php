<?php
/**

*
* @package ilestunefois
*/

get_header();
?>
<div class="blog-content page-content">

	<?php 
	

	if(have_posts() ):
	?>

	<div class="posts-container section limitedext">

		<div class="container-fluid">

			<?php $terms = get_categories(); ?>

			<div id="cat-list">
				<div class="row">
					
					<div class="col-12">
						
						<?php if(count($terms) > 0): ?>

							<ul class="blog-categories">
							
							<?php foreach($terms as $term): ?>

								<li><a href="/category/<?php echo $term->slug ;?>"><?php echo $term->name; ?></a></li>

							<?php endforeach;  ?>

							</ul>

						<?php endif; ?>

					</div><!-- .col-12 container-cat-list -->

				</div>
			</div>
		
			<?php while(have_posts()): the_post();  ?>

				
				<div class="row">
					<div class="col-12">
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								
						<?php if( ilestunefois_get_attachment() ): ?>
							
							<a class="standard-featured-link" href="<?php the_permalink(); ?>">
								<div class="standard-featured background-image" style="background-image: url(<?php echo ilestunefois_get_attachment(); ?>);"></div>
							</a>
							
						<?php endif; ?>

						<div class="post-single">

							<div class="post-cat">
							<?php 
								echo ilesunefois_echo_cpt_taxonomies('category', get_the_ID(), array('category')); 
							?>
							</div>

							<header class="entry-header">
								
								<?php the_title( '<h2 class="entry-title"><a href="'. esc_url( get_permalink() ) .'" rel="bookmark">', '</a></h2>'); ?>
								
							</header>

							<div class="entry-content">	

								<div class="entry-excerpt">
									<?php the_excerpt(); ?>
								</div>
								<div class="button-container standard-read-more">
									<a href="<?php the_permalink(); ?>"><?php _e( 'Read More' ); ?></a>
								</div>

							</div>
						</div>
							
						</article>
						
					</div>

				</div>

			<?php endwhile; ?>

		</div>

		<div class="pagination">
	    <?php 
	       /* echo paginate_links( array(
	            'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
	            'total'        => $query->max_num_pages,
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
	        ) );*/
	    ?>
		</div><!-- .pagination -->

	</div><!-- .posts-container -->

	<?php endif; ?>


<?php get_footer(); ?>