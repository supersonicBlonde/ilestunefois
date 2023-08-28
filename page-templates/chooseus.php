<?php
/**
* Template Name: Nous choisir
*
* @package ilestunefois
*/

get_header();
?>

	<div class="posts-container page-content section">

   <?php get_template_part('template-parts/content-subheader'); ?>

		<div class="">

      <?php get_template_part('template-parts/content' , 'chooseus'); ?>
		</div>

    <?php get_template_part('template-parts/content' , 'bottomblock') ?>


	</div>

<?php get_footer(); ?>