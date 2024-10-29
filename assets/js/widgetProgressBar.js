/*---------------------------------------------
    // Progressbar js
---------------------------------------------*/
var progressBar = function progressBar() {
    if (jQuery('.advanced_block_progressbar_block').length) {
        jQuery('.advanced_block_progressbar_block').each(function() {
            const __this = jQuery(this)
            let progressBar, proDur;
            progressBar = __this.attr('data-progress-parcent');
            proDur = 2000;

            function progressbarFunction() {
                __this.find('.progress').animate({
                    width: progressBar
                }, proDur);

                __this.find('.parcent').animate({
                    left: progressBar
                }, {
                    duration: proDur,
                    step: function(now, fx) {
                        var data = Math.round(now);
                        __this.find('.parcent').html(data + '%');
                    }
                });

            }

            var self = __this;
            __this.waypoint({
                offset: '100%',
                handler: function() {
                    progressbarFunction()
                    this.destroy()
                }
            });
        })
    }



};

jQuery(window).on("elementor/frontend/init", function() {
    elementorFrontend.hooks.addAction(
        "frontend/element_ready/aae-progressbar.default",
        progressBar

    );
});