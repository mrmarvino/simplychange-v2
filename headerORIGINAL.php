<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes();?>>
	<head>
		<meta charset="<?php bloginfo('charset');?>" />
		<title><?php
		/*
		 * Print the <title> tag based on what is being viewed.
		 */
		global $page, $paged;

		wp_title('|', true, 'right');

		// Add the blog name.
		bloginfo('name');

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo('description', 'display');
		if ($site_description && (is_home() || is_front_page()))
			echo " | $site_description";

		// Add a page number if necessary:
		if ($paged >= 2 || $page >= 2)
			echo ' | ' . sprintf(__('Page %s', 'twentyten'), max($paged, $page));
			?></title>
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url');?>" />
		<link rel="stylesheet" type="text/css" media="screen, projection" href="<?php echo get_stylesheet_directory_uri();?>/stylesheets/screen.css"/>
		<link rel="stylesheet" type="text/css" media="print" href="<?php echo get_stylesheet_directory_uri();?>/stylesheets/print.css"/>
		<!--[if IE]>
		<link rel="stylesheet" media="screen, projection" type="text/css" href="<?php echo get_stylesheet_directory_uri() ; ?>/stylesheets/ie.css"/>
		<![endif]-->
		<link rel="pingback" href="<?php bloginfo('pingback_url');?>" />
		<?php
		/* We add some JavaScript to pages with the comment form
		 * to support sites with threaded comments (when in use).
		 */
		if (is_singular() && get_option('thread_comments'))
			wp_enqueue_script('comment-reply');

		/* Always have wp_head() just before the closing </head>
		 * tag of your theme, or you will break many plugins, which
		 * generally use this hook to add elements to <head> such
		 * as styles, scripts, and meta tags.
		 */
		wp_enqueue_script("jquery");
		wp_head();
		?>

			<script type="text/javascript"
		src="<?php echo get_stylesheet_directory_uri();?>/js/jquery.tinycarousel.min.js"></script>
	</head>
	<body <?php body_class();?>>
		<div id="wrapper" class="hfeed">
			<div id="header">
				<div id="search-bar">
					<div class="search-content">
						<?php
if ( is_user_logged_in() ) {

global $current_user;
get_currentuserinfo();
echo 'Welcome, <a href="'. str_replace(" ", "", $current_user->user_login) .'">'. $current_user->user_login .'</a>,';
echo'<a href="'.wp_logout_url( get_permalink() ).'" class="client-login">Logout</a>  ';

} else {
						?>
						<?php bloginfo('description');?>
						<a href="<?php echo home_url('/');?>wp-login.php" class="client-login">Client login</a>
						<?php
						}
						?>
					</div>
					<div class="search-form">
						<?php get_search_form();?>
					</div>
				</div>
				<div id="masthead">
					<div id="branding" role="banner">
						<?php $heading_tag = (is_home() || is_front_page()) ? 'h1' : 'div';?>
						<<?php echo $heading_tag;?>
						id="site-title"> <span> <a href="<?php echo home_url('/');?>" title="<?php echo esc_attr(get_bloginfo('name', 'display'));?>" rel="home"><?php bloginfo('name');?></a> </span>
						</<?php echo $heading_tag;?>>
<div id="access" role="navigation">
<?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */?>
						<div class="skip-link screen-reader-text">
							<a href="#content" title="<?php esc_attr_e('Skip to content', 'twentyten');?>"><?php _e('Skip to content', 'twentyten');?></a>
						</div>
						<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */?>
<?php wp_nav_menu(array('container_class' => 'menu-header', 'theme_location' => 'primary'));?>
</div><!-- #access -->
<?php
// Check if this is a post or page, if it has a thumbnail, and if it's a big one
if ( is_singular() && current_theme_supports( 'post-thumbnails' ) &&
has_post_thumbnail( $post->ID ) &&
( /* $src, $width, $height */ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' ) ) &&
$image[1] >= HEADER_IMAGE_WIDTH ) :
// Houston, we have a new header image!
echo get_the_post_thumbnail( $post->ID );
elseif ( get_header_image() ) :
						?><img src="<?php header_image();?>" width="<?php echo HEADER_IMAGE_WIDTH;?>" height="<?php echo HEADER_IMAGE_HEIGHT;?>" alt="" />
						<?php endif;?>
					</div><!-- #branding -->
				</div><!-- #masthead -->
			</div><!-- #header -->
			<div id="main">
