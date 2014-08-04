<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage Siren
 * @version 3.0
 */


if ( post_password_required() )
	return;
?>

<div class="comments_area">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments_title">
			<?php
				printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'siren' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>

		<ol class="comment_list">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 74,
				) );
			?>
		</ol>

		<?php
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
		?>
		<nav class="nav comment_nav" role="navigation">
			<div class="nav-previous">
				<?php previous_comments_link( __( '&larr; Older Comments', 'siren' ) ); ?>
			</div>
			<div class="nav-next">
				<?php next_comments_link( __( 'Newer Comments &rarr;', 'siren' ) ); ?>
			</div>
		</nav>
		<?php endif; ?>

		<?php if ( ! comments_open() && get_comments_number() ) : ?>
			<p class="comments_none">
				<?php _e( 'Comments are closed.' , 'siren' ); ?>
			</p>
		<?php endif; ?>

	<?php endif; ?>

	<?php 

		$args = array('comment_notes_after' => '');

		comment_form($args); 

	?>

</div>