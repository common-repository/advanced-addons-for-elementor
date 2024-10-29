

/*---------------------------------------------
    // widgetCountDown js
---------------------------------------------*/
var widgetParallax = function widgetParallax(scope) {
    if (jQuery('.parallax-window').length) {
       jQuery('.parallax-window').each(function() {
	        var image = jQuery(this).attr('data-bg');
	        jQuery(this).parallax({
	            imageSrc: image
	        });
	    });
    }

};

jQuery(window).on("elementor/frontend/init", function() {
    elementorFrontend.hooks.addAction(
        "frontend/element_ready/aae-postlist.default",
        widgetParallax

    );
});