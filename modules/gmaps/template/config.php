<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use \Elementor\Group_Control_Background as Group_Control_Background;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Utils;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Perfecto aae Portfolio
 *
 * Elementor widget for aae portfolio
 *
 * @since 1.0.0
 */
class AAE_Gmaps extends Widget_Base {

	public function get_name() {
		return 'aae-gmaps';
	}

	public function get_title() {
		return esc_html__( 'Google Maps', 'aa_elementor' );
	}

	public function get_icon() {
		return 'ad ad-map-marker';
	}

	public function get_categories() {
		return [ 'aae_elementor' ];
	}

	/**
	 * A list of scripts that the widgets is depended in
	 * @since 1.3.0
	 **/
	public function get_script_depends() {
		return [ 'aae-post-grid' ];
    }

    protected  function get_profile_names() {
        return [
            'apple' => __( 'Apple', 'aa_elementor' ),
            'behance' => __( 'Behance', 'aa_elementor' ),
            'bitbucket' => __( 'BitBucket', 'aa_elementor' ),
            'codepen' => __( 'CodePen', 'aa_elementor' ),
            'delicious' => __( 'Delicious', 'aa_elementor' ),
            'deviantart' => __( 'DeviantArt', 'aa_elementor' ),
            'digg' => __( 'Digg', 'aa_elementor' ),
            'dribbble' => __( 'Dribbble', 'aa_elementor' ),
            'email' => __( 'Email', 'aa_elementor' ),
            'facebook' => __( 'Facebook', 'aa_elementor' ),
            'flickr' => __( 'Flicker', 'aa_elementor' ),
            'foursquare' => __( 'FourSquare', 'aa_elementor' ),
            'github' => __( 'Github', 'aa_elementor' ),
            'houzz' => __( 'Houzz', 'aa_elementor' ),
            'instagram' => __( 'Instagram', 'aa_elementor' ),
            'jsfiddle' => __( 'JS Fiddle', 'aa_elementor' ),
            'linkedin' => __( 'LinkedIn', 'aa_elementor' ),
            'medium' => __( 'Medium', 'aa_elementor' ),
            'pinterest' => __( 'Pinterest', 'aa_elementor' ),
            'product-hunt' => __( 'Product Hunt', 'aa_elementor' ),
            'reddit' => __( 'Reddit', 'aa_elementor' ),
            'slideshare' => __( 'Slide Share', 'aa_elementor' ),
            'snapchat' => __( 'Snapchat', 'aa_elementor' ),
            'soundcloud' => __( 'SoundCloud', 'aa_elementor' ),
            'spotify' => __( 'Spotify', 'aa_elementor' ),
            'stack-overflow' => __( 'StackOverflow', 'aa_elementor' ),
            'tripadvisor' => __( 'TripAdvisor', 'aa_elementor' ),
            'tumblr' => __( 'Tumblr', 'aa_elementor' ),
            'twitch' => __( 'Twitch', 'aa_elementor' ),
            'twitter' => __( 'Twitter', 'aa_elementor' ),
            'vimeo' => __( 'Vimeo', 'aa_elementor' ),
            'vk' => __( 'VK', 'aa_elementor' ),
            'website' => __( 'Website', 'aa_elementor' ),
            'whatsapp' => __( 'WhatsApp', 'aa_elementor' ),
            'wordpress' => __( 'WordPress', 'aa_elementor' ),
            'xing' => __( 'Xing', 'aa_elementor' ),
            'yelp' => __( 'Yelp', 'aa_elementor' ),
            'youtube' => __( 'YouTube', 'aa_elementor' ),
        ];
    }
    

	protected function _register_controls() {

            $this->start_controls_section(
                'gmaps_content',
                [
                    'label' => __( 'Google Maps', 'aa_elementor' ),
                ]
            );
            
            $this->add_control(
                'style',
                [
                    'label' => __( 'Style', 'aa_elementor' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'style1',
                    'options' => [
                        'style1' => __( 'Style One', 'aa_elementor' ),
                        'style2' => __( 'Style Two', 'aa_elementor' ),
                        'style3' => __( 'Style Three', 'aa_elementor' ),
                    ],
                ]
            );


            $this->add_responsive_control(
                'aae_google_map_height',
                [
                    'label' => __( 'Map Height', 'aa_elementor' ),
                    'type'  => Controls_Manager::SLIDER,
                    'range' => [
                        'px' => [
                            'max' => 1000,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 500,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .advanced_addons_maps'  => 'min-height: {{SIZE}}{{UNIT}}',
                    ],
                ]
            );

            $this->add_control(
                'marker_lat',
                    [
                            'name'        => 'marker_lat',
                            'label'       => __( 'Latitude', 'aa_elementor' ),
                            'type'        => Controls_Manager::TEXT,
                            'default'     => '31.42866311735861',
                    ]
            );

            $this->add_control(
                'marker_lang',
                [
                    'name'        => 'marker_lng',
                    'label'       => __( 'Longitude', 'aa_elementor' ),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => '-98.61328125',
               ]
            );

            $this->add_control(
                'image',
                [
                    'label'   => __( 'Marker Image', 'aa_elementor' ),
                    'type'    => Controls_Manager::MEDIA,
                    
                   
                ]
            );

            $this->end_controls_section();

            
        
	}

	protected function render() {
		require AAE_PATH . '/modules/gmaps/template/view.php';
    }
    
    
    

}
