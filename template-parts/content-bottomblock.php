<?php if(have_rows('bloc_bas_de_page')): ?>
  <?php while(have_rows('bloc_bas_de_page')): the_row(); ?>
    <?php $image_pos = get_sub_field('image_position'); ?>
    <div class="bloc-bottom position-relative">
      <?php
      $icon = "";
      $icon_path = get_sub_field('icone');
      if(!empty($icon_path)) {
          $svg_file = file_get_contents($icon_path);
          $find_string   = '<svg';
          $position = strpos($svg_file, $find_string);
          $svg_file_new = substr($svg_file, $position);
          $icon = '<div class="icon">'.$svg_file_new.'</div>';
      }
      echo $icon;
      ?>
      <?php 
      $paragraph = get_sub_field('paragraphe');
      if(!empty($paragraph)): ?>    
      <div class="inner"><?php echo $paragraph; ?></div>
      <?php endif; ?>
    </div>
    <?php
    $text_btn = get_sub_field('texte_bouton');
    if(!empty($text_btn)):
    ?>
      <div class="mt-lg-4 text-center w-100">
        <div class="read-more">
          <a href="#" class="cta-btn"><?php echo $text_btn; ?></a>
        </div>
      </div>
    <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>