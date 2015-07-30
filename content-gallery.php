<?php
/**
 * The template for displaying posts in the Gallery post format.
 *
 * @package WordPress
 * @subpackage Siren
 * @version 3.0
 */
?>

<article id="post<?php the_ID(); ?>" <?php post_class(); ?> >
	<header class="header post_header post-gallery_header">
		<?php if ( is_single() ) : ?>
			<h1 class="title post_title post-gallery_title">
				<?php the_title(); ?>
			</h1>
		<?php else : ?>
			<h1 class="title post-title post-gallery_title preview_title">
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h1>
		<?php endif; ?>
	</header>

	<?php if ( is_single() || ! get_post_gallery() ) : ?>
		<div class="content post_content post-gallery_content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'siren' ) ); ?>
			<?php siren_post_nav(); ?>
		</div>
	<?php else : ?>
		<div class="gallery_preview">
			<?php echo get_post_gallery(); ?>
		</div>
	<?php endif;  ?>


	<footer class="footer post_footer post-gallery_footer">
		<?php siren_post_meta(); ?>

		<?php if ( comments_open() && ! is_single() ) : ?>
			<span class="comments-link">
				<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a comment', 'siren' ) . '</span>', __( 'One comment so far', 'siren' ), __( 'View all % comments', 'siren' ) ); ?>
			</span>
		<?php endif;  ?>
		<?php edit_post_link( __( 'Edit', 'siren' ), '<span class="edit-link">', '</span>' ); ?>

		<?php if ( is_single() && get_the_author_meta( 'description' ) && is_multi_author() ) : ?>
			<?php get_template_part( 'author-bio' ); ?>
		<?php endif; ?>
	</footer>
</article>
