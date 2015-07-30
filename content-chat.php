<?php
/**
 * The template for displaying posts in the Chat post format.
 *
 * @package WordPress
 * @subpackage Siren
 * @version 3.0
 */
?>

<article id="post<?php the_ID(); ?>" <?php post_class(); ?> >
	<header class="header post_header post-chat_header">
		<?php if ( is_single() ) : ?>
			<h1 class="title post_title post-chat_title">
				<?php the_title(); ?>
			</h1>
		<?php else : ?>
			<h1 class="title post-title post-chat_title preview_title">
				<a href="<?php the_permalink(); ?>" rel="bookmark">
					<?php the_title(); ?>
				</a>
			</h1>
		<?php endif; ?>
	</header>

	<div class="content post_content post-chat_content">
		<?php the_content(); ?>
		<?php 
			if ( is_single() ){
				siren_post_nav();
			} 
		?>
	</div>

	<footer class="footer post_footer post-chat_footer">
		<?php siren_post_meta(); ?>
		<?php edit_post_link( __( 'Edit', 'siren' ), '<span class="edit-link">', '</span>' ); ?>
	</footer>
</article>
