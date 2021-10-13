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