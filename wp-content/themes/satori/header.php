<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Satori
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="hfeed site <?php echo sanitize_html_class( get_theme_mod( 'satori-slider-type' ) ); ?>">

	<?php if ( ! is_front_page() ) : ?>
    
        <?php get_template_part( '/templates/page-banner' ); ?>
        
    <?php endif; ?>
    
	
	<?php if ( is_front_page() ) : ?>
		
		<?php get_template_part( '/templates/slider/homepage-slider' ); ?>
		
	<?php endif; ?>
	
	<?php if ( get_theme_mod( 'satori-header-layout' ) == 'satori-header-layout-two' ) : ?>
		
		<?php get_template_part( '/templates/header/header-layout-two' ); ?>
		
	<?php else : ?>
		
		<?php get_template_part( '/templates/header/header-layout-one' ); ?>
		
	<?php endif; ?>

	<div class="site-container <?php echo ( ! is_active_sidebar( 'sidebar-1' ) ) ? sanitize_html_class( 'content-no-sidebar' ) : sanitize_html_class( 'content-has-sidebar' ); ?>">
