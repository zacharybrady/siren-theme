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
 * @version 3.8
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

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// Switches default core markup for search form, comment form, and comments
	// to output valid HTML5.
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

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
	add_image_size( 'small', 450, 450, false );
	add_image_size( 'medium', 800, 800, false );
	add_image_size( 'large', 1200, 1200, false );
	

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );

}
add_action( 'after_setup_theme', 'siren_setup' );





/**
 * Injects everything for Script and Styles into the header.
 * Preferred to enqueue since I can inline certain styles and elements
 *
 * @since Siren 3.6
 *
 * @return void
 */

function inline_head() {
?>

	<!--[if lt IE 9]>
		<script src="<?php bloginfo( 'template_url' ); ?>/js/polyfills/html5.js"></script>
	    <script>
			document.createElement( "picture" );
	    </script>
    <![endif]-->

<?php if(isset($_COOKIE['fullCSS-project'])) { //If cookie is set load stylesheet normally ?>
	
	<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/style.css" type="text/css" data-test />

<?php } else{ //Else servce critical CSS and use loadCSS
	

	//Critical CSS is Served based on major template groupings
	echo '<style>';

	if(is_front_page() ) { //Home page
		require_once(  'css/critical/home.css');
	}
	else if(is_home() || is_archive() || is_category() || is_tag() || is_search()) { //Blog Archive
		require_once(  'css/critical/archives.css');
	}
	else if(is_single()) { //Single post
		require_once(  'css/critical/post.css');
	}
	else {
		require_once(  'css/critical/page.css');
	}

	echo '</style>';
?>


	<script>
		<?php require_once('js/loading/loadcss.js'); ?>
	    loadCSS( "<?php bloginfo( 'template_url' ); ?>/style.css" );
		<?php require_once('js/loading/cookie.js'); ?>
	    cookie( 'fullCSS-project', "true", 7 );
	</script>
	
<?php } ?>

	<script>
		// JS Enhancment and Async Loading
		<?php require_once('js/loading/loadjs.js'); ?>
		//Test only supports browsers that are IE8 and newer
		if(typeof(document.querySelectorAll) != 'undefined'){
			document.addEventListener("DOMContentLoaded", function() {
	    		loadJS( "<?php echo get_bloginfo('template_directory'); ?>/js/global.min.js" );
	    	});
	    }

	    //Fix for Windows 8
	    if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
		    var msViewportStyle = document.createElement("style");
		    msViewportStyle.appendChild(
		        document.createTextNode(
		            "@-ms-viewport{width:auto!important}"
		        )
		    );
		    document.getElementsByTagName("head")[0].
		        appendChild(msViewportStyle);
		}

    </script>

	<!--[if IE 8]>
	    <script>
	    	loadJS( "<?php echo get_bloginfo('template_directory'); ?>/js/polyfills/respond.js" );
	    </script>
	    <link rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/css/ie8.css" type="text/css" />
	    
    <![endif]-->

<?php
}
add_action( 'wp_head', 'inline_head', 0 );






/**
 * Alters the output of oEmbed shortcodes to include a wrapper for 
 *
 *
 * @since Siren 3.6
 *
 * @return false
 */

function my_embed_oembed_html($html, $url, $attr, $post_id) {
	$html = str_replace("<iframe", '<iframe class="lazyload" ', $html);
	return '<div class="ombed">' . $html . '</div>';
}
add_filter('embed_oembed_html', 'my_embed_oembed_html', 99, 4);






/**
 * Changes length of the post excerpt
 *
 * @since Siren 3.6
 *
 * @return void
 */

function new_excerpt_length($length) {
	return 15;
}
add_filter('excerpt_length', 'new_excerpt_length');




/**
 * Controls the trailing symbol for excerpts
 *
 * @since Siren 3.6
 *
 * @return void
 */

function new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');





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





/**
 * Removes Wordpress logo from login views
 *
 * @since Siren 3.6
 *
 * @return void
 */

function my_login_logo() { ?>
    <style type="text/css">
        body.login div#login h1 a {
            display: none;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );





/**
 * Fixes WP_Title on Homepage
 *
 * @since Siren 3.6
 *
 * @return void
 */

add_filter( 'wp_title', 'baw_hack_wp_title_for_home' );
function baw_hack_wp_title_for_home( $title )
{
  if( empty( $title ) && ( is_home() || is_front_page() ) ) {
    return __( 'Home', 'theme_domain' ) . ' | ' . get_bloginfo( 'description' );
  }
  return $title;
}







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

function dequeue_script() {
   if( !is_admin() && !is_page_template( 'page_templates/checkout.php' )){
		wp_deregister_script('jquery');
		wp_enqueue_script('jquery');
	}
}
add_action( 'wp_print_scripts', 'dequeue_script', 100 );


/* Options Page */
if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => 'Global Content',
        'menu_title'    => 'Global Content',
        'menu_slug'     => 'global-content',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
   
}