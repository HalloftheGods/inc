<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Key Lock
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
<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</div><!-- .site-branding -->
		<a href="#" class="responsive-menu"><i class="fa fa-bars"></i></a>
		<nav id="site-navigations" class="main-navigation " role="navigation">
			
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'container_class' => 'container-menu', 'menu_class' => 'nav-menu', 'depth' => 2 ) ); ?>
			<div class="search-top"><i class="fa fa-search"></i></div>
			
			<div class='search-form'>
				<?php get_search_form(); ?>
			</div>
			
		</nav><!-- #site-navigation -->

	</header><!-- #masthead -->
	
	<?php 
		if (is_home() && !get_theme_mod ('keylock_slider_hide')) :
			get_template_part('featured'); 
		endif;
	?>
	
	<div id="content" class="site-content container">
		<div class="row">