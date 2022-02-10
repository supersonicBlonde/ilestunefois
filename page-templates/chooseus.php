<?php
/**
* Template Name: Nous choisir
*
* @package ilestunefois
*/

get_header();
?>

	<div class="posts-container page-content section">

   <?php get_template_part('template-parts/content-subheader'); ?>

		<div class="">

      <?php if(have_rows('blocs')): ?>
        <?php while(have_rows('blocs')): the_row(); ?>
          <?php $image_pos = get_sub_field('image_position'); ?>
          <div class="bloc-item position-relative" style="background-color:<?php the_sub_field("background_color"); ?>">
            <div class="bloc-item-content container position-relative">
              <div class="row bloc-item-content-flex no-gutters <?php echo $image_pos; ?>">
                <div class="col-md-6 col-12 d-flex align-items-center">
                  <div class="bloc-text">
                    <h2 class="pb-xl-5 pb-2"><?php the_sub_field('title') ?></h2>
                    <p><?php the_sub_field('paragraph'); ?></p>
                  </div>
                </div>
                <div class="col-md-6 col-12 background-image" style="background-position: center center;background-image:url(<?php the_sub_field('image'); ?>);"></div>
               <!--  <div><img src="<?php the_sub_field('image'); ?>)" style="width:650px; height: 550px;"></div> -->
                <?php 
                  $icon_position = get_sub_field('position_icone'); 
                ?>
               
              </div>
              <?php
              $svg_file = file_get_contents(get_sub_field('icone'));
              $find_string   = '<svg';
              $position = strpos($svg_file, $find_string);
              $svg_file_new = substr($svg_file, $position);
              
              ?>
              <div class="icon <?php echo $icon_position." ".$image_pos; ?>">
                <?php echo $svg_file_new; ?>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
		</div>

    <?php if(have_rows('bloc_bas_de_page')): ?>
        <?php while(have_rows('bloc_bas_de_page')): the_row(); ?>
          <?php $image_pos = get_sub_field('image_position'); ?>
          <div class="bloc-bottom position-relative">
            <?php
              $svg_file = file_get_contents(get_sub_field('icone'));
              $find_string   = '<svg';
              $position = strpos($svg_file, $find_string);
              $svg_file_new = substr($svg_file, $position);
              
              ?>
              <div class="icon">
                <?php echo $svg_file_new; ?>
              </div>
            <div class="inner"><?php the_sub_field('paragraphe'); ?></div>
          </div>
          <div class="mt-lg-4 text-center w-100">
            <div class="read-more">
              <a href="#" class="cta-btn"><?php the_sub_field('texte_bouton'); ?></a>
            </div>
          </div>
          <?php endwhile; ?>
      <?php endif; ?>


	</div>

<?php get_footer(); ?>