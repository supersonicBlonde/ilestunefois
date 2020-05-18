<?php

/*
	
@package ilestunefois

/*
	
	========================
		FRONT-END ENQUEUE FUNCTIONS
	========================
*/

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

function ilestunefois_load_scripts(){

	wp_enqueue_style( 'lato-font', 'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap', array(), '', 'all'); 
	
	wp_enqueue_style( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css', array(), '4.5.0', 'all' );

	wp_enqueue_style( 'ilestunefois-style', get_stylesheet_uri(), array(), _S_VERSION );

	wp_enqueue_style( 'main-css', get_template_directory_uri().'/dist/css/styles.min.css', array(), _S_VERSION );
	
	wp_enqueue_script( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js', array('jquery'), '4.5.0', true );
	
}
add_action( 'wp_enqueue_scripts', 'ilestunefois_load_scripts' );

	
	