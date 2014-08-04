<?php
/**
 * The template for displaying posts in the Aside post format.
 *
 * @package WordPress
 * @subpackage Siren
 * @version 3.0
 */
?>

<article id="post<?php the_ID(); ?>" <?php post_class(); ?> >
	<header class="header post_header post-aside_header">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'siren' ) ); ?>
		<?php 
			if ( is_single() ){
				siren_post_nav();
			} 
		?>

	</div>

	<footer class="footer post_footer post-aside_footer">
		<?php if ( is_single() ) : ?>
			<?php siren_entry_meta(); ?>
			<?php edit_post_link( __( 'Edit', 'siren' ), '<span class="edit-link">', '</span>' ); ?>

			<?php if ( get_the_author_meta( 'description' ) && is_multi_author() ) : ?>
				<?php get_template_part( 'author-bio' ); ?>
			<?php endif; ?>

		<?php else : ?>
			<?php siren_entry_date(); ?>
			<?php edit_post_link( __( 'Edit', 'siren' ), '<span class="edit-link">', '</span>' ); ?>
		<?php endif; ?>
	</footer>
</article>
