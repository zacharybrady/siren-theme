<?php
/**
 * The template for displaying Category pages.
 *
 * @package WordPress
 * @subpackage Siren
 * @version 3.0
 */

get_header(); ?>


	<section class="section section-main archive_section archive-category_section" role="main">
		<?php if ( have_posts() ) : ?>
			<header class="header archive_header archive-category_header">
				<h1 class="title archive_title archive-category_title">
					<?php printf( __( 'Category Archives: %s', 'siren' ), single_cat_title( '', false ) ); ?>
				</h1>

				<?php if ( category_description() ) : ?>
					<div class="meta archive_meta archive-category_meta">
						<?php echo category_description(); ?>
					</div>
				<?php endif; ?>
			</header>

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>

			<?php siren_paging_nav(); ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
	</section>


<?php get_footer(); ?>