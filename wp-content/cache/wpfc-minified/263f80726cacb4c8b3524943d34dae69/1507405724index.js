// source --> https://sprouts.sacredkin.com/wp-content/plugins/pirate-forms/public/js/scripts-general.js?ver=2.2.0 
/* global pirateFormsObject */
/* global jQuery */
jQuery(document).ready(function() {

    var session_var = pirateFormsObject.errors;

    if( (typeof session_var !== 'undefined') && (session_var !== '') && (typeof jQuery('#contact') !== 'undefined') && (typeof jQuery('#contact').offset() !== 'undefined') ) {

        jQuery('html, body').animate({
            scrollTop: jQuery('#contact').offset().top
        }, 'slow');
    }
	
    if(jQuery('#pirate-forms-maps-custom').length > 0){
        jQuery('#pirate-forms-maps-custom').html(jQuery('<input name="xobkcehc" type="' + 'xobkcehc'.split('').reverse().join('') + '" value="' + pirateFormsObject.spam.value + '"><span>' + pirateFormsObject.spam.label + '</span>'));
    }

});
// source --> https://sprouts.sacredkin.com/wp-content/plugins/themeisle-companion/obfx_modules/social-sharing/js/public.js?ver=2.0.7 
/**
 * Social Sharing Module Public Script
 *
 * @since	1.0.0
 * @package obfx_modules/social-sharing/js
 *
 * @author	ThemeIsle
 */

var obfx_sharing_module = function( $ ) {
	'use strict';

	$( function() {
		$( '.obfx-sharing a, .obfx-sharing-inline a' ).not( '.whatsapp, .mail, .viber' ).on( 'click', function(e) {
			e.preventDefault();
			var link = $( this ).attr( 'href' );

			window.open( link, 'obfxShareWindow', 'height=450, width=550, top=' + ( $( window ).height() / 2 - 275 ) + ', left=' + ( $( window ).width() / 2 - 225 ) + ', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0' );
			return true;
		} );
	} );
};

obfx_sharing_module( jQuery );