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
class AAE_Testimonial extends Widget_Base {

	public function get_name() {
		return 'aae-testimonial';
	}

	public function get_title() {
		return esc_html__( 'Testimonial', 'aa_elementor' );
	}

	public function get_icon() {
		return 'ad ad-testimonial';
	}

	public function get_categories() {
		return [ 'aae_elementor' ];
	}

	/**
	 * A list of scripts that the widgets is depended in
	 * @since 1.3.0
	 **/
	public function get_script_depends() {
		return [ 'aae-testimonial' ];
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
				'label' => __( 'Testimonial', 'aa_elementor' ),
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
            'image',
            [
                'label'   => __( 'Photo', 'aa_elementor' ),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        

        $this->add_group_control(
            Group_Control_Image_Size:: get_type(),
            [
                'name'      => 'thumbnail',
                'default'   => 'large',
                'separator' => 'none',
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
					'style' => ['style4','style5'],
				],
            ]
        );
        
    $this->add_control(
			'client_name',
			[
				'label'       => __( 'Client Name', 'aa_elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Client Name', 'aa_elementor' ),
				'placeholder' => __( 'Type Client Name here', 'aa_elementor' ),
			]
   );

   $this->add_control(
			'position',
			[
				'label'       => __( 'Position', 'aa_elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'UX-UI DESIGNER', 'aa_elementor' ),
                'placeholder' => __( 'Type Position here', 'aa_elementor' ),
                'condition'   => [
						'style' => [ 'style2','style3','style4','style5'],
					],
			]
   );

    $this->add_control(
			'desc',
			[
				'label'       => __( 'Content', 'aa_elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type — Injected humour', 'aa_elementor' ),
				'placeholder' => __( 'Type Content here', 'aa_elementor' ),
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
                '{{WRAPPER}} .advanced_addons_testimonial_card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );
    
    $this->add_control(
        'con_bgcolor',
        [
            'label'     => __( 'Background Color', 'aa_elementor' ),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .advanced_addons_testimonial_card' => 'background-color: {{VALUE}} !important',
            ],
            'condition'   => [
                    'style' => [ 'style2','style3'],
                ],
        ]
    );


$this->end_controls_section();

$this->start_controls_section(
    '_content_style_common',
    [
        'label' => __( 'Content Style', 'aa_elementor' ),
        'tab'   => Controls_Manager::TAB_STYLE,
    ]
);

    $this->add_group_control(
        Group_Control_Typography:: get_type(),
        [
            'name'     => 'content_typography',
            'label'    => __( 'Typography', 'aa_elementor' ),
            'selector' => '{{WRAPPER}} .block-body p',
            'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
        ]
    );

$this->add_control(
    'con_color',
    [
        'label'     => __( 'Text Color', 'aa_elementor' ),
        'type'      => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .block-body p' => 'color: {{VALUE}}',
        ],
    ]
);



$this->end_controls_section();

$this->start_controls_section(
    '_client_style_common',
    [
        'label' => __( 'Client Name Style', 'aa_elementor' ),
        'tab'   => Controls_Manager::TAB_STYLE,
    ]
);

    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name'     => 'client_typography',
            'label'    => __( 'Typography', 'aa_elementor' ),
            'selector' => '{{WRAPPER}} .ad-client',
            'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
        ]
    );

$this->add_control(
    'client_color',
    [
        'label'     => __( 'Text Color', 'aa_elementor' ),
        'type'      => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ad-client' => 'color: {{VALUE}}',
        ],
    ]
);
$this->end_controls_section();


$this->start_controls_section(
    '_posi_style_common',
    [
        'label' => __( 'Position Style', 'aa_elementor' ),
        'tab'   => Controls_Manager::TAB_STYLE,
        'condition'   => [
                'style' => [ 'style2','style3','style4','style5'],
            ],
    ]
);

    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name'     => 'position_typography',
            'label'    => __( 'Typography', 'aa_elementor' ),
            'selector' => '{{WRAPPER}} .ad-c-p',
            'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
        ]
    );

$this->add_control(
    'posi_color',
    [
        'label'     => __( 'Text Color', 'aa_elementor' ),
        'type'      => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .ad-c-p' => 'color: {{VALUE}}',
        ],
    ]
);

$this->end_controls_section();
       
}

	protected function render() {
		require AAE_PATH . '/modules/testimonial/template/view.php';
    }

    protected function _content_template() {
		require AAE_PATH . '/modules/testimonial/template/content-template.php';
	}
    
    



}
