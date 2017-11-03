<?php
/*
 * Notifications in customize
 */
require get_template_directory() . '/ti-customizer-notify/class-themeisle-customizer-notify.php';

$config_customizer = array(
	'recommended_plugins'       => array(
		'ih-slider-showcase' => array(
			'recommended' => true,
			/* translators: s - ThemeIsle Companion */
			'description' => sprintf( esc_html__( 'If you want to take full advantage of the options this theme has to offer(like showcases, testimonials, parallax sections, etc) please install and activate %s.', 'fifteen' ), sprintf( '<strong>%s</strong>', 'IH Sliders & Showcases' ) ),
		),
	),
	'recommended_actions'       => array(),
	'recommended_actions_title' => esc_html__( 'Recommended Actions', 'fifteen' ),
	'recommended_plugins_title' => esc_html__( 'Recommended Plugins', 'fifteen' ),
	'install_button_label'      => esc_html__( 'Install and Activate', 'fifteen' ),
	'activate_button_label'     => esc_html__( 'Activate', 'fifteen' ),
	'deactivate_button_label'   => esc_html__( 'Deactivate', 'fifteen' ),
);
Themeisle_Customizer_Notify::init( apply_filters( 'fifteen_customizer_notify_array', $config_customizer ) );