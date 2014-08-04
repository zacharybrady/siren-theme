<?php
/**
 * The template for displaying posts in the Quote post format.
 *
 * @package WordPress
 * @subpackage Siren
 * @version 3.0
 */
?>

<article id="post<?php the_ID(); ?>" <?php post_class(); ?> >
	
	<div class="content post_content post-quote_content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'siren' ) ); ?>
		<?php 
			if ( is_single() ){
				siren_paging_nav();
			} 
		?>
	</div>

	<footer class="footer post_footer post-quote_footer">
		<?php siren_post_nav(); ?>

		<?php if ( comments_open() && ! is_single() ) : ?>
			<span class="comments-link">
				<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a comment', 'siren' ) . '</span>', __( 'One comment so far', 'siren' ), __( 'View all % comments', 'siren' ) ); ?>
			</span>
		<?php endif; ?>
		<?php edit_post_link( __( 'Edit', 'siren' ), '<span class="edit-link">', '</span>' ); ?>
	</footer>

</article>
