<?php  

function ilestunefois_get_cpt_taxonomies($post_id, $taxonomy) {
	$tax_ar = [];
	$terms = wp_get_post_terms( $post_id, $taxonomy );
	foreach ( $terms as $term ) {
		$tax_ar[$term->slug] =  $term->name;
	}
	return $tax_ar;
}

function ilesunefois_echo_cpt_taxonomies($post_id, $taxonomy) {
	$ar = ilestunefois_get_cpt_taxonomies($post_id, $taxonomy);
	
	$start_str = "<ul>";
	$end_str = "</ul>";
	$str = "";


	if(count($ar) == 0 )
		return;

	foreach($ar as $k => $v) {
		$str .= '<li><a href="'.$k.'">'.$v.'</a><li>';
	}

	return $start_str.$str.$end_str;
}

