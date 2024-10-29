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
class AAE_Tabs extends Widget_Base {

	public function get_name() {
		return 'aae-tabs';
	}

	public function get_title() {
		return esc_html__( 'Tabs', 'aa_elementor' );
	}

	public function get_icon() {
		return 'ad ad-testimonial-carousel';
	}

	public function get_categories() {
		return [ 'aae_elementor' ];
	}

	/**
	 * A list of scripts that the widgets is depended in
	 * @since 1.3.0
	 **/
	public function get_script_depends() {
		return [ 'aae-tabs' ];
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
            '_section_social',
            [
                'label' => __( 'Tabs', 'aa_elementor' ),
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
						'style4' => __( 'Style 4', 'aa_elementor' ),			
						],
				]
        );


        $repeater = new Repeater();

        $repeater->add_control(
            'title',
            [
                'label'          => __( 'Title', 'aa_elementor' ),
				'type'           => Controls_Manager::TEXT,
				'placeholder'   => __( 'Tab Title', 'aa_elementor' ),
            ]
        );

        $repeater->add_control(
            'desc', [
                'label'         => __( 'Description', 'aa_elementor' ),
                'placeholder'   => __( 'Tab Description', 'aa_elementor' ),
                'type'          => Controls_Manager::TEXTAREA,
                'label_block'   => false,
                'autocomplete'  => false,
                'show_external' => false,
            ]
		);
        $repeater->add_control(
            'icon_type', [
                'label'       => esc_html__( 'Icon Type', 'aa_elementor' ),
                'type'        => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options'     => [
                    'none' => [
                        'title' => esc_html__( 'None', 'aa_elementor' ),
                        'icon'  => 'fa fa-ban',
                    ],
                    'icon' => [
                        'title' => esc_html__( 'Icon', 'aa_elementor' ),
                        'icon'  => 'fa fa-paint-brush',
                    ],
                ],
                'default'       => 'none',
            ]
        );
        $repeater->add_control(
            'title_icon', [
                'label' => esc_html__('Title Icon', 'aa_elementor'),
                'type' => Controls_Manager::ICON,
                'label_block' => true,
                'default' => 'fa fa-area-chart',
                'condition' => [
                    'icon_type' => 'icon'
                ]
            ]
        );
        $repeater->add_control(
            'icon_style',
            [
                'label'   => __( 'Icon Text Distance', 'aa_elementor' ),
                'type'    => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 3
                ],
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_tab_item_icon' => 'padding-right: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'icon_type' => 'icon'
                ]
            ]
        );

    
        $repeater->end_controls_tab();
        
        $repeater->end_controls_tabs();

        $this->add_control(
            'testimonial',
            [
                'show_label'  => false,
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '<# print(title.slice(0,1).toUpperCase() + title.slice(1)) #>',
                'default'     => [
                    [
						'desc' => 'Tab1 Content dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries',
						
						'title' => 'Tab1',
                    ],
                    [
						'desc' => 'Tab2 Content is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries',
						
						'title' => 'Tab2',
                    ],
                    [
						'desc' => 'Tab3 is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries',
						
						'title' => 'Tab3',
                    ]
                ]
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Aditional Settings', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'active_number',
            [
                'label' => __( 'Active Number', 'aa_elementor' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 20,
                'default' => 1,
                'description' => 'Value Must Be More Than 0 Not More Then Tab Item Number',
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
            'tab_section_padding',
            [
                'label'      => __( 'Padding', 'aa_elementor'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section-parent' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

			$this->add_responsive_control(
				'content_padding',
				[
					'label'      => __( 'Section Padding', 'aa_elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .section-parent' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'condition'   => [
                        'style' => [ 'style1'],
                        ],
				]
            );
            
            $this->add_responsive_control(
				'content2_padding',
				[
					'label'      => __( 'Section Padding', 'aa_elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .advanced_addons_tab' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'condition'   => [
                        'style' => [ 'style2'],
                        ],
				]
            );
            
            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'section_color',
                    'label' => __( 'Section  Background', 'aa_elementor' ),
                    'types' => [ 'classic', 'gradient'],
                    'selector' => '{{WRAPPER}} .section-parent',
                    'condition'   => [
                        'style' => [ 'style1','style4'],
                        ]
                    
                ]
                
            );

            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'section2_color',
                    'label' => __( 'Section  Background', 'aa_elementor' ),
                    'types' => [ 'classic', 'gradient'],
                    'selector' => '{{WRAPPER}} .advanced_addons_tab',
                    'condition'   => [
                        'style' => [ 'style2','style3'],
                        ]
                    
                ]
                
            );


		$this->end_controls_section();

		$this->start_controls_section(
            '_content_style_common',
            [
                'label' => __( 'Title Style', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
		);

			$this->add_group_control(
				Group_Control_Typography:: get_type(),
				[
					'name'     => 'title_typo',
					'label'    => __( 'Typography', 'aa_elementor' ),
					'selector' => '{{WRAPPER}} .advanced_addons_tab_item .tab-link',
					'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
				]
			);
		
		$this->add_control(
            'titlte_color',
            [
                'label'     => __( 'Text Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_tab_item .tab-link' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'show_before',
            [
                'label'        => __( 'Show Before After', 'plugin-domain' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'Show', 'aa_elementor' ),
                'label_off'    => __( 'Hide', 'aa_elementor' ),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );
        $this->add_control(
            'before_color',
            [
                'label'     => __( 'Before Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'default' => 'transparent',
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_tab_item.row.no-gutters .tab-link:not(:last-child)::before' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'show_before' => 'yes'
                ] 
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'title_bgg',
                'label' => __( 'Title Background', 'aa_elementor' ),
                'types' => [ 'classic', 'gradient'],
                'selector' => '{{WRAPPER}} .advanced_addons_tab_item .tab-link',
                
            ]
            
        );
        $this->add_control(
            'active_color',
            [
                'label'     => __( 'Active Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_tab_item .tab-link.active' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        // $this->add_control(
        //     'active_bg',
        //     [
        //         'label'     => __( 'Active Background Color', 'aa_elementor' ),
        //         'type'      => Controls_Manager::COLOR,
        //         'selectors' => [
        //             '{{WRAPPER}} .advanced_addons_tab_item .tab-link.active' => 'background-color: {{VALUE}} !important',
        //         ],
        //     ]
        // );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'title_active_bgg',
                'label' => __( 'Title Active Background', 'aa_elementor' ),
                'types' => [ 'classic', 'gradient'],
                'selector' => '{{WRAPPER}} .advanced_addons_tab_item .tab-link.active',
                
            ]
            
        );
	
		$this->end_controls_section();

		$this->start_controls_section(
                '_client_style_common',
                [
                    'label' => __( 'Icon Style', 'aa_elementor' ),
                    'tab'   => Controls_Manager::TAB_STYLE,
                ]
    		);

			$this->add_control(
                'icon_size',
                [
                    'label'   => __( 'Icon Size', 'aa_elementor' ),
                    'type'    => Controls_Manager::SLIDER,
                    'default' => [
                        'size' => 16
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .advanced_addons_tab_item_icon' => 'font-size: {{SIZE}}{{UNIT}}',
                    ]
                ]
            );
            $this->add_control(
                'icon_color',
                [
                    'label'     => __( 'Icon Color', 'aa_elementor' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .advanced_addons_tab_item_icon' => 'color: {{VALUE}} !important',
                    ],
                ]
            );
            $this->add_control(
                'active_icon_color',
                [
                    'label'     => __( 'Active Icon Color', 'aa_elementor' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .advanced_addons_tab_item .tab-link.active .advanced_addons_tab_item_icon' => 'color: {{VALUE}} !important',
                    ],
                ]
            );
		$this->end_controls_section();
        /*---------------------------------------------
        ---------------------------------------------*/
        $this->start_controls_section(
                '_client_style_content',
                [
                    'label' => __( 'Content Style', 'aa_elementor' ),
                    'tab'   => Controls_Manager::TAB_STYLE,
                ]
            );

            $this->add_group_control(
                Group_Control_Typography:: get_type(),
                [
                    'name'     => 'text_typo',
                    'label'    => __( 'Typography', 'aa_elementor' ),
                    'selector' => '{{WRAPPER}} .advanced_addons_tab_content  p',
                    'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
                ]
            );
        
        $this->add_control(
            'c_text_color',
            [
                'label'     => __( 'Text Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_tab_content  p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'body_color',
                'label' => __( 'Body Background', 'aa_elementor' ),
                'types' => [ 'classic', 'gradient'],
                'selector' => '{{WRAPPER}} .advanced_addons_tab_content .block-content',
                
            ]
            
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'body_bg_color',
                'label' => __( 'Full Body Background ', 'aa_elementor' ),
                'types' => [ 'classic', 'gradient'],
                'selector' => '{{WRAPPER}} .advanced_addons_tab_content',
                
            ]
            
        );

        $this->add_group_control(
            Group_Control_Box_Shadow:: get_type(),
            [
                'name'     => 'button_box_shadow',
                'selector' => '{{WRAPPER}} .advanced_addons_tab_content'
            ]
        );
 
        $this->end_controls_section();
       
    }

	protected function render() {
		require AAE_PATH . '/modules/tabs/template/view.php';
    }

    // protected function _content_template() {
	// 	require AAE_PATH . '/modules/tabs/template/content-template.php';
    // }
    
    


}
