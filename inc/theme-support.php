<?php

/*
	
@package ilestunefois
	
	========================
		THEME SUPPORT OPTIONS
	========================
*/

$options = get_option( 'post_formats' );
$formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' , 'post' );
$output = array();
foreach ( $formats as $format ){
	$output[] = ( @$options[$format] == 1 ? $format : '' );
}
if( !empty( $options ) ){
	add_theme_support( 'post-formats', $output );
}

function ilestunefois_custom_header_setup() {
	add_theme_support(
		'custom-header',
		apply_filters(
			'ilestunefois_custom_header_args',
			array(
				'default-image'      => '',
				'default-text-color' => 'FFFFFF',
				'width'              => 1000,
				'height'             => 250,
				'flex-width'    	 => true,
				'flex-height'        => true,
			)
		)
	);
}
add_action( 'after_setup_theme', 'ilestunefois_custom_header_setup' );

/**
 * Add support for core custom logo.
 *
 * @link https://codex.wordpress.org/Theme_Logo
 */
function ilestunefois_custom_logo() {
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}

add_action( 'after_setup_theme', 'ilestunefois_custom_logo' );

function ilestunefois_register_nav_menu()
{
	register_nav_menu('primary' , 'Primary Menu');
}

add_action('after_setup_theme' , 'ilestunefois_register_nav_menu');

function add_file_types_to_uploads($file_types){
	$new_filetypes = array();
	$new_filetypes['svg'] = 'image/svg+xml';
	$file_types = array_merge($file_types, $new_filetypes );
	return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads');

add_theme_support( 'post-thumbnails', array( 'post' , 'page' ) );        



add_action( 'pre_get_posts', 'taxonomy_query' );

function taxonomy_query($query){

    if ( !is_admin() && $query->is_main_query() && $query->is_tax( 'videos-category' ) ) {
        $query->set( 'post_type',  array('portfoliovideo')  );
    }
};

