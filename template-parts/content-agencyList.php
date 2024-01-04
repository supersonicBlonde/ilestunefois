<?php wp_reset_postdata(); ?>
<?php if(have_rows('agence_liste')): 
		 while(have_rows('agence_liste')): the_row(); ?>
			<div class="container my-5" id="agences-home">
				<div class="row">
					<div class="col-12 text-center">
						<h3><?php the_sub_field('titre') ?></h3>
					</div>
				</div>
        <?php if(have_rows('agences')): ?>
          <div class="row">
         <?php while(have_rows('agences')): the_row(); ?>
           <?php $post_object = get_sub_field('agence');  setup_postdata($post_object); ?>
           <?php 
            $thumbnail = get_the_post_thumbnail_url($post_object->ID, 'large'); 
            $image_id = get_post_thumbnail_id($post_object->ID);
            $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
           ?>
           <div class="col-sm-12 col-lg mt-2">
            <div>
              <div class="image-container">
                <a href="<?php echo get_the_permalink($post_object->ID); ?>">
                  <img src="<?php echo $thumbnail; ?>" alt="<?php echo $image_alt; ?>" style="height: 250px; object-fit: cover;">
                  <div class="overlay"></div>
                  <div class="title"><?php echo get_the_title($post_object->ID); ?></div>
                </a>
              </div>
            </div>
          </div>
         <?php endwhile ?>
        </div>
        <?php endif; ?>  
    </div>
		<?php endwhile; ?>
   
	<?php endif; ?>