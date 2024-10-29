<?php 
class Advanced_addons_For_Elementor {
  // Activate 
  function activate(){
      flush_rewrite_rules();
  }

  // Deactivate 
  function deactivate(){
      flush_rewrite_rules();
  }

  /**
   * Creates an Action Menu
   */

  function aae_for_elementor_pro_settings_link($links, $file) {
      static $this_plugin;
   
      if (!$this_plugin) {
          $this_plugin = plugin_basename(__FILE__);
      }
      $settings_links = sprintf( '<a href="admin.php?page=aae-settings">' . __( 'Settings', 'aa_elementor' ) . '</a>' );

        if(! class_exists( 'aae_Pro' ) ) {
            // check to make sure we are on the correct plugin
            if ($file == $this_plugin) {
                // link to what ever you want
                $plugin_links['aae_Pro'] = sprintf('<a href="https://advanceaddons.com/product/aae/" target="_blank" style="color:#39a700eb; font-weight: bold;">' . __( 'Get Pro', 'aa_elementor' ) . '</a>');
                
                // add the links to the list of links already there
                foreach($plugin_links as $link) {
                    array_unshift($links,$settings_links, $link);
                }
            }
        }
   
      return $links;
  }

  // Widget register
  function __construct() {
      add_action( 'elementor/widgets/widgets_registered', array( $this, 'aae_for_elementor_widget_bundle') );
      // Register custom controls
     // add_action( 'elementor/controls/controls_registered', array( $this, 'register_controls'));
  }

 function aae_for_elementor_widget_register() {
      $this->aae_for_elementor_widget_bundle();
      $this->aae_for_elementor_script();
  }

