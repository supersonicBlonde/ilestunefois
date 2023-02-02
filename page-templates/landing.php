<?php
/**
* Template Name: Landing Page
*
* @package ilestunefois
*/

get_header('landing');
?>
<div class="landing-page page-content">

<div class="section limitedext">
  <div class="container-fluid">
    <div class="row">
      <div class="embed-responsive embed-responsive-16by9">
        <?php the_field('video'); ?>
      </div>
    </div>
  </div>
</div>

<?php if(have_rows('section_1_landing')): ?>
<div id="second-section">
  <?php while(have_rows('section_1_landing')): the_row(); ?>
  <div class="section limited">
    <div class="container-fluid">
      <h2><?php the_sub_field('titre'); ?></h2>
      <p><?php the_sub_field('paragraphe'); ?></p>
  </div>
  </div>
  <?php endwhile; ?>
</div>
<?php endif; ?>

<?php if(have_rows('section_2_landing')): ?>
<div id="third-section">
  <?php while(have_rows('section_2_landing')): the_row(); ?>
  <div class="section limited">
    <div class="container-fluid">
      <h2><?php the_sub_field('titre'); ?></h2>
      <p><?php the_sub_field('paragraphe'); ?></p>
  </div>
  </div>
  <?php endwhile; ?>
</div>
<?php endif; ?>

<?php if(!empty(get_field('cta_home_button_text'))): ?>
  <div id="section_cta" class="my-5">
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
  </div>
	<?php endif; ?>

<?php if(have_rows('steps')): ?>
<div id="steps-section" class="p-5">
  <div class="section limited">
    <div class="container-fluid">
          <ul class="steps d-xl-flex justify-content-between">
          <?php $count = 1; while(have_rows('steps')): the_row(); ?>
            <li class="position-relative d-xl-flex text-center text-xl-left">
              <span class="count"><?php echo '0'.$count; ?></span>
              <div class="position-absolute step container">
                <div class="row">
                  <div class="col-12">
                    <div class='title my-4 mh'><?php the_sub_field('titre'); ?></div>
                    <div class="paragraphe"><?php the_sub_field('paragraphe'); ?></div>
                  </div>
                  </div>
              </div>
            </li>
          <?php $count++; endwhile; ?>
          </ul>
        <?php //endif; ?>
    </div>
  </div>
</div>
<?php endif; ?>

<?php if(have_rows('section_deux_colonnes')): ?>
<div id="section_deux_colonnes">
    <?php while(have_rows('section_deux_colonnes')): the_row(); ?>
    <div class="section limited p-5">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-xl-5 col">
              <div class="background-image h-100" style="background-image:url(<?php the_sub_field("image"); ?>)"></div>
          </div>
          <div class="col-12 col-xl-7 col">
            <div class=" text-right">
              <h2><?php the_sub_field('titre'); ?></h2>
              <p><?php the_sub_field('paragraphe'); ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

<?php endwhile; endif; ?>

<?php if(have_rows('section_liste')): ?>
  <?php while(have_rows('section_liste')): the_row(); ?>
  <div id="section_liste" class="mt-5">
      <div class="section limited">
        <div class="container-fluid">
          <div class="row">
          <div class="col-12 col-xl-5 offset-xl-1">
              <div class="bg">
              <h3 class="mt-5"><?php the_sub_field('titre'); ?></h3>
              <?php if(have_rows('liste')): ?>
                <ul>
                <?php while(have_rows('liste')): the_row(); ?>
                  <li><?php the_sub_field('texte_liste') ?></li>
                <?php endwhile; ?>
                </ul>
              <?php endif; ?>
              </div>
            </div>
            <div class="col-12 col-xl-6">
                <div class="background-image h-100" style="background-image:url(<?php the_sub_field("image_droite"); ?>)"></div>
            </div>
          </div>
        </div>
      </div>
  </div>
  <div class="container mb-5">
    <div class="row">
      <div class="col-12 text-center">
        <div class="read-more">
          <a href="#" class="cta-btn"><?php the_sub_field('texte_bouton'); ?></a>
        </div>
      </div>
    </div>
</div>
<?php endwhile; endif; ?>

<?php if(have_rows('derniere_section')): ?>
  <?php while(have_rows('derniere_section')): the_row(); ?>
<div id="last_section">
  <div class="section limited">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-xl-6 col">
          <h2><?php the_sub_field('titre_last_section'); ?></h2>
          <p><?php the_sub_field('paragraph_last_section'); ?></p>
          <div class="read-more">
            <a href="#" class="cta-btn"><?php the_sub_field('texte_bouton'); ?></a>
          </div>
        </div>
        <div class="col-12 col-xl-6 col">
          <?php if(have_rows('list_last_section')): ?>
            <ul>
            <?php while(have_rows('list_last_section')): the_row(); ?>
              <li><?php the_sub_field('liste_texte') ?></li>
            <?php endwhile; ?>
            </ul>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endwhile; endif; ?>
</div><!-- landing-page -->

<?php get_footer(); ?>