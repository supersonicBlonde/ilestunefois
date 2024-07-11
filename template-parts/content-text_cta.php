<div class="container-fluid">
    
    <?php
        $titre = get_field('titre_cta');
        $paragraph = get_field('paragraphe_cta');
        $text_cta = get_field('text_bouton');
        $link = get_field('lien_bouton');
    ?>
    <?php if (!empty($titre) || !empty($paragraph) || !empty($text_cta)): ?>
        <div id="call_to_action" class="section limitedext module" style="margin:2em 0 8em 0;">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 column">
                    <div>
                        <?php if (!empty($titre)) : ?>
                            <h2 class="text-white"><?php echo $titre; ?></h2>
                        <?php endif; ?>
                        <?php if (!empty($paragraph)) : ?>
                            <div><?php echo $paragraph; ?></div>
                        <?php endif; ?>
                        <?php if (!empty($text_cta) && !empty($link)) : ?>
                            <div class="read-more">
                                <a href="<?php echo $link; ?>" class="cta-btn"><?php echo $text_cta; ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>