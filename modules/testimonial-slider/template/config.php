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
class AAE_Testimonial_Slider extends Widget_Base {

	public function get_name() {
		return 'aae-testimonial-slider';
	}

	public function get_title() {
		return esc_html__( 'Testimonial Slider', 'aa_elementor' );
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
		return [ 'aae-testimonial-slider' ];
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
                'label' => __( 'Testimonial Slider', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'name',
            [
                'label'          => __( 'Name', 'aa_elementor' ),
				'type'           => Controls_Manager::TEXT,
				'placeholder'   => __( 'Add Testimonial Name', 'aa_elementor' ),
            ]
        );

        $repeater->add_control(
            'desc', [
                'label'         => __( 'Description', 'aa_elementor' ),
                'placeholder'   => __( 'Add Testimonial Description', 'aa_elementor' ),
                'type'          => Controls_Manager::TEXTAREA,
                'label_block'   => false,
                'autocomplete'  => false,
                'show_external' => false,
            ]
		);
		
		$repeater->add_control(
            'image',
            [
                'label'   => __( 'Photo', 'aa_elementor' ),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
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
                'title_field' => '<# print(name.slice(0,1).toUpperCase() + name.slice(1)) #>',
                'default'     => [
                    [
						'desc' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries',
						
						'name' => 'Bappi',
						'image'=> '',
                    ],
                    [
						'desc' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries',
						
						'name' => 'Shaharia Parvez',
						'image'=> '',
                    ],
                    [
						'desc' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries',
						
						'name' => 'Abdus Salam',
						'image'=> '',
                    ]
                ]
            ]
        );

        $this->add_control(
		    'img_style',
				[
					'label'   => __( 'Image Style', 'aa_elementor' ),
					'type'    => Controls_Manager::SELECT,
					'default' => 'circle',
					'options' => [
						'circle' => __( 'Circle', 'aa_elementor' ),
						'rounded'                  => __( 'Rounded', 'aa_elementor' ),
						],
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
                    '{{WRAPPER}} .advanced_addons_testimonial_card' => 'text-align: {{VALUE}}'
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
						'{{WRAPPER}} .advanced_addons_testimonial_card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'selector' => '{{WRAPPER}} .client',
					'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
				]
			);
		
		$this->add_control(
            'client_color',
            [
                'label'     => __( 'Text Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .client' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'client_be_af_color',
            [
                'label'     => __( 'Before/After Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_testimonial_card.type-1 h6::before, .advanced_addons_testimonial_card.type-1 h6::after' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'client_be_af_height',
            [
                'label'     => __( 'Before/After Height', 'aa_elementor' ),
                'type'      => Controls_Manager::NUMBER,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_testimonial_card.type-1 h6::before, .advanced_addons_testimonial_card.type-1 h6::after' => 'height: {{VALUE}}px',
                ],
            ]
        );


		$this->end_controls_section();
		
	}

	protected function render() {
		require AAE_PATH . '/modules/testimonial-slider/template/view.php';
    }
    



}
