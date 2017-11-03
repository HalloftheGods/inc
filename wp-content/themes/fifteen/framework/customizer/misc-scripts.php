<?php
function fifteen_customize_register_misc( $wp_customize ) {
	$wp_customize->add_section(
	    'fifteen_sec_upgrade',
	    array(
	        'title'     => __('fifteen - Help & Support','fifteen'),
	        'priority'  => 45,
	    )
	);
	
	$wp_customize->add_setting(
			'fifteen_upgrade',
			array( 'sanitize_callback' => 'esc_textarea' )
		);
			
	$wp_customize->add_control(
	    new Hanne_WP_Customize_Upgrade_Control(
	        $wp_customize,
	        'fifteen_upgrade',
	        array(
	            'label' => __('Free Email Support','fifteen'),
	            'description' => __('Currently We are Offering Free Email Support with our theme. If you have any queries or require help please <a href="https://inkhive.com/product/fifteen/">Read our FAQs</a> and if your problem is still not solved then contact us. <br><br>','fifteen'),
	            'section' => 'fifteen_sec_upgrade',
	            'settings' => 'fifteen_upgrade',			       
	        )
		)
	);
}
add_action( 'customize_register', 'fifteen_customize_register_misc' );