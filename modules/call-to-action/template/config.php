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
class AAE_Call_To_Action extends Widget_Base {

	public function get_name() {
		return 'aae-call-to-action';
	}

	public function get_title() {
		return esc_html__( 'Call To Action', 'aa_elementor' );
	}

	public function get_icon() {
		return 'ad ad-injection';
	}

	public function get_categories() {
		return [ 'aae_elementor' ];
	}

	/**
	 * A list of scripts that the widgets is depended in
	 * @since 1.3.0
	 **/
	public function get_script_depends() {
		return [ 'aae-for-elementor-call-to-action' ];
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
				'label' => __( 'Call To Action', 'aa_elementor' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		/*-------------------------------------
			Visual Style
		-------------------------------------*/
        $this->add_control(
            'style',
            [
                'label'   => __( 'Visual Style', 'aa_elementor' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'style1',
                'options' => [
                    'style1' => __( 'Style 1', 'aa_elementor' ),
                    'style2' => __( 'Style 2', 'aa_elementor' ),
                    'style3' => __( 'Style 3', 'aa_elementor' ),
                    
                ],
            ]
        );

        $this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'aa_elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your title', 'aa_elementor' ),
				'default'     => __( 'Call to Action Headline', 'aa_elementor' ),
				'label_block' => true,
			]
        );

