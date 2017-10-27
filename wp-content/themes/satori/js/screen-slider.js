/**
 * Satori Screen Size Slider JS Functionality
 *
 */
( function( $ ) {
    
    jQuery( document ).ready( function() {
        
        satori_calc_screen_slider();
		
    });
    
    $(window).resize(function () {
        
        satori_calc_screen_slider();
        
    }).resize();
    
    $(window).load(function() {
        
        
        
    });
    
    function satori_calc_screen_slider() {
        var screensize = $(window).height();
        var minussize = 129;
        
        if ( $( '.site-header' ).hasClass( 'site-header-layout-two' ) ) {
            minussize = 139;
        }
        
        var slidesize = screensize - minussize;
        
        if ( $( 'body' ).hasClass( 'admin-bar' ) ) {
            slidesize = slidesize - 32;
        }
        
        $( '.home-slider-block, .page-banner' ).height( slidesize );
    }
    
} )( jQuery );