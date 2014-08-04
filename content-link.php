<?php
/**
 * The template for displaying posts in the Link post format.
 *
 * @package WordPress
 * @subpackage Siren
 * @version 3.0
 */
?>

<article id="post<?php the_ID(); ?>" <?php post_class(); ?> >
	<header class="header post_header post-link_header">
		<h1 class="title post_title post-link_title">
			<a href="<?php echo esc_url( siren_get_link_url() ); ?>"><?php the_title(); ?></a>
		</h1>

		<div class="meta post_meta post-link_meta">
			<?php siren_post_date(); ?>
			<?php edit_post_link( __( 'Edit', 'siren' ), '<span class="edit-link">', '</span>' ); ?>
		</div>
	</header>

	<div class="content post_content post-link_content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'siren' ) ); ?>
		<?php 
			if ( is_single() ){
				siren_post_nav();
			} 
		?>
	</div>

	<?php if ( is_single() ) : ?>
	<footer class="footer post_footer post-link_footer">
		<?php siren_post_meta(); ?>
		<?php if ( get_the_author_meta( 'description' ) && is_multi_author() ) : ?>
			<?php get_template_part( 'author-bio' ); ?>
		<?php endif; ?>
	</footer>
	<?php endif; ?>
</article>
