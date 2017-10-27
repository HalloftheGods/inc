/**
 * Customizer Custom Functionality
 *
 */
( function( $ ) {
    
    $( window ).load( function() {
        
        //Show / Hide Color selector for slider setting
        var the_slider_select_value = $( '#customize-control-satori-slider-type select' ).val();
        ustore_customizer_slider_check( the_slider_select_value );
        
        $( '#customize-control-satori-slider-type select' ).on( 'change', function() {
            var slider_select_value = $( this ).val();
            ustore_customizer_slider_check( slider_select_value );
        } );
        
        function ustore_customizer_slider_check( slider_select_value ) {
            if ( slider_select_value == 'satori-slider-default' ) {
                $( '#sub-accordion-section-satori-site-layout-section-slider #customize-control-satori-meta-slider-shortcode' ).hide();
                $( '#sub-accordion-section-satori-site-layout-section-slider #customize-control-satori-slider-cats' ).show();
                $( '#sub-accordion-section-satori-site-layout-section-slider #customize-control-satori-slider-size' ).show();
                $( '#sub-accordion-section-satori-site-layout-section-slider #customize-control-satori-slider-linkto-post' ).show();
                $( '#sub-accordion-section-satori-site-layout-section-slider #customize-control-satori-slider-remove-title' ).show();
                $( '#sub-accordion-section-satori-site-layout-section-slider #customize-control-satori-slider-auto-scroll' ).show();
            } else if ( slider_select_value == 'satori-meta-slider' ) {
                $( '#sub-accordion-section-satori-site-layout-section-slider #customize-control-satori-slider-cats' ).hide();
                $( '#sub-accordion-section-satori-site-layout-section-slider #customize-control-satori-slider-size' ).hide();
                $( '#sub-accordion-section-satori-site-layout-section-slider #customize-control-satori-slider-linkto-post' ).hide();
                $( '#sub-accordion-section-satori-site-layout-section-slider #customize-control-satori-slider-remove-title' ).hide();
                $( '#sub-accordion-section-satori-site-layout-section-slider #customize-control-satori-slider-auto-scroll' ).hide();
                $( '#sub-accordion-section-satori-site-layout-section-slider #customize-control-satori-meta-slider-shortcode' ).show();
            } else {
                $( '#sub-accordion-section-satori-site-layout-section-slider #customize-control-satori-slider-cats' ).hide();
                $( '#sub-accordion-section-satori-site-layout-section-slider #customize-control-satori-slider-size' ).hide();
                $( '#sub-accordion-section-satori-site-layout-section-slider #customize-control-satori-slider-linkto-post' ).hide();
                $( '#sub-accordion-section-satori-site-layout-section-slider #customize-control-satori-slider-remove-title' ).hide();
                $( '#sub-accordion-section-satori-site-layout-section-slider #customize-control-satori-slider-auto-scroll' ).hide();
                $( '#sub-accordion-section-satori-site-layout-section-slider #customize-control-satori-meta-slider-shortcode' ).hide();
            }
        }
        
    } );
    
} )( jQuery );