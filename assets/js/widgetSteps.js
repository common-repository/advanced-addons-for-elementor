/*---------------------------------------------
    // widgetSteps js
---------------------------------------------*/
var widgetSteps = function widgetSteps(scope) {
    if (jQuery('.blocks-step').length) {
        jQuery('.blocks-step').each(function() {
            var pdiv = jQuery(this);
            var UID = {
                _current: 0,
                getNew: function() {
                    this._current++;
                    return this._current;
                }
            };

            var time = 4;
            var steps = 9;
            var active = 0;
            var para = pdiv.find('.step-inner');
            var tabData = jQuery(this).find('.steps-data');
            var length = tabData.length;

            var circles = jQuery(this).find('.circle');
            let prev = jQuery(this).find('.prev');
            let next = jQuery(this).find('.next');

            prev.on('click', function() {
                let Lprev = pdiv.find('.circle.active').index() - 1
                clicked(Lprev)
            })

            next.on('click', function() {
                let Lnext = pdiv.find('.circle.active').index() + 1
                console.log(Lnext)
                clicked(Lnext)
            })

            function plusSlides(n) {
                clicked(active += n);

            }
            for (var i = 0; i < length; i++) {
                circles[i].addEventListener('click', function() {
                    clicked(parseInt(this.dataset.index));
                })
            }
            setView();

            function setView() {
                var i;
                var width = 11.5 * active + 1


                for (var i = 0; i <= active; i++) {
                    circles[i].classList.add('done');
                }

                circles[i - 1].classList.add('active');

                for (var j = i; j < length; j++) {
                    circles[j].classList.remove('done');
                }

            }

            function clicked(index) {
                if (index >= 0 && index < length) {
                    circles[active].classList.remove('active');
                    tabData[active].classList.remove('active_tab');
                    active = index;
                    tabData[active].classList.add('active_tab');
                    setView();
                }
            }
        });
    }

};

jQuery(window).on("elementor/frontend/init", function() {
    elementorFrontend.hooks.addAction(
        "frontend/element_ready/steps.default",
        widgetSteps

    );
});