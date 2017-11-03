<?php
function fifteen_customize_register_layouts( $wp_customize ) {
	// Layout and Design
	$wp_customize->add_panel( 'fifteen_design_panel', array(
	    'priority'       => 40,
	    'capability'     => 'edit_theme_options',
	    'title'          => __('Design & Layout','fifteen'),
	) );
	
	$wp_customize->add_section(
	    'fifteen_design_options',
	    array(
	        'title'     => __('Blog Layout','fifteen'),
	        'priority'  => 0,
	        'panel'     => 'fifteen_design_panel'
	    )
	);
	
	
	$wp_customize->add_setting(
		'fifteen_blog_layout',
		array( 'sanitize_callback' => 'fifteen_sanitize_blog_layout' )
	);
	
	function fifteen_sanitize_blog_layout( $input ) {
		if ( in_array($input, array('grid','grid_2_column','grid_3_column','fifteen') ) )
			return $input;
		else 
			return 'fifteen';	
	}
	
	$wp_customize->add_control(
		'fifteen_blog_layout',array(
				'label' => __('Select Layout','fifteen'),
				'settings' => 'fifteen_blog_layout',
				'section'  => 'fifteen_design_options',
				'type' => 'select',
				'choices' => array(
						'fifteen' => __('Default Theme Layout','fifteen'),
						'grid' => __('Basic Blog Layout','fifteen'),
						'grid_2_column' => __('Grid - 2 Column','fifteen'),
						'grid_3_column' => __('Grid - 3 Column','fifteen'),

						
					)
			)
	);
	
	$wp_customize->add_section(
	    'fifteen_sidebar_options',
	    array(
	        'title'     => __('Sidebar Layout','fifteen'),
	        'priority'  => 0,
	        'panel'     => 'fifteen_design_panel'
	    )
	);
	
	$wp_customize->add_setting(
		'fifteen_disable_sidebar',
		array( 'sanitize_callback' => 'fifteen_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'fifteen_disable_sidebar', array(
		    'settings' => 'fifteen_disable_sidebar',
		    'label'    => __( 'Disable Sidebar Everywhere.','fifteen' ),
		    'section'  => 'fifteen_sidebar_options',
		    'type'     => 'checkbox',
		    'default'  => false
		)
	);
	
	$wp_customize->add_setting(
		'fifteen_disable_sidebar_home',
		array( 'sanitize_callback' => 'fifteen_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'fifteen_disable_sidebar_home', array(
		    'settings' => 'fifteen_disable_sidebar_home',
		    'label'    => __( 'Disable Sidebar on Home/Blog.','fifteen' ),
		    'section'  => 'fifteen_sidebar_options',
		    'type'     => 'checkbox',
		    'active_callback' => 'fifteen_show_sidebar_options',
		    'default'  => true
		)
	);
	
	$wp_customize->add_setting(
		'fifteen_disable_sidebar_front',
		array( 'sanitize_callback' => 'fifteen_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'fifteen_disable_sidebar_front', array(
		    'settings' => 'fifteen_disable_sidebar_front',
		    'label'    => __( 'Disable Sidebar on Front Page.','fifteen' ),
		    'section'  => 'fifteen_sidebar_options',
		    'type'     => 'checkbox',
		    'active_callback' => 'fifteen_show_sidebar_options',
		    'default'  => false
		)
	);
	
	
	$wp_customize->add_setting(
		'fifteen_sidebar_width',
		array(
			'default' => 4,
		    'sanitize_callback' => 'fifteen_sanitize_positive_number' )
	);
	
	$wp_customize->add_control(
			'fifteen_sidebar_width', array(
		    'settings' => 'fifteen_sidebar_width',
		    'label'    => __( 'Sidebar Width','fifteen' ),
		    'description' => __('Min: 25%, Default: 33%, Max: 40%','fifteen'),
		    'section'  => 'fifteen_sidebar_options',
		    'type'     => 'range',
		    'active_callback' => 'fifteen_show_sidebar_options',
		    'input_attrs' => array(
		        'min'   => 3,
		        'max'   => 5,
		        'step'  => 1,
		        'class' => 'sidebar-width-range',
		        'style' => 'color: #0a0',
		    ),
		)
	);
	
	/* Active Callback Function */
	function fifteen_show_sidebar_options($control) {
	   
	    $option = $control->manager->get_setting('fifteen_disable_sidebar');
	    return $option->value() == false ;
	    
	}
	
	function fifteen_sanitize_text( $input ) {
	    return wp_kses_post( force_balance_tags( $input ) );
	}
	
	$wp_customize-> add_section(
    'fifteen_custom_footer',
    array(
    	'title'			=> __('Custom Footer Text','fifteen'),
    	'description'	=> __('Enter your Own Copyright Text.','fifteen'),
    	'priority'		=> 11,
    	'panel'			=> 'fifteen_design_panel'
    	)
    );
    
	$wp_customize->add_setting(
	'fifteen_footer_text',
	array(
		'default'		=> 'fifteen',
		'sanitize_callback'	=> 'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control(	 
	       'fifteen_footer_text',
	        array(
	            'section' => 'fifteen_custom_footer',
	            'settings' => 'fifteen_footer_text',
	            'type' => 'text'
	        )
	);
}
add_action( 'customize_register', 'fifteen_customize_register_layouts' );