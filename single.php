<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

		<div id="primary">
			<div id="content" role="main">
				<h1>TEST SINGLE</h1>
				<?php while ( have_posts() ) : the_post(); ?>
					<nav id="nav-single">
						<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentyeleven' ); ?></h3>
						<span class="nav-previous"><?php previous_post_link( '%link', __( '<i class="icon-arrow-left"></i>Previous', 'twentyeleven' ) ); ?></span>
						<span class="nav-next"><?php next_post_link( '%link', __( 'Next <i class="icon-arrow-right"></i>', 'twentyeleven' ) ); ?></span>
					</nav><!-- #nav-single -->

					<?php get_template_part( 'content', 'single' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->
<?php
$category = get_the_category(); 
$thisPage = $category[0]->cat_name;

if ($thisPage == "Events"){
	get_sidebar('2');
}else{
	get_sidebar();
}

?>
<?php get_footer(); ?>