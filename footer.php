<?php
/**
 * The template for displaying the footer.
 *
 *
 * @package WordPress
 * @subpackage Siren
 * @version 3.0
 */
?>
	<?php get_sidebar(); ?>

</div>

<footer id="colophon" class="footer" role="contentinfo">

	<div class="footer_content">
		<?php do_action( 'siren_credits' ); ?>
		<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'siren' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'siren' ); ?>"><?php printf( __( 'Proudly powered by %s', 'siren' ), 'WordPress' ); ?></a>
	</div>
	
</footer>


	<?php wp_footer(); ?>
</body>
</html>