<footer id="colophon" class="site-footer site-footer-social" role="contentinfo">
	
	<div class="site-footer-icons">
        <div class="site-container">
            
            <?php
			if( get_theme_mod( 'satori-social-email' ) ) :
			    echo '<a href="' . esc_url( 'mailto:' . antispambot( get_theme_mod( 'satori-social-email' ), 1 ) ) . '" title="' . __( 'Send Us an Email', 'satori' ) . '" class="footer-social-icon footer-social-email"><i class="fa fa-envelope-o"></i></a>';
			endif;

			if( get_theme_mod( 'satori-social-skype' ) ) :
			    echo '<a href="skype:' . esc_html( get_theme_mod( 'satori-social-skype' ) ) . '?userinfo" title="' . __( 'Contact Us on Skype', 'satori' ) . '" class="footer-social-icon footer-social-skype"><i class="fa fa-skype"></i></a>';
			endif;

			if( get_theme_mod( 'satori-social-linkedin' ) ) :
			    echo '<a href="' . esc_url( get_theme_mod( 'satori-social-linkedin' ) ) . '" target="_blank" title="' . __( 'Find Us on LinkedIn', 'satori' ) . '" class="footer-social-icon footer-social-linkedin"><i class="fa fa-linkedin"></i></a>';
			endif;

			if( get_theme_mod( 'satori-social-tumblr' ) ) :
			    echo '<a href="' . esc_url( get_theme_mod( 'satori-social-tumblr' ) ) . '" target="_blank" title="' . __( 'Find Us on Tumblr', 'satori' ) . '" class="footer-social-icon footer-social-tumblr"><i class="fa fa-tumblr"></i></a>';
			endif;

			if( get_theme_mod( 'satori-social-flickr' ) ) :
			    echo '<a href="' . esc_url( get_theme_mod( 'satori-social-flickr' ) ) . '" target="_blank" title="' . __( 'Find Us on Flickr', 'satori' ) . '" class="footer-social-icon footer-social-flickr"><i class="fa fa-flickr"></i></a>';
			endif; ?>
			
			<?php if ( get_theme_mod( 'satori-website-site-add' ) ) : ?>
	        	<div class="site-footer-social-ad">
	        		<i class="fa fa-map-marker"></i> <?php echo wp_kses_post( get_theme_mod( 'satori-website-site-add', 'Cape Town, South Africa' ) ) ?>
	        	</div>
	        <?php endif; ?>
        	
				<?php printf( __( '<div class="site-footer-social-copy">%1$s Theme, by %2$s', 'satori' ), 'Satori', '<a href="https://www.kairaweb.com/">Kaira</a>' ); ?>
			</div>
            
            <div class="clearboth"></div>
        </div>
    </div>
    
</footer>

<?php if ( get_theme_mod( 'satori-footer-bottombar' ) == 0 ) : ?>
	
	<div class="site-footer-bottom-bar">
	
		<div class="site-container">
			
	        <?php wp_nav_menu( array( 'theme_location' => 'footer-bar','container' => false, 'depth'  => 1 ) ); ?>
                
	    </div>
		
        <div class="clearboth"></div>
	</div>
	
<?php endif; ?>