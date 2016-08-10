<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Wp_02
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="header-page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wp_02' ); ?></a>

	<header id="masthead" class="container" role="banner">
		<div class="col-md-1 col-sm-1 col-xs-1"></div>
		<div class="site-header col-md-10 col-sm-10 col-xs-10">
			
			<?php wp_02_branding(); ?>
				<?php wp_02_menus(); ?>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-1"></div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
