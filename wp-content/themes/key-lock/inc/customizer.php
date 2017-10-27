<?php
/**
 * Key Lock Theme Customizer
 *
 * @package Key Lock
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function key_lock_customize_register( $wp_customize ) {

		    class Keylock_Customize_Category_Control extends WP_Customize_Control {
        /**
         * Render the control's content.
         * 
         * @since 3.4.0
         */
        public function render_content() {
            $dropdown = wp_dropdown_categories(
                array(
                    'name'              => '_customize-dropdown-categories-' . $this->id,
                    'echo'              => 0,
                    'show_option_none'  => __( '&mdash; Select &mdash;', 'key-lock' ),
                    'option_none_value' => '0',
                    'selected'          => $this->value(),
                )
            );
 
            // Hackily add in the data link parameter.
            $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );
 
            printf(
                '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
                $this->label,
                $dropdown
            );
        }
    }

	
	
	/* 
	 * Create New Section for Slider
	 */ 
	$wp_customize->add_section( 'keylock_slider_section' , array(
			'title'       => __( 'Slider', 'key-lock' ),
    	  	'priority'    => 31
	));
	
	/*
	 * Create New Section for Post
	 */
	$wp_customize->add_section( 'keylock_post_section' , array(
			'title'       => __( 'Post', 'key-lock' ),
    	  	'priority'    => 32
	));
	
	/*
	 * Create New Section for Layout
	 */
	$wp_customize->add_section( 'keylock_layout_section' , array(
			'title'       => __( 'Layout', 'key-lock' ),
    	  	'priority'    => 33
	));
	
	/*
	 * Create New Section for Social Media
	 */
	$wp_customize->add_section( 'keylock_social_section' , array(
			'title'       => __( 'Social Media', 'key-lock' ),
    	  	'priority'    => 34
	));


	
	// Slider - Category
	$wp_customize->add_setting( 'keylock_slider_cat', array('sanitize_callback' => 'key_lock_sanitize_integer'));
	$wp_customize->add_control(
			new Keylock_Customize_Category_Control(
				$wp_customize,
				'keylock_slider_cat',
				array(
					'label'    => __('Select Featured Category', 'key-lock'),
					'settings' => 'keylock_slider_cat',
					'section'  => 'keylock_slider_section',
					'priority'	 => 1
				)
			)
		);
	
	// Slider - Hide
	$wp_customize->add_setting( 'keylock_slider_hide', array( 'default'     => false, 'sanitize_callback' => 'key_lock_sanitize_checkbox'));
	$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'keylock_slider_hide',
				array(
					'label'      => __('Hide Slider', 'key-lock'),
					'section'    => 'keylock_slider_section',
					'settings'   => 'keylock_slider_hide',
					'type'		 => 'checkbox',
					'priority'	 => 2
				)
			)
		);
	
	// Post - Hide Category
	$wp_customize->add_setting( 'keylock_post_cat', array( 'default'     => false, 'sanitize_callback' => 'key_lock_sanitize_checkbox'));
	$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'keylock_post_cat',
				array(
					'label'      => __('Hide Category', 'key-lock'),
					'section'    => 'keylock_post_section',
					'settings'   => 'keylock_post_cat',
					'type'		 => 'checkbox',
					'priority'	 => 1
				)
			)
		);
		
	// Post - Hide Comment
	$wp_customize->add_setting( 'keylock_post_comment', array( 'default'     => false , 'sanitize_callback' => 'key_lock_sanitize_checkbox'));
	$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'keylock_post_comment',
				array(
					'label'      => __('Hide Comment', 'key-lock'),
					'section'    => 'keylock_post_section',
					'settings'   => 'keylock_post_comment',
					'type'		 => 'checkbox',
					'priority'	 => 2
				)
			)
		);
		
	// Post - Hide Tag
	$wp_customize->add_setting( 'keylock_post_tag', array( 'default'     => false, 'sanitize_callback' => 'key_lock_sanitize_checkbox'));
	$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'keylock_post_tag',
				array(
					'label'      => __('Hide Tag', 'key-lock'),
					'section'    => 'keylock_post_section',
					'settings'   => 'keylock_post_tag',
					'type'		 => 'checkbox',
					'priority'	 => 3
				)
			)
		);
	
	// Post - Hide Author Information
	$wp_customize->add_setting( 'keylock_post_authorinfo', array( 'default'     => false, 'sanitize_callback' => 'key_lock_sanitize_checkbox'));
	$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'keylock_post_authorinfo',
				array(
					'label'      => __('Hide Author Information', 'key-lock'),
					'section'    => 'keylock_post_section',
					'settings'   => 'keylock_post_authorinfo',
					'type'		 => 'checkbox',
					'priority'	 => 5
				)
			)
		);
		
	// Post - Hide Related Post
	$wp_customize->add_setting( 'keylock_post_relatedpost', array( 'default'     => false, 'sanitize_callback' => 'key_lock_sanitize_checkbox'));
	$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'keylock_post_relatedpost',
				array(
					'label'      => __('Hide Related Post', 'key-lock'),
					'section'    => 'keylock_post_section',
					'settings'   => 'keylock_post_relatedpost',
					'type'		 => 'checkbox',
					'priority'	 => 6
				)
			)
		);
	      
	// Layout - Sidebar
	$wp_customize->add_setting( 'keylock_layout_sidebar', array( 'default'     => 'right', 'sanitize_callback' => 'key_lock_sanitize_sidebar'));
	$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'keylock_layout_sidebar',
				array(
					'label'      => __('Sidebar', 'key-lock'),
					'section'    => 'keylock_layout_section',
					'settings'   => 'keylock_layout_sidebar',
					'type'		 => 'radio',
					'choices'	 => array( 'right' => __('Right Sidebar', 'key-lock'), 'left' => __('Left Sidebar', 'key-lock') ),
					'priority'	 => 1
				)
			)
		);
		
	// Layout - Column
	$wp_customize->add_setting( 'keylock_layout_column', array( 'default'     => '2column', 'sanitize_callback' => 'key_lock_sanitize_column'));
	$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'keylock_post_tag',
				array(
					'label'      => __('Column(s)', 'key-lock'),
					'section'    => 'keylock_layout_section',
					'settings'   => 'keylock_layout_column',
					'type'		 => 'radio',
					'choices'	 => array( '1column' => __('1 Column', 'key-lock'), '2column' => __('2 Column', 'key-lock') ),
					'priority'	 => 2
				)
			)
		);
	
	//Social Media - Twitter
	$wp_customize->add_setting( 'keylock_social_twitter', array( 'sanitize_callback' => 'key_lock_sanitize_text') );
	$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'keylock_social_twitter',
				array(
					'label'      => __('Twitter', 'key-lock'),
					'section'    => 'keylock_social_section',
					'settings'   => 'keylock_social_twitter',
					'type'		 => 'text',
					'priority'	 => 1
				)
			)
		);
		
	//Social Media - Instagram
	$wp_customize->add_setting( 'keylock_social_instagram', array( 'sanitize_callback' => 'key_lock_sanitize_text') );
	$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'keylock_social_instagram',
				array(
					'label'      => __('Instagram', 'key-lock'),
					'section'    => 'keylock_social_section',
					'settings'   => 'keylock_social_instagram',
					'type'		 => 'text',
					'priority'	 => 2
				)
			)
		);
		
		//Social Media - Twitter
	$wp_customize->add_setting( 'keylock_social_linkedin', array( 'sanitize_callback' => 'key_lock_sanitize_text') );
	$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'keylock_social_linkedin',
				array(
					'label'      => __('Linkedin', 'key-lock'),
					'section'    => 'keylock_social_section',
					'settings'   => 'keylock_social_linkedin',
					'type'		 => 'text',
					'priority'	 => 3
				)
			)
		);
		
			
	
}
add_action( 'customize_register', 'key_lock_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function key_lock_customize_preview_js() {
	wp_enqueue_script( 'key_lock_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'key_lock_customize_preview_js' );


/*
 *  Sanitize	
 */

// For Text 
function key_lock_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

// For Integer (ie. Dropdown)
function key_lock_sanitize_integer( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}

// For Checkbox
function key_lock_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}

// For Sidebar
function key_lock_sanitize_sidebar( $input ) {
    $valid = array(
        'left' => 'Left Sidebar',
        'right' => 'Right Sidebar'
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

// For Sidebar
function key_lock_sanitize_column( $input ) {
    $valid = array(
        '1column' => 'One Column',
        '2column' => 'Two Column'
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}