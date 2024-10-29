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
class AAE_Twitter extends Widget_Base {

	public function get_name() {
		return 'aae-twitter';
	}

	public function get_title() {
		return esc_html__( 'Twitter Slider', 'aa_elementor' );
	}

	public function get_icon() {
		return 'ad ad-twitter';
	}

	public function get_categories() {
		return [ 'aae_elementor' ];
	}

	/**
	 * A list of scripts that the widgets is depended in
	 * @since 1.3.0
	 **/
	public function get_script_depends() {
		return [ 'aae-twitter' ];
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
            'twitterfeed_content',
            [
                'label' => __( 'Twitter Feed', 'aa_elementor' ),
            ]
        );

            $this->add_control(
                'username',
                [
                    'label' => __( 'UserName', 'aa_elementor' ),
                    'type' => Controls_Manager::TEXT,
                    'placeholder' => __( 'advanced', 'aa_elementor' ),
                    'label_block' => true,
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'consumer_key',
                [
                    'label' => __( 'Consumer Key', 'aa_elementor' ),
                    'type' => Controls_Manager::TEXT,
                    'placeholder' => __( 'Twitter consumer key.', 'aa_elementor' ),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'consumer_secret',
                [
                    'label' => __( 'Consumer Secret', 'aa_elementor' ),
                    'type' => Controls_Manager::TEXT,
                    'placeholder' => __( 'Twitter consumer secret.', 'aa_elementor' ),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'access_token',
                [
                    'label' => __( 'Access Token', 'aa_elementor' ),
                    'type' => Controls_Manager::TEXT,
                    'placeholder' => __( 'Twitter access token.', 'aa_elementor' ),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'access_token_secret',
                [
                    'label' => __( 'Access Token Secret', 'aa_elementor' ),
                    'type' => Controls_Manager::TEXT,
                    'placeholder' => __( 'Twitter access token secret.', 'aa_elementor' ),
                    'label_block' => true,
                ]
            );
            
            $this->add_control(
                'limit',
                [
                    'label' => __( 'Limit', 'aa_elementor' ),
                    'type' => Controls_Manager::NUMBER,
                    'step' => 1,
                    'default' => 5,
                    'separator' => 'before'
                ]
            );

            $this->add_control(
                'content_length',
                [
                    'label' => __( 'Content Length', 'aa_elementor' ),
                    'type' => Controls_Manager::NUMBER,
                    'step' => 1,
                    'default' => 20,
                    'separator' => 'after'
                ]
            );

            $this->add_control(
                'author_image',
                [
                    'label' => __( 'Show Author Image', 'aa_elementor' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', 'aa_elementor' ),
                    'label_off' => __( 'Hide', 'aa_elementor' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );

            $this->add_control(
                'author_name',
                [
                    'label' => __( 'Show Author Name', 'aa_elementor' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', 'aa_elementor' ),
                    'label_off' => __( 'Hide', 'aa_elementor' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );

            $this->add_control(
                'show_time',
                [
                    'label' => __( 'Show Time', 'aa_elementor' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', 'aa_elementor' ),
                    'label_off' => __( 'Hide', 'aa_elementor' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );

            $this->add_control(
                'relative_time',
                [
                    'label' => __( 'Show Relative Time', 'aa_elementor' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', 'aa_elementor' ),
                    'label_off' => __( 'Hide', 'aa_elementor' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                    'condition'=>[
                        'show_time'=>'yes',
                    ]
                ]
            );

        $this->end_controls_section();

        // Item Style tab section
        $this->start_controls_section(
            'twitterfeed_item_style_section',
            [
                'label' => __( 'Single Item', 'aa_elementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        
        $this->add_control(
            'bg_color',
            [
                'label'     => __( 'Background Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_slider,.advanced_addons_twitter_item' => 'background: {{VALUE}} !important',
                ],
            ]
        );
            $this->add_responsive_control(
                'twitterfeed_item_margin',
                [
                    'label' => __( 'Margin', 'aa_elementor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .advanced_addons_slider' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' =>'before',
                ]
            );

            $this->add_responsive_control(
                'twitterfeed_item_padding',
                [
                    'label' => __( 'Padding', 'aa_elementor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .advanced_addons_slider' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' =>'before',
                ]
            );


            $this->add_responsive_control(
                'twitterfeed_item_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'aa_elementor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'selectors' => [
                        '{{WRAPPER}} .advanced_addons_slider' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    ],
                ]
            );

        $this->end_controls_section();


        // Item Style tab section
        $this->start_controls_section(
            'twitterfeed_item_style_user',
            [
                'label' => __( 'Username Section', 'aa_elementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        
        $this->add_control(
            'user_color',
            [
                'label'     => __( 'Text Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .t-user' => 'color: {{VALUE}} !important',
                ],
            ]
        );
           
        $this->add_group_control(
            Group_Control_Typography:: get_type(),
            [
                'name'     => 'user_typography',
                'label'    => __( 'Username Typography', 'aa_elementor' ),
                'selector' => '{{WRAPPER}} .t-user',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

        $this->end_controls_section();

        // Item Style tab section
        $this->start_controls_section(
            'twitterfeed_item_style_time',
            [
                'label' => __( 'Date/Time Section', 'aa_elementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        
        $this->add_control(
            'time_color',
            [
                'label'     => __( 'Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .t-date-time' => 'color: {{VALUE}} !important',
                ],
            ]
        );
           
        $this->add_group_control(
            Group_Control_Typography:: get_type(),
            [
                'name'     => 'time_typography',
                'label'    => __( 'Date/time Typography', 'aa_elementor' ),
                'selector' => '{{WRAPPER}} .t-date-time',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

        $this->end_controls_section();

        $this->end_controls_section();

        // Item Style tab section
        $this->start_controls_section(
            'twitterfeed_item_style_desc',
            [
                'label' => __( 'Content Section', 'aa_elementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        
        $this->add_control(
            'content_color',
            [
                'label'     => __( 'Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .t-desc' => 'color: {{VALUE}} !important',
                ],
            ]
        );
           
        $this->add_group_control(
            Group_Control_Typography:: get_type(),
            [
                'name'     => 'content_typography',
                'label'    => __( 'Content Typography', 'aa_elementor' ),
                'selector' => '{{WRAPPER}} .t-desc',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

        $this->end_controls_section();

        // Item Style tab section
        $this->start_controls_section(
            'twitterfeed_item_style_btn',
            [
                'label' => __( 'Button Section', 'aa_elementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        
        $this->add_control(
            'btn_color',
            [
                'label'     => __( 'Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .t-btn' => 'color: {{VALUE}} !important',
                ],
            ]
        );

        $this->add_control(
            'btn_bg_color',
            [
                'label'     => __( 'Background Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .t-btn' => 'background-color: {{VALUE}} !important',
                ],
            ]
        );
           
        $this->add_control(
            'btn_border_color',
            [
                'label'     => __( 'Border Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .t-btn' => 'border-color: {{VALUE}} !important',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography:: get_type(),
            [
                'name'     => 'btn_typography',
                'label'    => __( 'Button Typography', 'aa_elementor' ),
                'selector' => '{{WRAPPER}} .t-btn',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

        $this->end_controls_section();
}

	protected function render() {
		require AAE_PATH . '/modules/twitter/template/view.php';
    }

    // protected function _content_template() {
	// 	require AAE_PATH . '/modules/twitter/template/content-template.php';
    // }
    
    public function relative_time( $time ){
        $second = 1;
        $minute = 60 * $second;
        $hour = 60 * $minute;
        $day = 24 * $hour;
        $month = 30 * $day;

        $delta = strtotime('+0 hours') - strtotime($time);
        if ($delta < 2 * $minute) {
            return esc_html__('1 min ago', 'aa_elementor');
        }
        if ($delta < 45 * $minute) {
            return floor($delta / $minute) . esc_html__(' min ago', 'aa_elementor');
        }
        if ($delta < 90 * $minute) {
            return esc_html__('1 hour ago', 'aa_elementor');
        }
        if ($delta < 24 * $hour) {
            return floor($delta / $hour) . esc_html__(' hours ago', 'aa_elementor');
        }
        if ($delta < 48 * $hour) {
            return esc_html__('yesterday', 'aa_elementor');
        }
        if ($delta < 30 * $day) {
            return floor($delta / $day) . esc_html__(' days ago', 'aa_elementor');
        }
        if ($delta < 12 * $month) {
            $months = floor($delta / $day / 30);
            return $months <= 1 ? esc_html__('1 month ago', 'aa_elementor') : $months . esc_html__(' months ago', 'aa_elementor');
        } else {
            $years = floor($delta / $day / 365);
            return $years <= 1 ? esc_html__('1 year ago', 'aa_elementor') : $years . esc_html__(' years ago', 'aa_elementor');
        }
    }

    public function date_format($time){
        return mysql2date(get_option('time_format'), $time) . ' - ' . mysql2date(get_option('date_format'), $time);
    }

    public function get_short_link($url){
        $result = wp_remote_post( add_query_arg( 'key', apply_filters( 'google_api_key', 'AIzaSyBEPh-As7b5US77SgxbZUfMXAwWYjfpWYg' ), 'https://www.googleapis.com/urlshortener/v1/url' ), array(
            'body' => json_encode( array( 'longUrl' => esc_url_raw( $url ) ) ),
            'headers' => array( 'Content-Type' => 'application/json' ),
        ) );

        /* Return the URL if the request got an error. */
        if( is_wp_error( $result ) ){
            return '';
        }
        $result = json_decode( $result['body'] );
        if(isset($result->id)){
            $shortlink = $result->id;
            if( $shortlink ){
                return $shortlink;
            }
        }
        return '';
    }
    
    



}
