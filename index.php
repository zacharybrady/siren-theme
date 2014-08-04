<?php
/**
 * The main template file.
 *
 *
 * @package WordPress
 * @subpackage Siren
 * @version 3.0
 */

get_header(); ?>

	<div class="page-container">

		<section class="section section-main index_section" role="main">
			<?php if ( have_posts() ) : ?>

				<?php /* The loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', get_post_format() ); ?>
				<?php endwhile; ?>

				<?php siren_paging_nav(); ?>

			<?php else : ?>
				<?php get_template_part( 'content', 'none' ); ?>
			<?php endif; ?>
		</section>

		<?php get_sidebar(); ?>

	</div>

<?php get_footer(); ?>