<?php
//featured area 2
function fifteen_customize_register_post_degree( $wp_customize ) {
    $wp_customize->add_section(
        'fifteen_featposts2',
        array(
            'title'     => __('Featured Posts 2','fifteen'),
            'priority'  => 35,
            'panel'     => 'fifteen_farea_panel'
        )
    );
$wp_customize->add_setting(
    'fifteen_degree_enable',
    array( 'sanitize_callback' => 'fifteen_sanitize_checkbox' )
);

$wp_customize->add_control(
    'fifteen_degree_enable', array(
        'settings' => 'fifteen_degree_enable',
        'label'    => __( 'Enable Featured Area 2', 'fifteen' ),
        'section'  => 'fifteen_featposts2',
        'type'     => 'checkbox',
    )
);
//title
$wp_customize->add_setting(
    'fifteen_degree_title',
    array('sanitize_callback' => 'sanitize_text_field')
);

$wp_customize->add_control(
    'fifteen_degree_title', array(
        'setting' => 'fifteen_degree_title',
        'label' => __('Title for the featured area 2', 'fifteen'),
        'section' => 'fifteen_featposts2',
        'type' => 'text',
    )
);


$wp_customize->add_setting(
    'fifteen_degree_cat',
    array( 'sanitize_callback' => 'fifteen_sanitize_category' )
);


$wp_customize->add_control(
    new Hanne_WP_Customize_Category_Control(
        $wp_customize,
        'fifteen_degree_cat',
        array(
            'label'    => __('Category For Featured Posts','fifteen'),
            'settings' => 'fifteen_degree_cat',
            'section'  => 'fifteen_featposts2'
        )
    )
);
}
add_action( 'customize_register', 'fifteen_customize_register_post_degree' );