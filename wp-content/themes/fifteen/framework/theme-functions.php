<?php
/*
 * @package , Copyright Rohit Tripathi, inkhive.com
 * This file contains Custom Theme Related Functions.
 */

//Import Admin Modules
require get_template_directory() . '/framework/admin_modules/register_styles.php';
require get_template_directory() . '/framework/admin_modules/register_widgets.php';
require get_template_directory() . '/framework/admin_modules/theme_setup.php';
require get_template_directory() . '/framework/admin_modules/nav_walkers.php';
require get_template_directory() . '/framework/admin_modules/exclude_posts.php';
require get_template_directory() . '/framework/admin_modules/admin_styles.php';
require get_template_directory() . '/framework/admin_modules/section_titles.php';


/*
** Function to check if Sidebar is enabled on Current Page 
*/
function fifteen_load_sidebar() {
	$load_sidebar = true;
	if ( get_theme_mod('fifteen_disable_sidebar') ) :
		$load_sidebar = false;
	elseif( get_theme_mod('fifteen_disable_sidebar_home',true) && is_home() )	:
		$load_sidebar = false;
	elseif( get_theme_mod('fifteen_disable_sidebar_front',true) && is_front_page() ) :
		$load_sidebar = false;
	endif;
	
	return  $load_sidebar;
}

/*
** Add Body Class
*/
function fifteen_body_class( $classes ) {
	
	$sidebar_class_name =  fifteen_load_sidebar() ? "sidebar-enabled" : "sidebar-disabled" ;
    return array_merge( $classes, array( $sidebar_class_name ) );   
}
add_filter( 'body_class', 'fifteen_body_class' );


/*
**	Determining Sidebar and Primary Width
*/
function fifteen_primary_class() {
	$sw = esc_html(get_theme_mod('fifteen_sidebar_width',4));
	$class = "col-md-".(12-$sw);
	
	if ( !fifteen_load_sidebar() ) 
		$class = "col-md-12";
	
	echo $class;
}
add_action('fifteen_primary-width', 'fifteen_primary_class');

function fifteen_secondary_class() {
	$sw = esc_html(get_theme_mod('fifteen_sidebar_width',4));
	$class = "col-md-".$sw;
	
	echo $class;
}
add_action('fifteen_secondary-width', 'fifteen_secondary_class');

/*
**	Helper Function to Convert Colors
*/
function fifteen_hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);
   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   return implode(",", $rgb); // returns the rgb values separated by commas
   //return $rgb; // returns an array with the rgb values
}

function fifteen_fade($color, $val) {
	return "rgba(".fifteen_hex2rgb($color).",". $val.")";
}

//Function to Trim Excerpt Length & more..
function fifteen_excerpt_length( $length ) {
	return 23;
}
add_filter( 'excerpt_length', 'fifteen_excerpt_length', 999 );

function fifteen_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'fifteen_excerpt_more' );



/*
** Function to Get Theme Layout 
*/
function fifteen_get_blog_layout(){
	$ldir = 'framework/layouts/content';
	if (get_theme_mod('fifteen_blog_layout') ) :
		get_template_part( $ldir , get_theme_mod('fifteen_blog_layout') );
	else :
		get_template_part( $ldir ,'fifteen');	
	endif;	
}
add_action('fifteen_blog_layout', 'fifteen_get_blog_layout');

/*
** Function to Set Masonry Class 
*/
function fifteen_set_masonry_class(){
	if ( get_theme_mod('fifteen_blog_layout') != "masonry" ) :
		//DO NOTHING
	else :
		echo "masonry-main";	
	endif;	
}
add_action('fifteen_masonry_class', 'fifteen_set_masonry_class');



/*
** Load Custom Widgets
*/

require get_template_directory() . '/framework/widgets/recent-posts.php';


