<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Write
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">

		<?php get_sidebar( 'footer' ); ?>

		<div class="site-bottom">
			<div class="site-bottom-table">
				<nav id="footer-social-link" class="footer-social-link social-link">
				<?php if ( has_nav_menu( 'footer-social' ) ) : ?>
					<?php wp_nav_menu( array( 'theme_location' => 'footer-social', 'depth' => 1, 'link_before'  => '<span class="screen-reader-text">', 'link_after'  => '</span>' ) ); ?>
				<?php endif; ?>
				</nav><!-- #footer-social-link -->

				<div id="footer-info" class="site-info">
					
						<?php
						 echo "<span>&copy;2015 株式会社ながさき地方卸市場</span>"
						// printf( wp_kses( __( 'Powered by <a href="%1$s">%2$s</a>', 'write' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( __( 'https://wordpress.org/', 'write' ) ), '&copy;2015 株式会社ながさき地方卸市場' ); ?>
					
				</div><!-- .site-info -->
			</div><!-- .site-bottom-table -->
		</div><!-- .site-bottom -->

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
