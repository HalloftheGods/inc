<?php 
if( get_option('w3all_iframe_phpbb_link_yn') == 1 ){ // IFRAME MODE LINKS
	$wp_w3all_forum_folder_wp = get_option( 'w3all_forum_template_wppage' );
	if( $w3all_custom_output_files == 1 ) { // custom files include
	   $file = ABSPATH . 'wp-content/plugins/wp-w3all-config/login_form_include_iframe_mode_links.php';
	 include($file);  
	} else { // default plugin files include
	 include 'login_form_include_iframe_mode_links.php';
	}
} else { // NO IFRAME MODE LINKS
		if( $w3all_custom_output_files == 1 ) { // custom files include
	   $file = ABSPATH . 'wp-content/plugins/wp-w3all-config/login_form_include_noiframe_mode_links.php';
	 include($file);  
	} else { // default plugin files include
	 include 'login_form_include_noiframe_mode_links.php';
	}
}
?>