  // aae widget bundle
  function aae_for_elementor_widget_bundle(){
    $aae_elements_keys = [
          'widget-alert',
          'widget-featured',
          'widget-team',
          'widget-buttons',
          'widget-caldera-forms',
          'widget-call-to-action',
          'widget-cf7',
          'clients-slider',
          'widget-flipbox',
          'widget-countdown',
          'widget-divider',
          'widget-dual-button',
          'widget-fun-factor',
          'widget-gravity-forms',
          'widget-image-compare',
          'widget-inline-notice',
          'widget-mailchimp-wp',
          'widget-ninjaform',
          'widget-testimonia-slider',
          'widget-testimonial',
          'widget-twitter',
          'widget-progressbar',
          'widget-promo-box',
          'widget-quotes',
          'widget-search-box',
          'widget-social-links',
          'widget-table',
          'widget-tabs',
          'widget-timeline',
          'widget-weform',
          'widget-wpform',
          'widget-post-grid',
          'widget-post-carousel',
          'widget-post-list',
          'widget-accordion',
          'widget-instagram',
          'maps-api',
          'facebook_app_id',
          'twitter_userName',
          'twitter_consumer_key',
          'twitter_consumer_secret' => 'defualt',

      ];

      $aae_default_settings = array_fill_keys( $aae_elements_keys, true ); 

      $check_component_active = get_option( 'aae_save_settings', $aae_default_settings );

        // Alert Elements
        if( $check_component_active['widget-alert'] ) {
            require_once AAE_PATH . '/modules/alert/widget.php';
        }
        // Featured Elements
        if( $check_component_active['widget-featured'] ) {
            require_once AAE_PATH . '/modules/featured/widget.php';
        }

        // Featured Elements
        // if( $check_component_active['widget-flipbox'] ) {
        //     require_once AAE_PATH . '/modules/flip-box/widget.php';
        // }
        require_once AAE_PATH . '/modules/flip-box/widget.php';
        // Team Elements
        if( $check_component_active['widget-team'] ) {
            require_once AAE_PATH . '/modules/team/widget.php';
        }
        // buttons Elements
        if( $check_component_active['widget-buttons'] ) {
            require_once AAE_PATH . '/modules/buttons/widget.php';
        }
         // caldera-forms Elements
        if( $check_component_active['widget-caldera-forms'] ) {
          require_once AAE_PATH . '/modules/caldera-forms/widget.php';
         }
        // call to action Elements
        if( $check_component_active['widget-call-to-action'] ) {
         require_once AAE_PATH . '/modules/call-to-action/widget.php';
        }
        // Contact Form Elements
        if( $check_component_active['widget-cf7'] ) {
          require_once AAE_PATH . '/modules/cf7/widget.php';
        }
        // clients-slider Elements
       // if( $check_component_active['widget-clients-slider'] ) {
       //    require_once AAE_PATH . '/modules/clients-slider/widget.php';
      //  }
        // widget-countdown Elements
        if( $check_component_active['widget-countdown'] ) {
          require_once AAE_PATH . '/modules/countdown/widget.php';
        }
        // widget-countdown Elements
        if( $check_component_active['widget-divider'] ) {
          require_once AAE_PATH . '/modules/divider/widget.php';
        }
        // dual button Elements
        if( $check_component_active['widget-dual-button'] ) {
          require_once AAE_PATH . '/modules/dual-button/widget.php';
        }
         // fun factor Elements
         if( $check_component_active['widget-fun-factor'] ) {
            require_once AAE_PATH . '/modules/fun-factor/widget.php';
         }
        // gravity-forms Elements
        if( $check_component_active['widget-gravity-forms'] ) {
         require_once AAE_PATH . '/modules/gravity-forms/widget.php';
        }
        // image-compare Elements
        if( $check_component_active['widget-image-compare'] ) {
          require_once AAE_PATH . '/modules/image-compare/widget.php';
        }
        // inline-notice Elements
        if( $check_component_active['widget-inline-notice'] ) {
          require_once AAE_PATH . '/modules/inline-notice/widget.php';
        }
        // mailchimp-wp Elements
        if( $check_component_active['widget-mailchimp-wp'] ) {
          require_once AAE_PATH . '/modules/mailchimp-wp/widget.php';
        }

        // Ninjaform Elements
        if( $check_component_active['widget-ninjaform'] ) {
          require_once AAE_PATH . '/modules/ninjaform/widget.php';
        }

        // testimonial slider Elements
        if( $check_component_active['widget-testimonia-slider'] ) {
          require_once AAE_PATH . '/modules/testimonial-slider/widget.php';
        }
        // testimonial Elements
        if( $check_component_active['widget-testimonial'] ) {
          require_once AAE_PATH . '/modules/testimonial/widget.php';
        }

        // twitter Elements
        if( $check_component_active['widget-twitter'] ) {
          require_once AAE_PATH . '/modules/twitter/widget.php';
        }

        // progressbar Elements
        if( $check_component_active['widget-progressbar'] ) {
          require_once AAE_PATH . '/modules/progressbar/widget.php';
        }
        // promo-box Elements
        if( $check_component_active['widget-promo-box'] ) {
           require_once AAE_PATH . '/modules/promo-box/widget.php';
        }

        // quotes Elements
        if( $check_component_active['widget-quotes'] ) {
          require_once AAE_PATH . '/modules/quotes/widget.php';
       }

       // Search  Elements
       if( $check_component_active['widget-search-box'] ) {
        require_once AAE_PATH . '/modules/search-box/widget.php';
       }

      // social-links Elements
      if( $check_component_active['widget-social-links'] ) {
        require_once AAE_PATH . '/modules/social-links/widget.php';
      }
      // table Elements
      if( $check_component_active['widget-table'] ) {
        require_once AAE_PATH . '/modules/table/widget.php';
      }
      // tabs Elements
      if( $check_component_active['widget-tabs'] ) {
        require_once AAE_PATH . '/modules/tabs/widget.php';
      }
      // timeline Elements
      if( $check_component_active['widget-timeline'] ) {
        require_once AAE_PATH . '/modules/timeline/widget.php';
      }

      // weform Elements
      if( $check_component_active['widget-weform'] ) {
        require_once AAE_PATH . '/modules/weform/widget.php';
      }
      // wpform Elements
      if( $check_component_active['widget-wpform'] ) {
        require_once AAE_PATH . '/modules/wpform/widget.php';
      }
      // post grid Elements
      if( $check_component_active['widget-post-grid'] ) {
        require_once AAE_PATH . '/modules/post-grid/widget.php';
      }
      
      // post list Elements
      if( $check_component_active['widget-post-list'] ) {
       require_once AAE_PATH . '/modules/post-list/widget.php';
      }

      // post carousel Elements
      if( $check_component_active['widget-post-carousel'] ) {
        require_once AAE_PATH . '/modules/post-carousel/widget.php';
      }

      // accordion Elements
      if( $check_component_active['widget-accordion'] ) {
        require_once AAE_PATH . '/modules/accordion/widget.php';
      }

      if( $check_component_active['widget-instagram'] ) {
        require_once AAE_PATH . '/modules/instagram/widget.php';
      }

      require_once AAE_PATH . '/modules/gmaps/widget.php';

      require_once AAE_PATH . '/modules/twitter-feed/widget.php';
      // helper functions
      require_once AAE_PATH . '/modules/helper-functions.php';
      require_once AAE_PATH . '/includes/helper.php';
      require_once AAE_PATH . '/includes/custom-icons.php';
      require_once AAE_PATH . '/includes/twitteroauth.php';
      
      //Admin init
     // require_once AAE_PATH . '/admin/admin-init.php';

       //Admin init
      //require_once AAE_PATH . '/admin/notices/admin-notices.php';

      // System Info
      //require_once AAE_PATH . '/admin/includes/system-info.php';
  }

