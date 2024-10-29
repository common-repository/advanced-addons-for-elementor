/*---------------------------------------------
    // widgetImageCompare js
---------------------------------------------*/
var widgetImageCompare = function widgetImageCompare(scope) {

     jQuery.fn.hasAttr = function(name) {  
       return this.attr(name) !== undefined && this.attr(name) !== '';
    };
    var widgetImageCompareContent = scope.find('.cross2');
    if (jQuery('.cross2').length) {
        jQuery('.cross2').each(function(index, el) {
        let __this = jQuery(this);
        let checkVertical, propVal, ttilebefore, titleafter;
        if (jQuery(this).hasAttr('data-alignment')) {
            checkVertical = jQuery(this).attr('data-alignment');
        }
        if (jQuery(this).hasAttr('data-propotion')) {
            propVal = jQuery(this).attr('data-propotion');
        }
        if (jQuery(this).hasAttr('data-before-title')) {
            ttilebefore = jQuery(this).attr('data-before-title');
        }
        if (jQuery(this).hasAttr('data-after-title')) {
            titleafter = jQuery(this).attr('data-after-title');
        }
        jQuery(this).cross2({
            clickEnabled: true,
            vertical: checkVertical ? true : false,
            // easing: 'easeInBack',
            value: propVal ? propVal : 0.5,
            animationDuration: 500,
            titleBefore: ttilebefore ? ttilebefore : 'Before',
            titleAfter: titleafter ? titleafter : 'After',
            mousewheelEnabled: false
        });
    });
    }

    

};

jQuery(window).on("elementor/frontend/init", function() {
    elementorFrontend.hooks.addAction(
        "frontend/element_ready/aae-image-compare.default",
        widgetImageCompare

    );
});