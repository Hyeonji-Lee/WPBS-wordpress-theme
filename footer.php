<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WPBS
 */

?>

	</div><!-- #content -->
	<div class="container-fluid">
		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="container">
				<div class="site-info">
					<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'wpbs' ) ); ?>"><?php
						/* translators: %s: CMS name, i.e. WordPress. */
						printf( esc_html__( 'Proudly powered by %s', 'wpbs' ), 'WordPress' );
					?></a>
					<span class="sep"> | </span>
					<?php
						/* translators: 1: Theme name, 2: Theme author. */
						printf( esc_html__( 'Theme: %1$s by %2$s.', 'wpbs' ), 'wpbs', '<a href="https://automattic.com/">Fezze</a>' );
					?>
				</div><!-- .site-info -->
			</div>
		</footer><!-- #colophon -->
	</div><!-- .container-fluid -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
