<?php
/**
 * Snippet for displaying information about a speaker
 *
 * @package WordPress
 * @subpackage JFR
 * @version 3.0
 */
?>


<?php if ( is_single() ) : ?>

	<div class="row">
		<div class="col_frth">
			<?php echo get_the_post_thumbnail(); ?> 
		</div>
		<div class="col_thrFrths">
			<!--Name-->
			<h3>
				<?php the_title(); ?>
			</h3>
			
			<!--Title-->
			<p><?php the_field( 'speaker-title' ); ?></p>

			<!--Bio-->
			<p><?php the_field( 'speaker_bio' ); ?></p>
			
			<!--Credits-->
			<div><?php the_field( 'Credits' ); ?></div>
		</div>
	</div>


<?php else : ?>
	
	<!-- PREVIEW OF SPEAKER -->
	<div>
		<!--Image-->
		<a href="<?php the_permalink(); ?>">
			<?php echo get_the_post_thumbnail(get_the_ID(), 'thumbnail'); ?> 
		</a>
		
		<!--Name-->
		<h3>
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h3>
		
		<!--Title-->
		<p><?php the_field( 'speaker-title' ); ?></p>
		
		<!--Credits-->
		<div><?php the_field( 'Credits' ); ?></div>
	</div>

<?php endif; ?>