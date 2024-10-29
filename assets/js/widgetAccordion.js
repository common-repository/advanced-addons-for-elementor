/*---------------------------------------------
    // widgetAccordion js
---------------------------------------------*/
var widgetAccordion = function widgetAccordion(scope) {
    if (jQuery('.advanced_addons_accordion_body').length) {
       jQuery('.advanced_addons_accordion_body').hide();
        var acParent = jQuery('.advanced_addons_accordion');
        var showAc = jQuery('.advanced_addons_accordion.show');
        jQuery('.advanced_addons_accordion_title').on('click', function (event) {
            event.preventDefault();
            var acNew = (jQuery(this).attr('data-collapse-title'));
            // var acNew = AcCurrent.replace('#', '');
            jQuery(this).parent('.advanced_addons_accordion').toggleClass('show');
            var findAccordion = jQuery(document).find("[data-collapse-panel='" + acNew + "']").slideToggle();
            jQuery(this).parent('.advanced_addons_accordion').siblings().children('[data-collapse-panel]').slideUp();
            jQuery(this).parent('.advanced_addons_accordion').siblings().removeClass('show');
        });
        if (jQuery('.advanced_addons_accordion').hasClass('show')) {
            showAc.find('[data-collapse-panel]').slideDown();
        }
        jQuery('.show-collapse').slideDown();
    }

};

jQuery(window).on("elementor/frontend/init", function() {
    elementorFrontend.hooks.addAction(
        "frontend/element_ready/aae-accordion.default",
        widgetAccordion

    );
});