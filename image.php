<?php
/**
 * The template for displaying image attachments.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Siren
 * @version 3.0
 */

get_header(); ?>


	<section class="section section-main attachment_section" role="main">
		<article id="post<?php the_ID(); ?>" <?php post_class( 'image-attachment' ); ?>>
			<header class="header attachment_header">
				<h1 class="title attachment_title"><?php the_title(); ?></h1>
				<div class="meta attachment_meta">
					<?php
						$published_text = __( '<span class="attachment_meta_text">Published on <time class="entry-date" datetime="%1$s">%2$s</time> in <a href="%3$s" title="Return to %4$s" rel="gallery">%5$s</a></span>', 'siren' );
						$post_title = get_the_title( $post->post_parent );
						if ( empty( $post_title ) || 0 == $post->post_parent )
							$published_text = '<span class="attachment_meta_text"><time class="entry-date" datetime="%1$s">%2$s</time></span>';

						printf( $published_text,
							esc_attr( get_the_date( 'c' ) ),
							esc_html( get_the_date() ),
								esc_url( get_permalink( $post->post_parent ) ),
								esc_attr( strip_tags( $post_title ) ),
								$post_title
						);

						$metadata = wp_get_attachment_metadata();
						printf( '<span class="attachment_meta_text full-size-link"><a href="%1$s" title="%2$s">%3$s (%4$s &times; %5$s)</a></span>',
							esc_url( wp_get_attachment_url() ),
							esc_attr__( 'Link to full-size image', 'siren' ),
							__( 'Full resolution', 'siren' ),
							$metadata['width'],
							$metadata['height']
						);

						edit_post_link( __( 'Edit', 'siren' ), '<span class="edit-link">', '</span>' );
							?>
				</div><!-- .entry-meta -->
			</header><!-- .entry-header -->

			<div class="content attachment_content">
				<nav class="nav-dir attachment_nav-dir" role="navigation">
					<span class="nav_item-previous"><?php previous_image_link( false, __( '<span class="meta-nav">&larr;</span> Previous', 'siren' ) ); ?></span>
					<span class="nav_item-next"><?php next_image_link( false, __( 'Next <span class="meta-nav">&rarr;</span>', 'siren' ) ); ?></span>
				</nav><!-- #image-navigation -->

				<div class="attachment_entry">
					<div class="attachment_image">
						<?php siren_the_attached_image(); ?>

						<?php if ( has_excerpt() ) : ?>
							<div class="caption attachment_caption">
								<?php the_excerpt(); ?>
							</div>
						<?php endif; ?>
					</div><!-- .attachment -->
				</div><!-- .entry-attachment -->

				<?php if ( ! empty( $post->post_content ) ) : ?>
					<div class="desc attachment_desc">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'siren' ), 'after' => '</div>' ) ); ?>
					</div><!-- .entry-description -->
				<?php endif; ?>

			</div><!-- .entry-content -->
		</article><!-- #post -->

		<?php comments_template(); ?>
	</section>

	<?php get_sidebar(); ?>



<?php get_footer(); ?>