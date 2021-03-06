<?php


/**
 * Class Hustle_Settings_Admin
 *
 */
class Hustle_Settings_Admin
{

    /**
     * @var Opt_In$_hustle
     */
    private $_hustle;

    /**
     * @var Hustle_Email_Services $_email_services
     */
    private $_email_services;

    /**
     * Hustle_Settings_Admin constructor.
     * @param Opt_In $hustle
     * @param Hustle_Email_Services $email_services
     */
    function __construct( Opt_In $hustle, Hustle_Email_Services $email_services )
    {
        $this->_hustle = $hustle;
        $this->_email_services = $email_services;
        add_action( 'admin_menu', array( $this, "register_menu" ), 99 );
        add_action("current_screen", array( $this, "set_proper_current_screen" ) );
    }

    /**
     * Register settings menu page
     *
     * @since 2.0
     */
    function register_menu(){
        add_submenu_page( 'inc_optins', __("Hustle Settings", Opt_In::TEXT_DOMAIN) , __("Settings", Opt_In::TEXT_DOMAIN) , "manage_options", 'inc_hustle_settings',  array( $this, "render_page" )  );
    }


    /**
     * Renders Hustle Settings page
     *
     * @since 2.0
     */
    function render_page(){
        $current_user = wp_get_current_user();
        $this->_hustle->render("admin/settings", array(
            "user_name" => ucfirst($current_user->display_name),
            "optins" => Opt_In_Collection::instance()->get_all_optins( null ),
            "enews_sync_state_toggle_nonce" => wp_create_nonce( "optin_sync_toggle" ),
            "enews_sync_setup_nonce" => wp_create_nonce( "optin_sync_setup" ),
            "modules" => Hustle_Collection::instance()->get_all_modules( null ),
            "custom_contents" => array(),
            "modules_state_toggle_nonce" => wp_create_nonce( "hustle_modules_toggle" ),
            "is_e_newsletter_active" => $this->_hustle->get_e_newsletter()->is_plugin_active(),
            "email_services" => $this->_email_services,
            "providers" => $this->_hustle->get_providers()
        ));
    }

    function set_proper_current_screen( $current ){
        global $current_screen;
        if ( !Opt_In_Utils::_is_free() ) {
            $current_screen->id = Opt_In_Utils::clean_current_screen($current_screen->id);
        }
    }
}