<?php

$_tests_dir = getenv( 'WP_TESTS_DIR' );
if ( ! $_tests_dir ) {
	$_tests_dir = '/tmp/wordpress-tests-lib';
}

require_once $_tests_dir . '/includes/functions.php';

function _manually_load_plugin() {
	require dirname( dirname( dirname( __FILE__ ) ) ) . '/wpmu-dev-seo.php';
}
tests_add_filter( 'muplugins_loaded', '_manually_load_plugin' );

require $_tests_dir . '/includes/bootstrap.php';

if (!function_exists('localhost_dbg')) {
	function localhost_dbg () {
		die(var_export(func_get_args()));
	}
}
