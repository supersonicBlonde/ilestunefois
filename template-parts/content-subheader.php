<?php

	$background_image =  get_field('background_image_header_standard');
	$style_bg = !empty($background_image)?"background-image:url(".$background_image.")":"background-color:#251b13";
	$title = get_field('title_header_standard');
	$sub_title = get_field('sous_titre_header_standard');
	$paragraphe = get_field('paragraphe_header_standard');
?>

	<div id="first-section" class="sub_header section limited background-image" style="<?php echo $style_bg; ?>">

		<?php if(empty($background_image)): ?>
		<div class="sub_header_content">

			<?php if(!empty($title)): ?>
				<h2 class="sub_header-title">
					<?php echo $title; ?>
				</h2>
			<?php endif; ?>
			<?php if(!empty($sub_title)): ?>
				<h3 class="sub_header-subtitle">
					<?php echo $sub_title; ?>
				</h3>
			<?php endif; ?>
			<?php if(!empty($paragraphe)): ?>
				<div class="sub_header-paragprahe">
					<p><?php echo $paragraphe; ?></p>
				</div>
			<?php endif; ?>
		</div>
		<?php endif; ?>

	</div>
