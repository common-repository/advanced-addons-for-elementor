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
class AAE_Fun_Factor extends Widget_Base {

	public function get_name() {
		return 'aae-fun-factor';
	}

	public function get_title() {
		return esc_html__( 'Fun Factor', 'aa_elementor' );
	}

	public function get_icon() {
		return 'ad ad-target-arrow';
	}

	public function get_categories() {
		return [ 'aae_elementor' ];
	}

	/**
	 * A list of scripts that the widgets is depended in
	 * @since 1.3.0
	 **/
	public function get_script_depends() {
		return [ 'aae-fun-factor' ];
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
				'label' => __( 'Fun factors', 'aa_elementor' ),
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
						'style5' => __( 'Style 5', 'aa_elementor' ),		
						],
				]
        );

        $this->add_control(
                'title',
                [
                    'label'       => __( 'Title', 'aa_elementor' ),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => __( 'Creative work', 'aa_elementor' ),
                    'placeholder' => __( 'Type Title Here', 'aa_elementor' ),
                ]
        );

        $this->add_control(
                'value',
                [
                    'label'       => __( 'Target Value', 'aa_elementor' ),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => __( '100', 'aa_elementor' ),
                    'placeholder' => __( 'Type Count Value', 'aa_elementor' ),
                ]
        );

        $this->add_control(
                'suffix_one',
                [
                    'label'       => __( 'Suffix', 'aa_elementor' ),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => __( 'K', 'aa_elementor' ),
                    'placeholder' => __( 'Type Suffix', 'aa_elementor' ),
                    'condition'   => [
                        'style' => ['style5'],
                    ],
                ]
        );

        $this->add_control(
                'title_two',
                [
                    'label'       => __( 'Title Two', 'aa_elementor' ),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => __( 'Creative work', 'aa_elementor' ),
                    'placeholder' => __( 'Type Title Here', 'aa_elementor' ),
                    'condition'   => [
                        'style' => ['style5'],
                    ],
                ]
        );

        $this->add_control(
                'value_two',
                [
                    'label'       => __( 'Target Value Two', 'aa_elementor' ),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => __( '100', 'aa_elementor' ),
                    'placeholder' => __( 'Type Count Value', 'aa_elementor' ),
                    'condition'   => [
                        'style' => ['style5'],
                    ],
                ]
        );

        $this->add_control(
            'suffix_two',
            [
                'label'       => __( 'Suffix Two', 'aa_elementor' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => __( 'K', 'aa_elementor' ),
                'placeholder' => __( 'Type Suffix', 'aa_elementor' ),
                'condition'   => [
                    'style' => ['style5'],
                ],
            ]
        );


        $this->add_control(
                'title_there',
                [
                    'label'       => __( 'Title There', 'aa_elementor' ),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => __( 'Creative work', 'aa_elementor' ),
                    'placeholder' => __( 'Type Title Here', 'aa_elementor' ),
                    'condition'   => [
                        'style' => ['style5'],
                    ],
                ]
        );

        $this->add_control(
                'value_there',
                [
                    'label'       => __( 'Target Value There', 'aa_elementor' ),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => __( '100', 'aa_elementor' ),
                    'placeholder' => __( 'Type Count Value', 'aa_elementor' ),
                    'condition'   => [
                        'style' => ['style5'],
                    ],
                ]
        );

        $this->add_control(
            'suffix_there',
            [
                'label'       => __( 'Suffix There', 'aa_elementor' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => __( 'K', 'aa_elementor' ),
                'placeholder' => __( 'Type Suffix', 'aa_elementor' ),
                'condition'   => [
                    'style' => ['style5'],
                ],
            ]
        );

        $this->add_control(
            'icon',
            [
                'label'   => __( 'Icon', 'aa_elementor' ),
                'type'    => Controls_Manager::ICON,
                'default' => 'fa fa-smile-o',
                'options' => Advance_Addons_Icons(),
                'condition'   => [
                    'style' => ['style2','style3'],
                ],

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
                'condition'   => [
					'style' => ['style4'],
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
            'label'      => __( 'Section Padding', 'aa_elementor' ),
            'type'       => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', 'em', '%' ],
            'selectors'  => [
                '{{WRAPPER}} .advanced_addons_funfactors_area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'border_color',
        [
            'label'     => __( 'Border Color', 'aa_elementor' ),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .advanced_addons_funfactors_content' => 'border-color: {{VALUE}}',
            ],
            'condition'   => [
                'style' => ['style2'],
            ],
        ]
    );

    $this->add_control(
        'bg_color',
        [
            'label'     => __( 'Background Color', 'aa_elementor' ),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .advanced_addons_funfactors_content' => 'background-color: {{VALUE}}',
            ],
            'condition'   => [
                'style' => ['style3'],
            ],
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
            'name'     => 'title_typography',
            'label'    => __( 'Typography', 'aa_elementor' ),
            'selector' => '{{WRAPPER}} .c-title',
            'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
        ]
    );

    $this->add_control(
        'title_color',
        [
            'label'     => __( 'Title Color', 'aa_elementor' ),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .c-title' => 'color: {{VALUE}}',
            ],
            'default' => '#000000',
        ]
    );

$this->end_controls_section();

$this->start_controls_section(
    '_client_style_common',
    [
        'label' => __( 'Count Value Style', 'aa_elementor' ),
        'tab'   => Controls_Manager::TAB_STYLE,
    ]
);

    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name'     => 'value_typography',
            'label'    => __( 'Typography', 'aa_elementor' ),
            'selector' => '{{WRAPPER}} .c-value',
            'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
        ]
    );

