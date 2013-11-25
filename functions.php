<?php

function childtheme_remove_filters(){
	remove_filter( 'excerpt_more', 'twentyeleven_auto_excerpt_more' );
}

add_action( 'after_setup_theme', 'childtheme_remove_filters' );

function simplychange_continue_reading_link() {
	return ' <p class="read-more"><a href="'. esc_url( get_permalink() ) . '">' . __( 'Read more <i class="icon-chevron-right"></i>', 'twentyeleven' ) . '</a></p>';
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
		'name' => __( 'Sidebar Events', 'twentyeleven' ),
		'id' => 'sidebar-events',
		'description' => __( 'Sidebar Events', 'Business' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

register_sidebar( array(
		'name' => __( 'Main Sidebar 3', 'twentyeleven' ),
		'id' => 'sidebar-v3',
		'description' => __( 'Sidebar 3', 'Business' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
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

register_sidebar( array(
		'name' => __( 'Home Twitter Area 2', 'Business' ),
		'id' => 'twitter-area-2',
		'description' => __( 'The home twitter area', 'Business' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
	) );

?>