<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * You can add an optional custom header image to header.php like so ...

	<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
	</a>
	<?php endif; // End header image check. ?>

 *
 * @package 
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses fifteen_header_style()
 * @uses fifteen_admin_header_style()
 * @uses fifteen_admin_header_image()
 */
function fifteen_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'fifteen_custom_header_args', array(
		'default-text-color'     => '#000',
		'default-image'			 => get_template_directory_uri()."/assets/images/header.jpg",
		'width'  				 => 1920,
		'height'				 => 667,
		'flex-height'            => true,
		'wp-head-callback'       => 'fifteen_header_style',
	) ) );
    register_default_headers( array(
            'default-image'    => array(
                'url'            => '%s/assets/images/header.jpg',
                'thumbnail_url'    => '%s/assets/images/header.jpg',
                'description'    => __('Default Header Image', 'fifteen')
            )
        )
    );
}
add_action( 'after_setup_theme', 'fifteen_custom_header_setup' );

if ( ! function_exists( 'fifteen_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see fifteen_custom_header_setup().
 */
function fifteen_header_style() {
	?>
	<style>
	#masthead {
			background-size: <?php echo esc_html(get_theme_mod('fifteen_himg_style','cover')); ?>;
			background-position-x: <?php echo esc_html(get_theme_mod('fifteen_himg_align','center')); ?>;
			background-repeat: <?php echo  esc_html(get_theme_mod('fifteen_himg_repeat')) ? "repeat" : "no-repeat" ?>;
		}
	</style>	
	<?php
}
endif; // fifteen_header_style