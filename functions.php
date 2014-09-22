<?php
/**
 * Siren functions and definitions.
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 *
 * @package WordPress
 * @subpackage Siren
 * @version 3.0
 */



/**
 * Sets up theme defaults and registers the various WordPress features that Siren Supports
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_theme_support() To add support for automatic feed links, post
 * formats, and post thumbnails.
 * @uses register_nav_menu() To add support for a navigation menu.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 *
 * @since Siren 3.0
 *
 * @return void
 */
function siren_setup() {
	/*
	 * Makes Siren available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Thirteen, use a find and
	 * replace to change 'siren' to the name of your theme in all
	 * template files.
	 */
	load_theme_textdomain( 'siren', get_template_directory() . '/languages' );

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// Switches default core markup for search form, comment form, and comments
	// to output valid HTML5.
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

	/*
	 * This theme supports all available post formats by default.
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'
	) );

	// This theme uses wp_nav_menu() in one location (more can be added).
	register_nav_menu( 'primary', __( 'Navigation Menu', 'siren' ) );

	/*
	 * This theme uses a custom image size for featured images, displayed on
	 * "standard" posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 604, 270, false );
	add_image_size( 'square', 200, 200, true );
	add_image_size( 'medium', 600, 400, false );
	add_image_size( 'large', 1200, 800, false );
	

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );


	//Load Developer Functions
	require_once 'functions/developer-functions.php';
}
add_action( 'after_setup_theme', 'siren_setup' );



/**
 * Upload files related to custom post types, meta data, and custom taxonomies.
 *
 *
 * @since Siren 3.0
 *
 * @return false
 */
function siren_custom_architecture() {
	

/*CUSTOM POST TYPES AND META DATA*/
//require_once('functions/post_types/custom-post-sample.php');


}
add_filter( 'after_setup_theme', 'siren_custom_architecture' );


/**
 * Injects everything for Script and Styles into the header.
 * Preferred to enqueue since I can inline certain styles and elements
 *
 * @since Siren 3.0
 *
 * @return void
 */

function inline_head() {
?>

	<meta name="fulljs"  content="<?php echo get_bloginfo('template_directory'); ?>/js/global.min.js">

	<script>
	    <?php require_once('js/enhance.js'); ?>
	</script>

	<!--[if lt IE 9]>
	    <script>
	        <?php require_once(  'js/polyfills/html5.js'); ?>
	    </script>
    <![endif]-->

    <style>
        <?php require_once( 'style.css'); ?>
    </style>

    <!--[if (gt IE 6) & (lte IE 8)]>
		<link rel="stylesheet" href="css/enhanced-ie.css" type="text/css" />
	<![endif]-->

	<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/enhanced.css" type="text/css" media="only all" />

	<!--[if (gt IE 6) & (lte IE 8)]>
	    <script>
	        <?php require_once( 'js/polyfills/respond.js'); ?>
	    </script>
    <![endif]-->

<?php
}
add_action( 'wp_head', 'inline_head', 0 );

/**
 * Registers two widget areas; more can be added.
 *
 * @since Siren 3.0
 *
 * @return void
 */
function siren_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Main Widget Area', 'siren' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Appears in the sidebar.', 'siren' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget_title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Secondary Widget Area', 'siren' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Appears on posts and pages in the sidebar.', 'siren' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget_title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'siren_widgets_init' );



if ( ! function_exists( 'siren_paging_nav' ) ) :
/**
 * Displays navigation to next/previous set of posts when applicable.
 *
 * @since Siren 3.0
 *
 * @return void
 */
function siren_paging_nav() {
	global $wp_query;

	$big = 999999999;
	$total = $wp_query->max_num_pages;

	// Don't print empty markup if there's only one page.
	if ( $total < 2 )
		return;

	// get the current page
     if ( !$current_page = get_query_var('paged') )
          $current_page = 1;
	?>

	<nav class="nav nav-paging" role="navigation" title="Paging Navigation">
		<div class="nav-links">

		<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'siren' ) ); ?></div>
		<?php endif; ?>

		<?php
			echo paginate_links(array(
		        'base'    => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
		        'format'  => '?paged=%#%',
		        'current' => max( 1, get_query_var( 'paged' ) ),
		        'total'   => $wp_query->max_num_pages,
		        'mid_size' => 6,
		        'type' => 'list',
		        'prev_next' => False
		     ));
		?>

		<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'siren' ) ); ?></div>
		<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;



if ( ! function_exists( 'siren_page_nav' ) ) :
/**
 * Displays navigation to next/previous post when applicable.
 *
 * @since Siren 3.0
 *
 * @return void
 */
function siren_post_nav() {
	global $post;

	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>
	<nav class="nav post_nav" role="navigation" title="Post Navigation">
		<div class="nav-links">
			<?php previous_post_link( '%link', _x( '<span class="meta-nav">&larr;</span> %title', 'Previous post link', 'twentythirteen' ) ); ?>
			<?php next_post_link( '%link', _x( '%title <span class="meta-nav">&rarr;</span>', 'Next post link', 'twentythirteen' ) ); ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;



if ( ! function_exists( 'siren_post_meta' ) ) :
/**
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own siren_post_meta() to override in a child theme.
 *
 * @since Siren 3.0
 *
 * @return void
 */
function siren_post_meta() {
	if ( is_sticky() && is_home() && ! is_paged() )
		echo '<span class="featured-post">' . __( 'Sticky', 'siren' ) . '</span>';

	if ( ! has_post_format( 'link' ) && 'post' == get_post_type() )
		siren_post_date();

	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'siren' ) );
	if ( $categories_list ) {
		echo '<span class="categories-links">' . $categories_list . '</span>';
	}

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'siren' ) );
	if ( $tag_list ) {
		echo '<span class="tags-links">' . $tag_list . '</span>';
	}

	// Post author
	if ( 'post' == get_post_type() ) {
		printf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'siren' ), get_the_author() ) ),
			get_the_author()
		);
	}
}
endif;