		$this->add_control(
			'sub_title',
			[
				'label'       => __( ' Sub Title', 'aa_elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your pre title', 'aa_elementor' ),
				'default'     => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'aa_elementor' ),
				'label_block' => true,
			]
        );

        $this->add_control(
            'image2',
            [
                'label'   => __( 'Background Image', 'aa_elementor' ),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition'     => [
                    'style' => array('style1','style3'),
                ]
            ]
        );

        $this->add_control(
            'image',
            [
                'label'   => __( 'Image', 'aa_elementor' ),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition'     => [
                    'style' => array('style2'),
                ]
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label'   => __( 'Title HTML Tag', 'aa_elementor' ),
                'type'    => Controls_Manager::CHOOSE,
                'options' => [
                    'h1'  => [
                        'title' => __( 'H1', 'aa_elementor' ),
                        'icon'  => 'eicon-editor-h1'
                    ],
                    'h2'  => [
                        'title' => __( 'H2', 'aa_elementor' ),
                        'icon'  => 'eicon-editor-h2'
                    ],
                    'h3'  => [
                        'title' => __( 'H3', 'aa_elementor' ),
                        'icon'  => 'eicon-editor-h3'
                    ],
                    'h4'  => [
                        'title' => __( 'H4', 'aa_elementor' ),
                        'icon'  => 'eicon-editor-h4'
                    ],
                    'h5'  => [
                        'title' => __( 'H5', 'aa_elementor' ),
                        'icon'  => 'eicon-editor-h5'
                    ],
                    'h6'  => [
                        'title' => __( 'H6', 'aa_elementor' ),
                        'icon'  => 'eicon-editor-h6'
                    ]
                ],
                'default' => 'h2',
                'toggle'  => false,
            ]
        );

        $this->add_responsive_control(
            'align',
            [
                'label'   => __( 'Alignment', 'aa_elementor' ),
                'type'    => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
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
                        'title' => __( 'Justify', 'aa_elementor' ),
                        'icon'  => 'fa fa-align-justify',
                    ],
                ],
                'toggle'    => true,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_callto_action' => 'text-align: {{VALUE}} !important'
                ]
            ]
        );
        
        $this->end_controls_section();

        $this->start_controls_section(
			'_section_button',
			[
				'label' => __( 'Button Section', 'aa_elementor' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
        
        $this->add_control(
            'button_text',
            [
                'label'       => __( 'Button Text', 'aa_elementor' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => __( 'Button Text', 'aa_elementor' ),
                'placeholder' => __( 'Type button text here', 'aa_elementor' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label'       => __( 'Link', 'aa_elementor' ),
                'type'        => Controls_Manager::URL,
                'placeholder' => __( 'https://example.com/', 'aa_elementor' ),
            ]
        );

        $this->add_control(
            'button_text2',
            [
                'label'       => __( 'Button Text Two', 'aa_elementor' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => __( 'Button Text', 'aa_elementor' ),
                'placeholder' => __( 'Type button text here', 'aa_elementor' ),
                'label_block' => true,
                'condition'     => [
                    'style' => 'style1'
                ]
            ]
        );

        $this->add_control(
            'button_link2',
            [
                'label'       => __( 'Button Link Two', 'aa_elementor' ),
                'type'        => Controls_Manager::URL,
                'placeholder' => __( 'https://example.com/', 'aa_elementor' ),
                'condition'     => [
                    'style' => 'style1'
                ]
            ]
        );
    $this->end_controls_section();

    $this->start_controls_section(
        '_section_style_section',
        [
            'label' => __( 'Section Style', 'aa_elementor' ),
            'tab'   => Controls_Manager::TAB_STYLE,
        ]
    );
    
    $this->add_responsive_control(
        'field_padding',
        [
            'label' => __( 'Padding', 'aa_elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', 'em', '%' ],
            'selectors' => [
                '{{WRAPPER}} .ade-cal' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_responsive_control(
        'field_margins',
        [
            'label' => __( 'Margin', 'aa_elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', 'em', '%' ],
            'selectors' => [
                '{{WRAPPER}} .ade-cal' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_group_control(
        Group_Control_Background::get_type(),
        [
                'name' => 'p_background',
                'label' => __( 'Background Color', 'aa_elementor' ),
                'types' => ['gradient'],
                'selector' => '{{WRAPPER}} .advanced_addons_callto_action_area.type-2 .overlay',
                'condition'     => [
                    'style' => array('style1'),
                ]
        ]
    );

    $this->end_controls_section();
    
    $this->start_controls_section(
        '_section_style_title',
        [
            'label' => __( 'Title Style', 'aa_elementor' ),
            'tab'   => Controls_Manager::TAB_STYLE,
        ]
    );


    $this->add_group_control(
        Group_Control_Typography:: get_type(),
        [
            'name'     => 'title_typography',
            'label'    => __( 'Typography', 'aa_elementor' ),
            'selector' => '{{WRAPPER}} .ade-title',
            'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
        ]
    );


    $this->add_control(
        'title_color',
        [
            'label'     => __( 'Title Text Color', 'aa_elementor' ),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .ade-title' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->end_controls_section();

    $this->start_controls_section(
        '_section_style_subtitle',
        [
            'label' => __( 'SubTitle Style', 'aa_elementor' ),
            'tab'   => Controls_Manager::TAB_STYLE,
        ]
    );


    $this->add_group_control(
        Group_Control_Typography:: get_type(),
        [
            'name'     => 'subtitle_typography',
            'label'    => __( 'Typography', 'aa_elementor' ),
            'selector' => '{{WRAPPER}} .ade-sub',
            'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
        ]
    );


    $this->add_control(
        'sub_title_color',
        [
            'label'     => __( 'SubTitle Text Color', 'aa_elementor' ),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .ade-sub' => 'color: {{VALUE}}',
            ],
        ]
    );


    $this->end_controls_section();

    $this->start_controls_section(
        'submit',
        [
            'label' => __( 'Button Section', 'aa_elementor' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );

   
    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name' => 'submit_typography',
            'selector' => '{{WRAPPER}} .ade-btn',
            'scheme' => Scheme_Typography::TYPOGRAPHY_4
        ]
    );

    $this->add_group_control(
        Group_Control_Border::get_type(),
        [
            'name' => 'submit_border',
            'selector' => '{{WRAPPER}} .ade-btn',
        ]
    );

    $this->add_control(
        'submit_border_radius',
        [
            'label' => __( 'Border Radius', 'aa_elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .ade-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
        ]
    );

    $this->add_group_control(
        Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'submit_box_shadow',
            'selector' => '{{WRAPPER}} .ade-btn',
        ]
    );

    $this->add_control(
        'hr4',
        [
            'type' => Controls_Manager::DIVIDER,
            'style' => 'thick',
        ]
    );

    $this->start_controls_tabs( 'tabs_button_style' );

    $this->start_controls_tab(
        'tab_button_normal',
        [
            'label' => __( 'Normal', 'aa_elementor' ),
        ]
    );

    $this->add_control(
        'submit_color',
        [
            'label' => __( 'Text Color', 'aa_elementor' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ade-btn' => 'color: {{VALUE}} !important;',
            ],
        ]
    );

    $this->add_control(
        'submit_bg_color',
        [
            'label' => __( 'Background Color', 'aa_elementor' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .ade-btn' => 'background-color: {{VALUE}} !important;',
            ],
        ]
    );

    $this->end_controls_tab();

    $this->start_controls_tab(
        'tab_button_hover',
        [
            'label' => __( 'Hover', 'aa_elementor' ),
        ]
    );

    $this->add_control(
        'submit_hover_color',
        [
            'label' => __( 'Text Color', 'aa_elementor' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .ade-btn:hover, {{WRAPPER}} .ade-btn:focus' => 'color: {{VALUE}} !important;',
            ],
        ]
    );

    $this->add_control(
        'submit_hover_bg_color',
        [
            'label' => __( 'Background Color', 'aa_elementor' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .ade-btn:hover, {{WRAPPER}} .ade-btn:focus' => 'background-color: {{VALUE}} !important;',
            ],
        ]
    );

    $this->add_control(
        'submit_hover_border_color',
        [
            'label' => __( 'Border Color', 'aa_elementor' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .ade-btn:hover, {{WRAPPER}} .ade-btn:focus' => 'border-color: {{VALUE}} !important;',
            ],
        ]
    );

    $this->end_controls_tab();
    $this->end_controls_tabs();

    $this->end_controls_section();


    $this->start_controls_section(
        'submit2',
        [
            'label' => __( 'Button2 Section', 'aa_elementor' ),
            'tab' => Controls_Manager::TAB_STYLE,
            'condition'     => [
                'style' => 'style1'
            ]
        ]
    );

   
    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name' => 'submit2_typography',
            'selector' => '{{WRAPPER}} .ade-btn2',
            'scheme' => Scheme_Typography::TYPOGRAPHY_4
        ]
    );

    $this->add_group_control(
        Group_Control_Border::get_type(),
        [
            'name' => 'submit2_border',
            'selector' => '{{WRAPPER}} .ade-btn2',
        ]
    );

    $this->add_control(
        'submit2_border_radius',
        [
            'label' => __( 'Border Radius', 'aa_elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
                '{{WRAPPER}} .ade-btn2' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
        ]
    );

    $this->add_group_control(
        Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'submit2_box_shadow',
            'selector' => '{{WRAPPER}} .ade-btn2',
        ]
    );

    $this->add_control(
        'hr42',
        [
            'type' => Controls_Manager::DIVIDER,
            'style' => 'thick',
        ]
    );

    $this->start_controls_tabs( 'tabs2_button_style' );

    $this->start_controls_tab(
        'tab2_button_normal',
        [
            'label' => __( 'Normal', 'aa_elementor' ),
        ]
    );

    $this->add_control(
        'submit2_color',
        [
            'label' => __( 'Text Color', 'aa_elementor' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ade-btn2' => 'color: {{VALUE}} !important;',
            ],
        ]
    );

    $this->add_control(
        'submit2_bg_color',
        [
            'label' => __( 'Background Color', 'aa_elementor' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .ade-btn2' => 'background-color: {{VALUE}} !important;',
            ],
        ]
    );

    $this->end_controls_tab();

    $this->start_controls_tab(
        'tab2_button_hover',
        [
            'label' => __( 'Hover', 'aa_elementor' ),
        ]
    );

    $this->add_control(
        'submit2_hover_color',
        [
            'label' => __( 'Text Color', 'aa_elementor' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .ade-btn2:hover, {{WRAPPER}} .ade-btn2:focus' => 'color: {{VALUE}} !important;',
            ],
        ]
    );

    $this->add_control(
        'submit2_hover_bg_color',
        [
            'label' => __( 'Background Color', 'aa_elementor' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .ade-btn2:hover, {{WRAPPER}} .ade-btn2:focus' => 'background-color: {{VALUE}} !important;',
            ],
        ]
    );

    $this->add_control(
        'submit_hover_border_color2',
        [
            'label' => __( 'Border Color', 'aa_elementor' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .ade-btn2:hover, {{WRAPPER}} .ade-btn2:focus' => 'border-color: {{VALUE}} !important;',
            ],
        ]
    );

    $this->end_controls_tab();
    $this->end_controls_tabs();

    $this->end_controls_section();
		
	}

	protected function render() {
		require AAE_PATH . '/modules/call-to-action/template/view.php';
    }
    



}
