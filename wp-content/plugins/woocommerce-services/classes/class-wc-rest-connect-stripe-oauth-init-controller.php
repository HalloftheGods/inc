<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( class_exists( 'WC_REST_Connect_Stripe_Oauth_Init_Controller' ) ) {
	return;
}

class WC_REST_Connect_Stripe_Oauth_Init_Controller extends WC_REST_Connect_Base_Controller {
	protected $rest_base = 'connect/stripe/oauth/init';
	private $stripe;

	public function __construct( WC_Connect_Stripe $stripe, WC_Connect_API_Client $api_client, WC_Connect_Service_Settings_Store $settings_store, WC_Connect_Logger $logger ) {
		parent::__construct( $api_client, $settings_store, $logger );
		$this->stripe = $stripe;
	}

	public function post( $request ) {
		$data = $request->get_json_params();
		$response = $this->stripe->get_oauth_url( $data['returnUrl'] );

		if ( is_wp_error( $response ) ) {
			$response->add_data( array(
				'message' => $response->get_error_message(),
			), $response->get_error_code() );

			$this->logger->debug( $response, __CLASS__ );
			return $response;
		}

		return array(
			'success' => true,
			'oauthUrl' => $response,
		);
	}
}
