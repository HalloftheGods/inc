<?php
/**
 * Theme Functions
 *
 * DO NOT EDIT THIS FILE. THE SKY WILL FALL.
 *
 * Any custom functions should be added to your child theme's
 * functions.php file. This will prevent losing your changes
 * during a theme upgrade.
 *
 * @author   TrueThemes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 */

/**
 * Load the theme textdomain for localizing strings.
 */
load_theme_textdomain( 'tt_theme_framework', dirname( __FILE__ ) . '/languages/' );

/**
 * Ensure that error reporting is turned on if WP_DEBUG is set to true.
 */
if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
    $error_setting = ini_get( 'display_errors' );
    if ( '0' == $error_setting )
        ini_set( 'display_errors', '1' );
}

/**
 * Ensure that error reporting is turned on.
 */
$php_error_setting = ini_get( 'display_errors' );
if ( '1' == $php_error_setting )
    error_reporting( E_ALL & ~E_STRICT & ~E_NOTICE & ~E_WARNING & ~E_DEPRECATED & ~E_USER_NOTICE );

/**
 * Load the TrueThemes framework.
 */
require_once( dirname( __FILE__ ) . '/framework/framework_init.php' );


/*-------------------------------------------------------------- 
Automatic Updates (https://kernl.us/documentation)
--------------------------------------------------------------*/
if(is_admin()){ //do this only in admin
	require 'theme_update_check.php';
	$licence_key = get_option('st_item_purchase_code');
	//uncomment to see license key
	//print_r($licence_key);
	if(!empty($licence_key)){
		$MyUpdateChecker = new ThemeUpdateChecker(
		    'Sterling',
		    'https://kernl.us/api/v1/theme-updates/56f5758f20b0dbfb4eaa1da0/'
		);
		$MyUpdateChecker->purchaseCode = $licence_key;
	}
}
?>