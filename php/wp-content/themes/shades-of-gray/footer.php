<?php
/**
 * The template for displaying the footer.
 */
?>
	</div><!-- .main -->

	<div id="footer" role="contentinfo">
		<div id="colophon">

<?php
	get_sidebar( 'footer' );
?>

			<div id="site-info">
				&copy; <?php echo date('Y'); ?> <a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<?php bloginfo( 'name' ); ?>
				</a>
			</div><!-- #site-info -->

			<div id="theme-credits">
				Shades of Gray ported by <a href="http://w3wizards.com" title="w3wizards WordPress themes">w3wizards</a>
			</div><!-- #theme-credits -->

		</div><!-- #colophon -->
	</div><!-- #footer -->

</div><!-- .wrapper -->

<?php
	wp_footer();
?>
</body>
</html>
