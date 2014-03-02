<?php
/**
 * Template Name: Services Page
 * Description: A Page Template that includes the content from the homepage carousel
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

		<div id="primary" class="services-page">
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

				<?php 
					$page_data = get_page_by_title('HOME - CAROUSEL');; // You must pass in a variable to the get_page function. If you pass in a value (e.g. get_page ( 123 ); ), WordPress will generate an error. By default, this will return an object.
					
					echo apply_filters('the_content', $page_data->post_content); // echo the content and retain Wordpress filters such as paragraph tags. Origin from: http://wordpress.org/support/topic/get_pagepost-and-no-paragraphs-problem
				?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_sidebar('3'); ?>
<?php get_footer(); ?>