<?php

if(!get_field('hide_sub_header_block')):


	$background_image =  get_field('background_image_header_standard');
	$video = get_field('video_sub_header');

	// Image / video

	if(!empty($background_image) && empty($video)) {
		$style_bg = "background-image:url(".$background_image.")";
	}
	else {
		 $style_bg = "background-color:#251b13";	
	}
	$style_bg = !empty($background_image)?"background-image:url(".$background_image.")":"background-color:#251b13";
	$title = get_field('title_header_standard');
	$sub_title = get_field('sous_titre_header_standard');
	$paragraphe = get_field('paragraphe_header_standard');


?>

	<div id="first-section" class="sub_header section limited background-image" style="<?php echo $style_bg; ?>">
		<?php if(!empty($video)): ?>
			<video poster="<?php echo $background_image; ?>" id="bgvid" playsinline autoplay muted loop>
				<source src="<?php echo $video; ?>" type="video/mp4">
				I'm sorry; your browser doesn't support HTML5 video in WebM with VP8 or MP4 with H.264.
			</video>
		<?php endif; ?>

		<?php //if(empty($background_image)): ?>
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
		<?php //endif; ?>

	</div>
<?php 

endif;
?>