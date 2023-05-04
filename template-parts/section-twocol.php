<?php
		$titre = get_field('title_home_first_section');
		$paragraphe = get_field('p_home_first_section');
		$texte_btn = get_field('texte_bouton_home_first_section');
		$url = get_field('lien_bouton_home_first_section');
?>
<div id="first-section" class="text-img-block section limited">
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
      </div>
  </div>
</div>
