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