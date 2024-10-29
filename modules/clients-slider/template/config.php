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
class Clients_Slider extends Widget_Base {

	public function get_name() {
		return 'aae-clients-slider';
	}

	public function get_title() {
		return esc_html__( 'Clients Slider', 'aa_elementor' );
	}

	public function get_icon() {
		return 'ad ad-slider';
	}

	public function get_categories() {
		return [ 'aae_elementor' ];
	}

	/**
	 * A list of scripts that the widgets is depended in
	 * @since 1.3.0
	 **/
	public function get_script_depends() {
		return [ 'aae-for-elementor-clients-slider' ];
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
                'label' => __( 'Clients Slider', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        // $this->add_control(
		//     'style',
		// 		[
		// 			'label'   => __( 'Visual Style', 'aa_elementor' ),
		// 			'type'    => Controls_Manager::SELECT,
		// 			'default' => 'style1',
		// 			'options' => [
        //                 'style1' => __( 'Style 1', 'aa_elementor' ),
        //                 'style2' => __( 'Style 2', 'aa_elementor' ),	
		// 		],
		// 	]
        // );

        $repeater = new Repeater();

       $repeater->add_control(
            'image',
            [
                'label'   => __( 'Clients Logo', 'aa_elementor' ),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

         $repeater->add_control(
            'link', [
                'label'         => __( 'Logo Link', 'aa_elementor' ),
                'placeholder'   => __( 'Add Your Logo link', 'aa_elementor' ),
                'type'          => Controls_Manager::URL,
                'label_block'   => false,
                'autocomplete'  => false,
                'show_external' => false,
            ]
        );
		
        $repeater->end_controls_tab();
        
        $repeater->end_controls_tabs();

        $this->add_control(
            'clients',
            [
                'show_label'  => false,
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '<# print(name.slice(0,1).toUpperCase() + name.slice(1)) #>',
                'default'     => [
                    [
						'link' => ['url' => '#'],
						'image'=> '',
                    ],
                    [
						'link' => ['url' => '#'],
						'image'=> '',
                    ],
                    [
						'link' => ['url' => '#'],
						'image'=> '',
                    ]
                ]
            ]
        );

        $this->add_responsive_control(
            'slide_count',
            [
                'label' => __( 'Slide Show', 'aa_elementor' ),
                'type' => Controls_Manager::NUMBER,
                'default' => 3,
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
						'{{WRAPPER}} .advanced_addons_clients' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

        $this->end_controls_section();
        
        $this->start_controls_section(
            '_item_style_common',
            [
                'label' => __( 'Item Style', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
		);

			$this->add_responsive_control(
				'item_padding',
				[
					'label'      => __( 'Item Padding', 'aa_elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .item-image' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
					],
				]
            );
            
            $this->add_control(
                'item_color',
                [
                    'label'     => __( 'Item BG Color', 'aa_elementor' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .item-image' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'border_radius',
                [
                    'label'     => __( 'Border Radius', 'aa_elementor' ),
                    'type'      => Controls_Manager::NUMBER,
                    'selectors' => [
                        '{{WRAPPER}} .item-image' => 'border-radius: {{VALUE}}px',
                    ],
                    'default' => 10
                ]
            );

		$this->end_controls_section();
		
	}

	protected function render() {
		require AAE_PATH . '/modules/clients-slider/template/view.php';
    }
    



}
