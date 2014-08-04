<?php
/**
 * An example of a Custom taxonomy archive
 *
 *
 * @package WordPress
 * @subpackage Siren
 * @version 3.0
 */

get_header(); ?>

	<div class="page-container">
		<section class="section section-main" role="main">

		<?php if ( have_posts() ) : ?>
			<header class="header header-archive">
				<h1 class="title title-archive"><?php printf( __( '%s Archives', 'siren' ), '<span>' . get_post_format_string( get_post_format() ) . '</span>' ); ?></h1>
			</header><!-- .archive-header -->

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