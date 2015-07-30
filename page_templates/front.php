<?php
/*
Template Name: Front
*/
get_header(); ?>


<div class="container">

	<div class="row">

		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<div class="col_8">
			<div class="row">
				<div class="col_12">
					<h3>H3s should be used to determine sections</h3>
					<p>
						<?php the_content(); ?>	
					</p>
				</div>
			</div>

			<div class="row">
				<div class="col_6">
					<h4>H4 is good for subsections</h4>
					<p>Occupy flexitarian incididunt, ad typewriter laborum whatever. Organic mollit chillwave helvetica do lomo, skateboard gluten-free williamsburg nulla. Wolf jean shorts id qui. Sapiente godard master cleanse, fap locavore hella enim proident wolf next level. Seitan pickled terry richardson, gastropub biodiesel put a bird on it reprehenderit adipisicing authentic laboris. Pitchfork Austin est adipisicing, trust fund tattooed nisi. Dolor brunch single-origin coffee, beard duis reprehenderit tattooed ex elit put a bird on it brooklyn 3 wolf moon laborum lo-fi.</p>
				</div>
				<div class="col_6 last">
					<h4>H4 is good for subsections</h4>
					<h5>Other headers can be used elsewhere</h5>
					<h6>As long as they are done with consistency</h6>
				</div>
			</div>

		</div>

		<?php endwhile; ?>

		<div class="col_4 last">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
						

<?php get_footer(); ?>