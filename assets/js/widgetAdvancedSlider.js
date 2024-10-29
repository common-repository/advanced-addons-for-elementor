(function($, elementor) {

  'use strict';
  var AdvancedAddons = {
      init: function() {
          var widgets = {
            'aae-testimonials.default'   : AdvancedAddons.AdvancedSlider,
            'aae-testimonial-slider.default'   : AdvancedAddons.AdvancedSlider,
            'aae-twitter.default'   : AdvancedAddons.AdvancedSlider,
            'aae-clients-slider.default'   : AdvancedAddons.AdvancedSlider,
            'aae-post-carousel.default': AdvancedAddons.AdvancedSlider,

          };
          $.each(widgets, function(widget, callback) {
              elementorFrontend.hooks.addAction('frontend/element_ready/' + widget, callback);
          });

          elementorFrontend.hooks.addAction('frontend/element_ready/section', AdvancedAddons.elementorSection);
      },
      // Advanced Slider
      AdvancedSlider: function($scope) {
          jQuery.fn.hasAttr = function(name) {
              return this.attr(name) !== undefined && this.attr(name) !== '';
          };

          function responsiveOptions(slidesToShow) {
              console.log('sdsd', parseInt(slidesToShow[0]))
              return [{
                      breakpoint: 1024,
                      settings: {
                          slidesToShow: slidesToShow ? parseInt(slidesToShow[0]) : slidesToShow[0],
                      }
                  },
                  {
                      breakpoint: 800,
                      settings: {
                          slidesToShow: slidesToShow ? parseInt(slidesToShow[1]) : slidesToShow[1],
                      }
                  },
                  {
                      breakpoint: 700,
                      settings: {
                          slidesToShow: slidesToShow ? parseInt(slidesToShow[1]) : slidesToShow[1],
                      }
                  },
                  {
                      breakpoint: 600,
                      settings: {
                          slidesToShow: slidesToShow ? parseInt(slidesToShow[1]) : slidesToShow[1],
                      }
                  },
                  {
                      breakpoint: 480,
                      settings: {
                          slidesToShow: slidesToShow ? parseInt(slidesToShow[2]) : parseInt(slidesToShow[2]),
                      }
                  }
              ]
          }
          jQuery('.advanced_addons_slider').each(function(index, el) {
              var nextArrow, prevArrow, dotsClass, dots, arrows, slidesToShow, centerMode, autoplay;
              if (jQuery(this).hasAttr('nextArrow')) {
                  nextArrow = jQuery(this).attr('nextArrow');
              }
              if (jQuery(this).hasAttr('prevArrow')) {
                  prevArrow = jQuery(this).attr('prevArrow');
              }
              if (jQuery(this).hasAttr('dotsClass')) {
                  dotsClass = jQuery(this).attr('dotsClass');
              }
              if (jQuery(this).hasAttr('dots')) {
                  dots = jQuery(this).attr('dots');
              }
              if (jQuery(this).hasAttr('arrows')) {
                  arrows = jQuery(this).attr('arrows');
              }
              if (jQuery(this).hasAttr('slidesToShow')) {
                  slidesToShow = jQuery(this).attr('slidesToShow');
                  slidesToShow = slidesToShow.split(' ')
              }
              if (jQuery(this).hasAttr('centerMode')) {
                  centerMode = jQuery(this).attr('centerMode');
              }
              if (jQuery(this).hasAttr('enableAutoPlay')) {
                  autoplay = jQuery(this).attr('enableAutoPlay');
                  autoplay = autoplay === 'true' ? true : false
                  console.log('autoplay', autoplay)
              }
              jQuery(this).not('.slick-initialized').slick({
                  slidesToShow: slidesToShow ? parseInt(slidesToShow[0]) : 1,
                  centerPadding: '0px',
                  slidesToScroll: 1,
                  dots: dots ? true : false,
                  centerMode: centerMode ? true : false,
                  arrows: arrows ? true : false,
                  nextArrow: arrows ? '<button type="button" class="slick-next">' + nextArrow + '</button>' : null,
                  prevArrow: arrows ? '<button type="button" class="slick-prev">' + prevArrow + '</button>' : null,
                  dotsClass: dots ? dotsClass : null,
                  autoplay: autoplay ? autoplay : false,
                  autoplaySpeed: 3500,
                  responsive: slidesToShow ? responsiveOptions(slidesToShow) : null
              })
          });
      }


  };
  $(window).on('elementor/frontend/init', AdvancedAddons.init);


}(jQuery, window.elementorFrontend));