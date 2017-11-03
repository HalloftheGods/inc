<?php
function fifteen_customize_register_header( $wp_customize ) {
	//Settings for Header Image
	$wp_customize->add_panel('fifteen_header_panel', array(
		'priority' => 20,
		'title' => __('Header Settings','fifteen')	
	));
	
	$wp_customize->get_section('header_image')->panel = 'fifteen_header_panel';
	$wp_customize->get_section('title_tagline')->panel = 'fifteen_header_panel';
	
	$wp_customize->add_setting( 'fifteen_himg_style' , array(
	    'default'     => 'cover',
	    'sanitize_callback' => 'fifteen_sanitize_himg_style'
	) );
	
	/* Sanitization Function */
	function fifteen_sanitize_himg_style( $input ) {
		if (in_array( $input, array('contain','cover') ) )
			return $input;
		else
			return 'fifteen';	
	}
	
	$wp_customize->add_control(
	'fifteen_himg_style', array(
		'label' => __('Header Image Arrangement','fifteen'),
		'section' => 'header_image',
		'settings' => 'fifteen_himg_style',
		'type' => 'select',
		'choices' => array(
				'contain' => __('Contain','fifteen'),
				'cover' => __('Cover Completely (Recommended)','fifteen'),
				)
	) );
	
	$wp_customize->add_setting( 'fifteen_himg_align' , array(
	    'default'     => 'center',
	    'sanitize_callback' => 'fifteen_sanitize_himg_align'
	) );
	
	/* Sanitization Function */
	function fifteen_sanitize_himg_align( $input ) {
		if (in_array( $input, array('center','left','right') ) )
			return $input;
		else
			return 'fifteen';	
	}
	
	$wp_customize->add_control(
	'fifteen_himg_align', array(
		'label' => __('Header Image Alignment','fifteen'),
		'section' => 'header_image',
		'settings' => 'fifteen_himg_align',
		'type' => 'select',
		'choices' => array(
				'center' => __('Center','fifteen'),
				'left' => __('Left','fifteen'),
				'right' => __('Right','fifteen'),
			)
	) );
	
	$wp_customize->add_setting( 'fifteen_himg_repeat' , array(
	    'default'     => true,
	    'sanitize_callback' => 'fifteen_sanitize_checkbox'
	) );
	
	$wp_customize->add_control(
	'fifteen_himg_repeat', array(
		'label' => __('Repeat Header Image','fifteen'),
		'section' => 'header_image',
		'settings' => 'fifteen_himg_repeat',
		'type' => 'checkbox',
	) );
}
add_action( 'customize_register', 'fifteen_customize_register_header' );