  // Register style & script
  function aae_for_elementor_register(){
      add_action('wp_enqueue_scripts', array($this, 'aae_for_elementor_css'), 99);
      add_action('wp_enqueue_scripts', array($this, 'aae_for_elementor_script'), 99);
      add_action('elementor/editor/before_enqueue_scripts', array($this, 'aae_preview_script'), 0);
      // add_action('plugins_loaded', array($this, 'aae_pro_plugin_init'));
      add_filter('plugin_action_links', array($this, 'aae_for_elementor_pro_settings_link'),10, 2);
  }

  function aae_preview_script(){
        wp_enqueue_style(
          'advance-icon',
          AAE_DIR_ASSETS . 'fonts/style.min.css',
          null,
          AAE_VERSION
        );

        // font-awesome
        wp_enqueue_style(
          'font-awesome2',
          AAE_DIR_ASSETS . 'vendor/css/font-awesome.min.css',
          null,
          AAE_VERSION
      );

        // admin css
        wp_enqueue_style(
          'admin-main',
          AAE_DIR_Admin . 'assets/css/main.css',
          null,
          AAE_VERSION
      );

      
  }
  // Css include
  function aae_for_elementor_css(){
    $aae_elements_keys = [
      'widget-team',
  ];
    $aae_default_settings = array_fill_keys( $aae_elements_keys, true ); 
    $check_component_active = get_option( 'aae_save_settings', $aae_default_settings );
          wp_enqueue_style(
            'advance-icon',
            AAE_DIR_ASSETS . 'fonts/style.min.css',
            null,
            AAE_VERSION
        );
        // font-awesome
        wp_enqueue_style(
          'font-awesome',
          AAE_DIR_ASSETS . 'vendor/css/font-awesome.min.css',
          null,
          AAE_VERSION
      );

          // slick
          wp_enqueue_style(
            'slick',
            AAE_DIR_ASSETS . 'vendor/css/slick.css',
            null,
            AAE_VERSION
        );

          // line-icon
          wp_enqueue_style(
            'line-icon',
            AAE_DIR_ASSETS . 'vendor/css/line-icon.css',
            null,
            AAE_VERSION
        );

        // cross2 image compare main plugin
        wp_enqueue_style(
          'cross2',
          AAE_DIR_ASSETS . 'vendor/css/cross2.css',
          null,
          AAE_VERSION
      ); 

          // common
          wp_enqueue_style(
            'aae-common',
            AAE_DIR_ASSETS . 'css/common.css',
            null,
            AAE_VERSION
        );

          // themeroots
          wp_enqueue_style(
            'themeroots',
            AAE_DIR_ASSETS . 'vendor/css/themeroots.min.css',
            null,
            AAE_VERSION
        );

          // alert
          wp_enqueue_style(
            'alert',
            AAE_DIR_ASSETS . 'css/alert.css',
            null,
            AAE_VERSION
        );

          // featured
          wp_enqueue_style(
            'featured',
            AAE_DIR_ASSETS . 'css/featured-block.css',
            null,
            AAE_VERSION
        );

    if( $check_component_active['widget-team'] ) {
          // team-member
          wp_enqueue_style(
            'team-member',
            AAE_DIR_ASSETS . 'css/team-member.css',
            null,
            AAE_VERSION
        );
    }

          // Promo box
          wp_enqueue_style(
            'promo-box',
            AAE_DIR_ASSETS . 'css/promo-box.css',
            null,
            AAE_VERSION
        );

          // clients
          wp_enqueue_style(
            'clients',
            AAE_DIR_ASSETS . 'css/clients.css',
            null,
            AAE_VERSION
        );

        // countdown
        wp_enqueue_style(
          'countdown',
          AAE_DIR_ASSETS . 'css/countdown.css',
          null,
          AAE_VERSION
        );

        // devider
        wp_enqueue_style(
          'devider',
          AAE_DIR_ASSETS . 'css/devider.css',
          null,
          AAE_VERSION
        );

        // dual-button
        wp_enqueue_style(
          'dual-button',
          AAE_DIR_ASSETS . 'css/dual-button.css',
          null,
          AAE_VERSION
        );

        // fun-factor
        wp_enqueue_style(
          'fun-factors',
          AAE_DIR_ASSETS . 'css/fun-factors.css',
          null,
          AAE_VERSION
        );

        // fun-factor
        wp_enqueue_style(
          'flip-box',
          AAE_DIR_ASSETS . 'css/flip-box.css',
          null,
          AAE_VERSION
        );

        // inline-notice
        wp_enqueue_style(
          'inline-notice',
          AAE_DIR_ASSETS . 'css/inline-notice.css',
          null,
          AAE_VERSION
        );

        // testimonial
        wp_enqueue_style(
          'testimonial',
          AAE_DIR_ASSETS . 'css/testimonial.css',
          null,
          AAE_VERSION
        );

        // testimonial-slider
        wp_enqueue_style(
          'testimonial-slider',
          AAE_DIR_ASSETS . 'css/testimonial-slider.css',
          null,
          AAE_VERSION
        );

        
        // twitter
        wp_enqueue_style(
          'responsive',
          AAE_DIR_ASSETS . 'css/twitter-blocks.css',
          null,
          AAE_VERSION
        );

        // progressbar
        wp_enqueue_style(
          'progressbar',
          AAE_DIR_ASSETS . 'css/progressbar.css',
          null,
          AAE_VERSION
        );

        // quotes
        wp_enqueue_style(
          'quotes',
          AAE_DIR_ASSETS . 'css/quotes.css',
          null,
          AAE_VERSION
        );

        // social-links
        wp_enqueue_style(
          'social-links',
          AAE_DIR_ASSETS . 'css/social-links.css',
          null,
          AAE_VERSION
        );

        
        // table
        wp_enqueue_style(
          'table',
          AAE_DIR_ASSETS . 'css/table.css',
          null,
          AAE_VERSION
        );

        // tabs
        wp_enqueue_style(
          'tabs',
          AAE_DIR_ASSETS . 'css/tabs.css',
          null,
          AAE_VERSION
        );

        // timeline
        wp_enqueue_style(
          'timeline',
          AAE_DIR_ASSETS . 'css/timeline.css',
          null,
          AAE_VERSION
        );

        // featured-post
        wp_enqueue_style(
          'featured-post',
          AAE_DIR_ASSETS . 'css/featured-post.css',
          null,
          AAE_VERSION
        );
        
        // post-list
        wp_enqueue_style(
          'post-list',
          AAE_DIR_ASSETS . 'css/post-list.css',
          null,
          AAE_VERSION
        );

        // post-carousel
        wp_enqueue_style(
          'post-carousel',
          AAE_DIR_ASSETS . 'css/post-carousel.css',
          null,
          AAE_VERSION
        );

        // comming_soon
        wp_enqueue_style(
          'comming_soon',
          AAE_DIR_ASSETS . 'css/comming_soon.css',
          null,
          AAE_VERSION
        );
        
        // countdown
        wp_enqueue_style(
          'countdown',
          AAE_DIR_ASSETS . 'css/countdown.css',
          null,
          AAE_VERSION
        );

        // image-compare
        wp_enqueue_style(
          'image-compare',
          AAE_DIR_ASSETS . 'css/image-compare.css',
          null,
          AAE_VERSION
        );

        // animate
        wp_enqueue_style(
          'animate',
          AAE_DIR_ASSETS . 'vendor/css/animate.css',
          null,
          AAE_VERSION
        );

        // accordion
        wp_enqueue_style(
          'accordion',
          AAE_DIR_ASSETS . 'css/accordion.css',
          null,
          AAE_VERSION
        );

        // instagram
        wp_enqueue_style(
          'instagram',
          AAE_DIR_ASSETS . 'css/instagram.css',
          null,
          AAE_VERSION
        );

        // post-grid
        wp_enqueue_style(
          'post-grid',
          AAE_DIR_ASSETS . 'css/post-grid.css',
          null,
          AAE_VERSION
        );

        // google-maps
        wp_enqueue_style(
          'google-maps',
          AAE_DIR_ASSETS . 'css/google-maps.css',
          null,
          AAE_VERSION
        );

        // twitter-feed
        wp_enqueue_style(
          'twitter-feed',
          AAE_DIR_ASSETS . 'css/twitter-feed.css',
          null,
          AAE_VERSION
        );

        // extra
        wp_enqueue_style(
          'extra',
          AAE_DIR_ASSETS . 'extra.css',
          null,
          AAE_VERSION
        );
        


  }

