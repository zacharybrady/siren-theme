<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Siren
 * @version 3.0
 */

get_header(); ?>


		<section class="section section-main" role="main">

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>
				<?php siren_post_nav(); ?>
				<?php comments_template(); ?>

			<?php endwhile; ?>

		</section>

		<?php get_sidebar(); ?>

<?php get_footer(); ?>