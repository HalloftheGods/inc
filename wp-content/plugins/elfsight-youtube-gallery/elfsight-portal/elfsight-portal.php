<?php

if (!defined('ABSPATH')) exit;

if (!class_exists('PortalDeactivate')) {
    require_once ( dirname( __FILE__ ) . '/includes/deactivate.php' );
}

if (!class_exists('ElfsightPortal')) {
    class ElfsightPortal {
        const portal_version = '1.4.0';

        private $params_action;

        public $portalDeactivate;

        public $app_slug;
        public $app_name;
        public $app_version;

        public $plugin_slug;
        public $plugin_menu_icon;
        public $plugin_text_domain;

        public $embed_url;

        public $support_link;
        public $deactivate_link;

        public $capability;

        public $menu_id;

        public function __construct($config) {
            $this->app_slug = $config['app_slug'];
            $this->app_name = $config['app_name'];
            $this->app_version = $config['app_version'];

            $this->plugin_slug = $config['plugin_slug'];
            $this->plugin_menu_icon = $config['plugin_menu_icon'];
            $this->plugin_text_domain = !empty($config['plugin_text_domain']) ? $config['plugin_text_domain'] : 'elfsight';

            $this->embed_url = $config['embed_url'];

            $this->params_action = 'elfsight_apps_' . str_replace('-', '_', $this->app_slug) . '_params';

            $this->support_link = !empty($config['support_link']) ? $config['support_link'] : '';

            $this->portalDeactivate = new PortalDeactivate($config, $this->deactivate_link);

            add_action('plugin_action_links_' . $this->plugin_slug, array($this, 'addActionLinks'));
            add_action('admin_menu', array($this, 'addAdminMenu'));
            add_action('admin_init', array($this, 'registerAssets'));
            add_action('admin_enqueue_scripts', array($this, 'enqueueAssets'));
            add_action('admin_enqueue_scripts', array($this, 'localizeAssets'));
            add_action('wp_ajax_' . $this->params_action, array($this, 'saveParams'));

            $this->capability = apply_filters('elfsight_apps_capability', 'manage_options');
        }

        public function addActionLinks($links) {
            $this->deactivate_link = add_query_arg(
                array(
                    'action' => 'deactivate',
                    'plugin' => $this->app_slug . '/' . $this->app_slug . '.php',
                    '_wpnonce' => wp_create_nonce( 'deactivate-plugin_' . $this->app_slug . '/' . $this->app_slug . '.php' )
                ),
                admin_url( 'plugins.php' )
            );

            $links['deactivate'] = '<a href="' . $this->deactivate_link . '" id="' . $this->app_slug . '-deactivateLink">Deactivate</a>';
            $links['settings'] = '<a href="' . esc_url(admin_url('admin.php?page=' . $this->app_slug)) . '">Settings</a>';
            $links['more'] = '<a href="https://elfsight.com/?utm_source=portals&utm_medium=wordpress-org&utm_campaign=' . $this->app_slug . '&utm_content=plugins-list" target="_blank">More plugins by Elfsight</a>';

            return $links;
        }

        public function addAdminMenu() {
            $this->menu_id = add_menu_page($this->app_name, $this->app_name, $this->capability, $this->app_slug, array($this, 'getPage'), $this->plugin_menu_icon);
        }

        public function registerAssets() {
            wp_register_style('elfsight-portal', plugins_url('assets/elfsight-portal.css', __FILE__), array(), self::portal_version);
            wp_register_script('elfsight-portal', plugins_url('assets/elfsight-portal.js', __FILE__), array('jquery'), self::portal_version, true);

            wp_register_style('elfsight-portal-deactivate', plugins_url('assets/elfsight-portal-deactivate.css', __FILE__), array(), self::portal_version);
            wp_register_script('elfsight-portal-deactivate', plugins_url('assets/elfsight-portal-deactivate.js', __FILE__), array('jquery'), self::portal_version, true);
        }

        public function enqueueAssets($hook) {
            if ($hook == $this->menu_id) {
                wp_enqueue_style('elfsight-portal');
                wp_enqueue_script('elfsight-portal');
            }

            if ($hook == 'plugins.php') {
                wp_enqueue_style('elfsight-portal-deactivate');
                wp_enqueue_script('elfsight-portal-deactivate');
            }
        }

        public function localizeAssets($hook) {
            if ($hook == $this->menu_id) {
                wp_localize_script('elfsight-portal', 'elfsightPortalAjaxObj', array(
                    'ajaxurl' => admin_url('admin-ajax.php'),
                    'nonce' => wp_create_nonce($this->params_action . '_nonce'),
                    'action' => $this->params_action
                ));
            }
        }

        public function saveParams() {
            if (!wp_verify_nonce($_REQUEST['nonce'], $this->params_action . '_nonce')) {
                exit;
            }

            if (isset($_REQUEST['params'])) {
                update_option($this->params_action, json_encode($_REQUEST['params']));
            }
        }

        public function getPage() {
            $params = json_encode([
                'user' => [
                    'configEmail' => get_option('admin_email')
                ]
            ]);

            if (!empty($params)) {
                $this->embed_url .= (parse_url($this->embed_url, PHP_URL_QUERY) ? '&' : '?') . 'params=' . rawurlencode($params);
            }

            require ( dirname( __FILE__ ) . '/includes/templates/portal.php' );
        }
    }
}