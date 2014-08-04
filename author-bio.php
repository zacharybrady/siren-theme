<?php
/**
 * The template for displaying Author bios.
 *
 * @package WordPress
 * @subpackage Siren
 * @version 3.0
 */
?>

<div class="author">
	<div class="author_avatar">
		<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'siren_author_bio_avatar_size', 74 ) ); ?>
	</div>
	<div class="author_description">
		<h2 class="author_name">
			<?php printf( __( 'About %s', 'siren' ), get_the_author() ); ?>
		</h2>
		<p class="author_bio">
			<?php the_author_meta( 'description' ); ?>
			<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
				<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'siren' ), get_the_author() ); ?>
			</a>
		</p>
	</div>
</div>