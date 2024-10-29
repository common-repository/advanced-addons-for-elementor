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
class AAE_Countdown extends Widget_Base {

	public function get_name() {
		return 'aae-countdown';
	}

	public function get_title() {
		return esc_html__( 'Countdown', 'aa_elementor' );
	}

	public function get_icon() {
		return 'ad ad-calculation';
	}

	public function get_categories() {
		return [ 'aae_elementor' ];
	}

	/**
	 * A list of scripts that the widgets is depended in
	 * @since 1.3.0
	 **/
	public function get_script_depends() {
		return [ 'aae-for-elementor-team' ];
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
			'_section_media',
			[
				'label' => __( 'Countdown', 'aa_elementor' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
        );
        
        $this->add_control(
		    'style',
				[
					'label'   => __( 'Visual Style', 'aa_elementor' ),
					'type'    => Controls_Manager::SELECT,
					'default' => 'style1',
					'options' => [
						'style1' => __( 'Style 1', 'aa_elementor' ),	
						],
				]
        );

        $this->add_control(
			'ad_countdown_due_time',
			[
				'label' => esc_html__( 'Countdown Due Date', 'aa_elementor' ),
				'type' => Controls_Manager::DATE_TIME,
				'default' => date("Y-m-d", strtotime("+ 1 day")),
				'description' => esc_html__( 'Set the due date and time', 'aa_elementor' ),
			]
		);


   $this->end_controls_section();

    $this->start_controls_section(
        'ad_section_countdown_settings_content',
        [
            'label' => esc_html__( 'Content Settings', 'aa_elementor' )
        ]
    );


        $this->add_control(
        'ad_countdown_days',
        [
            'label' => esc_html__( 'Display Days', 'aa_elementor' ),
            'type' => Controls_Manager::SWITCHER,
            'return_value' => 'yes',
            'default' => 'yes',
        ]
        );

        $this->add_control(
        'ad_countdown_days_label',
        [
            'label' => esc_html__( 'Custom Label for Days', 'aa_elementor' ),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__( 'Days', 'aa_elementor' ),
            'description' => esc_html__( 'Leave blank to hide', 'aa_elementor' ),
            'condition' => [
                'ad_countdown_days' => 'yes',
            ],
        ]
        );


        $this->add_control(
        'ad_countdown_hours',
        [
            'label' => esc_html__( 'Display Hours', 'aa_elementor' ),
            'type' => Controls_Manager::SWITCHER,
            'return_value' => 'yes',
            'default' => 'yes',
        ]
        );

        $this->add_control(
        'ad_countdown_hours_label',
        [
            'label' => esc_html__( 'Custom Label for Hours', 'aa_elementor' ),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__( 'Hours', 'aa_elementor' ),
            'description' => esc_html__( 'Leave blank to hide', 'aa_elementor' ),
            'condition' => [
                'ad_countdown_hours' => 'yes',
            ],
        ]
        );

        $this->add_control(
        'ad_countdown_minutes',
        [
            'label' => esc_html__( 'Display Minutes', 'aa_elementor' ),
            'type' => Controls_Manager::SWITCHER,
            'return_value' => 'yes',
            'default' => 'yes',
        ]
        );

        $this->add_control(
        'ad_countdown_minutes_label',
        [
            'label' => esc_html__( 'Custom Label for Minutes', 'aa_elementor' ),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__( 'Minutes', 'aa_elementor' ),
            'description' => esc_html__( 'Leave blank to hide', 'aa_elementor' ),
            'condition' => [
                'ad_countdown_minutes' => 'yes',
            ],
        ]
        );
        
        $this->add_control(
        'ad_countdown_seconds',
        [
            'label' => esc_html__( 'Display Seconds', 'aa_elementor' ),
            'type' => Controls_Manager::SWITCHER,
            'return_value' => 'yes',
            'default' => 'yes',
        ]
        );

        $this->add_control(
        'ad_countdown_seconds_label',
        [
            'label' => esc_html__( 'Custom Label for Seconds', 'aa_elementor' ),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__( 'Seconds', 'aa_elementor' ),
            'description' => esc_html__( 'Leave blank to hide', 'aa_elementor' ),
            'condition' => [
                'ad_countdown_seconds' => 'yes',
            ],
        ]
        );

    $this->end_controls_section();

    $this->start_controls_section(
        '_section_style_common',
        [
            'label' => __( 'Section Style', 'aa_elementor' ),
            'tab'   => Controls_Manager::TAB_STYLE,
        ]
    );

        $this->add_responsive_control(
            'content_padding',
            [
                'label'      => __( 'Padding', 'aa_elementor' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .advanced_addons_countdown' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'content_margin',
            [
                'label'      => __( 'Margin', 'aa_elementor' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .advanced_addons_countdown' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

    $this->end_controls_section();
    
    // $this->start_controls_section(
    //     '_section_style_days',
    //     [
    //         'label' => __( 'Days Section', 'aa_elementor' ),
    //         'tab'   => Controls_Manager::TAB_STYLE,
    //     ]
    // );
    
    // $this->add_group_control(
    //     Group_Control_Typography:: get_type(),
    //     [
    //         'name'     => 'days_typography',
    //         'label'    => __( 'Typography', 'aa_elementor' ),
    //         'selector' => '{{WRAPPER}} .countdown-days',
    //         'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
    //     ]
    // );

    // $this->add_control(
    //     'days_color',
    //     [
    //         'label'     => __( 'Title Color', 'aa_elementor' ),
    //         'type'      => Controls_Manager::COLOR,
    //         'selectors' => [
    //             '{{WRAPPER}} .countdown-days' => 'color: {{VALUE}}',
    //         ],
    //     ]
    // );
        
    // $this->end_controls_section();
		

	}

	protected function render() {
		require AAE_PATH . '/modules/countdown/template/view.php';
	}


}