$this->add_control(
    'value_color',
    [
        'label'     => __( 'Value Color', 'aa_elementor' ),
        'type'      => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .c-value' => 'color: {{VALUE}}',
        ],
    ]
);

$this->end_controls_section();

$this->start_controls_section(
    '_icon_style_common',
    [
        'label' => __( 'Icon Style', 'aa_elementor' ),
        'tab'   => Controls_Manager::TAB_STYLE,
        'condition'   => [
            'style' => ['style2','style3'],
        ],
    ]
);

// $this->add_group_control(
//     Group_Control_Typography:: get_type(),
//     [
//         'name'     => 'icon_typography',
//         'label'    => __( 'Typography', 'aa_elementor' ),
//         'selector' => '{{WRAPPER}} .c-icon i',
//         'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
//     ]
// );

$this->add_control(
    'icon_color',
    [
        'label'     => __( 'Icon Color', 'aa_elementor' ),
        'type'      => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .c-icon i' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'icon_bgcolor',
    [
        'label'     => __( 'Icon BG Color', 'aa_elementor' ),
        'type'      => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .c-icon' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->end_controls_section();

$this->start_controls_section(
    '_style_suffix',
    [
        'label' => __( 'Suffix', 'aa_elementor' ),
        'tab'   => Controls_Manager::TAB_STYLE,
        'condition'   => [
            'style' => ['style5'],
        ],
    ]
);

$this->add_group_control(
    Group_Control_Typography::get_type(),
    [
        'name'     => 'suffix_typography',
        'label'    => __( 'Typography', 'aa_elementor' ),
        'selector' => '{{WRAPPER}} .c-suffix',
        'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
    ]
);

$this->add_control(
'suffix_color',
[
    'label'     => __( 'Suffix Color', 'aa_elementor' ),
    'type'      => Controls_Manager::COLOR,
    'selectors' => [
        '{{WRAPPER}} .c-suffix' => 'color: {{VALUE}}',
    ],
]
);

$this->end_controls_section();

$this->start_controls_section(
    '_style_bg',
    [
        'label' => __( 'Background', 'aa_elementor' ),
        'tab'   => Controls_Manager::TAB_STYLE,
        'condition'   => [
            'style' => ['style5'],
        ],
    ]
);

$this->add_control(
    'fun_factore_one',
    [
        'label'     => __( 'Fun Factor One', 'aa_elementor' ),
        'type'      => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .advanced_addons_funfactors_wrapper.type-5 .advanced_addons_funfactors_content.cl-1' => 'background: {{VALUE}}',
        ],
    ]
);
$this->add_control(
    'fun_factore_two',
    [
        'label'     => __( 'Fun Factor Two', 'aa_elementor' ),
        'type'      => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .advanced_addons_funfactors_wrapper.type-5 .advanced_addons_funfactors_content.cl-2' => 'background: {{VALUE}}',
        ],
    ]
);
$this->add_control(
    'fun_factore_there',
    [
        'label'     => __( 'Fun Factor There', 'aa_elementor' ),
        'type'      => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .advanced_addons_funfactors_wrapper.type-5 .advanced_addons_funfactors_content.cl-3' => 'background: {{VALUE}}',
        ],
    ]
);

$this->end_controls_section();
		
}

	protected function render() {
		require AAE_PATH . '/modules/fun-factor/template/view.php';
    }
    



}