  // Script include
  function aae_for_elementor_script(){
      $aae_elements_keys = [
          'widget-team',
      ];
      $aae_default_settings = array_fill_keys( $aae_elements_keys, true ); 
      $check_component_active = get_option( 'aae_save_settings', $aae_default_settings );

      //slick
        wp_enqueue_script(
          'slick',
          AAE_DIR_ASSETS . 'vendor/js/slick.min.js',
          ['jquery'],
          AAE_VERSION,
          true
      );

        wp_enqueue_script(
          'widgetAdvancedColor',
          AAE_DIR_ASSETS . 'js/widgetAdvancedColor.js',
          ['jquery'],
          AAE_VERSION,
          true
      );

      wp_enqueue_script(
        'widgetAdvancedSlider',
        AAE_DIR_ASSETS . 'js/widgetAdvancedSlider.js',
        ['jquery'],
        AAE_VERSION,
        true
    );

      //kounty
      wp_enqueue_script(
        'kounty',
        AAE_DIR_ASSETS . 'vendor/js/kounty.min.js',
        ['jquery'],
        AAE_VERSION,
        true
      );
      wp_enqueue_script(
        'widgetCountDown',
        AAE_DIR_ASSETS . 'js/widgetCountDown.js',
        ['jquery'],
        AAE_VERSION,
        true
      );

      

      wp_enqueue_script(
        'waypoints',
        AAE_DIR_ASSETS . 'vendor/js/waypoints.min.js',
        ['jquery'],
        AAE_VERSION,
        true
      );

      wp_enqueue_script(
        'widgetFunFactors',
        AAE_DIR_ASSETS . 'js/widgetFunFactors.js',
        ['jquery'],
        AAE_VERSION,
        true
      );

      wp_enqueue_script(
        'widgetAdvancedSlider',
        AAE_DIR_ASSETS . 'js/widgetAdvancedSlider.js',
        ['jquery'],
        AAE_VERSION,
        true
      );

      wp_enqueue_script(
        'widgetProgressBar',
        AAE_DIR_ASSETS . 'js/widgetProgressBar.js',
        ['jquery'],
        AAE_VERSION,
        true
      );

      wp_enqueue_script(
        'widgetTabs',
        AAE_DIR_ASSETS . 'js/widgetTabs.js',
        ['jquery'],
        AAE_VERSION,
        true
      );

      wp_enqueue_script(
        'cross2-imagecompare',
        AAE_DIR_ASSETS . 'vendor/js/cross2-imagecompare.min.js',
        ['jquery'],
        AAE_VERSION,
        true
      );

      wp_enqueue_script(
        'widgetImageCompare',
        AAE_DIR_ASSETS . 'js/widgetImageCompare.js',
        ['jquery'],
        AAE_VERSION,
        true
      );

      wp_enqueue_script(
        'widgetAccordion',
        AAE_DIR_ASSETS . 'js/widgetAccordion.js',
        ['jquery'],
        AAE_VERSION,
        true
      );

      wp_enqueue_script(
        'widgetAccordion',
        AAE_DIR_ASSETS . 'js/widgetSocialLinks.js',
        ['jquery'],
        AAE_VERSION,
        true
      );

      wp_enqueue_script(
        'parallax',
        AAE_DIR_ASSETS . 'vendor/js/parallax.min.js',
        ['jquery'],
        AAE_VERSION,
        true
      );

      wp_enqueue_script(
        'widgetParallax',
        AAE_DIR_ASSETS . 'js/widgetParallax.activation.js',
        ['jquery'],
        AAE_VERSION,
        true
      );

      wp_enqueue_script(
        'widgetPostgrid',
        AAE_DIR_ASSETS . 'js/widgetPostgrid.js',
        ['jquery'],
        AAE_VERSION,
        true
      );

      wp_enqueue_script(
        'widgetPostgrid',
        AAE_DIR_ASSETS . 'js/widgetAdvancedColor.js',
        ['jquery'],
        AAE_VERSION,
        true
      );

      wp_enqueue_script(
        'googleapis',
        'https://maps.googleapis.com/maps/api/js?key=AIzaSyB2D8wrWMY3XZnuHO6C31uq90JiuaFzGws',
        ['jquery'],
        AAE_VERSION,
        true
      );

      wp_enqueue_script(
        'widgetGoogleMaps',
        AAE_DIR_ASSETS . 'js/widgetGoogleMaps.js',
        ['jquery'],
        AAE_VERSION,
        true
      );




    
  }



}