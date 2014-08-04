<?php
/**
 *Template for Archives
 *
 * @package WordPress
 * @subpackage Siren
 * @version 3.0
 */

get_header(); ?>

	<section class="section section-main archive_section" role="main">

		<?php if ( have_posts() ) : ?>
		
			<header class="header archive_header">
				<h1 class="title archive_title">
					<?php
						if ( is_day() ) :
							printf( __( 'Daily Archives: %s', 'siren' ), get_the_date() );
						elseif ( is_month() ) :
							printf( __( 'Monthly Archives: %s', 'siren' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'siren' ) ) );
						elseif ( is_year() ) :
							printf( __( 'Yearly Archives: %s', 'siren' ), get_the_date( _x( 'Y', 'yearly archives date format', 'siren' ) ) );
						else :
							_e( 'Archives', 'siren' );
						endif;
					?>
				</h1>
			</header>
		
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', get_post_format() ); ?>
		<?php endwhile; ?>
		
		<?php siren_paging_nav(); ?>
		
		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
	</section>

	<?php get_sidebar(); ?>



<?php get_footer(); ?>