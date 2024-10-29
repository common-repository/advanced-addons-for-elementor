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
class AAE_Dual_Button extends Widget_Base {

	public function get_name() {
		return 'aae-dual-button';
	}

	public function get_title() {
		return esc_html__( 'Dual Buttons', 'aa_elementor' );
	}

	public function get_icon() {
		return 'ad ad-accordion-horizontal';
	}

	public function get_categories() {
		return [ 'aae_elementor' ];
	}

	/**
	 * A list of scripts that the widgets is depended in
	 * @since 1.3.0
	 **/
	public function get_script_depends() {
		return [ 'aae-for-elementor-caldera-forms' ];
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
            '_section_button',
            [
                'label' => __( 'Dual Buttons', 'aa_elementor' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->start_controls_tabs( '_tabs_buttons' );

        $this->start_controls_tab(
            '_tab_button_left',
            [
                'label' => __( 'Left', 'aa_elementor' ),
            ]
        );

        $this->add_control(
            'left_button_text',
            [
                'label' => __( 'Text', 'aa_elementor' ),
                'label_block'=> true,
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Button Text', 'aa_elementor' )
            ]
        );

        $this->add_control(
            'left_button_link',
            [
                'label' => __( 'Link', 'aa_elementor' ),
                'type' => Controls_Manager::URL,
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_button_connector',
            [
                'label' => __( 'Connector', 'aa_elementor' ),
            ]
        );

        $this->add_control(
            'button_connector_hide',
            [
                'label' => __( 'Hide Connector?', 'aa_elementor' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Hide', 'aa_elementor' ),
                'label_off' => __( 'Show', 'aa_elementor' ),
            ]
        );

        $this->add_control(
            'button_connector_type',
            [
                'label' => __( 'Connector Type', 'aa_elementor' ),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'text' => [
                        'title' => __( 'Text', 'aa_elementor' ),
                        'icon' => 'fa fa-text-width',
                    ],
                    'icon' => [
                        'title' => __( 'Icon', 'aa_elementor' ),
                        'icon' => 'fa fa-star',
                    ]
                ],
                'toggle' => false,
                'default' => 'text',
                'condition' => [
                    'button_connector_hide!' => 'yes',
                ]
            ]
        );

        $this->add_control(
            'button_connector_text',
            [
                'label' => __( 'Text', 'aa_elementor' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Or', 'aa_elementor' ),
                'condition' => [
                    'button_connector_hide!' => 'yes',
                    'button_connector_type' => 'text',
                ]
            ]
        );

        $this->add_control(
            'button_connector_icon',
            [
                'label' => __( 'Icon', 'aa_elementor' ),
                'type' => Controls_Manager::ICON,
                'options' => Advance_Addons_Icons(),
                'condition' => [
                    'button_connector_hide!' => 'yes',
                    'button_connector_type' => 'icon',
                ]
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_button_right',
            [
                'label' => __( 'Right', 'aa_elementor' ),
            ]
        );

        $this->add_control(
            'right_button_text',
            [
                'label' => __( 'Text', 'aa_elementor' ),
                'label_block'=> true,
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Button Text', 'aa_elementor' )
            ]
        );

        $this->add_control(
            'right_button_link',
            [
                'label' => __( 'Link', 'aa_elementor' ),
                'type' => Controls_Manager::URL
            ]
        );

        $this->add_control(
            'right_button_icon_spacing',
            [
                'label' => __( 'Icon Spacing', 'aa_elementor' ),
                'type' => Controls_Manager::SLIDER,
                'condition' => [
                    'right_button_icon!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .ad-dual-btn--right .ad-dual-btn-icon--before' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .ad-dual-btn--right .ad-dual-btn-icon--after' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_common',
            [
                'label' => __( 'Common', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
		);

		$this->add_responsive_control(
            'button_padding',
            [
                'label' => __( 'Padding', 'aa_elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .ad-dual-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
		);

		$this->add_responsive_control(
            'button_gap',
            [
                'label' => __( 'Space Between Buttons', 'aa_elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .ad-dual-btn--left' => 'margin-right: calc({{SIZE}}{{UNIT}}/2);',
                    '{{WRAPPER}} .ad-dual-btn--right' => 'margin-left: calc({{SIZE}}{{UNIT}}/2);',
                ],
            ]
		);

		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'label' => __( 'Typography', 'aa_elementor' ),
                'selector' => '{{WRAPPER}} .ad-dual-btn',
                'scheme' => Scheme_Typography::TYPOGRAPHY_4,
            ]
		);

		$this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_box_shadow',
                'selector' => '{{WRAPPER}} .ad-dual-btn'
            ]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'_section_style_left_button',
            [
                'label' => __( 'Left Button', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
		);

        $this->add_responsive_control(
            'left_button_padding',
            [
                'label' => __( 'Padding', 'aa_elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .ad-dual-btn--left' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

		$this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'left_button_border',
                'selector' => '{{WRAPPER}} .ad-dual-btn--left'
            ]
		);

        $this->add_responsive_control(
            'left_button_border_radius',
            [
                'label' => __( 'Border Radius', 'aa_elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .ad-dual-btn--left' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
		);

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'left_button_typography',
                'label' => __( 'Typography', 'aa_elementor' ),
                'selector' => '{{WRAPPER}} .ad-dual-btn--left',
                'scheme' => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'left_button_box_shadow',
                'selector' => '{{WRAPPER}} .ad-dual-btn--left'
            ]
        );

		$this->start_controls_tabs( '_tabs_left_button' );

        $this->start_controls_tab(
            '_tab_left_button_normal',
            [
                'label' => __( 'Normal', 'aa_elementor' ),
            ]
		);

		$this->add_control(
            'left_button_bg_color',
            [
                'label' => __( 'Background Color', 'aa_elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ad-dual-btn--left' => 'background-color: {{VALUE}}',
                ],
            ]
        );

		$this->add_control(
            'left_button_text_color',
            [
                'label' => __( 'Text Color', 'aa_elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ad-dual-btn--left' => 'color: {{VALUE}}',
                ],
            ]
        );

		$this->end_controls_tab();

		$this->start_controls_tab(
            '_tabs_left_button_hover',
            [
                'label' => __( 'Hover', 'aa_elementor' ),
            ]
		);

		$this->add_control(
            'left_button_hover_bg_color',
            [
                'label' => __( 'Background Color', 'aa_elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ad-dual-btn--left:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

		$this->add_control(
            'left_button_hover_text_color',
            [
                'label' => __( 'Text Color', 'aa_elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ad-dual-btn--left:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'left_button_hover_border_color',
            [
                'label' => __( 'Border Color', 'aa_elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ad-dual-btn--left:hover' => 'border-color: {{VALUE}}',
                ],
                'condition' => [
                    'left_button_border_border!' => ''
                ]
            ]
        );

		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->end_controls_section();

		$this->start_controls_section(
			'_section_style_connector',
            [
                'label' => __( 'Connector', 'aa_elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
            ]
		);

        $this->add_control(
            'connector_notice',
            [
                'type' => Controls_Manager::RAW_HTML,
                'raw' => __( 'Connector is hidden now, please enable connector from Content > Connector tab.', 'aa_elementor' ),
                'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
                'condition' => [
                    'button_connector_hide' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'connector_text_color',
            [
                'label' => __( 'Text Color', 'aa_elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .button_group_icon' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'button_connector_hide!' => 'yes',
                    'button_connector_type' => 'text',
                ]
            ]
        );

        $this->add_control(
            'connector_icon_color',
            [
                'label' => __( 'Icon Color', 'aa_elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .button_group_icon i' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'button_connector_hide!' => 'yes',
                    'button_connector_type' => 'icon',
                ]
            ]
        );


		$this->add_control(
            'connector_bg_color',
            [
                'label' => __( 'Background Color', 'aa_elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .button_group_icon' => 'background-color: {{VALUE}}',
                ],
            ]
        );

		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'connector_typography',
                'label' => __( 'Typography', 'aa_elementor' ),
                'selector' => '{{WRAPPER}} .button_group_icon',
                'scheme' => Scheme_Typography::TYPOGRAPHY_3
            ]
		);

		$this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'connector_box_shadow',
                'selector' => '{{WRAPPER}} .button_group_icon'
            ]
		);

		$this->end_controls_section();

        $this->start_controls_section(
            '_section_style_right_button',
            [
                'label' => __( 'Right Button', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'right_button_padding',
            [
                'label' => __( 'Padding', 'aa_elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .ad-dual-btn--right' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'right_button_border',
                'selector' => '{{WRAPPER}} .ad-dual-btn--right'
            ]
        );

        $this->add_responsive_control(
            'right_button_border_radius',
            [
                'label' => __( 'Border Radius', 'aa_elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .ad-dual-btn--right' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'right_button_typography',
                'label' => __( 'Typography', 'aa_elementor' ),
                'selector' => '{{WRAPPER}} .ad-dual-btn--right',
                'scheme' => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'right_button_box_shadow',
                'selector' => '{{WRAPPER}} .ad-dual-btn--right'
            ]
        );

        $this->start_controls_tabs( '_tabs_right_button' );

        $this->start_controls_tab(
            '_tab_right_button_normal',
            [
                'label' => __( 'Normal', 'aa_elementor' ),
            ]
        );

        $this->add_control(
            'right_button_bg_color',
            [
                'label' => __( 'Background Color', 'aa_elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ad-dual-btn--right' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'right_button_text_color',
            [
                'label' => __( 'Text Color', 'aa_elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ad-dual-btn--right' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tabs_right_button_hover',
            [
                'label' => __( 'Hover', 'aa_elementor' ),
            ]
        );

        $this->add_control(
            'right_button_hover_bg_color',
            [
                'label' => __( 'Background Color', 'aa_elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ad-dual-btn--right:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'right_button_hover_text_color',
            [
                'label' => __( 'Text Color', 'aa_elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ad-dual-btn--right:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'right_button_hover_border_color',
            [
                'label' => __( 'Border Color', 'aa_elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ad-dual-btn--right:hover' => 'border-color: {{VALUE}}',
                ],
                'condition' => [
                    'right_button_border_border!' => ''
                ]
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();
		
	}

	protected function render() {
		require AAE_PATH . '/modules/dual-button/template/view.php';
    }
    



}
