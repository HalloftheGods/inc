<?php
/**
 * @package Satori
 */
global $woocommerce; ?>

<header id="masthead" class="site-header site-header-layout-two">
	
	<div class="site-container">
		
		<div class="site-branding">
			
			<?php if ( has_custom_logo() ) : ?>
	            <?php the_custom_logo(); ?>
	        <?php else : ?>
		        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		        <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		    <?php endif; ?>
			
		</div><!-- .site-branding -->
		
		<div class="site-branding-right">
			
			<div class="site-branding-right-meta">
				<?php if ( !get_theme_mod( 'satori-remove-phone' ) ) : ?>
					<?php if ( get_theme_mod( 'satori-website-head-no' ) ) : ?>
						<span class="site-topbar-right-no"><i class="fa fa-phone"></i> <?php echo wp_kses_post( get_theme_mod( 'satori-website-head-no' ) ); ?></span>
					<?php endif; ?>
				<?php endif; ?>
				
				<?php get_template_part( '/templates/social-links' ); ?>
			
				<?php if ( !get_theme_mod( 'satori-header-search' ) ) : ?>
					<div class="menu-search">
				    	<i class="fa fa-search search-btn"></i>
				    </div>
				<?php endif; ?>
			</div>
			
			<nav id="site-navigation" class="main-navigation <?php echo ( get_theme_mod( 'satori-navigation-up-down' ) ) ? sanitize_html_class( get_theme_mod( 'satori-navigation-up-down' ) ) : sanitize_html_class( 'satori-navigation-down' ); ?>" role="navigation">
				<span class="header-menu-button"><i class="fa fa-bars"></i><span><?php echo esc_attr( get_theme_mod( 'satori-header-menu-text', 'menu' ) ); ?></span></span>
				<div id="main-menu" class="main-menu-container">
					<span class="main-menu-close"><i class="fa fa-angle-right"></i><i class="fa fa-angle-left"></i></span>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
					
					<?php if ( satori_is_woocommerce_activated() ) : ?>
						<?php if ( !get_theme_mod( 'satori-header-cart' ) ) : ?>
							<div class="header-cart">
								
					            <a class="header-cart-contents" href="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>" title="<?php _e( 'View your shopping cart', 'satori' ); ?>">
					                <span class="header-cart-amount">
					                    <?php echo sprintf( _n( '%d', '%d', $woocommerce->cart->cart_contents_count, 'satori' ), $woocommerce->cart->cart_contents_count ); ?><span> - <?php echo $woocommerce->cart->get_cart_total(); ?></span>
					                </span>
					                <span class="header-cart-checkout <?php echo ( $woocommerce->cart->cart_contents_count > 0 ) ? sanitize_html_class( 'cart-has-items' ) : ''; ?>">
					                    <i class="fa fa-shopping-cart"></i>
					                </span>
					            </a>
								
							</div>
						<?php endif; ?>
					<?php endif; ?>
					
				</div>
			</nav><!-- #site-navigation -->
			
		</div>
		<div class="clearboth"></div>
		
		<?php if ( !get_theme_mod( 'satori-header-search' ) ) : ?>
		    <div class="search-block">
		        <?php get_search_form(); ?>
		    </div>
		<?php endif; ?>
				
	</div>
		
</header><!-- #masthead -->