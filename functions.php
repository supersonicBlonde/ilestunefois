<?php
/**
 * ilestunefois functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ilestunefois
 */

require get_template_directory() . '/inc/helpers.php';
require get_template_directory() . '/inc/cleanup.php';
require get_template_directory() . '/inc/enqueue.php';
require get_template_directory() . '/inc/theme-support.php';
require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';
require get_template_directory() . '/inc/custom-post-type.php';
require get_template_directory() . '/inc/form.php';
require get_template_directory() . '/inc/widgets.php';


//WPML - Add a floating language switcher to the footer
add_action('wp_footer', 'wpml_floating_language_switcher'); 
  
function wpml_floating_language_switcher() { 
   echo '<div class="wpml-floating-language-switcher">';
       //PHP action to display the language switcher (see https://wpml.org/documentation/getting-started-guide/language-setup/language-switcher-options/#using-php-actions)
       do_action('wpml_add_language_selector');
   echo '</div>'; 
}

