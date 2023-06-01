<div class="container-fluid">
		<div class="row">	
			<div class="col-12">
				<h3 class="text-center">F.A.Q</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
        <div id="accordion-faq" class="section-limited my-5">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="tabs">
                  <?php $count = 0; while(have_rows('faq')): the_row(); ?>
                  <div class="tab">
                    <input type="radio" id="rd<?php echo $count; ?>" name="rd">
                    <label class="tab-label" for="rd<?php echo $count; ?>"><?php the_sub_field('question'); ?></label>
                    <div class="tab-content">
                      <?php the_sub_field('reponse'); ?>
                    </div>
                  </div>
                  <?php $count++; endwhile; ?>
                  <div class="tab">
                    <input type="radio" id="rdclose" name="rd">
                    <label for="rdclose" class="tab-close">Tout fermer &times;</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
		  </div>
	  </div>
  </div>
</div>