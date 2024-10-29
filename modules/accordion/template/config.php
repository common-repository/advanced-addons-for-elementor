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
class AAE_Accordion extends Widget_Base {

	public function get_name() {
		return 'aae-accordion';
	}

	public function get_title() {
		return esc_html__( 'Accordion', 'aa_elementor' );
	}

	public function get_icon() {
		return 'ad ad-team-member';
	}

	public function get_categories() {
		return [ 'aae_elementor' ];
	}

	/**
	 * A list of scripts that the widgets is depended in
	 * @since 1.3.0
	 **/
	public function get_script_depends() {
		return [ 'aae-post-grid' ];
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
            'accordion_content',
            [
                'label' => __( 'Accordion', 'aa_elementor' ),
            ]
        );
        
            $this->add_control(
                'style',
                [
                    'label' => __( 'Style', 'aa_elementor' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'style1',
                    'options' => [
                        'style1' => __( 'Style One', 'aa_elementor' ),
                        'style2' => __( 'Style Two', 'aa_elementor' ),
                        'style3' => __( 'Style Three', 'aa_elementor' ),
                        'style4' => __( 'Style Four', 'aa_elementor' ),
                    ],
                ]
            );


            // Accordion One Repeater
            $this->add_control(
                'advanced_accordion_list',
                [
                    'label' => __( 'Accordion Items', 'aa_elementor' ),
                    'type' => Controls_Manager::REPEATER,
                    'default' => [
                        [
                            'accordion_title'   => __('Accordion Title One','aa_elementor'),
                            'accordion_content' => __('Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably have not heard of them accusamus labore sustainable VHS.','aa_elementor'),
                        ],
                        [
                            'accordion_title'   => __('Accordion Title Two','aa_elementor'),
                            'accordion_content' => __('Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably have not heard of them accusamus labore sustainable VHS.','aa_elementor'),
                        ],
                        [
                            'accordion_title'   => __('Accordion Title Three','aa_elementor'),
                            'accordion_content' => __('Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably have not heard of them accusamus labore sustainable VHS.','aa_elementor'),
                        ],
                    ],
                    'fields' => [
                        [
                            'name'        => 'accordion_title',
                            'label'       => __( 'Title', 'aa_elementor' ),
                            'type'        => Controls_Manager::TEXT,
                            'default'     => __( 'Accordion Title' , 'aa_elementor' ),
                        ],
                        [
                            'name'        => 'diff_show',
                            'label'       => __( 'Default Show', 'aa_elementor' ),
                            'type'        => Controls_Manager::SWITCHER,
                            'label_on' => __( 'Yes', 'aa_elementor' ),
                            'label_off' => __( 'No', 'aa_elementor' ),
                            'return_value' => 'yes',
                        ],
                        
                        [
                            'name'       => 'accordion_content',
                            'label'      => __( 'Accordion Content', 'aa_elementor' ),
                            'type'       => Controls_Manager::WYSIWYG,
                            'default'    => __( 'Accordion Content', 'aa_elementor' ),
                            
                        ],


                    ],
                    'title_field' => '{{{ accordion_title }}}',
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
    
         
           
        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_content',
            [
                'label' => __( 'Section', 'aa_elementor' ),
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
                    '{{WRAPPER}} .advanced_addons_accordion' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'content_margin',
            [
                'label'      => __( 'Content Margin', 'aa_elementor' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .advanced_addons_accordion' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

        $this->add_responsive_control(
            'title_spacing',
            [
                'label'      => __( 'Bottom Spacing', 'aa_elementor' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .ade-ac-title' => 'margin-bottom: {{SIZE}}{{UNIT}} !important;',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography:: get_type(),
            [
                'name'     => 'title_typography',
                'selector' => '{{WRAPPER}} .ade-ac-title',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_2,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label'     => __( 'Text Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ade-ac-title' => 'color: {{VALUE}} !important',
                ],
            ]
        );

        $this->add_control(
            'title_bar_color',
            [
                'label'     => __( 'Title Bar Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_accordion.type-1 .advanced_addons_accordion_title::before' => 'background: {{VALUE}}',
                ],
                'condition'   => [
                    'style' => ['style1'],
                ],
            ]
        );

        $this->add_control(
            'title_bg',
            [
                'label'     => __( 'Title Background', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_accordion.type-1.line-bordered.boxed-style.grad.show .advanced_addons_accordion_title' => 'background: {{VALUE}}',
                ],
                'condition'   => [
                    'style' => ['style4'],
                ],
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label'     => __( 'Icon Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_accordion .accordion_icon i' => 'color: {{VALUE}} !important',
                ],
            ]
        );

        $this->add_control(
            'icon_bg_color',
            [
                'label'     => __( 'Icon Bg Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_accordion.type-1.show.line-bordered.boxed-style.grad .accordion_icon' => 'background: {{VALUE}} !important',
                ],
                'condition'   => [
                    'style' => ['style4'],
                ],
            ]
        );

        $this->add_responsive_control(
            'title_padding',
            [
                'label'      => __( 'Title Padding', 'aa_elementor' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .advanced_addons_accordion.type-1.line-bordered.boxed-style.grad.show .advanced_addons_accordion_title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition'   => [
                    'style' => ['style4'],
                ],
            ]
        );

        $this->add_responsive_control(
            'title_margin',
            [
                'label'      => __( 'Title Margin', 'aa_elementor' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .advanced_addons_accordion.type-1.line-bordered.boxed-style.grad.show .advanced_addons_accordion_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition'   => [
                    'style' => ['style4'],
                ],
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_text',
            [
                'label' => __( 'Content', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'text_padding',
            [
                'label'      => __( 'Text Padding', 'aa_elementor' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .ade-ac-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'text_margin',
            [
                'label'      => __( 'Text Margin', 'aa_elementor' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .ade-ac-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'text_color',
            [
                'label'     => __( 'Text Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ade-ac-content' => 'color: {{VALUE}} !important',
                ],
            ]
        );

        $this->add_control(
            'bg_color',
            [
                'label'     => __( 'Background', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_accordion.type-1.line-bordered.show' => 'background: {{VALUE}}',
                ],
                'condition'   => [
                    'style' => ['style2'],
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography:: get_type(),
            [
                'name'     => 'text_typography',
                'selector' => '{{WRAPPER}} .ade-ac-content',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_2,
            ]
        );
     $this->end_controls_section();

     
       
		

	}

	protected function render() {
		require AAE_PATH . '/modules/accordion/template/view.php';
    }
    
    
    

}
