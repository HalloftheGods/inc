<?php
function fifteen_customize_register_header_heading( $wp_customize ) {
	
	$wp_customize->add_section('fifteen_hero_text', array(
		'title' => __('Header Title & Button','fifteen'),
		'panel' => 'fifteen_header_panel'	
	));
	
	$wp_customize->add_setting( 'fifteen_heading' , array(
	    'sanitize_callback' => 'sanitize_text_field'
	) );
	
	$wp_customize->add_control(
	'fifteen_heading', array(
		'label' => __('Heading','fifteen'),
		'section' => 'fifteen_hero_text',
		'settings' => 'fifteen_heading',
		'type' => 'text',
	) );
	
	$wp_customize->add_setting( 'fifteen_btn' , array(
	    'sanitize_callback' => 'sanitize_text_field'
	) );
	
	$wp_customize->add_control(
	'fifteen_btn', array(
		'label' => __('Button','fifteen'),
		'section' => 'fifteen_hero_text',
		'settings' => 'fifteen_btn',
		'type' => 'text',
	) );
	
	$wp_customize->add_setting( 'fifteen_h_url' , array(
	    'sanitize_callback' => 'esc_url_raw'
	) );
	
	$wp_customize->add_control(
	'fifteen_h_url', array(
		'label' => __('Button URL','fifteen'),
		'section' => 'fifteen_hero_text',
		'settings' => 'fifteen_h_url',
		'type' => 'url',
	) );
	
}
add_action( 'customize_register', 'fifteen_customize_register_header_heading' );