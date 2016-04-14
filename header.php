<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section
 *
 * @package WordPress
 * @subpackage Siren
 * @version 3.8
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->

<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="icon" type="image/x-icon" href="<?php bloginfo( 'template_url' ); ?>/favicon.ico" />

	<?php wp_head(); ?>
	
</head>

<?php if(isset($_COOKIE['fontloaded-project'])) {  ?>
<body <?php body_class('font-loaded'); ?>>
<?php } else {  ?>
<body <?php body_class(); ?>>
<?php }   ?>
	
<!-- main-header -->
<header class="header" role="banner">

	<!-- main-title -->
	<div class="title">
		<h1 class="title_logo">	
			<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" class="title_link">
				<img src="<?php bloginfo( 'template_url' ); ?>/images/logo.png" alt="<?php bloginfo( 'name' ); ?>" class="title_image" />
			</a>
		</h1>
	</div>
	
	<div class="nav_container">
		<nav class="nav" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav_list', 'menu_id' => 'navMenu') ); ?>
		</nav>
	</div>

</header>

<div class="page_container">