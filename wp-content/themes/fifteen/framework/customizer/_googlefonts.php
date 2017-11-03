<?php
function fifteen_customize_register_fonts( $wp_customize ) {
		$wp_customize->add_section(
	    'fifteen_typo_options',
	    array(
	        'title'     => __('Google Web Fonts','fifteen'),
	        'panel' => 'fifteen_design_panel',
	        'priority'  => 41,
	    )
	);
	
	$font_array = array('HIND','Khula','Open Sans','Droid Sans','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Oswald','Slabo','Lora','Source Sans Pro','Arimo','Bitter','Noto Sans');
	$fonts = array_combine($font_array, $font_array);
	
	$wp_customize->add_setting(
		'fifteen_title_font',
		array(
			'default'=> 'HIND',
			'sanitize_callback' => 'fifteen_sanitize_gfont' 
			)
	);
	
	function fifteen_sanitize_gfont( $input ) {
		if ( in_array($input, array('HIND','Khula','Open Sans','Droid Sans','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Oswald','Slabo','Lora','Source Sans Pro','Arimo','Bitter','Noto Sans') ) )
			return $input;
		else
			return 'fifteen';	
	}
	$wp_customize->add_control(
		'fifteen_title_font',array(
				'label' => __('Title','fifteen'),
				'settings' => 'fifteen_title_font',
				'section'  => 'fifteen_typo_options',
				'type' => 'select',
				'choices' => $fonts,
			)
	);
	
	$wp_customize->add_setting(
		'fifteen_body_font',
			array(	'default'=> 'Open Sans',
					'sanitize_callback' => 'fifteen_sanitize_gfont' )
	);
	
	$wp_customize->add_control(
		'fifteen_body_font',array(
				'label' => __('Body','fifteen'),
				'settings' => 'fifteen_body_font',
				'section'  => 'fifteen_typo_options',
				'type' => 'select',
				'choices' => $fonts
			)
	);
    //Page and Post content Font size start
    $wp_customize->add_setting(
        'fifteen_content_page_post_fontsize_set',
        array(
            'default' => 'default',
            'sanitize_callback' => 'fifteen_sanitize_content_size'
        )
    );
    function fifteen_sanitize_content_size( $input ) {
        if ( in_array($input, array('default','small','medium','large','extra-large') ) )
            return $input;
        else
            return '';
    }

    $wp_customize->add_control(
        'fifteen_content_page_post_fontsize_set', array(
            'settings' => 'fifteen_content_page_post_fontsize_set',
            'label'    => __( 'Page/Post Font Size','fifteen' ),
            'description' => __('Choose your font size. This is only for Posts and Pages. It wont affect your blog page.','fifteen'),
            'section'  => 'fifteen_typo_options',
            'type'     => 'select',
            'choices' => array(
                'default'   => 'Default',
                'small' => 'Small',
                'medium'   => 'Medium',
                'large'  => 'Large',
                'extra-large' => 'Extra Large',
            ),
        )
    );

    //Page and Post content Font size end


    //site title Font size start
    $wp_customize->add_setting(
        'fifteen_content_site_title_fontsize_set',
        array(
            'default' => '42',
            'sanitize_callback' => 'absint',
        )
    );

    $wp_customize->add_control(
        'fifteen_content_site_title_fontsize_set', array(
            'settings' => 'fifteen_content_site_title_fontsize_set',
            'label'    => __( 'Site Title Font Size','fifteen' ),
            'description' => __('Choose your font size. This is only for Site Title.','fifteen'),
            'section'  => 'fifteen_typo_options',
            'type'     => 'number',
        )
    );
    //site title Font size end

    //site description Font size start
    $wp_customize->add_setting(
        'fifteen_content_site_desc_fontsize_set',
        array(
            'default' => '18',
            'sanitize_callback' => 'absint',
        )
    );

    $wp_customize->add_control(
        'fifteen_content_site_desc_fontsize_set', array(
            'settings' => 'fifteen_content_site_desc_fontsize_set',
            'label'    => __( 'Site Description Font Size','fifteen' ),
            'description' => __('Choose your font size. This is only for Site Description.','fifteen'),
            'section'  => 'fifteen_typo_options',
            'type'     => 'number',
        )
    );
    //site description Font size end

}
add_action( 'customize_register', 'fifteen_customize_register_fonts' );