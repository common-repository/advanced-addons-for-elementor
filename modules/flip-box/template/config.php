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
use \Elementor\Icons_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Perfecto aae Portfolio
 *
 * Elementor widget for aae portfolio
 *
 * @since 1.0.0
 */
class AAE_flipbox extends Widget_Base {

	public function get_name() {
		return 'aae-flipbox';
	}

	public function get_title() {
		return esc_html__( 'Flip Box', 'aa_elementor' );
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
		return [ 'aae-for-elementor-flipbox' ];
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

         $this->add_control(
            'select_animation',
                [
                    'label'   => __( 'Flip Animation', 'aa_elementor' ),
                    'type'    => Controls_Manager::SELECT,
                    'default' => 'flip-top',
                    'options' => [
                        'flip-top' => __( 'Flip Top', 'aa_elementor' ),
                        'flip-bottom' => __( 'Flip Bottom', 'aa_elementor' ),
                        'flip-left' => __( 'Flip Left', 'aa_elementor' ),
                        'flip-right' => __( 'Flip Right', 'aa_elementor' ),
                        'zoomIn' => __( 'Zoom In', 'aa_elementor' ),
                        'zoomOut' => __( 'Zoom Out', 'aa_elementor' ),
                ],
            ]
        );

          /**/
        $this->start_controls_tabs('icon_image_front_back');

        $this->start_controls_tab(
                'front',
                [
                    'label' => __( 'Front', 'aa_elementor' )
                ]
            );

                $this->add_control(
                    'aa_flipbox_img_or_icon',
                    [
                        'label' => esc_html__( 'Icon Type', 'aa_elementor' ),
                        'type' => Controls_Manager::SELECT,
                        'options' => [
                            'none'  => __( 'None', 'aa_elementor' ),
                            'img'   => __( 'Image', 'aa_elementor' ),
                            'icon'  => __( 'Icon', 'aa_elementor' )
                        ],
                        'default' => 'icon',
                    ]
                );

                $this->add_control(
                    'aa_flipbox_image',
                    [
                        'label' => esc_html__( 'Flipbox Image', 'aa_elementor' ),
                        'type'    => Controls_Manager::MEDIA,
                        'default' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'condition' => [
                            'aa_flipbox_img_or_icon' => 'img'
                        ]
                    ]
                );

                $this->add_responsive_control(
                    'aa_flipbox_image_resizer',
                    [
                        'label' => esc_html__( 'Image Resizer', 'aa_elementor' ),
                        'type' => Controls_Manager::SLIDER,
                        'default' => [
                            'size' => '100'
                        ],
                        'range' => [
                            'px' => [
                                'max' => 500,
                            ],
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .advanced_addons_flip_box_front > img' => 'width: {{SIZE}}px;'
                        ],
                        'condition' => [
                            'aa_flipbox_img_or_icon'  => 'img'
                        ]
                    ]
                );

                $this->add_control(
                    'aa_flipbox_icon_new',
                    [
                        'label' => esc_html__( 'Icon', 'aa_elementor' ),
                       'type'        => Controls_Manager::ICON,
                        'default' => 'fa fa-address-book',
                        'condition' => [
                            'aa_flipbox_img_or_icon' => 'icon'
                        ]
                    ]
                );


                $this->add_group_control(
                    Group_Control_Image_Size::get_type(),
                    [
                        'name' => 'thumbnail',
                        'default' => 'full',
                        'condition' => [
                            'aa_flipbox_image[url]!' => '',
                            'aa_flipbox_img_or_icon'  => 'img'
                        ],
                    ]
                );

                $this->add_control(
                    'aae_flipbox_front_title',
                    [
                        'label' => esc_html__( 'Front Title', 'aa_elementor' ),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => esc_html__( 'Front Title', 'aa_elementor' ),
                    ]
                );

                $this->add_control(
                    'aae_flipbox_front_text',
                    [
                        'label' => esc_html__( 'Front Text', 'aa_elementor' ),
                        'type' => Controls_Manager::WYSIWYG,
                        'label_block' => true,
                        'default' => __( 'This is front side content.', 'aa_elementor' ),
                    ]
                );


        $this->end_controls_tab();

        /**/

        $this->start_controls_tab(
                'back',
                [
                    'label' => __( 'Back', 'aa_elementor' )
                ]
            );

                $this->add_control(
                    'aa_flipbox_img_or_icon_back',
                    [
                        'label' => esc_html__( 'Icon Type', 'aa_elementor' ),
                        'type' => Controls_Manager::SELECT,
                        'options' => [
                            'none'  => __( 'None', 'aa_elementor' ),
                            'img'   => __( 'Image', 'aa_elementor' ),
                            'icon'  => __( 'Icon', 'aa_elementor' )
                        ],
                        'default' => 'icon'
                    ]
                );

                $this->add_control(
                    'aa_flipbox_image_back',
                    [
                        'label' => esc_html__( 'Flipbox Image', 'aa_elementor' ),
                        'type'    => Controls_Manager::MEDIA,
                        'default' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'condition' => [
                            'aa_flipbox_img_or_icon_back' => 'img'
                        ]
                    ]
                );


                $this->add_control(
                    'aa_flipbox_icon_back_new',
                    [
                        'label' => esc_html__( 'Icon', 'aa_elementor' ),
                       'type'        => Controls_Manager::ICON,
                        'default' => 'fa fa-address-book',
                        'condition' => [
                            'aa_flipbox_img_or_icon_back' => 'icon'
                        ]
                    ]
                );

                $this->add_responsive_control(
                    'aa_flipbox_image_resizer_back',
                    [
                        'label' => esc_html__( 'Image Resizer', 'aa_elementor' ),
                        'type' => Controls_Manager::SLIDER,
                        'default' => [
                            'size' => '100'
                        ],
                        'range' => [
                            'px' => [
                                'max' => 500,
                            ],
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .advanced_addons_flip_box_back > img' => 'width: {{SIZE}}px;'
                        ],
                        'condition' => [
                            'aa_flipbox_img_or_icon_back' => 'img'
                        ]
                    ]
                );

                $this->add_group_control(
                    Group_Control_Image_Size::get_type(),
                    [
                        'name' => 'thumbnail_back',
                        'default' => 'full',
                        'condition' => [
                            'aa_flipbox_image[url]!' => '',
                            'aa_flipbox_img_or_icon_back' => 'img'
                        ],
                    ]
                );

                $this->add_control(
                    'aae_flipbox_back_title',
                    [
                        'label' => esc_html__( 'Front Title', 'aa_elementor' ),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => esc_html__( 'Front Title', 'aa_elementor' ),
                    ]
                );

                $this->add_control(
                    'aae_flipbox_back_text',
                    [
                        'label' => esc_html__( 'Front Text', 'aa_elementor' ),
                        'type' => Controls_Manager::WYSIWYG,
                        'label_block' => true,
                        'default' => __( 'This is front side content.', 'aa_elementor' ),
                    ]
                );

            $this->end_controls_tab();
             $this->end_controls_tabs();

        /**/

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
                'default'     => __( 'Flip Box Title', 'aa_elementor' ),
                'placeholder' => __( 'Type Info Box Title', 'aa_elementor' ),
            ]
        );

        $this->add_control(
            'description',
            [
                'label'       => __( 'Description', 'aa_elementor' ),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => __( 'Flip Box Paragraph', 'aa_elementor' ),
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
                'label' => __( 'Flip Box Style', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
		);

         $this->add_control(
        'flip_box_size',
            [
                'label'   => __( 'Box Size', 'aa_elementor' ),
                'type'    => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 1000,
                        'step' => 5,
                    ]
                ],
                'default' => [
                    'size' => 300
                ],
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_flip_box' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'flip_box_shadow',
                'label' => __( 'Box Shadow', 'aa_elementor' ),
                'selector' => '{{WRAPPER}} .advanced_addons_flip_box',
            ]
        );

         $this->add_control(
            'aae_flipbox_front_back_radius',
            [
                'label' => esc_html__( 'Border Radius', 'aa_elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                        '{{WRAPPER}} .advanced_addons_flip_box_front' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .advanced_addons_flip_box_back' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .advanced_addons_flip_box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		
        $this->end_controls_section();
        /*Flip box front Back*/

        $this->start_controls_section(
            'aae_section_flipbox_title_style_settings',
            [
                'label' => esc_html__( 'Color &amp; Typography', 'aa_elementor' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
        
        $this->start_controls_tabs('aae_section_flipbox_typo_style_settings');
            $this->start_controls_tab('aae_section_flipbox_typo_style_front_settings', [
                'label' => esc_html__( 'Front', 'aa_elementor' )
            ]);

                /**
                 * Background
                 */
                $this->add_control(
                    'aae_flipbox_front_title_heading',
                    [
                        'label' => esc_html__( 'Background Style', 'aa_elementor' ),
                        'type' => Controls_Manager::HEADING,
                        'separator' => 'before'
                    ]
                );


                 $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                        'name' => 'front_background',
                        'label' => __( 'Front Background', 'aa_elementor' ),
                        'types' => [ 'classic', 'gradient'],
                        'selector' => '{{WRAPPER}} .advanced_addons_flip_box_front',
                        
                    ]
                    
                    );

                /**
                 * Icon
                 */
                $this->add_control(
                    'aae_flipbox_front_icon_heading',
                    [
                        'label' => esc_html__( 'Icon Style', 'aa_elementor' ),
                        'type' => Controls_Manager::HEADING,
                        'separator' => 'before'
                    ]
                );

                $this->add_control(
                    'aae_flipbox_front_icon_color',
                    [
                        'label' => esc_html__( 'Icon Color', 'aa_elementor' ),
                        'type' => Controls_Manager::COLOR,
                        'default' => '#fff',
                        'selectors' => [
                            '{{WRAPPER}} .advanced_addons_flip_box_front i' => 'color: {{VALUE}};',
                        ]
                    ]
                );
                $this->add_control(
                    'front_icon_size',
                    [
                        'label'   => __( 'Icon Size', 'aa_elementor' ),
                        'type'    => Controls_Manager::SLIDER,
                        'default' => [
                            'size' => 36
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .advanced_addons_flip_box_front i' => 'font-size: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );

                /**
                 * Title
                 */
                $this->add_control(
                    'aae_flipbox_front_title_heading',
                    [
                        'label' => esc_html__( 'Title Style', 'aa_elementor' ),
                        'type' => Controls_Manager::HEADING,
                        'separator' => 'before'
                    ]
                );

                $this->add_control(
                    'aae_flipbox_front_title_color',
                    [
                        'label' => esc_html__( 'Title Color', 'aa_elementor' ),
                        'type' => Controls_Manager::COLOR,
                        'default' => '#fff',
                        'selectors' => [
                            '{{WRAPPER}} .advanced_addons_flip_box_front .flip_title' => 'color: {{VALUE}};',
                        ]
                    ]
                );

                $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                         'label' => esc_html__( 'Title Typhography', 'aa_elementor' ),
                        'name' => 'aae_flipbox_front_title_typography',
                        'selector' => '{{WRAPPER}} .advanced_addons_flip_box_front .flip_title'
                    ]
                );

                /**
                 * Content
                 */
                $this->add_control(
                    'aae_flipbox_front_content_heading',
                    [
                        'label' => esc_html__( 'Content Style', 'aa_elementor' ),
                        'type' => Controls_Manager::HEADING,
                        'separator' => 'before'
                    ]
                );

                $this->add_control(
                    'aae_flipbox_front_content_color',
                    [
                        'label' => esc_html__( 'Content Color', 'aa_elementor' ),
                        'type' => Controls_Manager::COLOR,
                        'default' => '#fff',
                        'selectors' => [
                            '{{WRAPPER}} .advanced_addons_flip_box_front p' => 'color: {{VALUE}};',
                        ]
                    ]
                );

                $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                        'name' => 'aae_flipbox_front_content_typography',
                        'selector' => '{{WRAPPER}} .advanced_addons_flip_box_front p'
                    ]
                );
                
            $this->end_controls_tab();

            $this->start_controls_tab('aae_section_flipbox_typo_style_back_settings', [
                'label' => esc_html__( 'Back', 'aa_elementor' )
            ]);

            /**
                 * Background
                 */
                $this->add_control(
                    'aae_flipbox_back_bg_heading',
                    [
                        'label' => esc_html__( 'Background Style', 'aa_elementor' ),
                        'type' => Controls_Manager::HEADING,
                        'separator' => 'before'
                    ]
                );


                 $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                        'name' => 'back_background',
                        'label' => __( 'Front Background', 'aa_elementor' ),
                        'types' => [ 'classic', 'gradient'],
                        'selector' => '{{WRAPPER}} .advanced_addons_flip_box_back',
                        
                    ]
                    
                    );

                /**
                 * Icon
                 */
                $this->add_control(
                    'aae_flipbox_back_icon_heading',
                    [
                        'label' => esc_html__( 'Icon Style', 'aa_elementor' ),
                        'type' => Controls_Manager::HEADING,
                        'separator' => 'before'
                    ]
                );

                $this->add_control(
                    'aae_flipbox_back_icon_color',
                    [
                        'label' => esc_html__( 'Icon Color', 'aa_elementor' ),
                        'type' => Controls_Manager::COLOR,
                        'default' => '#000',
                        'selectors' => [
                            '{{WRAPPER}} .advanced_addons_flip_box_back i' => 'color: {{VALUE}};',
                        ]
                    ]
                );
                $this->add_control(
                    'back_icon_size',
                    [
                        'label'   => __( 'Icon Size', 'aa_elementor' ),
                        'type'    => Controls_Manager::SLIDER,
                        'default' => [
                            'size' => 36
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .advanced_addons_flip_box_back i' => 'font-size: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );

                /**
                 * Title
                 */
                $this->add_control(
                    'aae_flipbox_back_title_heading',
                    [
                        'label' => esc_html__( 'Title Style', 'aa_elementor' ),
                        'type' => Controls_Manager::HEADING,
                        'separator' => 'before'
                    ]
                );

                $this->add_control(
                    'aae_flipbox_back_title_color',
                    [
                        'label' => esc_html__( 'Title Color', 'aa_elementor' ),
                        'type' => Controls_Manager::COLOR,
                        'default' => '#000',
                        'selectors' => [
                            '{{WRAPPER}} .advanced_addons_flip_box_back .flip_title' => 'color: {{VALUE}};',
                        ]
                    ]
                );

                $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                         'label' => esc_html__( 'Title Typhography', 'aa_elementor' ),
                        'name' => 'aae_flipbox_back_title_typography',
                        'selector' => '{{WRAPPER}} .advanced_addons_flip_box_back .flip_title'
                    ]
                );

                /**
                 * Content
                 */
                $this->add_control(
                    'aae_flipbox_back_content_heading',
                    [
                        'label' => esc_html__( 'Content Style', 'aa_elementor' ),
                        'type' => Controls_Manager::HEADING,
                        'separator' => 'before'
                    ]
                );

                $this->add_control(
                    'aae_flipbox_back_content_color',
                    [
                        'label' => esc_html__( 'Content Color', 'aa_elementor' ),
                        'type' => Controls_Manager::COLOR,
                        'default' => '#000',
                        'selectors' => [
                            '{{WRAPPER}} .advanced_addons_flip_box_back p' => 'color: {{VALUE}};',
                        ]
                    ]
                );

                $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                        'name' => 'aae_flipbox_back_content_typography',
                        'selector' => '{{WRAPPER}} .advanced_addons_flip_box_back p'
                    ]
                );

            $this->end_controls_tab();

        $this->end_controls_section();



        /*Flip box front Back*/

	}

	protected function render() {
		require AAE_PATH . '/modules/flip-box/template/view.php';
	}


}
