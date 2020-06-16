<?php

/*
	
@package ilestunefois
	
	========================
		THEME CUSTOM POST TYPES
	========================
*/




	
add_action( 'init', 'ilestunefois_video' );
add_action( 'init', 'ilestunefois_port_tax' );

/*add_filter( 'manage_ilestunefois-portfolio_posts_columns', 'ilestunefois_set_portfolio_columns' );
add_action( 'manage_ilestunefois-portfolio_posts_custom_column', 'ilestunefois_portfolio_custom_column', 10, 2 );

add_action( 'add_meta_boxes', 'ilestunefois_portfolio_add_meta_box' );
add_action( 'save_post', 'ilestunefois_save_portfolio_email_data' );*/
	


/* portfolio CPT */
function ilestunefois_video() {
	$labels = array(
		'name' 				=> 'Portfolios',
		'singular_name' 	=> 'Portfolio',
		'menu_name'			=> 'Portfolios',
		'name_admin_bar'	=> 'Portfolio'
	);
	
	$args = array(
		'labels'			=> $labels,
		'show_ui'			=> true,
		'show_in_menu'		=> true,
		'capability_type'	=> 'post',
		'hierarchical'		=> false,
		'menu_position'		=> 26,
		'menu_icon'			=> 'dashicons-video-alt2',
		'supports'			=> array( 'title', 'author', 'thumbnail' )
	);
	
	register_post_type( 'portfolio', $args );
	
}

function ilestunefois_port_tax() {
	
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => __( 'Categories' ),
		'singular_name'     => __( 'Categorie' ),
		'menu_name'         => __( 'Catégorie'),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'category' ),
	);

	register_taxonomy( 'category', array( 'portfolio' ), $args );
}

/*function ilestunefois_set_portfolio_columns( $columns ){
	$newColumns = array();
	$newColumns['title'] = 'Full Name';
	$newColumns['message'] = 'Message';
	$newColumns['email'] = 'Email';
	$newColumns['date'] = 'Date';
	return $newColumns;
}

function ilestunefois_portfolio_custom_column( $column, $post_id ){
	
	switch( $column ){
		
		case 'message' :
			echo get_the_excerpt();
			break;
			
		case 'email' :
			//email column
			$email = get_post_meta( $post_id, '_portfolio_email_value_key', true );
			echo '<a href="mailto:'.$email.'">'.$email.'</a>';
			break;
	}
	
}*/

/* portfolio META BOXES */

/*function ilestunefois_portfolio_add_meta_box() {
	add_meta_box( 'portfolio_email', 'User Email', 'ilestunefois_portfolio_email_callback', 'ilestunefois-portfolio', 'side' );
}

function ilestunefois_portfolio_email_callback( $post ) {
	wp_nonce_field( 'ilestunefois_save_portfolio_email_data', 'ilestunefois_portfolio_email_meta_box_nonce' );
	
	$value = get_post_meta( $post->ID, '_portfolio_email_value_key', true );
	
	echo '<label for="ilestunefois_portfolio_email_field">User Email Address: </label>';
	echo '<input type="email" id="ilestunefois_portfolio_email_field" name="ilestunefois_portfolio_email_field" value="' . esc_attr( $value ) . '" size="25" />';
}

function ilestunefois_save_portfolio_email_data( $post_id ) {
	
	if( ! isset( $_POST['ilestunefois_portfolio_email_meta_box_nonce'] ) ){
		return;
	}
	
	if( ! wp_verify_nonce( $_POST['ilestunefois_portfolio_email_meta_box_nonce'], 'ilestunefois_save_portfolio_email_data') ) {
		return;
	}
	
	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
		return;
	}
	
	if( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	
	if( ! isset( $_POST['ilestunefois_portfolio_email_field'] ) ) {
		return;
	}
	
	$my_data = sanitize_text_field( $_POST['ilestunefois_portfolio_email_field'] );
	
	update_post_meta( $post_id, '_portfolio_email_value_key', $my_data );
	
}*/












