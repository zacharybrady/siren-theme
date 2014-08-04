<?php
/**
 * The template for displaying posts in the Status post format.
 *
 * @package WordPress
 * @subpackage Siren
 * @version 3.0
 */
?>

<article id="post<?php the_ID(); ?>" <?php post_class(); ?> >
	<div class="content status_content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'siren' ) ); ?>
	</div>
</article>
