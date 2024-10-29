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
class AAE_Divider extends Widget_Base {

	public function get_name() {
		return 'aae-divider';
	}

	public function get_title() {
		return esc_html__( 'Divider', 'aa_elementor' );
	}

	public function get_icon() {
		return 'ad ad-dropper';
	}

	public function get_categories() {
		return [ 'aae_elementor' ];
	}

	/**
	 * A list of scripts that the widgets is depended in
	 * @since 1.3.0
	 **/
	public function get_script_depends() {
		return [ 'aae-for-elementor-divider' ];
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
            '_section_title',
            [
                'label' => __( 'Divider', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label'       => __( 'Title', 'aa_elementor' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXT,
                'default'     => __( 'Divider 01', 'aa_elementor' ),
                'placeholder' => __( 'Type Divider Title', 'aa_elementor' ),
            ]
        );

        $this->add_control(
            'description',
            [
                'label'       => __( 'Description', 'aa_elementor' ),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.', 'aa_elementor' ),
                'placeholder' => __( 'Type Divider description', 'aa_elementor' ),
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
                'default' => 'h5',
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
                    '{{WRAPPER}} .advanced_addons_devider' => 'text-align: {{VALUE}}'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_common',
            [
                'label' => __( 'Divider Content', 'aa_elementor' ),
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
                    '{{WRAPPER}} .advanced_addons_devider' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'bg_color',
            [
                'label'     => __( 'Background Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_devider' => 'background-color: {{VALUE}} !important',
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
                'label'    => __( 'Typography', 'aa_elementor' ),
                'selector' => '{{WRAPPER}} .ad-title',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

		$this->add_control(
            'title_color',
            [
                'label'     => __( 'Title Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ad-title' => 'color: {{VALUE}}',
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
                'label'    => __( 'Typography', 'aa_elementor' ),
                'selector' => '{{WRAPPER}} .aae-desc',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );


		$this->add_control(
            'desc_color',
            [
                'label'     => __( 'Description Text Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .aae-desc' => 'color: {{VALUE}}',
                ],
            ]
        );

        
        $this->end_controls_section();
		

	}

	protected function render() {
		require AAE_PATH . '/modules/divider/template/view.php';
    }
    
    protected function _content_template() {
		require AAE_PATH . '/modules/divider/template/content-template.php';
	}



}
