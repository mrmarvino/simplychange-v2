<?php
/**
 * Template Name: Custom homepage
 *
 * A custom page template without sidebar.
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen. MPW
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('#slider1').tinycarousel({display: 1, interval: true, intervaltime: 9000});

		    var faderIndex = 0,
		        faders = jQuery('.fader li');
		    
		    function nextFade() {
		        jQuery(faders[faderIndex]).fadeOut(5000, function() {
		            faderIndex++;
		            if (faderIndex >= faders.length)
		                faderIndex = 0;
		            jQuery(faders[faderIndex]).fadeIn(1000, nextFade);
		        });
		    }

		    nextFade();

	});
</script>
		<div id="container-home">
			TEST
			<div class="intro-panel">
				
				<div class="int-wrapper">
					<?php 
					$page_data = get_page_by_title('HOME - INTRO PANEL'); // You must pass in a variable to the get_page function. If you pass in a value (e.g. get_page ( 123 ); ), WordPress will generate an error. By default, this will return an object.
					
					echo apply_filters('the_content', $page_data->post_content); // echo the content and retain Wordpress filters such as paragraph tags. Origin from: http://wordpress.org/support/topic/get_pagepost-and-no-paragraphs-problem
					?>
				</div>
				
			</div>
					
			<div class="features-panel">
				<div class="features-content">
					<div class="int-wrapper">
					<?php 
					$page_data = get_page_by_title('HOME - CAROUSEL');; // You must pass in a variable to the get_page function. If you pass in a value (e.g. get_page ( 123 ); ), WordPress will generate an error. By default, this will return an object.
					
					echo apply_filters('the_content', $page_data->post_content); // echo the content and retain Wordpress filters such as paragraph tags. Origin from: http://wordpress.org/support/topic/get_pagepost-and-no-paragraphs-problem
					?>
					</div>
				</div>
			</div>
			<div id="content" role="main">

				<div class="home-content">
					
					<div class="col-1">
						<h2>Events</h2>
						
						<?php 
							$events = get_category_by_slug( 'events' );
							$news = get_category_by_slug( 'news' );
						?>
												
						<ul>
						<?php
						global $post;
						$args = array( 'numberposts' => 2, 'offset'=> 0, 'category' => $events->term_id );
						$myposts = get_posts( $args );
						foreach( $myposts as $post ) :	setup_postdata($post); ?>
							<li><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3><?php the_excerpt(); ?></li>
						<?php endforeach; ?>
						</ul>
						
					</div>
					
					<div class="col-2">
		
						<h2>News</h2>
						
						<ul>
						<?php
						global $post;
						$args = array( 'numberposts' => 2, 'offset'=> 0, 'category' => $news->term_id );
						$myposts = get_posts( $args );
						foreach( $myposts as $post ) :	setup_postdata($post); ?>
							<li><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3><?php the_excerpt(); ?></li>
						<?php endforeach; ?>
						</ul>

					</div>
										
				</div>
				
				<div class="feed-container">
					<div class="twitter-feed">
						<h2>Our twitter feed</h2>
						<div id="tweet">
						
						<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Twitter Area')) :

endif; ?>
						
						</div>
						<div class="twitter-footer"></div>
						
					</div>
					
					<h3>Follow us</h3>
						<ul class="follow-us">
							<li><a href="<?php bloginfo('rss_url'); ?>" class="rss" title="RSS feed" >RSS feed</a></li>
							<li><a href="http://twitter.com/#!/SimplyChange" class="twitter" title="Follow us on twitter">Twitter</a></li>
							<li><a href="http://www.facebook.com/SimplyChangeLtd" class="facebook" title="Follow us on Facebook" >Facebook</a></li>
							<li><a href="http://www.linkedin.com/company/simply-change" class="linkedin" title="Follow us on Linkedin" >Linkedin</a></li>
							
						</ul>
					
				</div>
				

			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>
