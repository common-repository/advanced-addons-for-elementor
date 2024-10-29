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
class AAE_Social_Links extends Widget_Base {

	public function get_name() {
		return 'aae-social-links';
	}

	public function get_title() {
		return esc_html__( 'Social Links', 'aa_elementor' );
	}

	public function get_icon() {
		return 'ad ad-share';
	}

	public function get_categories() {
		return [ 'aae_elementor' ];
	}

	/**
	 * A list of scripts that the widgets is depended in
	 * @since 1.3.0
	 **/
	public function get_script_depends() {
		return [ 'aae-social-links' ];
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
            '_section_layout',
            [
                'label' => __( 'Layout', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
            $this->add_control(
                'style',
                [
                    'label' => __( 'Style', 'aa_elementor' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'style1',
                    'options' => [
                        'style1'   => __( 'Style One', 'aa_elementor' ),
                        'style2'   => __( 'Style Two', 'aa_elementor' ),
                        'style3'   => __( 'Style Three', 'aa_elementor' ),
                    ],
                ]
            );
        $this->end_controls_section();

        $this->start_controls_section(
            '_section_social',
            [
                'label' => __( 'Social Profiles', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'name',
            [
                'label'          => __( 'Profile Name', 'aa_elementor' ),
                'type'           => Controls_Manager::SELECT2,
                'select2options' => [
                    'allowClear' => false,
                ],
                'options' => self::get_profile_names()
            ]
        );

        $repeater->add_control(
            'link', [
                'label'         => __( 'Profile Link', 'aa_elementor' ),
                'placeholder'   => __( 'Add your profile link', 'aa_elementor' ),
                'type'          => Controls_Manager::URL,
                'label_block'   => false,
                'autocomplete'  => false,
                'show_external' => false,
                'condition'     => [
                    'name!' => 'email'
                ]
            ]
        );

        $repeater->add_control(
            'email', [
                'label'       => __( 'Email Address', 'aa_elementor' ),
                'placeholder' => __( 'Add your email address', 'aa_elementor' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => false,
                'input_type'  => 'email',
                'condition'   => [
                    'name' => 'email'
                ]
            ]
        );


        $repeater->end_controls_tab();
        
        $repeater->end_controls_tabs();

        $this->add_control(
            'profiles',
            [
                'show_label'  => false,
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '<# print(name.slice(0,1).toUpperCase() + name.slice(1)) #>',
                'default'     => [
                    [
                        'link' => ['url' => 'https://facebook.com/'],
                        'name' => 'facebook'
                    ],
                    [
                        'link' => ['url' => 'https://twitter.com/'],
                        'name' => 'twitter'
                    ],
                    [
                        'link' => ['url' => 'https://linkedin.com/'],
                        'name' => 'linkedin'
                    ]
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_common',
            [
                'label' => __( 'Social Links Content', 'aa_elementor' ),
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
                    '{{WRAPPER}} .advanced_addons_social_links' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'section_bg_default_color',
                'label' => __( 'Section  Background', 'aa_elementor' ),
                'types' => [ 'classic', 'gradient'],
                'selector' => '{{WRAPPER}} .advanced_addons_social_links',
                
            ]  
        );


        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_single',
            [
                'label' => __( 'Single Social', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_control(
            'single_bgcolor',
            [
                'label'     => __( 'Single Background Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_social_links.type-1 ul li' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography:: get_type(),
            [
                'name'     => 'content_typography',
                'label'    => __( 'Typography', 'aa_elementor' ),
                'selector' => '{{WRAPPER}} .s-name',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

		$this->add_control(
            'title_color',
            [
                'label'     => __( 'Title Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .s-name' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label'     => __( 'Icon Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .block_icon i' => 'color: {{VALUE}}',
                ],
            ]
        );

         $this->add_control(
            'icon_bgcolor',
            [
                'label'     => __( 'Icon Background Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .block_icon' => 'background-color: {{VALUE}}',
                ],
            ]
        );

         $this->add_control(
            'link_color',
            [
                'label'     => __( 'Link Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .block_link' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
		
	}

	protected function render() {
		require AAE_PATH . '/modules/social-links/template/view.php';
    }

    



}
