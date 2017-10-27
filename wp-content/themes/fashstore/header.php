<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package FashStore
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <?php wp_head(); ?>
    </head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'fashstore' ); ?></a>
<header id="mastheads" class="site-header" role="banner">
    <div class="before-top-header">
        <div class="ak-container clearfix">
            <?php accesspress_ticker_header_customizer(); ?>
            <div class="login-woocommerce">
                <?php if ( is_active_sidebar( 'header-callto-action' ) ): ?>
                    <div class="header-callto">
                        <?php dynamic_sidebar( 'header-callto-action' ) ?>
                    </div>
                <?php endif; ?>
                <!-- Cart Link -->
                <?php 
                    if ( is_woocommerce_activated() ) {
                        echo '<div class="view-cart">';
                            fashstore_store_cart_link();
                        echo '</div>';
                    } 
                ?>
                <?php
                    if ( function_exists( 'YITH_WCWL' ) ) {
                        $fashstore_wishlist_url = YITH_WCWL()->get_wishlist_url();
                ?>
                    <a class="quick-wishlist" href="<?php echo $fashstore_wishlist_url; ?>" title="<?php _e( 'Wishlist', 'fashstore' ) ;?>">
                        <i class="fa fa-heart"></i>
                        <?php echo "(" . yith_wcwl_count_products() . ")"; ?>
                    </a>
                <?php
                    }
                ?>
                <div class="login-woocommerce">
                    <?php 
                        if ( is_user_logged_in() ) {
                            global $current_user;
                            wp_get_current_user();
                    ?>
                            <a href="<?php echo wp_logout_url( home_url() ); ?>" class="logout">
                                <i class="fa fa-unlock-alt"></i>
                            </a>
                    <?php
                        } else {
                    ?>
                            <a href="<?php echo get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ); ?>" class="account">
                                <i class="fa fa-lock"></i>
                            </a>
                    <?php 
                        }
                    ?>
                </div><!-- .login-woocommerce -->
            </div><!-- .login-woocommerce -->
        </div><!-- .ak-container clearfix -->
    </div><!-- .before-top-header -->
    <section class="home_navigation">
        <div class="inner_home">
            <div class="ak-container clearfix">                        
                <div id="site-branding" class="clearfix">
                    <?php accesspress_store_admin_header_image() ?>
                </div><!-- .site-branding -->
                <div class="right-header-main clearfix">
                    <div class="right-header clearfix">
                        <!-- if enabled from customizer -->
                        <div id="toggle">
                            <div class="one"></div>
                            <div class="two"></div>
                            <div class="three"></div>
                        </div>
                        <div class="clearfix"></div>
                        <div id="menu">
                            <?php
                                if (is_page('checkout') && get_theme_mod('hide_navigation_checkout')) {
                                    
                                } else {
                            ?>
                                    <nav id="site-navigation" class="main-navigation" role="navigation">
                                        <a class="menu-toggle">
                                            <?php _e( 'Menu', 'fashstore' ); ?>
                                        </a>
                                        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'fashstore-menu', 'fallback_cb' => 'fashstore_custom_fallback_menu' ) ); ?>
                                    </nav><!-- #site-navigation -->
                            <?php 
                                } 
                            ?>
                        </div><!-- #menu -->
                    </div> <!-- right-header -->
                    
                    <div class="search-wrapper">
                        <?php
                            if ( is_user_logged_in() ) { 
                                global $current_user;
                                wp_get_current_user();
                        ?>
                            <div class="welcome-user">
                                <span class="line">|</span>
                                <?php _e( 'Welcome ', 'fashstore' ); ?>
                                <a href="<?php echo get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ); ?>" class="my-account">
                                    <span class="user-name">
                                        <?php echo $current_user->display_name; ?>
                                    </span>
                                </a>
                                <?php _e( '!', 'fashstore' ); ?>
                            </div>
                        <?php 
                            } 
                        ?>
                        <!-- if enabled from customizer -->
                        <?php 
                            if ( !get_theme_mod( 'hide_header_product_search' ) ) { 
                        ?>
                            <div class="search-form">
                                <?php get_search_form(); ?>
                            </div>
                        <?php 
                            } 
                        ?>
                    </div><!-- .search-wrapper -->

                </div> <!-- right-header-main -->
            </div><!-- .ak-container clearfix -->
        </div><!-- .inner_home -->
    </section><!--Home Navigation-->
</header><!-- #masthead -->
<div id="content" class="site-content">