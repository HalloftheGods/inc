<?php
/**
 * Functions used to implement options
 *
 * @package Customizer Library Satori
 */

/**
 * Enqueue Google Fonts Example
 */
function customizer_satori_fonts() {

	// Font options
	$fonts = array(
		get_theme_mod( 'satori-body-font', customizer_library_get_default( 'satori-body-font' ) ),
		get_theme_mod( 'satori-heading-font', customizer_library_get_default( 'satori-heading-font' ) )
	);

	$font_uri = customizer_library_get_google_font_uri( $fonts );

	// Load Google Fonts
	wp_enqueue_style( 'customizer_satori_fonts', $font_uri, array(), null, 'screen' );

}
add_action( 'wp_enqueue_scripts', 'customizer_satori_fonts' );
