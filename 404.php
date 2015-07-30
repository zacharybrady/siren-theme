<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Siren
 * @version 3.0
 */

get_header(); ?>



	<section class="section section-main section-error" role="main">
		<header class="header error_header">
			<h1 class="title error_title">
				<?php _e( 'Not found', 'siren' ); ?>
			</h1>
		</header>
		
		<div class="section">
			<div class="content error_content">
				<h2 class="error_subhead">
					<?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'siren' ); ?>
				</h2>
				<p class="error_p">
					<?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'siren' ); ?>
				</p>
				<?php get_search_form(); ?>
			</div>
		</div>
	</section>

	<?php get_sidebar(); ?>

<?php get_footer(); ?>