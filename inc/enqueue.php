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

	wp_enqueue_style("slickcss" , "//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css");

	wp_enqueue_style( 'ilestunefois-style', get_stylesheet_uri(), array(), _S_VERSION );

	wp_enqueue_style( 'main-css', get_template_directory_uri().'/dist/css/styles.min.css', array(), _S_VERSION );
	
	//wp_enqueue_script( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js', array('jquery'), '4.5.0', true );
	wp_enqueue_script( 'slickjs', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '', true );

	//wp_enqueue_script( 'youtube-api', 'https://www.youtube.com/iframe_api', array(), '', false );



	wp_enqueue_script( 'js', get_template_directory_uri().'/dist/js/scripts.min.js', array('slickjs','jquery'), '', true );

	wp_localize_script( 'js', 'ajax_js_obj', array(
                      'ajax_url' => admin_url( 'admin-ajax.php' ),
                      'the_nonce' => wp_create_nonce('MY_NONCE_VAR')
     ));
	
}
add_action( 'wp_enqueue_scripts', 'ilestunefois_load_scripts' );

	
	