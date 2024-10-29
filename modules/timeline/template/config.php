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
class AAE_Timeline extends Widget_Base {

	public function get_name() {
		return 'aae-timeline';
	}

	public function get_title() {
		return esc_html__( 'Timeline', 'aa_elementor' );
	}

	public function get_icon() {
		return 'ad ad-timeline';
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
                'label' => __( 'Timeline', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'icon',
            [
                'label'          => __( 'Timeline Icon', 'aa_elementor' ),
                'type'           => Controls_Manager::SELECT2,
                'select2options' => [
                    'allowClear' => false,
                ],
                'options' => self::get_profile_names()
            ]
        );

        $repeater->add_control(
            'title',
            [
                'label'       => __( 'Title', 'aa_elementor' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => __( '1st hour ago', 'aa_elementor' ),
                'placeholder' => __( 'Type Timeline Title', 'aa_elementor' ),
                
            ]
        );

        $repeater->add_control(
            'desc',
            [
                'label'       => __( 'Content', 'aa_elementor' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => __( 'Quis ipsum suspendisse ultrices gravida', 'aa_elementor' ),
                'placeholder' => __( 'Type Timeline Description', 'aa_elementor' ),
                
            ]
        );

    
        $repeater->end_controls_tab();
        
        $repeater->end_controls_tabs();

        $this->add_control(
            'timeline',
            [
                'show_label'  => false,
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '<# print(name.slice(0,1).toUpperCase() + name.slice(1)) #>',
                'default'     => [
                    [
                        'icon'  => 'facebook',
                        'title' => '1st hour ago',
                        'desc'  => 'Quis ipsum suspendisse ultrices gravida',
                    ],
                    [
                        'icon'  => 'twitter',
                        'title' => '1st hour ago',
                        'desc'  => 'Quis ipsum suspendisse ultrices gravida',
                    ],
                    [
                        'icon'  => 'linkedin',
                        'title' => '1st hour ago',
                        'desc'  => 'Quis ipsum suspendisse ultrices gravida',
                    ]
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_common',
            [
                'label' => __( 'Timeline Content', 'aa_elementor' ),
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
                    '{{WRAPPER}} .advanced_addons_timeline' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'bg_color',
            [
                'label'     => __( 'Background Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_timeline' => 'background-color: {{VALUE}} !important',
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
                'name'     => 'content_typography',
                'label'    => __( 'Title Typography', 'aa_elementor' ),
                'selector' => '{{WRAPPER}} .timeline_item h4',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

		$this->add_control(
            'title_color',
            [
                'label'     => __( 'Title Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .timeline_item h4' => 'color: {{VALUE}}',
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
                'label'    => __( 'Desc Typography', 'aa_elementor' ),
                'selector' => '{{WRAPPER}} .timeline_item p',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

		$this->add_control(
            'desc_color',
            [
                'label'     => __( 'Desc Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .timeline_item p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_icon',
            [
                'label' => __( 'Icon', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'icon_color',
            [
                'label'     => __( 'Icon Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .timeline_icon i' => 'color: {{VALUE}}',
                ],
            ]
        );

         $this->add_control(
            'icon_bgcolor',
            [
                'label'     => __( 'Icon Background Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .timeline_icon' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_timeline',
            [
                'label' => __( 'Timeline Bar', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'bar_bgcolor',
            [
                'label'     => __( 'Bar Background Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_timeline::before' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'bar_width',
            [
                'label'       => __( 'Bar Width', 'aa_elementor' ),
                'type'        => Controls_Manager::NUMBER,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_timeline::before' => 'width: {{VALUE}}px',
                ],
            ]
        );

       $this->end_controls_section();
    }

	protected function render() {
		require AAE_PATH . '/modules/timeline/template/view.php';
    }

    // protected function _content_template() {
	// 	require AAE_PATH . '/modules/timeline/template/content-template.php';
    // }
    
    


}
