<?php
/**
 * The template for displaying Tag pages.
 *
 *
 * @package WordPress
 * @subpackage Siren
 * @version 3.0
 */

get_header(); ?>


	<section class="section section-main archive_section archive-tag_section" role="main">

		<?php if ( have_posts() ) : ?>
			<header class="header archive_header archive-tag_header-">
				<h1 class="title archive_title archive-tag_title">
					<?php printf( __( 'Tag Archives: %s', 'siren' ), single_tag_title( '', false ) ); ?>
				</h1>

				<?php if ( tag_description() ) : // Show an optional tag description ?>
				<div class="meta archive_meta archive-tag_meta"><?php echo tag_description(); ?></div>
				<?php endif; ?>
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


<?php get_footer(); ?>