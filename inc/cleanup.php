<?php

/*
	
@package ilestunefois

/*



/***********************************
	REMOVE GENERATOR VERSIONS NUMBER
	************************************/


// remove version string form js and css
function ilestunefois_remove_wp_version_strings($src) {

	global $wp_version;
	parse_str(parse_url($src , PHP_URL_QUERY) , $query);
	if(!empty($query['ver']) && $query['ver'] === $wp_version) {
		$src = remove_query_arg( 'ver', $src );
	}

	return $src;

}

add_filter('script_loader_src' , 'ilestunefois_remove_wp_version_strings');
add_filter('style_loader_src' , 'ilestunefois_remove_wp_version_strings');


// remove meta tag generator
function ilestunefois_remove_meta_version() 
{
	return;
}

add_filter('the_generator' , 'ilestunefois_remove_meta_version');

// remove empty paragraphs
remove_filter ('the_content', 'wpautop');

/***********************************
	DISABLE SELF PINGBACKS
	************************************/


function valtesse_disable_self_pingbacks( &$links ) {
  foreach ( $links as $l => $link )
        if ( 0 === strpos( $link, get_option( 'home' ) ) )
            unset($links[$l]);
}

add_action( 'pre_ping', 'valtesse_disable_self_pingbacks' );
