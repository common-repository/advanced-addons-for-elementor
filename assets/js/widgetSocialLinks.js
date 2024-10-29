/*---------------------------------------------
    // widgetSocialLinks js
---------------------------------------------*/
var widgetSocialLinks = function widgetSteps(scope) {
    if (jQuery('.icon-circle').length) {
       jQuery('.icon-circle').on('click',function(event) {
            jQuery(this).addClass('rest')
           jQuery(this).parents('.main-content').addClass('active');
           jQuery(this).parents('.main-content').siblings().removeClass('active');
        });
    }

};

jQuery(window).on("elementor/frontend/init", function() {
    elementorFrontend.hooks.addAction(
        "frontend/element_ready/aae-social-links.default",
        widgetSocialLinks

    );
});