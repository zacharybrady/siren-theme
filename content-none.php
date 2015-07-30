<?php
/**
 * The template for displaying a "No posts found" message.
 *
 * @package WordPress
 * @subpackage Siren
 * @version 3.0
 */
?>

<div class="post error post-error">
	<header class="header post_header post-error_header">
		<h1 class="page-title">
			<?php _e( 'Nothing Found', 'siren' ); ?>
		</h1>
	</header>
	
	<div class="content post_content error_content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
	
			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'siren' ), admin_url( 'post-new.php' ) ); ?></p>
	
		<?php elseif ( is_search() ) : ?>
	
			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with different keywords.', 'siren' ); ?></p>
			<?php siren_post_nav(); ?>
	
		<?php else : ?>
	
			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'siren' ); ?></p>
			<?php get_search_form(); ?>
	
		<?php endif; ?>
	</div>
</div>
