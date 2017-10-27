<?php
/**
 * Functions for users wanting to upgrade to premium
 *
 * @package Satori
 */

/**
 * Display the upgrade to Premium page & load styles.
 */
function satori_premium_admin_menu() {
    global $satori_upgrade_page;
    $satori_upgrade_page = add_theme_page( __( 'About Satori', 'satori' ), '<span class="premium-link">' . __( 'About Satori', 'satori' ) . '</span>', 'edit_theme_options', 'about_satori', 'satori_render_upgrade_page' );
}
add_action( 'admin_menu', 'satori_premium_admin_menu' );

/**
 * Enqueue admin stylesheet only on upgrade page.
 */
function satori_load_upgrade_page_scripts( $hook ) {
    global $satori_upgrade_page;
    if ( $hook != $satori_upgrade_page )
        return;
    
    wp_enqueue_style( 'satori-upgrade-css', get_template_directory_uri() . '/upgrade/css/upgrade-admin.css' );
    wp_enqueue_script( 'caroufredsel', get_template_directory_uri() . '/js/jquery.carouFredSel-6.2.1-packed.js', array( 'jquery' ), SATORI_THEME_VERSION, true );
    wp_enqueue_script( 'satori-upgrade-js', get_template_directory_uri() . '/upgrade/js/upgrade-custom.js', array( 'jquery' ), SATORI_THEME_VERSION, true );
}
add_action( 'admin_enqueue_scripts', 'satori_load_upgrade_page_scripts' );

/**
 * Render the premium upgrade/order page
 */
function satori_render_upgrade_page() {
	get_template_part( 'upgrade/tpl/upgrade-page' );
}
