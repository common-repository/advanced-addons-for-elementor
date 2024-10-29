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
class AAE_Table extends Widget_Base {

	public function get_name() {
		return 'aae-table';
	}

	public function get_title() {
		return esc_html__( 'Table', 'aa_elementor' );
	}

	public function get_icon() {
		return 'ad ad-table-lamp';
	}

	public function get_categories() {
		return [ 'aae_elementor' ];
	}

	/**
	 * A list of scripts that the widgets is depended in
	 * @since 1.3.0
	 **/
	public function get_script_depends() {
		return [ 'aae-table' ];
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
            'datatable_header',
            [
                'label' => __( 'Table Header', 'aa_elementor' ),
            ]
        );

            $repeater = new Repeater();

            $repeater->add_control(
                'column_name',
                [
                    'label'   => __( 'Column Name', 'aa_elementor' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __( 'No', 'aa_elementor' ),
                ]
            );

            $this->add_control(
                'header_column_list',
                [
                    'type'    => Controls_Manager::REPEATER,
                    'fields'  => array_values( $repeater->get_controls() ),
                    'default' => [
                        [
                            'column_name' => __( 'No', 'aa_elementor' ),
                        ],

                        [
                            'column_name' => __( 'Name', 'aa_elementor' ),
                        ],

                        [
                            'column_name' => __( 'Designation', 'aa_elementor' ),
                        ],

                        [
                            'column_name' => __( 'Email', 'aa_elementor' ),
                        ]

                    ],
                    'title_field' => '{{{ column_name }}}',
                ]
            );
            
        $this->end_controls_section();

        // Table Content
        $this->start_controls_section(
            'datatable_content',
            [
                'label' => __( 'Table Content', 'aa_elementor' ),
            ]
        );

            $repeater_one = new Repeater();

            $repeater_one->add_control(
                'field_type',
                [
                    'label' => __( 'Fild Type', 'aa_elementor' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'row',
                    'options' => [
                        'row'   => __( 'Row', 'aa_elementor' ),
                        'col'   => __( 'Column', 'aa_elementor' ),
                    ],
                ]
            );

            $repeater_one->add_control(
                'cell_text',
                [
                    'label'   => __( 'Cell Content', 'aa_elementor' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __( 'Louis Hudson', 'aa_elementor' ),
                    'condition'=>[
                        'field_type'=>'col',
                    ]
                ]
            );

            $repeater_one->add_control(
                'row_colspan',
                [
                    'label' => __( 'Colspan', 'aa_elementor' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'step' => 1,
                    'default' => 1,
                    'condition'=>[
                        'field_type'=>'col',
                    ]
                ]
            );

            $this->add_control(
                'content_list',
                [
                    'type'    => Controls_Manager::REPEATER,
                    'fields'  => array_values( $repeater_one->get_controls() ),
                    'default' => [
                        [
                            'field_type' => __( 'row', 'aa_elementor' ),
                        ],

                        [
                            'field_type' => __( 'col', 'aa_elementor' ),
                            'cell_text' => __( '1', 'aa_elementor' ),
                            'row_colspan' => __( '1', 'aa_elementor' ),
                        ],

                        [
                            'field_type' => __( 'col', 'aa_elementor' ),
                            'cell_text' => __( 'Louis Hudson', 'aa_elementor' ),
                            'row_colspan' => __( '1', 'aa_elementor' ),
                        ],

                        [
                            'field_type' => __( 'col', 'aa_elementor' ),
                            'cell_text' => __( 'Developer', 'aa_elementor' ),
                            'row_colspan' => __( '1', 'aa_elementor' ),
                        ],


                        [
                            'field_type' => __( 'col', 'aa_elementor' ),
                            'cell_text' => __( 'jondoy@gmail.com', 'aa_elementor' ),
                            'row_colspan' => __( '1', 'aa_elementor' ),
                        ]

                    ],
                    'title_field' => '{{{field_type}}}',
                ]
            );
            
        $this->end_controls_section();

                // Style tab section
                $this->start_controls_section(
                    'aae_table_style_section',
                    [
                        'label' => __( 'Table', 'aa_elementor' ),
                        'tab' => Controls_Manager::TAB_STYLE,
                    ]
                );
        
                    $this->add_control(
                        'datatable_bg_color',
                        [
                            'label' => esc_html__( 'Background Color', 'aa_elementor' ),
                            'type' => Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .aae-table-style' => 'background-color: {{VALUE}};',
                            ],
                        ]
                    );
        
                    $this->add_responsive_control(
                        'datatable_padding',
                        [
                            'label' => esc_html__( 'Padding', 'aa_elementor' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', 'em', '%' ],
                            'selectors' => [
                                    '{{WRAPPER}} .aae-table-style' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );
        
                    $this->add_responsive_control(
                        'datatable_margin',
                        [
                            'label' => esc_html__( 'Margin', 'aa_elementor' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', 'em', '%' ],
                            'selectors' => [
                                    '{{WRAPPER}} .aae-table-style' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );
        
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                            [
                                'name' => 'datatable_border',
                                'label' => esc_html__( 'Border', 'aa_elementor' ),
                                'selector' => '{{WRAPPER}} .aae-table-style',
                            ]
                    );
        
                    $this->add_responsive_control(
                        'datatable_border_radius',
                        [
                            'label' => esc_html__( 'Border Radius', 'aa_elementor' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .aae-table-style' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                        ]
                    );
                    
                $this->end_controls_section();
        
                // Table Header Style tab section
                $this->start_controls_section(
                    'aae_table_header_style_section',
                    [
                        'label' => __( 'Table Header', 'aa_elementor' ),
                        'tab' => Controls_Manager::TAB_STYLE,
                    ]
                );
        
                    $this->add_control(
                        'datatable_header_bg_color',
                        [
                            'label' => esc_html__( 'Background Color', 'aa_elementor' ),
                            'type' => Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .aae-table-style thead tr th' => 'background-color: {{VALUE}};',
                            ],
                        ]
                    );
        
                    $this->add_control(
                        'datatable_header_text_color',
                        [
                            'label' => esc_html__( 'Text Color', 'aa_elementor' ),
                            'type' => Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .aae-table-style thead tr th' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
        
                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'datatable_header_typography',
                            'label' => __( 'Typography', 'aa_elementor' ),
                            'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                            'selector' => '{{WRAPPER}} .aae-table-style thead tr th',
                        ]
                    );
        
                    $this->add_responsive_control(
                        'datatable_header_padding',
                        [
                            'label' => esc_html__( 'Table Header Padding', 'aa_elementor' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', 'em', '%' ],
                            'selectors' => [
                                    '{{WRAPPER}} .aae-table-style thead tr th' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );
        
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                            [
                                'name' => 'datatable_header_border',
                                'label' => esc_html__( 'Border', 'aa_elementor' ),
                                'selector' => '{{WRAPPER}} .aae-table-style thead tr th',
                            ]
                    );
        
                    $this->add_responsive_control(
                        'datatable_header_border_radius',
                        [
                            'label' => esc_html__( 'Border Radius', 'aa_elementor' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .aae-table-style thead tr th' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                        ]
                    );
        
                    $this->add_responsive_control(
                        'datatable_header_align',
                        [
                            'label' => __( 'Alignment', 'aa_elementor' ),
                            'type' => Controls_Manager::CHOOSE,
                            'options' => [
                                'left' => [
                                    'title' => __( 'Left', 'aa_elementor' ),
                                    'icon' => 'fa fa-align-left',
                                ],
                                'center' => [
                                    'title' => __( 'Center', 'aa_elementor' ),
                                    'icon' => 'fa fa-align-center',
                                ],
                                'right' => [
                                    'title' => __( 'Right', 'aa_elementor' ),
                                    'icon' => 'fa fa-align-right',
                                ],
                                'justify' => [
                                    'title' => __( 'Justified', 'aa_elementor' ),
                                    'icon' => 'fa fa-align-justify',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .aae-table-style thead tr th' => 'text-align: {{VALUE}};',
                            ],
                            'default' => '',
                            'separator' =>'before',
                        ]
                    );
        
                $this->end_controls_section();
        
                // Table Body Style tab section
                $this->start_controls_section(
                    'aae_table_body_style_section',
                    [
                        'label' => __( 'Table Body', 'aa_elementor' ),
                        'tab' => Controls_Manager::TAB_STYLE,
                    ]
                );
        
                    $this->add_control(
                        'datatable_body_bg_color',
                        [
                            'label' => esc_html__( 'Background Color ( Event )', 'aa_elementor' ),
                            'type' => Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .aae-table-style tbody tr:nth-child(even)' => 'background-color: {{VALUE}};',
                            ],
                        ]
                    );
        
                    $this->add_control(
                        'datatable_body_odd_bg_color',
                        [
                            'label' => esc_html__( 'Background Color ( Odd )', 'aa_elementor' ),
                            'type' => Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .aae-table-style tbody tr' => 'background-color: {{VALUE}};',
                            ],
                        ]
                    );
        
                    $this->add_control(
                        'datatable_body_text_color',
                        [
                            'label' => esc_html__( 'Text Color', 'aa_elementor' ),
                            'type' => Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .aae-table-style tbody tr td' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
        
                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'datatable_body_typography',
                            'label' => __( 'Typography', 'aa_elementor' ),
                            'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                            'selector' => '{{WRAPPER}} .aae-table-style tbody tr td',
                        ]
                    );
        
                    $this->add_responsive_control(
                        'datatable_body_padding',
                        [
                            'label' => esc_html__( 'Table Body Padding', 'aa_elementor' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', 'em', '%' ],
                            'selectors' => [
                                    '{{WRAPPER}} .aae-table-style tbody tr td' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );
        
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                            [
                                'name' => 'datatable_body_border',
                                'label' => esc_html__( 'Border', 'aa_elementor' ),
                                'selector' => '{{WRAPPER}} .aae-table-style tbody tr td',
                            ]
                    );
        
                    $this->add_responsive_control(
                        'datatable_body_border_radius',
                        [
                            'label' => esc_html__( 'Border Radius', 'aa_elementor' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .aae-table-style tbody tr td' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                        ]
                    );
        
                    $this->add_responsive_control(
                        'datatable_body_align',
                        [
                            'label' => __( 'Alignment', 'aa_elementor' ),
                            'type' => Controls_Manager::CHOOSE,
                            'options' => [
                                'left' => [
                                    'title' => __( 'Left', 'aa_elementor' ),
                                    'icon' => 'fa fa-align-left',
                                ],
                                'center' => [
                                    'title' => __( 'Center', 'aa_elementor' ),
                                    'icon' => 'fa fa-align-center',
                                ],
                                'right' => [
                                    'title' => __( 'Right', 'aa_elementor' ),
                                    'icon' => 'fa fa-align-right',
                                ],
                                'justify' => [
                                    'title' => __( 'Justified', 'aa_elementor' ),
                                    'icon' => 'fa fa-align-justify',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .aae-table-style tbody tr td' => 'text-align: {{VALUE}};',
                            ],
                            'default' => '',
                            'separator' =>'before',
                        ]
                    );
        
                $this->end_controls_section();
    }

	protected function render() {
		require AAE_PATH . '/modules/table/template/view.php';
    }

    // protected function _content_template() {
	// 	require AAE_PATH . '/modules/table/template/content-template.php';
    // }
    
    


}
