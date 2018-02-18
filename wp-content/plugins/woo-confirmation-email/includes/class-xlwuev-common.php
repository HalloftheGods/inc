<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class XlWUEV_Common {

	public static $is_new_version_saved = '0';
	public static $is_new_version_activated = false;
	public static $plugin_settings = null;
	public static $wuev_user_login = null;
	public static $wuev_user_email = null;
	public static $wuev_user_id = null;
	public static $wuev_myaccount_page_id = null;

	public static function init() {
		add_action( 'init', array( __CLASS__, 'check_plugin_settings' ), 10 );
		add_filter( 'xlwuev_decode_html_content', array( __CLASS__, 'decode_html_content' ), 1 );
	}

	/*
	 * This function removes backslashes from the textfields and textareas of the plugin settings.
	 */
	public static function decode_html_content( $content ) {
		if ( empty( $content ) ) {
			return '';
		}

		return html_entity_decode( stripslashes( $content ) );
	}

	/*
	 * This function saves all the settings into a property which is used everywhere in public and admin.
	 */
	public static function check_plugin_settings() {
		$plugin_tabs          = XlWUEV_Common::get_default_plugin_settings_tabs();
		$plugin_tabs_settings = array();
		foreach ( $plugin_tabs as $key1 => $value1 ) {
			$is_tab_have_settings = XlWUEV_Common::get_tab_options( $key1 );
			if ( is_array( $is_tab_have_settings ) && count( $is_tab_have_settings ) > 0 ) {
				$plugin_tabs_settings[ $key1 ] = $is_tab_have_settings;
			}
		}
		self::$plugin_settings = $plugin_tabs_settings;

		self::$is_new_version_activated = self::is_new_version_activated();
	}

	/**
	 * This function returns a single field setting of the plugin.
	 *
	 * @param $tab_slug
	 * @param $field_key
	 *
	 * @return mixed
	 */
	public static function get_setting_value( $tab_slug, $field_key ) {
		return XlWUEV_Common::$plugin_settings[ $tab_slug ][ $field_key ];
	}

	/*
	 * This function returns all the default options of the plugin.
	 */
	public static function get_default_plugin_options() {
		$xlwuev_email_body_editor = get_option( 'wc-email-header' );
		if ( '' == $xlwuev_email_body_editor ) {
			$xlwuev_email_body_editor = __( '<html><body><table style="width: 700px; margin: auto; text-align: center; border: 1px solid #eee; font-family: sans-serif;"> <thead> <tr> <td style="color: white; font-size: 33px; background: #1266ae; text-align: center; padding: 26px 0px;">Demo Store Email Verification</td> </tr> </thead> <tbody> <tr> <td style="padding: 22px; font-size: 19px;">Please Verify your email Account</td> </tr> <tr> <td style="padding: 22px; font-size: 19px;">{{wcemailverificationcode}}</td> </tr> </tbody> <tfoot> <tr> <td style="color: #000; padding: 15px; background: #e4e4e4;">{{sitename}}</td> </tr> </tfoot> </table></body></html>', 'wc-email-confirmation' );
		}
		$default_options = array(
			'wuev-general-settings' => array(
				'xlwuev_restrict_user'                            => 1,
				'xlwuev_verification_page'                        => 1,
				'xlwuev_verification_page_id'                     => '',
				'xlwuev_email_error_message_not_verified_outside' => __( 'You need to verify your account before login. {{xlwuev_resend_link}}', 'wc-email-confirmation' ),
				'xlwuev_email_error_message_not_verified_inside'  => __( 'You need to verify your account. {{xlwuev_resend_link}}', 'wc-email-confirmation' ),
				'xlwuev_automatic_user_login'                     => 1,
			),
			'wuev-email-template'   => array(
				'xlwuev_verification_method' => 1,
				'xlwuev_verification_type'   => 1,
				'xlwuev_email_subject'       => __( 'Account Verification', 'wc-email-confirmation' ),
				'xlwuev_email_heading'       => __( 'Please Verify Your Email Account', 'wc-email-confirmation' ),
				'xlwuev_email_body'          => __( 'Please Verify your Email Account by clicking on the following link. {{wcemailverificationcode}}', 'wc-email-confirmation' ),
				'xlwuev_email_header'        => $xlwuev_email_body_editor,
			),
			'wuev-messages'         => array(
				'xlwuev_email_success_message'            => __( 'Your Email is verified!', 'wc-email-confirmation' ),
				'xlwuev_email_registration_message'       => __( 'We sent you a verification email. Check and verify your account. {{xlwuev_resend_link}}', 'wc-email-confirmation' ),
				'xlwuev_email_resend_confirmation'        => __( 'Resend Confirmation Email', 'wc-email-confirmation' ),
				'xlwuev_email_verification_already_done'  => __( 'Your Email is already verified', 'wc-email-confirmation' ),
				'xlwuev_email_new_verification_link'      => __( 'A new verification link is sent. Check email. {{xlwuev_resend_link}}', 'wc-email-confirmation' ),
				'xlwuev_email_new_verification_link_text' => __( 'Click here to verify', 'wc-email-confirmation' ),
			),

		);

		return $default_options;
	}

	/*
	 * This function returns those fields which are bypassed in wpml for conversion in other languages.
	 */
	public static function get_non_icl_settings() {
		$non_icl_keys = array(
			'xlwuev_restrict_user',
			'xlwuev_verification_page',
			'xlwuev_verification_method',
			'xlwuev_verification_type',
			'xlwuev_automatic_user_login',
		);

		return $non_icl_keys;
	}

	/*
	 * This function returns all the tabs of the plugin.
	 */
	public static function get_default_plugin_settings_tabs() {
		$my_plugin_tabs = array(
			'wuev-email-template'    => __( 'Email Template', 'wc-email-confirmation' ),
			'wuev-test-email'        => __( 'Test Verification Email', 'wc-email-confirmation' ),
			'wuev-messages'          => __( 'Verification Messages', 'wc-email-confirmation' ),
			'wuev-bulk-verification' => __( 'Bulk Verification', 'wc-email-confirmation' ),
			'wuev-general-settings'  => __( 'Misc Settings', 'wc-email-confirmation' ),
		);

		return $my_plugin_tabs;
	}

	/*
	 * This function returns the setting of a single tab.
	 */
	public static function get_plugin_saved_settings( $option_key ) {
		return get_option( $option_key );
	}

	/*
	 * This function returns the values of all the fields of a single tab.
	 * It return default values if user has not saved the tab.
	 */
	public static function get_tab_options( $tab_slug ) {
		$tab_options            = array();
		$plugin_default_options = self::get_default_plugin_options();
		if ( isset( $plugin_default_options[ $tab_slug ] ) ) {
			$default_options    = $plugin_default_options[ $tab_slug ];
			$default_options_db = self::get_plugin_saved_settings( $tab_slug );
			if ( '' == $default_options_db ) {
				$tab_options = $default_options;
			} else {
				foreach ( $default_options as $key1 => $value1 ) {
					if ( isset( $default_options_db[ $key1 ] ) && '' != $default_options_db[ $key1 ] ) {
						$tab_options[ $key1 ] = $default_options_db[ $key1 ];
					} else {
						$tab_options[ $key1 ] = $value1;
					}
				}
			}
		}
		/**
		 * Compatibility with WPML
		 */
		if ( function_exists( 'icl_t' ) ) {
			if ( ! is_admin() ) {
				if ( is_array( $tab_options ) && count( $tab_options ) > 0 ) {
					$temp_tab_options = array();
					foreach ( $tab_options as $key1 => $value1 ) {
						if ( in_array( $key1, self::get_non_icl_settings() ) ) {
							$temp_tab_options[ $key1 ] = $value1;
						} else {
							$temp_tab_options[ $key1 ] = icl_t( 'admin_texts_' . $tab_slug, '[' . $tab_slug . ']' . $key1, $value1 );
						}
					}
					$tab_options = $temp_tab_options;
				}
			}
		}

		return $tab_options;
	}

	public static function is_new_version_activated() {
		return get_option( 'new_plugin_activated' );
	}

	public static function is_new_version_saved() {
		return get_option( 'is_new_version_saved', '0' );
	}

	public static function update_is_new_version() {
		update_option( 'is_new_version_saved', '1', false );
	}

	/**
	 * Maybe try and parse content to found the xlwuev merge tags
	 * And converts them to the standard wp shortcode way
	 * So that it can be used as do_shortcode in future
	 *
	 * @param string $content
	 *
	 * @return mixed|string
	 */
	public static function maybe_parse_merge_tags( $content = '' ) {
		$get_all      = self::get_all_tags();
		$get_all_tags = wp_list_pluck( $get_all, 'tag' );
		//iterating over all the merge tags
		if ( $get_all_tags && is_array( $get_all_tags ) && count( $get_all_tags ) > 0 ) {
			foreach ( $get_all_tags as $tag ) {
				$matches = array();
				$re      = sprintf( '/\{{%s(.*?)\}}/', $tag );
				$str     = $content;

				//trying to find match w.r.t current tag
				preg_match_all( $re, $str, $matches );


				//if match found
				if ( $matches && is_array( $matches ) && count( $matches ) > 0 ) {


					//iterate over the found matches
					foreach ( $matches[0] as $exact_match ) {

						//preserve old match
						$old_match = $exact_match;


						$single = str_replace( '{{', '', $old_match );
						$single = str_replace( '}}', '', $single );


						$get_parsed_value = call_user_func( array( __CLASS__, $single ) );
						$content          = str_replace( $old_match, $get_parsed_value, $content );
					}
				}
			}
		}

		return $content;
	}

	public static function get_all_tags() {
		$tags = array(
			array(
				'name' => __( 'User login', 'wc-email-confirmation' ),
				'tag'  => 'xlwuev_user_login',
			),
			array(
				'name' => __( 'User email', 'wc-email-confirmation' ),
				'tag'  => 'xlwuev_user_email',
			),
			array(
				'name' => __( 'Verification link', 'wc-email-confirmation' ),
				'tag'  => 'xlwuev_user_verification_link',
			),
			array(
				'name' => __( 'Resend link', 'wc-email-confirmation' ),
				'tag'  => 'xlwuev_resend_link',
			),
			array(
				'name' => __( 'Verification link', 'wc-email-confirmation' ),
				'tag'  => 'wcemailverificationcode',
			),
			array(
				'name' => __( 'Site Myaccount Page', 'wc-email-confirmation' ),
				'tag'  => 'xlwuev_site_login_link',
			),
			array(
				'name' => __( 'Website Name', 'wc-email-confirmation' ),
				'tag'  => 'sitename',
			),
			array(
				'name' => __( 'Website Name with link', 'wc-email-confirmation' ),
				'tag'  => 'sitename_with_link',
			),
		);

		return $tags;
	}

	/*
	 * Mergetag callback for showing sitename.
	 */
	protected static function sitename() {
		return get_bloginfo( 'name' );
	}

	/*
	 * Mergetag callback for showing sitename with link.
	 */
	protected static function sitename_with_link() {
		$hyperlink = site_url();
		$link_text = __( get_bloginfo( 'name' ), 'wc-email-confirmation' );
		$link      = '<a href="' . $hyperlink . '">' . $link_text . '</a>';

		return $link;
	}

	/*
	 * Mergetag callback for showing myaccount page with link.
	 */
	protected static function xlwuev_site_login_link() {
		$hyperlink = get_permalink( get_option( 'woocommerce_myaccount_page_id' ) );
		$link_text = __( 'Login', 'wc-email-confirmation' );
		$link      = '<a href="' . $hyperlink . '">' . $link_text . '</a>';

		return $link;
	}

	protected static function xlwuev_user_login() {
		return self::$wuev_user_login;
	}

	protected static function xlwuev_user_email() {
		return self::$wuev_user_email;
	}

	/*
	 * Mergetag callback for showing verification link.
	 */
	protected static function xlwuev_user_verification_link() {
		$secret      = get_user_meta( self::$wuev_user_id, 'wcemailverifiedcode', true );
		$create_link = $secret . '@' . self::$wuev_user_id;
		$hyperlink   = add_query_arg( array( 'woo_confirmation_verify' => base64_encode( $create_link ) ), get_the_permalink( self::$wuev_myaccount_page_id ) );
		$link_text   = XlWUEV_Common::maybe_parse_merge_tags( XlWUEV_Common::get_setting_value( 'wuev-messages', 'xlwuev_email_new_verification_link_text' ) );
		$link        = '<a href="' . $hyperlink . '">' . $link_text . '</a>';

		return $link;
	}

	/*
	 * Mergetag callback for showing verification link.
	 */
	protected static function wcemailverificationcode() {
		$secret      = get_user_meta( self::$wuev_user_id, 'wcemailverifiedcode', true );
		$create_link = $secret . '@' . self::$wuev_user_id;
		$hyperlink   = add_query_arg( array( 'woo_confirmation_verify' => base64_encode( $create_link ) ), get_the_permalink( self::$wuev_myaccount_page_id ) );
		$link_text   = XlWUEV_Common::maybe_parse_merge_tags( XlWUEV_Common::get_setting_value( 'wuev-messages', 'xlwuev_email_new_verification_link_text' ) );
		$link        = '<a href="' . $hyperlink . '">' . $link_text . '</a>';

		return $link;
	}

	/*
	 * Mergetag callback for showing resend verification link.
	 */
	protected static function xlwuev_resend_link() {
		$link                        = add_query_arg( array( 'wc_confirmation_resend' => base64_encode( self::$wuev_user_id ) ), get_the_permalink( self::$wuev_myaccount_page_id ) );
		$resend_confirmation_message = self::get_setting_value( 'wuev-messages', 'xlwuev_email_resend_confirmation' );
		$xlwuev_resend_link          = '<a href="' . $link . '">' . $resend_confirmation_message . '</a>';

		return $xlwuev_resend_link;
	}
}