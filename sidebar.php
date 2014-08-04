<?php
/**
 * The sidebar containing the secondary widget area, displays on posts and pages.
 *
 * If no active widgets in this sidebar, it will be hidden completely.
 *
 * @package WordPress
 * @subpackage Siren
 * @version 3.0
 */
?>
<aside class="sidebar">
	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<div class="sidebar_container" role="complementary">
			<div class="widget">
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
			</div>
		</div>
	<?php endif; ?>
	
	<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
		<div class="sidebar_container" role="complementary">
			<div class="widget">
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
			</div>
		</div>
	<?php endif; ?></aside>
</aside>