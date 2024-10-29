/*---------------------------------------------
    // widgetRadiusProgressbar js
---------------------------------------------*/
var widgetRadiusProgressbar = function widgetRadiusProgressbar(scope) {
    if (jQuery('.advanced_radius_progressbar').length) {
        jQuery('.advanced_radius_progressbar').each(function(index, el) {
            var jQuerythis = jQuery(this);
            var jQueryprogressBar = jQuerythis;
            var jQueryprogressCount = jQueryprogressBar.find('.progress_bar_parcentage');
            var jQuerycircle = jQueryprogressBar.find('.ProgressBar-circle');
            var percentageProgress = jQueryprogressBar.attr('data-progress');
            var percentageRemaining = (100 - percentageProgress);
            var percentageText = jQuerythis.attr('data-progress');

            //Calcule la circonférence du cercle
            var radius = jQuerycircle.attr('r');
            var diameter = radius * 2;
            var circumference = Math.round(Math.PI * diameter);

            //Calcule le pourcentage d'avancement
            var percentage = circumference * percentageRemaining / 100;
            console.log('stroke', circumference, 'sdsd', percentage)
            jQuerycircle.css({
                'stroke-dasharray': circumference,
                'stroke-dashoffset': percentage
            })
            jQuerycircle.css({
                'stroke-dashoffset': circumference
            }).animate({
                'stroke-dashoffset': percentage
            }, 3000)

            //Animation du texte (pourcentage)
            jQuery({ Counter: 0 }).animate({ Counter: percentageText }, {
                duration: 3000,
                step: function() {
                    jQueryprogressCount.text(Math.ceil(this.Counter) + '%');
                }
            });
        });
    }

};

jQuery(window).on("elementor/frontend/init", function() {
    elementorFrontend.hooks.addAction(
        "frontend/element_ready/radius-progressbar.default",
        widgetRadiusProgressbar

    );
});