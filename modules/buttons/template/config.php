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
class AAE_Buttons extends Widget_Base {

	public function get_name() {
		return 'aae-button';
	}

	public function get_title() {
		return esc_html__( 'Buttons', 'aa_elementor' );
	}

	public function get_icon() {
		return 'ad ad-play-button';
	}

	public function get_categories() {
		return [ 'aae_elementor' ];
	}

	/**
	 * A list of scripts that the widgets is depended in
	 * @since 1.3.0
	 **/
	public function get_script_depends() {
		return [ 'aae-for-elementor-button' ];
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
			'_section_info',
			[
				'label' => __( 'Information', 'aa_elementor' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
			'text',
			[
				'label'   => __( 'Text', 'aa_elementor' ),
				'type'    => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default'     => __( 'Click here', 'aa_elementor' ),
				'placeholder' => __( 'Click here', 'aa_elementor' ),
			]
        );
        
        $this->add_control(
			'link',
			[
				'label'   => __( 'Link', 'aa_elementor' ),
				'type'    => Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'https://your-link.com', 'aa_elementor' ),
				'default'     => [
					'url' => '#',
				],
			]
        );
        
        $this->add_responsive_control(
			'align',
			[
				'label'   => __( 'Alignment', 'aa_elementor' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [
					'left'    => [
						'title' => __( 'Left', 'aa_elementor' ),
						'icon'  => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'aa_elementor' ),
						'icon'  => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'aa_elementor' ),
						'icon'  => 'fa fa-align-right',
					],
					'justify' => [
						'title' => __( 'Justified', 'aa_elementor' ),
						'icon'  => 'fa fa-align-justify',
					],
				],
				'prefix_class' => 'elementor%s-align-',
				'default'      => '',
			]
        );
        $this->add_control(
            'show_icon',
            [
                'label'        => __( 'Show Icon', 'plugin-domain' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'Show', 'aa_elementor' ),
                'label_off'    => __( 'Hide', 'aa_elementor' ),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );
        $this->add_control(
			'icon',
			[
				'label'       => __( 'Icon', 'aa_elementor' ),
				'type'        => Controls_Manager::ICON,
				'label_block' => true,
                'default' => 'fa fa-smile-o',
                'condition' => [
                    'show_icon' => 'yes',
                ]
			]
        );

        $this->add_control(
            'bg_color',
            [
                'label'     => __( 'Background Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_btn' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'border_color',
            [
                'label'     => __( 'Border Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_btn' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'border_style',
            [
                'label'   => __( 'Border Width', 'aa_elementor' ),
                'type'    => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 1
                ],
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_btn' => 'border-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'hov_color',
            [
                'label'     => __( 'Hover BG Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_btn:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'border_hover_color',
            [
                'label'     => __( 'Border Hover Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_btn:hover' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'color',
            [
                'label'     => __( 'Text Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_btn a' => 'color: {{VALUE}} !important',
                ],
            ]
        );

        $this->add_control(
            'ho_color',
            [
                'label'     => __( 'Hover Text Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_btn a:hover' => 'color: {{VALUE}} !important',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_common',
            [
                'label' => __( 'Style', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
		);

		$this->add_responsive_control(
            'button_padding',
            [
                'label'      => __( 'Padding', 'aa_elementor'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .ad-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        
        $this->add_responsive_control(
            'border_radius',
            [
                'label'      => __( 'Border Radius', 'aa_elementor' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .advanced_addons_btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography:: get_type(),
            [
                'name'     => 'button_typography',
                'label'    => __( 'Typography', 'aa_elementor' ),
                'selector' => '{{WRAPPER}} .ad-btn',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );
        
        $this->add_group_control(
            Group_Control_Box_Shadow:: get_type(),
            [
                'name'     => 'button_box_shadow',
                'selector' => '{{WRAPPER}} .advanced_addons_btn'
            ]
		);
        
        $this->end_controls_section();
		

	}

	protected function render() {
		require AAE_PATH . '/modules/buttons/template/view.php';
    }
    
    protected function _content_template() {
		require AAE_PATH . '/modules/buttons/template/content-template.php';
	}



}
