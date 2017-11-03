<?php
function fifteen_customize_register_header_mail( $wp_customize ) {
	
	$wp_customize->add_section('fifteen_mail', array(
		'title' => __('Email & Phone','fifteen'),
		'panel' => 'fifteen_header_panel'	
	));
	
	$wp_customize->add_setting( 'fifteen_mailid' , array(
	    'sanitize_callback' => 'sanitize_text_field'
	) );
	
	$wp_customize->add_control(
	'fifteen_mailid', array(
		'label' => __('Your Email','fifteen'),
		'section' => 'fifteen_mail',
		'settings' => 'fifteen_mailid',
		'type' => 'email',
	) );
	
	$wp_customize->add_setting( 'fifteen_phone' , array(
	    'sanitize_callback' => 'sanitize_text_field'
	) );
	
	$wp_customize->add_control(
	'fifteen_phone', array(
		'label' => __('Your Phone No.','fifteen'),
		'section' => 'fifteen_mail',
		'settings' => 'fifteen_phone',
		'type' => 'tel',
	) );
	
}
add_action( 'customize_register', 'fifteen_customize_register_header_mail' );