if ( ! function_exists( 'siren_post_date' ) ) :
/**
 * Prints HTML with date information for current post.
 *
 * Create your own siren_post_date() to override in a child theme.
 *
 * @since Siren 3.0
 *
 * @param boolean $echo Whether to echo the date. Default true.
 * @return string The HTML-formatted post date.
 */
function siren_post_date( $echo = true ) {
	if ( has_post_format( array( 'chat', 'status' ) ) )
		$format_prefix = _x( '%1$s on %2$s', '1: post format name. 2: date', 'siren' );
	else
		$format_prefix = '%2$s';

	$date = sprintf( '<span class="date"><a href="%1$s" title="%2$s" rel="bookmark"><time class="post-date" datetime="%3$s">%4$s</time></a></span>',
		esc_url( get_permalink() ),
		esc_attr( sprintf( __( 'Permalink to %s', 'siren' ), the_title_attribute( 'echo=0' ) ) ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date() ) )
	);

	if ( $echo )
		echo $date;

	return $date;
}
endif;


if ( ! function_exists( 'siren_the_attached_image' ) ) :
/**
 * Prints the attached image with a link to the next attached image.
 *
 * @since Siren 3.0
 *
 * @return void
 */
function siren_the_attached_image() {
	$post                = get_post();
	$attachment_size     = apply_filters( 'siren_attachment_size', array( 724, 724 ) );
	$next_attachment_url = wp_get_attachment_url();

	/**
	 * Grab the IDs of all the image attachments in a gallery so we can get the URL
	 * of the next adjacent image in a gallery, or the first image (if we're
	 * looking at the last image in a gallery), or, in a gallery of one, just the
	 * link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID'
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id )
			$next_attachment_url = get_attachment_link( $next_id );

		// or get the URL of the first image attachment.
		else
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
	}

	printf( '<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>',
		esc_url( $next_attachment_url ),
		the_title_attribute( array( 'echo' => false ) ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;



/**
 * Returns the URL from the post.
 *
 * @uses get_url_in_content() to get the URL in the post meta (if it exists) or
 * the first link found in the post content.
 *
 * Falls back to the post permalink if no URL is found in the post.
 *
 * @since Siren 3.0
 *
 * @return string The Link format URL.
 */
function siren_get_link_url() {
	$content = get_the_content();
	$has_url = get_url_in_content( $content );

	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}



/**
 * Extends the default WordPress body classes.
 *
 * Adds body classes to denote:
 * 1. Single or multiple authors.
 * 2. Active widgets in the sidebar to change the layout and spacing.
 * 3. When avatars are disabled in discussion settings.
 *
 * @since Siren 3.0
 *
 * @param array $classes A list of existing body class values.
 * @return array The filtered body class list.
 */
function siren_body_class( $classes ) {
	if ( ! is_multi_author() )
		$classes[] = 'single-author';

	if ( is_active_sidebar( 'sidebar-2' ) && ! is_attachment() && ! is_404() )
		$classes[] = 'sidebar';

	if ( ! get_option( 'show_avatars' ) )
		$classes[] = 'no-avatars';

	return $classes;
}
add_filter( 'body_class', 'siren_body_class' );



if ( ! function_exists( 'get_featured_posts' ) ) :
/**
 * Getter function for Featured Content Plugin.
 *
 * @since Siren 3.0
 *
 * @return array An array of WP_Post objects.
 */
function get_featured_posts() {
	/**
	 * Filter the featured posts to return in Twenty Fourteen.
	 *
	 * @since Siren 3.0
	 *
	 * @param array|bool $posts Array of featured posts, otherwise false.
	 */
	return apply_filters( 'twentyfourteen_get_featured_posts', array() );
}
endif;



if ( ! function_exists( 'has_featured_posts' ) ) :
/**
 * A helper conditional function that returns a boolean value.
 *
 * @since Siren 3.0
 *
 * @return bool Whether there are featured posts.
 */
function has_featured_posts() {
	return ! is_paged() && (bool) get_featured_posts();
}
endif;



if ( ! function_exists( 'get_the_attached_images' ) ) :
/**
 * Get The Images of a Post
 *
 *
 * @since Siren 2.0
 *
 * @return void
*/

function get_the_attached_images() {
	$post                = get_post();
	$attachment_size     = apply_filters( 'siren_attachment_size', array( 150, 150 ) );

	/**
	 * Grab the IDs of all the image attachments in a gallery so we can get the URL
	 * of the next adjacent image in a gallery, or the first image (if we're
	 * looking at the last image in a gallery), or, in a gallery of one, just the
	 * link to that image file.
	 */
	$attachments = get_posts( array(
		'post_parent'    => $post->ID,
		'fields'		 => 'id',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'ID'
	) );
	foreach($attachments as $image){
		echo wp_get_attachment_image($image->ID, 'thumbnail');
	}

}
endif;