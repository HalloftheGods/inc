jQuery( document ).ready(function() {
	// Owl Slider
	jQuery("#owl-demo").owlCarousel({
		navigation : true,
		items : 4,
		itemsDesktop : [1199,4], // (width, number of image)
		itemsDesktopSmall : [980,2],
		itemsTablet: [768,2],
		itemsTabletSmall: [568,1],
		itemsMobile : [479,1],
		pagination: false
	});
	
	// Testing	should be delete when upload
	jQuery(window).resize(function(){
		var w = jQuery(window).width();
		console.log (jQuery(this).width());
	});
	
	// Search Form
	jQuery('.search-top').click(function(){
    jQuery('.search-form').slideToggle( "normal" );
    setTimeout(function(){
      jQuery('.search-form input').focus();
    }, 300);
  });
	
	
	// Menu
	var touch  = jQuery('.responsive-menu');
	var menu  = jQuery('.main-navigation .container-menu');
 
	jQuery(touch).on('click', function(e) {
		e.preventDefault();
		menu.slideToggle();
	});
	
	// Click on Sub Menu
	function checkWidth(){
	var windowsize = jQuery(window).width();
        if (windowsize < 990) {
			var asd = jQuery('.main-navigation li.menu-item-has-children a');
	jQuery(asd).not('.binded').addClass('binded').click(function(e) {
		e.preventDefault();
		jQuery(this).next('.sub-menu').slideToggle();
	});
        }
		}
	checkWidth();
	
	// jQuery(document).ready(checkWidth);
	jQuery(window).resize(checkWidth);
	
	
}); // jQuery Document
	
	// Scroll Effect : Hide menu when down and show when up
	var senseSpeed = 5, previousScroll = 0;
	jQuery(window).scroll(function(event){
    var scroller = jQuery(this).scrollTop();
	
    if (scroller-senseSpeed > previousScroll){
      jQuery("header.site-header").filter(':not(:animated)').slideUp();
    } else if (scroller+senseSpeed < previousScroll) {
      jQuery("header.site-header").filter(':not(:animated)').slideDown();
    }
    previousScroll = scroller;
	
	// Add A Class when scroll down
	jQuery(window).scroll(function() {  
        var classHeader = jQuery('header.site-header'),
            targetScroll = jQuery('#content').position().top,
            currentScroll = jQuery('html').scrollTop() || jQuery('body').scrollTop();
        classHeader.toggleClass('border-header', currentScroll >= targetScroll);
    });
	

	
});