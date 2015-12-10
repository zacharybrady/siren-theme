<?php
/**
 * The template for displaying the footer.
 *
 *
 * @package WordPress
 * @subpackage Siren
 * @version 3.8
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


<!-- FONT LOADING -->
<?php if(!isset($_COOKIE['fontloaded-project'])) { ?>
	<script>
<?php 	
		if(isset($_COOKIE['fullCSS-project'])) { 
			require_once('js/loading/cookie.js');
		} 

		require_once('js/loading/fonts.js');
?>
		var observer = new FontFaceObserver("Avenir Next LT W01 Bold", {
		  weight: 300
		});
		observer.check().then(function () {
			document.getElementsByTagName('body')[0].className += " font-loaded";
		  	cookie( 'fontloaded-project', "true", 7 );
		});		
	</script>
<?php } ?>


	<?php wp_footer(); ?>
</body>
</html>