<?php

function childtheme_remove_filters(){
	remove_filter( 'excerpt_more', 'twentyeleven_auto_excerpt_more' );
}

add_action( 'after_setup_theme', 'childtheme_remove_filters' );

function simplychange_continue_reading_link() {
	return ' <a href="'. esc_url( get_permalink() ) . '">' . __( '<p class="read-more">Read more <i class="icon-chevron-right"></i></p>', 'twentyeleven' ) . '</a>';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and twentyeleven_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 */
function simplychange_auto_excerpt_more( $more ) {
	return ' &hellip;' . simplychange_continue_reading_link();
}
add_filter( 'excerpt_more', 'simplychange_auto_excerpt_more' );


register_sidebar( array(
		'name' => __( 'Header Widgets Area', 'Business' ),
		'id' => 'header-area',
		'description' => __( 'The header widget area', 'Business' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
register_sidebar( array(
		'name' => __( 'Home Twitter Area', 'Business' ),
		'id' => 'twitter-area',
		'description' => __( 'The home twitter area', 'Business' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
	) );
	


?>