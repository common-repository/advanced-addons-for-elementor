/*---------------------------------------------
    // widgetGoogleMaps js
---------------------------------------------*/
var widgetGoogleMaps = function widgetGoogleMaps(scope) {
    if (jQuery('.advanced_addons_maps').length) {
       
        var mapStyle1 = function(){
       return(
         [
                    {
                        "featureType": "administrative",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#444444"
                            }
                        ]
                    },
                    {
                        "featureType": "landscape",
                        "elementType": "all",
                        "stylers": [
                            {
                                "color": "#f2f2f2"
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "road",
                        "elementType": "all",
                        "stylers": [
                            {
                                "saturation": -100
                            },
                            {
                                "lightness": 45
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "simplified"
                            }
                        ]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "labels.icon",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "transit",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "all",
                        "stylers": [
                            {
                                "color": "#46bcec"
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#c8d7d4"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "geometry.stroke",
                        "stylers": [
                            {
                                "color": "#ff0000"
                            }
                        ]
                    }
                ])
    }

    var mapStyle2 = function(){
       return(
        [
    {
        "featureType": "all",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "saturation": 36
            },
            {
                "color": "#000000"
            },
            {
                "lightness": 40
            }
        ]
    },
    {
        "featureType": "all",
        "elementType": "labels.text.stroke",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#000000"
            },
            {
                "lightness": 16
            }
        ]
    },
    {
        "featureType": "all",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 20
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 17
            },
            {
                "weight": 1.2
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 20
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 21
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 17
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 29
            },
            {
                "weight": 0.2
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 18
            }
        ]
    },
    {
        "featureType": "road.local",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 16
            }
        ]
    },
    {
        "featureType": "transit",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 19
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 17
            }
        ]
    }
])
    }

    var mapStyle3 = function(){
        return(
            [
    {
        "featureType": "administrative.country",
        "elementType": "geometry",
        "stylers": [
            {
                "visibility": "simplified"
            },
            {
                "hue": "#ff0000"
            }
        ]
    }
]
            )
    }

    jQuery.fn.hasAttr = function(name) {  
       return this.attr(name) !== undefined && this.attr(name) !== '';
    };

    //Google Map
    jQuery(document).find('.advanced_addons_maps').each(function(index, el) {

        var anothervar = this;
        var mapClass = jQuery(this).index(index);
        var googleMapSelector = jQuery(this);
        console.log('map selectedtor',googleMapSelector);
        var mapStyle,mapLocator;
         if(jQuery(this).hasAttr('data-mapStyle')){
            mapStyle = jQuery(this).attr('data-mapStyle');
            if(mapStyle && mapStyle == 'style-1'){
                mapStyle = mapStyle1()
            }
            if(mapStyle && mapStyle == 'style-2'){
                mapStyle = mapStyle2()
            }
        }
         if(jQuery(this).hasAttr('data-locatorImage')){
             mapLocator = jQuery(this).attr('data-locatorImage');
         }
        var lat,lang;
         lat = Number(jQuery(this).attr('data-lat'));
         lat =   lat ? lat : 40.789886;
         lang = Number(jQuery(this).attr('data-lang'));
         lang = lang ? lang : -74.056700;
        var myCenter = new google.maps.LatLng(lat,lang);
        function initialize() {
            var mapProp = {
                center: myCenter,
                zoom: 15,
                scrollwheel: false,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                styles: mapStyle 
            };
            var map = new google.maps.Map(anothervar, mapProp);
            var marker = new google.maps.Marker({
                position: myCenter,
                animation: google.maps.Animation.BOUNCE,
                icon: mapLocator ? mapLocator : ''
            });
            marker.setMap(map);
        }
        if (googleMapSelector.length) {
            // google.maps.event.addDomListener(window, 'load', initialize);
            initialize()
        }
    });
    }

};

jQuery(window).on("elementor/frontend/init", function() {
    elementorFrontend.hooks.addAction(
        "frontend/element_ready/aae-gmaps.default",
        widgetGoogleMaps

    );
});