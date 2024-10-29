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
class AAE_Featured extends Widget_Base {

	public function get_name() {
		return 'aae-featured';
	}

	public function get_title() {
		return esc_html__( 'Featured Blocks', 'aa_elementor' );
	}

	public function get_icon() {
		return 'ad ad-info';
	}

	public function get_categories() {
		return [ 'aae_elementor' ];
	}

	/**
	 * A list of scripts that the widgets is depended in
	 * @since 1.3.0
	 **/
	public function get_script_depends() {
		return [ 'aae-for-elementor-featured' ];
	}

	protected function _register_controls() {

        $this->start_controls_section(
			'_section_layout',
			[
				'label' => __( 'Layout', 'aa_elementor' ),
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
                        'style2' => __( 'Style 2', 'aa_elementor' ),
                        'style3' => __( 'Style 3', 'aa_elementor' ),
				],
			]
        );

        $this->end_controls_section();
        
		$this->start_controls_section(
			'_section_media',
			[
				'label' => __( 'Icon', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition'     => [
                    'style' => array('style1','style2'),
                ]
			]
		);

        $this->add_control(
            'icon',
            [
                'label'   => __( 'Icon', 'aa_elementor' ),
                'type'    => Controls_Manager::ICON,
                'default' => 'fa fa-smile-o',
                'options' => Advance_Addons_Icons(),

            ]
        );
        $this->add_control(
            'icon_spacing',
            [
                'label'   => __( 'Icon Size', 'aa_elementor' ),
                'type'    => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 20
                ],
                'condition' => [
                    'button_icon!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .aae-fetured-icons' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'icon_spacing_bottom',
            [
                'label'   => __( 'Bottom Spacing', 'aa_elementor' ),
                'type'    => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 20
                ],
                'condition' => [
                    'button_icon!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .aae-fetured-icons' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
			'_section_image',
			[
				'label' => __( 'Image', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition'     => [
                    'style' => array('style3'),
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
               
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            '_section_title',
            [
                'label' => __( 'Title & Description', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label'       => __( 'Title', 'aa_elementor' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXT,
                'default'     => __( 'UX / UI Designer', 'aa_elementor' ),
                'placeholder' => __( 'Type Info Box Title', 'aa_elementor' ),
            ]
        );

        $this->add_control(
            'description',
            [
                'label'       => __( 'Description', 'aa_elementor' ),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry ', 'aa_elementor' ),
                'placeholder' => __( 'Type info box description', 'aa_elementor' ),
                'rows'        => 5
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
                    '{{WRAPPER}}' => 'text-align: {{VALUE}}'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_button',
            [
                'label' => __( 'Button', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition'     => [
                    'style' => array('style1','style2'),
                ]
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label'       => __( 'Text', 'aa_elementor' ),
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
            'button_icon',
            [
                'label'   => __( 'Icon', 'aa_elementor' ),
                'type'    => Controls_Manager::ICON,
                'options' => Advance_Addons_Icons(),
                'default' => 'fa fa-angle-right'
            ]
        );

        $this->add_control(
            'button_icon_position',
            [
                'label'       => __( 'Icon Position', 'aa_elementor' ),
                'type'        => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options'     => [
                    'before' => [
                        'title' => __( 'Before', 'aa_elementor' ),
                        'icon'  => 'eicon-h-align-left',
                    ],
                    'after' => [
                        'title' => __( 'After', 'aa_elementor' ),
                        'icon'  => 'eicon-h-align-right',
                    ],
                ],
                'default'   => 'after',
                'toggle'    => false,
                'condition' => [
                    'button_icon!' => '',
                ],
            ]
        );

        $this->add_control(
            'button_icon_spacing',
            [
                'label'   => __( 'Icon Spacing', 'aa_elementor' ),
                'type'    => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 10
                ],
                'condition' => [
                    'button_icon!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .ad-btn--icon-before .ad-btn-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .ad-btn--icon-after .ad-btn-icon'  => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

		$this->end_controls_section();

		$this->start_controls_section(
            '_section_style_common',
            [
                'label' => __( 'Info Content', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
		);

		$this->add_responsive_control(
            'content_padding',
            [
                'label'      => __( 'Content Padding', 'aa_elementor' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .advanced_addons_service' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_icon',
            [
                'label' => __( 'Icon', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition'     => [
                    'style' => array('style1','style2'),
                ]
            ]
        );
        
        // $this->add_group_control(
        //     Group_Control_Typography:: get_type(),
        //     [
        //         'name'     => 'content_typography',
        //         'label'    => __( 'Typography', 'aa_elementor' ),
        //         'selector' => '{{WRAPPER}} .advanced_addons_service > i',
        //         'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
        //     ]
        // );

        $this->add_control(
            'icon_size',
            [
                'label'   => __( 'Icon Text Distance', 'aa_elementor' ),
                'type'    => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 18
                ],
                'selectors' => [
                    '{{WRAPPER}} .aae-fetured-icons' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

		$this->add_control(
            'icon_color',
            [
                'label'     => __( 'Icon Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .aae-fetured-icons' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_title',
            [
                'label' => __( 'Title', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
		);


        $this->add_group_control(
            Group_Control_Typography:: get_type(),
            [
                'name'     => 'title_typography',
                'label'    => __( 'Typography', 'aa_elementor' ),
                'selector' => '{{WRAPPER}} .aae-fetured-title',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

		$this->add_control(
            'title_color',
            [
                'label'     => __( 'Title Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .aae-fetured-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_desc',
            [
                'label' => __( 'Description', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
		);

		$this->add_group_control(
            Group_Control_Typography:: get_type(),
            [
                'name'     => 'desc_typography',
                'label'    => __( 'Typography', 'aa_elementor' ),
                'selector' => '{{WRAPPER}} .ad-fetured-text',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

		$this->add_control(
            'desc_color',
            [
                'label'     => __( 'Description Text Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ad-fetured-text' => 'color: {{VALUE}}',
                ],
            ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
            '_section_style_button',
            [
                'label' => __( 'Button', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition'     => [
                    'style' => array('style1','style2'),
                ]
            ]
        );

		$this->add_control(
            'button_color',
            [
                'label'     => __( 'Button Text Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .aae-fetured-btn' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography:: get_type(),
            [
                'name'     => 'btn_typography',
                'label'    => __( 'Typography', 'aa_elementor' ),
                'selector' => '{{WRAPPER}} .aae-fetured-btn',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

        $this->end_controls_section();
		

	}

	protected function render() {
		require AAE_PATH . '/modules/featured/template/view.php';
	}


}
