<?php
/**
 * The template for displaying Author archive pages.
 *
 *
 * @package WordPress
 * @subpackage Siren
 * @version 3.0
 */

get_header(); ?>


	<section class="section section-main archive_section archive-author_section" role="main">
		<?php if ( have_posts() ) : ?>

			<?php
				/* Queue the first post, that way we know
				 * what author we're dealing with (if that is the case).
				 *
				 * We reset this later so we can run the loop
				 * properly with a call to rewind_posts().
				 */
				the_post();
			?>

			<header class="header archive_header archive-author_header">
				<h1 class="title archive_title archive-author_title">
					<?php printf( __( 'All posts by %s', 'siren' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?>
				</h1>
			</header>

			<?php
				/* Since we called the_post() above, we need to
				 * rewind the loop back to the beginning that way
				 * we can run the loop properly, in full.
				 */
				rewind_posts();
			?>


			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>

			<?php siren_paging_nav(); ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
	</section>



<?php get_footer(); ?>