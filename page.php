<?php
/**
 * The template for displaying all pages.
 *
 *
 * @package WordPress
 * @subpackage Siren
 * @version 3.0
 */

get_header(); ?>

	<div class="page-container">
		<section class="section section-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="header">
						<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
						<div class="thumbnail">
							<?php the_post_thumbnail(); ?>
						</div>
						<?php endif; ?>

						<h1 class="title"><?php the_title(); ?></h1>
					</header><!-- .entry-header -->

					<div class="content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'siren' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
					</div><!-- .entry-content -->

					<footer class="meta">
						<?php edit_post_link( __( 'Edit', 'siren' ), '<span class="edit-link">', '</span>' ); ?>
					</footer><!-- .entry-meta -->
				</article><!-- #post -->

				<?php comments_template(); ?>
			<?php endwhile; ?>

		</section><!-- #content -->

		<?php get_sidebar(); ?>

	</div><!-- #primary -->

<?php get_footer(); ?>