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
class AAE_Progressbar extends Widget_Base {

	public function get_name() {
		return 'aae-progressbar';
	}

	public function get_title() {
		return esc_html__( 'Progressbar', 'aa_elementor' );
	}

	public function get_icon() {
		return 'ad ad-progress-bar';
	}

	public function get_categories() {
		return [ 'aae_elementor' ];
	}

	/**
	 * A list of scripts that the widgets is depended in
	 * @since 1.3.0
	 **/
	public function get_script_depends() {
		return [ 'aae-progressbar' ];
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
				'label' => __( 'Progress bar', 'aa_elementor' ),
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
            'name',
            [
                'label'          => __( 'Title', 'aa_elementor' ),
                'type'           => Controls_Manager::TEXT,
                'default'        => 'HTML',
            ]
        );

        $repeater->add_control(
            'persentage',
            [
                'label'          => __( 'Persentage', 'aa_elementor' ),
                'type'           => Controls_Manager::TEXT,
                'default'        => '100',
            ]
        );

        $repeater->add_control(
            'customize',
            [
                'label' => __( 'Want To Customize?', 'aa_elementor' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'aa_elementor' ),
                'label_off' => __( 'No', 'aa_elementor' ),
                'return_value' => 'yes',
                'description' => __( 'You can customize this skill bar color from here or customize from Style tab', 'aa_elementor' ),
            ]
        );

        $repeater->add_control(
            'color',
            [
                'label' => __( 'Text Color', 'aa_elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .p-name' => 'color: {{VALUE}}',
                ],
                'condition' => ['customize' => 'yes']
            ]
        );

        $repeater->add_control(
            'per_color',
            [
                'label' => __( 'Percentage Color', 'aa_elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .p-parcent' => 'color: {{VALUE}}',
                ],
                'condition' => ['customize' => 'yes']
            ]
        );

        $repeater->add_control(
            'progress_color',
            [
                'label' => __( 'Bar BG Color', 'aa_elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .p-bar' => 'background: {{VALUE}}',
                ],
                'condition' => ['customize' => 'yes']
            ]
        );

        $repeater->add_control(
            'fullbar_color',
            [
                'label' => __( 'Full Bar Color', 'aa_elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}.advanced_block_progressbar_block::before' => 'background-color: {{VALUE}} !important',
                ],
                'condition' => ['customize' => 'yes']
            ]
        );

        $repeater->end_controls_tab();
        
        $repeater->end_controls_tabs();

        $this->add_control(
            'progressbar',
            [
                'show_label'  => false,
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '<# print(name.slice(0,1).toUpperCase() + name.slice(1)) #>',
                'default'     => [
                    [
                        'name'             => 'HTML',
                        'persentage'       => '100',
                        
                    ],
                    [
                        'name'             => 'CSS',
                        'persentage'       => '70',
                        
                    ],
                    [
                        'name'             => 'JAVA',
                        'persentage'       => '50',
                        
                    ],
                    [
                        'name'             => 'PHP',
                        'persentage'       => '50',
                        
                    ]
                ]
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
                '{{WRAPPER}} .advanced_block_progressbar_block' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'bg_color',
        [
            'label'     => __( 'Background Color', 'aa_elementor' ),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .advanced_block_progressbar_block' => 'background-color: {{VALUE}}',
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
            'selector' => '{{WRAPPER}} .p-name',
            'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
        ]
    );

$this->end_controls_section();

$this->start_controls_section(
    '_parcent_style_common',
    [
        'label' => __( 'Parcentage Style', 'aa_elementor' ),
        'tab'   => Controls_Manager::TAB_STYLE,
    ]
);

    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name'     => 'parcent_typography',
            'label'    => __( 'Typography', 'aa_elementor' ),
            'selector' => '{{WRAPPER}} .p-parcent',
            'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
        ]
    );

$this->end_controls_section();
}

	protected function render() {
		require AAE_PATH . '/modules/progressbar/template/view.php';
    }

    // protected function _content_template() {
	// 	require AAE_PATH . '/modules/twitter/template/content-template.php';
    // }
    
    
    



}
