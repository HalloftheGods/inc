<?php
/**
 * Key Lock functions and definitions
 *
 * @package Key Lock
 */

 
if ( ! function_exists( 'key_lock_add_editor_styles' ) )  :
/**
 * Add editor style for better experience.
 *
 */ 
function key_lock_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
endif; // key_lock_setup
add_action( 'admin_init', 'key_lock_add_editor_styles' );
 
if ( ! function_exists( 'key_lock_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function key_lock_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Key Lock, use a find and replace
	 * to change 'key-lock' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'key-lock', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'key-lock' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'key_lock_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	
	// Add Image Theme Support
	add_theme_support( 'post-thumbnails' );
		add_image_size( 'key_lock_featured-thumb', 720, 450, true );
	
}
endif; // key_lock_setup
add_action( 'after_setup_theme', 'key_lock_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function key_lock_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'key_lock_content_width', 750 );
}
add_action( 'after_setup_theme', 'key_lock_content_width', 0 );


/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function key_lock_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'key-lock' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'key_lock_widgets_init' );

function key_lock_custom_gallery_widget_width( $args, $instance ) {
        return '750';
}
add_filter( 'gallery_widget_content_width', 'key_lock_custom_gallery_widget_width', 10, 3 );

/**
 * Enqueue scripts and styles.
 */
function key_lock_scripts() {
	
	wp_enqueue_style( 'key-lock-style', get_stylesheet_uri() );
	
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css' );
	
	wp_enqueue_style( 'owl-theme', get_template_directory_uri() . '/css/owl.theme.css' );
	
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/css/owl.carousel.css' );
	
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/font-awesome.css' );
	
	wp_enqueue_style( 'key-lock-custom', get_template_directory_uri() . '/css/custom.css' );
	
	wp_enqueue_style( 'key-lock-responsive', get_template_directory_uri() . '/css/responsive.css' );

	wp_enqueue_script( 'key-lock-custom-script', get_template_directory_uri() . '/js/custom.js', array('jquery'), '20150311', true );
	
	wp_enqueue_script( 'owl-slider', get_template_directory_uri() . '/js/owl.carousel.js', array('jquery'), '20150511', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'key_lock_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * Tag Custom
 */
function key_lock_custom_tag_widget($args) {
		$args['largest'] = 14; //largest tag
		$args['smallest'] = 14; //smallest tag
		$args['unit'] = 'px'; //tag font unit
		return $args;
	}
add_filter( 'widget_tag_cloud_args', 'key_lock_custom_tag_widget' );

function key_lock_custom_excerpt_length( $length ) {
	return 26;
}
add_filter( 'excerpt_length', 'key_lock_custom_excerpt_length', 999 );

function key_lock_custom_excerpt_more ($more) {
	return '';
}
add_filter( 'excerpt_more', 'key_lock_custom_excerpt_more', 999 );