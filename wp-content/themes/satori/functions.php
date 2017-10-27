<?php
/**
 * satori functions and definitions
 *
 * @package Satori
 */
define( 'SATORI_THEME_VERSION' , '1.1.02' );

// Upgrade / Go Premium page
require get_template_directory() . '/upgrade/upgrade.php';

// Load WP included scripts
require get_template_directory() . '/includes/inc/template-tags.php';
require get_template_directory() . '/includes/inc/extras.php';
require get_template_directory() . '/includes/inc/jetpack.php';
require get_template_directory() . '/includes/inc/customizer.php';

// Load Customizer Library scripts
require get_template_directory() . '/customizer/customizer-options.php';
require get_template_directory() . '/customizer/customizer-library/customizer-library.php';
require get_template_directory() . '/customizer/styles.php';
require get_template_directory() . '/customizer/mods.php';

// Load TGM plugin class
require_once get_template_directory() . '/includes/inc/class-tgm-plugin-activation.php';
// Add customizer Upgrade class
require_once( trailingslashit( get_template_directory() ) . 'includes/satori-pro/class-customize.php' );

if ( ! function_exists( 'satori_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function satori_setup() {
	
	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 900; /* pixels */
	}

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on satori, use a find and replace
	 * to change 'satori' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'satori', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'satori_blog_img_side', 500, 500, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'satori' ),
        'footer-bar' => __( 'Footer Bar Menu', 'satori' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );
	
	// The custom logo is used for the logo
	add_theme_support( 'custom-logo', array(
		'height'      => 145,
		'width'       => 280,
		'flex-height' => false,
		'flex-width'  => false,
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'satori_custom_background_args', array(
		'default-color' => 'FFFFFF'
	) ) );
	
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
endif; // satori_setup
add_action( 'after_setup_theme', 'satori_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function satori_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'satori' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar(array(
		'name' => __( 'Sidebar Menu', 'satori' ),
		'id' => 'satori-sidebar-menu',
        'description' => __( 'These widgets are placed in the slide out menu under the navigation.', 'satori' )
	));
	
    register_sidebar(array(
		'name' => __( 'Satori Footer Centered', 'satori' ),
		'id' => 'satori-site-footer-centered',
        'description' => __( 'The footer will add widgets centered below each other.', 'satori' )
	));
	
	register_sidebar(array(
		'name' => __( 'Satori Footer Standard', 'satori' ),
		'id' => 'satori-site-footer-standard',
        'description' => __( 'The footer will divide into however many widgets are placed here.', 'satori' )
	));
}
add_action( 'widgets_init', 'satori_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function satori_scripts() {
	wp_enqueue_style( 'satori-body-font-default', '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic', array(), SATORI_THEME_VERSION );
	wp_enqueue_style( 'satori-heading-font-default', '//fonts.googleapis.com/css?family=Kaushan+Script', array(), SATORI_THEME_VERSION );
	
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/includes/font-awesome/css/font-awesome.css', array(), '4.7.0' );
	wp_enqueue_style( 'satori-style', get_stylesheet_uri(), array(), SATORI_THEME_VERSION );
	
	if ( get_theme_mod( 'satori-header-layout' ) == 'satori-header-layout-two' ) :
		wp_enqueue_style( 'satori-header-style-two', get_template_directory_uri().'/templates/css/header-two.css', array(), SATORI_THEME_VERSION );
	else :
		wp_enqueue_style( 'satori-header-style-one', get_template_directory_uri().'/templates/css/header-one.css', array(), SATORI_THEME_VERSION );
	endif;
	
	wp_enqueue_style( 'satori-standard-woocommerce-style', get_template_directory_uri().'/templates/css/woocommerce-standard-style.css', array(), SATORI_THEME_VERSION );
	wp_enqueue_style( 'satori-footer-social-style', get_template_directory_uri().'/templates/css/footer-social.css', array(), SATORI_THEME_VERSION );
	
	wp_enqueue_script( 'caroufredsel', get_template_directory_uri() . '/js/jquery.carouFredSel-6.2.1-packed.js', array('jquery'), SATORI_THEME_VERSION, true );
	
	wp_enqueue_script( 'satori-customjs', get_template_directory_uri() . '/js/custom.js', array('jquery'), SATORI_THEME_VERSION, true );
	
	if ( get_theme_mod( 'satori-slider-size' ) == 'satori-slider-size-screen' ) :
		wp_enqueue_script( 'satori-slider-screen-js', get_template_directory_uri() . '/js/screen-slider.js', array('jquery'), SATORI_THEME_VERSION, true );
	endif;
	
	wp_enqueue_script( 'satori-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), SATORI_THEME_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'satori_scripts' );

/**
 * To maintain backwards compatibility with older versions of WordPress
 */
function satori_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}

/**
 * Add theme stying to the theme content editor
 */
function satori_add_editor_styles() {
    add_editor_style();
}
add_action( 'admin_init', 'satori_add_editor_styles' );

/**
 * Enqueue admin styling.
 */
function satori_load_admin_script() {
    wp_enqueue_style( 'satori-admin-css', get_template_directory_uri() . '/upgrade/css/admin-css.css' );
}
add_action( 'admin_enqueue_scripts', 'satori_load_admin_script' );

/**
 * Enqueue satori custom customizer styling.
 */
function satori_load_customizer_script() {
    wp_enqueue_script( 'satori-customizer-js', get_template_directory_uri() . '/customizer/customizer-library/js/customizer-custom.js', array('jquery'), SATORI_THEME_VERSION, true );
    wp_enqueue_style( 'satori-customizer-css', get_template_directory_uri() . '/customizer/customizer-library/css/customizer.css' );
}
add_action( 'customize_controls_enqueue_scripts', 'satori_load_customizer_script' );

/**
 * Check if WooCommerce exists.
 */
if ( ! function_exists( 'satori_is_woocommerce_activated' ) ) :
	function satori_is_woocommerce_activated() {
	    if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
	}
endif; // satori_is_woocommerce_activated

// If WooCommerce exists include ajax cart
if ( satori_is_woocommerce_activated() ) {
	require get_template_directory() . '/includes/inc/woocommerce-header-inc.php';
}

/**
 * Adjust is_home query if satori-blog-cats is set
 */
function satori_set_blog_queries( $query ) {
    $blog_query_set = '';
    if ( get_theme_mod( 'satori-blog-cats', false ) ) {
        $blog_query_set = get_theme_mod( 'satori-blog-cats' );
    }
    
    if ( $blog_query_set ) {
        // do not alter the query on wp-admin pages and only alter it if it's the main query
        if ( !is_admin() && $query->is_main_query() ){
            if ( is_home() ){
                $query->set( 'cat', esc_attr( $blog_query_set ) );
            }
        }
    }
}
add_action( 'pre_get_posts', 'satori_set_blog_queries' );

/**
 * Display recommended plugins with the TGM class
 */
function satori_register_required_plugins() {
	$plugins = array(
		// The recommended WordPress.org plugins.
		array(
			'name'      => __( 'Easy Theme Upgrade (For upgrading to Satori Premium)', 'satori' ),
			'slug'      => 'easy-theme-and-plugin-upgrades',
			'required'  => false,
		),
		array(
			'name'      => __( 'Page Builder', 'satori' ),
			'slug'      => 'siteorigin-panels',
			'required'  => false,
		),
		array(
			'name'      => __( 'WooCommerce', 'satori' ),
			'slug'      => 'woocommerce',
			'required'  => false,
		),
		array(
			'name'      => __( 'Widgets Bundle', 'satori' ),
			'slug'      => 'siteorigin-panels',
			'required'  => false,
		),
		array(
			'name'      => __( 'Contact Form 7', 'satori' ),
			'slug'      => 'contact-form-7',
			'required'  => false,
		),
		array(
			'name'      => __( 'Breadcrumb NavXT', 'satori' ),
			'slug'      => 'breadcrumb-navxt',
			'required'  => false,
		),
		array(
			'name'      => __( 'Meta Slider', 'satori' ),
			'slug'      => 'ml-slider',
			'required'  => false,
		)
	);
	$config = array(
		'id'           => 'satori',
		'menu'         => 'tgmpa-install-plugins'
	);

	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'satori_register_required_plugins' );

/**
 * Register a custom Post Categories ID column
 */
function satori_edit_cat_columns( $satori_cat_columns ) {
    $satori_cat_in = array( 'cat_id' => 'Category ID <span class="cat_id_note">For the Default Slider</span>' );
    $satori_cat_columns = satori_cat_columns_array_push_after( $satori_cat_columns, $satori_cat_in, 0 );
    return $satori_cat_columns;
}
add_filter( 'manage_edit-category_columns', 'satori_edit_cat_columns' );

/**
 * Print the ID column
 */
function satori_cat_custom_columns( $value, $name, $cat_id ) {
    if( 'cat_id' == $name ) 
        echo $cat_id;
}
add_filter( 'manage_category_custom_column', 'satori_cat_custom_columns', 10, 3 );

/**
 * Insert an element at the beggining of the array
 */
function satori_cat_columns_array_push_after( $src, $satori_cat_in, $pos ) {
    if ( is_int( $pos ) ) {
        $R = array_merge( array_slice( $src, 0, $pos + 1 ), $satori_cat_in, array_slice( $src, $pos + 1 ) );
    } else {
        foreach ( $src as $k => $v ) {
            $R[$k] = $v;
            if ( $k == $pos )
                $R = array_merge( $R, $satori_cat_in );
        }
    }
    return $R;
}
