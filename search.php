<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Siren
 * @version 3.0
 */

get_header(); ?>

	<div class="page-container">
		<section class="section section-main search_section" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="header search_header">
				<h1 class="title search_title"><?php printf( __( 'Search Results for: %s', 'siren' ), get_search_query() ); ?></h1>
			</header>

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>

			<?php siren_paging_nav(); ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</section>


	</div>

<?php get_footer(); ?>