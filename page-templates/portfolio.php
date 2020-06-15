<?php
/**
* Template Name: Portfolio
*
* @package ilestunefois
*/

get_header();
?>
<div class="portfolio-content">

	<div id="first-section" class="section limited background-image" style="background:url(<?php echo get_field('background_image_header_standard'); ?>)">

	</div>


	<?php
	$title = get_field('main_title_portfolio');
	$paragraphe = get_field('paragraphe_introduction_portfolio');
	?>
	<div id="second-section" class="section limited">
		<div class="container-fluid">
			<div class="row">
				<div class="col-8 offset-4">
					<?php if(!empty($title)): ?>
						<h2><?php echo $title; ?></h2>
					<?php endif; ?>
				</div>
			</div>
			<div class="row">
				<div class="col-6 offset-6">
					<?php if(!empty($paragraphe)): ?>
						<p><?php echo $paragraphe; ?></p>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>

</div>


<?php get_footer(); ?>