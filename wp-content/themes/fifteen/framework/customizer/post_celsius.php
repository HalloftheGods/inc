<?php
function fifteen_customize_register_post_celsius( $wp_customize ) {
    //FEATURED POSTS
    $wp_customize->add_panel('fifteen_farea_panel', array(
        'priority' => 35,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __('Featured Posts Area', 'fifteen'),
        'description' => '',
    ));
    $wp_customize->add_section(
        'fifteen_featposts1',
        array(
            'title'     => __('Featured Posts 1','fifteen'),
            'priority'  => 35,
            'panel'     => 'fifteen_farea_panel'
        )
    );

    $wp_customize->add_setting(
        'fifteen_celsius_enable',
        array( 'sanitize_callback' => 'fifteen_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'fifteen_celsius_enable', array(
            'settings' => 'fifteen_celsius_enable',
            'label'    => __( 'Enable Featured Area 1', 'fifteen' ),
            'section'  => 'fifteen_featposts1',
            'type'     => 'checkbox',
        )
    );
    //title
    $wp_customize->add_setting(
        'fifteen_celsius_title',
        array('sanitize_callback' => 'sanitize_text_field')
    );

    $wp_customize->add_control(
        'fifteen_celsius_title', array(
            'setting' => 'fifteen_celsius_title',
            'label' => __('Title for the featured area 1', 'fifteen'),
            'section' => 'fifteen_featposts1',
            'type' => 'text',
        )
    );


    $wp_customize->add_setting(
        'fifteen_celsius_cat',
        array( 'sanitize_callback' => 'fifteen_sanitize_category' )
    );


    $wp_customize->add_control(
        new Hanne_WP_Customize_Category_Control(
            $wp_customize,
            'fifteen_celsius_cat',
            array(
                'label'    => __('Category For Featured Posts','fifteen'),
                'settings' => 'fifteen_celsius_cat',
                'section'  => 'fifteen_featposts1'
            )
        )
    );
}
add_action( 'customize_register', 'fifteen_customize_register_post_celsius' );