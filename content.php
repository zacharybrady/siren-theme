<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Siren
 * @version 3.0
 */
?>

<article id="post<?php the_ID(); ?>" <?php post_class(); ?> >
	<header class="header post_header">
		<?php if ( is_single() ) : ?>
			<h1 class="title post_title"><?php the_title(); ?></h1>
		<?php else : ?>
			<h1 class="title post_title preview_title">
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h1>
		<?php endif; ?>

		<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
			<div class="thumbnail post_thumbnail">
				<?php the_post_thumbnail(); ?>
			</div>
		<?php endif; ?>

		<div class="meta post_meta">
			<?php siren_post_meta(); ?>
			<?php edit_post_link( __( 'Edit', 'siren' ), '<span class="edit-link">', '</span>' ); ?>
		</div>
	</header>

	<?php if ( !is_single() ) :  ?>
		<div class="summary post_summary">
			<?php the_excerpt(); ?>
			<a href="<?php the_permalink(); ?>" class="post_readMore" rel="bookmark">Read More</a>
		</div>
	<?php else : ?>
		<div class="content post_content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'siren' ) ); ?>
			<?php siren_post_nav(); ?>
		</div>
	<?php endif; ?>

	<footer class="footer post_footer">
		<?php if ( comments_open() && ! is_single() ) : ?>
			<div class="comments-link">
				<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a comment', 'siren' ) . '</span>', __( 'One comment so far', 'siren' ), __( 'View all % comments', 'siren' ) ); ?>
			</div>
		<?php endif; ?>

		<?php if ( is_single() && get_the_author_meta( 'description' ) && is_multi_author() ) : ?>
			<?php get_template_part( 'author-bio' ); ?>
		<?php endif; ?>
	</footer>
</article>
