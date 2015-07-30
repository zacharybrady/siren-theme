<?php
/**
 * The template for displaying posts in the Audio post format.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @version 3.0
 */
?>

<article id="post<?php the_ID(); ?>" <?php post_class(); ?> >
	<header class="header post_header post-audio_header">
		<?php if ( is_single() ) : ?>
			<h1 class="title post_title post-audio_title">
				<?php the_title(); ?>
			</h1>
		<?php else : ?>
		<h1 class="title post-title post-audio_title preview_title">
			<a href="<?php the_permalink(); ?>" rel="bookmark">
				<?php the_title(); ?>
			</a>
		</h1>
		<?php endif; ?>
	</header>

	<div class="content post_content post-audio_content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'siren' ) ); ?>
		<?php 
			if ( is_single() ){
				siren_post_nav();
			} 
		?>
	</div>

	<footer class="footer post_footer post-audio_footer">
		<?php siren_post_meta(); ?>
		<?php edit_post_link( __( 'Edit', 'siren' ), '<span class="edit-link">', '</span>' ); ?>

		<?php if ( is_single() && get_the_author_meta( 'description' ) && is_multi_author() ) : ?>
			<?php get_template_part( 'author-bio' ); ?>
		<?php endif; ?>
	</footer>
</article>
