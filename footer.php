<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

	</div><!-- #main -->

	<footer id="colophon" role="contentinfo">

			<?php
				/* A sidebar in the footer? Yep. You can can customize
				 * your footer with three columns of widgets.
				 */
				if ( ! is_404() )
					get_sidebar( 'footer' );
			?>
			
			<div id="site-info">
				<ul>	
					<li class="first">&copy; <?php echo date( 'Y' ); ?> Simply Change</li>
					<li>Email: <a href="mailto:info@simplychange.com">info@simplychange.com</a></li>
					<li>Tweet: <a href="http://twitter.com/#!/SimplyChange">@SimplyChange</a></li>
					<li>Facebook: <a href="http://www.facebook.com/SimplyChangeLtd">SimplyChangeLtd</a></li>
					<li class="last">LinkedIn: <a href="http://www.linkedin.com/company/simply-change">simply-change</a></li>
				</ul>
			</div><!-- #site-info -->
			
			
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<script type="text/javascript"
		src="<?php echo get_stylesheet_directory_uri();?>/js/jquery.tinycarousel.min.js"></script>

</body>
</html>