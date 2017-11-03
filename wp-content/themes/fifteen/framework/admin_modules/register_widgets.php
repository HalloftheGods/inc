<?php
/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function fifteen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'fifteen' ),
		'id'            => 'sidebar-1',
		'description'   => 'fifteen',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title title-font">',
		'after_title'   => '</h3><style> .search-field {margin-top: 20px;} #search-2 h3.widget-title{margin: 0px;}</style>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer 1', 'fifteen' ), /* Primary Sidebar for Everywhere else */
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title title-font">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'fifteen' ), /* Primary Sidebar for Everywhere else */
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title title-font">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'fifteen' ), /* Primary Sidebar for Everywhere else */
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title title-font">',
		'after_title'   => '</h3>',
	) );
	
}
add_action( 'widgets_init', 'fifteen_widgets_init' );