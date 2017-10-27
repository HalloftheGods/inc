<?php
if( get_theme_mod( 'satori-social-email' ) ) :
    echo '<a href="' . esc_url( 'mailto:' . antispambot( get_theme_mod( 'satori-social-email' ), 1 ) ) . '" title="' . __( 'Send Us an Email', 'satori' ) . '" class="header-social-icon social-email"><i class="fa fa-envelope-o"></i></a>';
endif;

if( get_theme_mod( 'satori-social-skype' ) ) :
    echo '<a href="skype:' . esc_html( get_theme_mod( 'satori-social-skype' ) ) . '?userinfo" title="' . __( 'Contact Us on Skype', 'satori' ) . '" class="header-social-icon social-skype"><i class="fa fa-skype"></i></a>';
endif;

if( get_theme_mod( 'satori-social-linkedin' ) ) :
    echo '<a href="' . esc_url( get_theme_mod( 'satori-social-linkedin' ) ) . '" target="_blank" title="' . __( 'Find Us on LinkedIn', 'satori' ) . '" class="header-social-icon social-linkedin"><i class="fa fa-linkedin"></i></a>';
endif;

if( get_theme_mod( 'satori-social-tumblr' ) ) :
    echo '<a href="' . esc_url( get_theme_mod( 'satori-social-tumblr' ) ) . '" target="_blank" title="' . __( 'Find Us on Tumblr', 'satori' ) . '" class="header-social-icon social-tumblr"><i class="fa fa-tumblr"></i></a>';
endif;

if( get_theme_mod( 'satori-social-flickr' ) ) :
    echo '<a href="' . esc_url( get_theme_mod( 'satori-social-flickr' ) ) . '" target="_blank" title="' . __( 'Find Us on Flickr', 'satori' ) . '" class="header-social-icon social-flickr"><i class="fa fa-flickr"></i></a>';
endif;
