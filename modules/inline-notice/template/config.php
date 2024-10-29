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
class AAE_Inline_Notice extends Widget_Base {

	public function get_name() {
		return 'aae-inline-notice';
	}

	public function get_title() {
		return esc_html__( 'Inline Notice', 'aa_elementor' );
	}

	public function get_icon() {
		return 'ad ad-injection';
	}

	public function get_categories() {
		return [ 'aae_elementor' ];
	}

	/**
	 * A list of scripts that the widgets is depended in
	 * @since 1.3.0
	 **/
	public function get_script_depends() {
		return [ 'aae-inline-notice' ];
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
            '_section_info',
            [
                'label' => __( 'Inline Notice', 'aa_elementor' ),
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
                    'style1' => __( 'style 1', 'aa_elementor' ),
                    'style2' => __( 'Style 2', 'aa_elementor' ),
                    'style3' => __( 'Style 3', 'aa_elementor' ),
                    
                ],
            ]
        );

        $this->add_control(
            'alert_type',
            [
                'label'   => __( 'Type', 'aa_elementor' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'success',
                'options' => [
                    'success' => __( 'Success', 'aa_elementor' ),
                    'warning' => __( 'Warning', 'aa_elementor' ),
                    'danger'  => __( 'Danger', 'aa_elementor' ),
                ],
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'title',
            [
                'label'       => __( 'Title', 'aa_elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your pre title', 'aa_elementor' ),
                'default'     => __( 'Well done!', 'aa_elementor' ),
                'label_block' => true,
                'condition'   => [
                    'style' => [ 'style1','style2','style3' ],
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
                'label_block' => true,
                'condition'   => [
                    'style' => [ 'style1','style2','style3' ],
                ],
                
            ]
        );
         $this->add_control(
            'icon',
            [
                'label'       => __( 'Icon', 'aa_elementor' ),
                'type'        => Controls_Manager::ICON,
                'label_block' => true,
                'default'     => '',
            ]
        );
         $this->add_control(
            'border_style',
            [
                'label'   => __( 'Icon Text Distance', 'aa_elementor' ),
                'type'    => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 5
                ],
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_inline_notice i' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_common',
            [
                'label' => __( 'Style', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'alert_padding',
            [
                'label'      => __( 'Padding', 'aa_elementor'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .advanced_addons_inline_notice' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'notice_padding',
            [
                'label'      => __( 'Margin', 'aa_elementor'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .advanced_addons_inline_notice' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'section_color',
                'label' => __( 'Section Background', 'aa_elementor' ),
                'types' => [ 'classic', 'gradient'],
                'selector' => '{{WRAPPER}} .content-bg',
                
            ]
            
            );
        $this->end_controls_section();
        /*---------------------------------------
        ---------------------------------------*/
        /*------------------------------------
            Header Style
        ------------------------------------*/
        $this->start_controls_section(
            '_section_style_header',
            [
                'label' => __( 'Header Style', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography:: get_type(),
            [
                'name'     => 'title_typography',
                'label'    => __( 'Title Typography', 'aa_elementor' ),
                'selector' => '{{WRAPPER}} .advanced_addons_inline_notice h3',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label'     => __( 'Title Color', 'aa_elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  h3' => 'color: {{VALUE}}',
                ],
            ]
        );
         $this->add_control(
            'icon_color',
            [
                'label'     => __( 'Icon Color', 'aa_elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .advanced_addons_inline_notice h3 i' => 'color: {{VALUE}} !important',
                ],
            ]
        );
       $this->add_responsive_control(
            'icon_size',
            [
                'label'      => __( 'Icon Size', 'aa_elementor' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'default' => [
                    'size' => 16
                ],
                'selectors'  => [
                    '{{WRAPPER}} .advanced_addons_inline_notice i' => 'font-size: {{SIZE}}{{UNIT}} !important;',
                ],
            ]
        );
         $this->add_responsive_control(
            'header_body_color',
            [
                'label'     => __( 'Header  Color', 'aa_elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  h3' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} h3 i' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}}  .advanced_addons_inline_notice ' => 'background-color: {{VALUE}}',
                ],
                'condition'     => [
                    'style' => ['style1','style2'],
                ]
            ]
        );
        $this->add_responsive_control(
            'header_color2',
            [
                'label'     => __( 'Header  Color', 'aa_elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  h3' => 'background-color: {{VALUE}}',
                ],
                'condition'     => [
                    'style' => ['style3'],
                ]
            ]
        );
        $this->end_controls_section();
        /*---------------------------------------
        ---------------------------------------*/

        /*------------------------------------
            Content Style
        ------------------------------------*/
        $this->start_controls_section(
            '_section_style_body',
            [
                'label' => __( 'Content Style', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
         $this->add_group_control(
            Group_Control_Typography:: get_type(),
            [
                'name'     => 'content_typography',
                'label'    => __( 'Content Typography', 'aa_elementor' ),
                'selector' => '{{WRAPPER}} .advanced_addons_inline_notice .advanced_addons_inline_body',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );
         $this->add_control(
            'content_color',
            [
                'label'     => __( 'Text Color', 'aa_elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .advanced_addons_inline_notice .advanced_addons_inline_body' => 'color: {{VALUE}}',
                ],
            ]
        );
         $this->add_responsive_control(
            'body_color1',
            [
                'label'     => __( 'Body  Color', 'aa_elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .advanced_addons_inline_notice .advanced_addons_inline_body' => 'background-color: {{VALUE}}',
                ],
                'condition'     => [
                    'style' => ['style3'],
                ]
            ]
        );
         $this->add_responsive_control(
            'st_body_color',
            [
                'label'     => __( 'Body  Color', 'aa_elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .advanced_addons_inline_body' => 'background-color: {{VALUE}} !important',
                    '{{WRAPPER}}  .advanced_addons_inline_notice' => 'background-color: {{VALUE}} !important',
                ],
                'condition'     => [
                    'style' => ['style1','style2'],
                ]
            ]
        );

        $this->end_controls_section();
        /*---------------------------------------
        ---------------------------------------*/
		
	}

	protected function render() {
		require AAE_PATH . '/modules/inline-notice/template/view.php';
    }

    protected function _content_template() {
		require AAE_PATH . '/modules/inline-notice/template/content-template.php';
	}
    



}
