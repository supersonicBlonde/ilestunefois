<?php	
/*
	
@package ilestunefois

*/
	
function ilestunefois_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Menu Footer Colonne 1', 'ilestunefois' ),
        'id'            => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
 
    register_sidebar( array(
        'name'          => __( 'Menu Footer Colonne 2', 'theme_name' ),
        'id'            => 'sidebar-2',
        'before_widget' => '<ul><li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li></ul>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Menu Footer Colonne 3', 'ilestunefois' ),
        'id'            => 'sidebar-3',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
 
    register_sidebar( array(
        'name'          => __( 'Menu Footer Colonne 4', 'theme_name' ),
        'id'            => 'sidebar-4',
        'before_widget' => '<ul><li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li></ul>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Menu Footer Colonne 5', 'ilestunefois' ),
        'id'            => 'sidebar-5',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
 
}

add_action( 'widgets_init', 'ilestunefois_widgets_init' );