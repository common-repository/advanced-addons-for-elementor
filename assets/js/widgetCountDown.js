/*---------------------------------------------
    // widgetCountDown js
---------------------------------------------*/
var widgetCountDown = function widgetCountDown(scope) {
    if (jQuery('.kounty-countdown').length) {
        alert(8898);
        jQuery('.kounty-countdown').kounty();
    }

};

jQuery(window).on("elementor/frontend/init", function() {
    elementorFrontend.hooks.addAction(
        "frontend/element_ready/aae-countdown.default",
        widgetCountDown

    );
});