/*---------------------------------------------
    // Tabs js
---------------------------------------------*/
var TabFunction = function TabFunction(scope) {
    if (jQuery('.advanced_addons_tab_item').length) {
        jQuery(".advanced_addons_tab_content .block-content:not('.active')").hide()
        jQuery(document).on('click', '.advanced_addons_tab_item  .tab-link', function(e) {
            let __this, result, shower;
            __this = jQuery(this);
            e.preventDefault()
            __this.addClass('active')
            __this.siblings().removeClass('active')
            result = jQuery(this).attr('href')
            result = result.replace('#', '')
            jQuery(".advanced_addons_tab_content").find(`[id='jQuery{result}']`).show();
            console.log(jQuery('.advanced_addons_tab_content .block-content[id*=' + result + ']'))
            //shower = jQuery('.advanced_addons_tab_content .block-content[id*=' + result + ']').show();
            shower = jQuery('.advanced_addons_tab_content .block-content[id*=' + result + ']').show();
            //shower = jQuery('.advanced_addons_tab_content .block-content[id*=' + result + ']').addClass('active');
            shower = jQuery('.advanced_addons_tab_content .block-content[id*=' + result + ']').addClass('active');
            shower.siblings().hide();
            shower.siblings().removeClass('active');
        });
    }

};

jQuery(window).on("elementor/frontend/init", function() {
    elementorFrontend.hooks.addAction(
        "frontend/element_ready/aae-tabs.default",
        TabFunction

    );
});