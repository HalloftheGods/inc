<?php
/*
Plugin Name: Elfsight YouTube Gallery
Description: Displaying YouTube videos, channels and playlists on your website is as easy as a piece of cake.
Plugin URI: https://elfsight.com/youtube-channel-plugin-yottie/?utm_source=portals&utm_medium=wordpress-org&utm_campaign=youtube-gallery&utm_content=plugin-site
Version: 1.5.0
Author: Elfsight
Author URI: https://elfsight.com/youtube-channel-plugin-yottie/?utm_source=portals&utm_medium=wordpress-org&utm_campaign=youtube-gallery&utm_content=author-url
*/

if (!defined('ABSPATH')) exit;

require_once('elfsight-portal/elfsight-portal.php');

new ElfsightPortal(array(
        'app_slug' => 'elfsight-youtube-gallery',
        'app_name' => 'YouTube Gallery',
        'app_version' => '1.5.0',

        'plugin_slug' => plugin_basename(__FILE__),
        'plugin_menu_icon' => plugins_url('assets/img/menu-icon.png', __FILE__),
        'plugin_text_domain' => 'elfsight-youtube-gallery',

        'embed_url' => 'https://apps.elfsight.com/embed/yottie/?utm_source=portals&utm_medium=wordpress-org&utm_campaign=youtube-gallery&utm_content=sign-up',
        
        'support_link' => 'https://wordpress.org/support/plugin/elfsight-youtube-gallery'
    )
);

?>