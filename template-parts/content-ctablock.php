<?php if (!empty(get_field('text_cta_module'))) : ?>
    <div id="call_to_action" class="section limitedext module" style="margin:2em 0 8em 0;">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 column">
                <div>
                    <?php if (!empty(get_field('titre_cta'))) : ?>
                        <h3><?php echo get_field('titre_cta'); ?></h3>
                    <?php endif; ?>
                    <?php if (!empty(get_field('paragraphe_cta'))) : ?>
                        <h4><?php echo get_field('paragraphe_cta') ?></h4>
                    <?php endif; ?>
                    <div class="read-more">
                        <a href="mailto:contact@ilestunefois.com?subject=Demande de devis" class="cta-btn"><?php echo get_field('text_cta_module'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>