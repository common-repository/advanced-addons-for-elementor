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
use Elementor\Control_Media;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Perfecto aae Portfolio
 *
 * Elementor widget for aae portfolio
 *
 * @since 1.0.0
 */
class AAE_Image_Compare extends Widget_Base {

	public function get_name() {
		return 'aae-image-compare';
	}

	public function get_title() {
		return esc_html__( 'Image Compare', 'aa_elementor' );
	}

	public function get_icon() {
		return 'ad ad-image-compare';
	}

	public function get_categories() {
		return [ 'aae_elementor' ];
	}

	/**
	 * A list of scripts that the widgets is depended in
	 * @since 1.3.0
	 **/
	public function get_script_depends() {
		return [ 'aae-for-elementor-Image-Compare' ];
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
			'_section_images',
			[
				'label' => __( 'Images', 'aa_elementor' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

        $this->start_controls_tabs( '_tab_images' );
        $this->start_controls_tab(
            '_tab_before_image',
            [
                'label' => __( 'Before', 'aa_elementor' ),
            ]
        );

        $this->add_control(
            'before_image',
            [
                'label' => __( 'Image', 'aa_elementor' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'before_label',
            [
                'label' => __( 'Label', 'aa_elementor' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Before', 'aa_elementor' ),
                'placeholder' => __( 'Type before image label', 'aa_elementor' ),
                'description' => __( 'Label will not be shown if Hide Overlay is enabled in Settings', 'aa_elementor' ),
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_after_image',
            [
                'label' => __( 'After', 'aa_elementor' ),
            ]
        );

        $this->add_control(
            'after_image',
            [
                'label' => __( 'Image', 'aa_elementor' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'after_label',
            [
                'label' => __( 'Label', 'aa_elementor' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'After', 'aa_elementor' ),
                'placeholder' => __( 'Type after image label', 'aa_elementor' ),
                'description' => __( 'Label will not be shown if Hide Overlay is enabled in Settings', 'aa_elementor' ),
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'full',
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();

        // $this->start_controls_section(
        //     '_section_settings',
        //     [
        //         'label' => __( 'Settings', 'aa_elementor' ),
        //         'tab'   => Controls_Manager::TAB_CONTENT,
        //     ]
        // );

        // $this->add_control(
        //     'offset',
        //     [
        //         'label' => __( 'Visibility Ratio', 'aa_elementor' ),
        //         'type' => Controls_Manager::SLIDER,
        //         'size_units' => ['px'],
        //         'range' => [
        //             'px' => [
        //                 'min' => 0,
        //                 'max' => 1,
        //                 'step' => .1,
        //             ],
        //         ],
        //         'default' => [
        //             'size' => .5,
        //         ],
        //     ]
        // );

        // $this->add_control(
        //     'orientation',
        //     [
        //         'label' => __( 'Orientation', 'aa_elementor' ),
        //         'type' => Controls_Manager::CHOOSE,
        //         'label_block' => false,
        //         'options' => [
        //             'horizontal' => [
        //                 'title' => __( 'Horizontal', 'aa_elementor' ),
        //                 'icon' => 'fa fa-arrows-h',
        //             ],
        //             'vertical' => [
        //                 'title' => __( 'Vertical', 'aa_elementor' ),
        //                 'icon' => 'fa fa-arrows-v',
        //             ],
        //         ],
        //         'default' => 'horizontal',
        //     ]
        // );

        // $this->add_control(
        //     'hide_overlay',
        //     [
        //         'label' => __( 'Hide Overlay', 'aa_elementor' ),
        //         'type' => Controls_Manager::SWITCHER,
        //         'label_on' => __( 'Yes', 'aa_elementor' ),
        //         'label_off' => __( 'No', 'aa_elementor' ),
        //         'return_value' => 'yes',
        //         'description' => __( 'Hide overlay with before and after label', 'aa_elementor' )
        //     ]
        // );

        // $this->add_control(
        //     'move_handle',
        //     [
        //         'label' => __( 'Move Handle', 'aa_elementor' ),
        //         'type' => Controls_Manager::SELECT,
        //         'default' => 'on_swipe',
        //         'options' => [
        //             'on_hover' => __( 'On Hover', 'aa_elementor' ),
        //             'on_click' => __( 'On Click', 'aa_elementor' ),
        //             'on_swipe' => __( 'On Swipe', 'aa_elementor' ),
        //         ],
        //         'description' => __( 'Select handle movement type. Note: overlay does not work with On Hover.', 'aa_elementor' )
        //     ]
        // );

        // $this->end_controls_section();

         // $this->start_controls_section(
        //     '_section_style_handle',
        //     [
        //         'label' => __( 'Handle', 'aa_elementor' ),
        //         'tab'   => Controls_Manager::TAB_STYLE,
        //     ]
        // );

        // $this->add_control(
        //     'handle_color',
        //     [
        //         'label' => __( 'Color', 'aa_elementor' ),
        //         'type' => Controls_Manager::COLOR,
        //         'selectors' => [
        //             '{{WRAPPER}} .twentytwenty-handle:before, {{WRAPPER}} .twentytwenty-handle:after' => 'background-color: {{VALUE}}',
        //             '{{WRAPPER}} .twentytwenty-handle' => 'border-color: {{VALUE}}',
        //             '{{WRAPPER}} .twentytwenty-left-arrow' => 'border-right-color: {{VALUE}}',
        //             '{{WRAPPER}} .twentytwenty-right-arrow' => 'border-left-color: {{VALUE}}',
        //             '{{WRAPPER}} .twentytwenty-handle:before' =>
        //                 '-webkit-box-shadow: 0 3px 0 {{VALUE}}, 0px 0px 12px rgba(51, 51, 51, 0.5);'
        //                 . '-moz-box-shadow: 0 3px 0 {{VALUE}}, 0px 0px 12px rgba(51, 51, 51, 0.5);'
        //                 . 'box-shadow: 0 3px 0 {{VALUE}}, 0px 0px 12px rgba(51, 51, 51, 0.5);',
        //             '{{WRAPPER}} .twentytwenty-handle:after' =>
        //                 '-webkit-box-shadow: 0 -3px 0 {{VALUE}}, 0px 0px 12px rgba(51, 51, 51, 0.5);'
        //                 . '-moz-box-shadow: 0 -3px 0 {{VALUE}}, 0px 0px 12px rgba(51, 51, 51, 0.5);'
        //                 . 'box-shadow: 0 -3px 0 {{VALUE}}, 0px 0px 12px rgba(51, 51, 51, 0.5);',
        //         ],
        //     ]
        // );

        // $this->add_control(
        //     '_heading_bar',
        //     [
        //         'label' => __( 'Handle Bar', 'aa_elementor' ),
        //         'type' => Controls_Manager::HEADING,
        //         'separator' => 'before',
        //     ]
        // );

        // $this->add_responsive_control(
        //     'bar_size',
        //     [
        //         'label' => __( 'Size', 'aa_elementor' ),
        //         'type' => Controls_Manager::SLIDER,
        //         'size_units' => [ 'px' ],
        //         'range' => [
        //             'px' => [
        //                 'min' => 0,
        //                 'max' => 50,
        //             ],
        //         ],
        //         'selectors' => [
        //             '{{WRAPPER}} .twentytwenty-horizontal .twentytwenty-handle:before, {{WRAPPER}} .twentytwenty-horizontal .twentytwenty-handle:after' => 'width: {{SIZE}}{{UNIT}}; margin-left: calc(-0px - {{SIZE}}{{UNIT}} / 2);',
        //             '{{WRAPPER}} .twentytwenty-vertical .twentytwenty-handle:before, {{WRAPPER}} .twentytwenty-vertical .twentytwenty-handle:after' => 'height: {{SIZE}}{{UNIT}}; margin-top: calc(-0px - {{SIZE}}{{UNIT}} / 2);',
        //         ],
        //     ]
        // );

        // $this->add_control(
        //     '_heading_arrow',
        //     [
        //         'label' => __( 'Handle Arrow', 'aa_elementor' ),
        //         'type' => Controls_Manager::HEADING,
        //         'separator' => 'before',
        //     ]
        // );

        // $this->add_responsive_control(
        //     'arrow_box_width',
        //     [
        //         'label' => __( 'Box Width', 'aa_elementor' ),
        //         'type' => Controls_Manager::SLIDER,
        //         'size_units' => [ 'px' ],
        //         'range' => [
        //             'px' => [
        //                 'min' => 20,
        //                 'max' => 250,
        //             ],
        //         ],
        //         'selectors' => [
        //             '{{WRAPPER}} .twentytwenty-handle' => 'width: {{SIZE}}{{UNIT}}; margin-left: calc(-1 * ({{SIZE}}{{UNIT}} / 2));',
        //             '{{WRAPPER}} .twentytwenty-vertical .twentytwenty-handle:before' => 'margin-left: calc(({{SIZE}}{{UNIT}} / 2) - 1px);',
        //             '{{WRAPPER}} .twentytwenty-vertical .twentytwenty-handle:after' => 'margin-right: calc(({{SIZE}}{{UNIT}} / 2) - 1px);',
        //         ],
        //     ]
        // );
        // $this->add_responsive_control(
        //     'arrow_box_height',
        //     [
        //         'label' => __( 'Box Height', 'aa_elementor' ),
        //         'type' => Controls_Manager::SLIDER,
        //         'size_units' => [ 'px' ],
        //         'range' => [
        //             'px' => [
        //                 'min' => 20,
        //                 'max' => 250,
        //             ],
        //         ],
        //         'selectors' => [
        //             '{{WRAPPER}} .twentytwenty-handle' => 'height: {{SIZE}}{{UNIT}}; margin-top: calc(-1 * ({{SIZE}}{{UNIT}} / 2));',
        //             '{{WRAPPER}} .twentytwenty-horizontal .twentytwenty-handle:before' => 'margin-bottom: calc(({{SIZE}}{{UNIT}} / 2) + 2px);',
        //             '{{WRAPPER}} .twentytwenty-horizontal .twentytwenty-handle:after' => 'margin-top: calc(({{SIZE}}{{UNIT}} / 2) + 2px);',
        //         ],
        //     ]
        // );

        // $this->add_group_control(
        //     Group_Control_Border::get_type(),
        //     [
        //         'name' => 'box_border',
        //         'selector' => '{{WRAPPER}} .twentytwenty-handle',
        //         'exclude' => [
        //              'color'
        //         ]
        //     ]
        // );

        // $this->add_responsive_control(
        //     'box_border_radius',
        //     [
        //         'label' => __( 'Border Radius', 'aa_elementor' ),
        //         'type' => Controls_Manager::DIMENSIONS,
        //         'size_units' => [ 'px', '%' ],
        //         'selectors' => [
        //             '{{WRAPPER}} .twentytwenty-handle' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        //         ],
        //     ]
        // );

        // $this->end_controls_section();

        // $this->start_controls_section(
        //     '_section_style_label',
        //     [
        //         'label' => __( 'Label', 'aa_elementor' ),
        //         'tab'   => Controls_Manager::TAB_STYLE,
        //     ]
        // );

        // $this->add_responsive_control(
        //     'label_padding',
        //     [
        //         'label' => __( 'Padding', 'aa_elementor' ),
        //         'type' => Controls_Manager::DIMENSIONS,
        //         'size_units' => [ 'px', 'em', '%' ],
        //         'selectors' => [
        //             '{{WRAPPER}} .twentytwenty-before-label:before, {{WRAPPER}} .twentytwenty-after-label:before' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        //         ],
        //     ]
        // );

        // $this->add_control(
        //     'position_toggle',
        //     [
        //         'label' => __( 'Position', 'aa_elementor' ),
        //         'type' => Controls_Manager::POPOVER_TOGGLE,
        //         'label_off' => __( 'None', 'aa_elementor' ),
        //         'label_on' => __( 'Custom', 'aa_elementor' ),
        //         'return_value' => 'yes',
        //     ]
        // );

        // $this->start_popover();

        // $this->add_responsive_control(
        //     'label_offset_y',
        //     [
        //         'label' => __( 'Vertical', 'aa_elementor' ),
        //         'type' => Controls_Manager::SLIDER,
        //         'size_units' => ['px'],
        //         'range' => [
        //             'px' => [
        //                 'min' => -10,
        //                 'max' => 1000,
        //             ],
        //         ],
        //         'selectors' => [
        //             '{{WRAPPER}} .twentytwenty-vertical .twentytwenty-after-label:before' => 'bottom: {{SIZE}}{{UNIT}};',
        //             '{{WRAPPER}} .twentytwenty-vertical .twentytwenty-before-label:before' => 'top: {{SIZE}}{{UNIT}};',
        //             '{{WRAPPER}} .twentytwenty-horizontal .twentytwenty-before-label:before, {{WRAPPER}} .twentytwenty-horizontal .twentytwenty-after-label:before' => 'top: {{SIZE}}{{UNIT}};'
        //         ],
        //         'condition' => [
        //             'position_toggle' => 'yes',
        //         ]
        //     ]
        // );

        // $this->add_responsive_control(
        //     'label_offset_x',
        //     [
        //         'label' => __( 'Horizontal', 'aa_elementor' ),
        //         'type' => Controls_Manager::SLIDER,
        //         'size_units' => ['px'],
        //         'range' => [
        //             'px' => [
        //                 'min' => -10,
        //                 'max' => 1000,
        //             ],
        //         ],
        //         'selectors' => [
        //             '{{WRAPPER}} .twentytwenty-horizontal .twentytwenty-after-label:before' => 'right: {{SIZE}}{{UNIT}};',
        //             '{{WRAPPER}} .twentytwenty-horizontal .twentytwenty-before-label:before' => 'left: {{SIZE}}{{UNIT}};',
        //             '{{WRAPPER}} .twentytwenty-vertical .twentytwenty-before-label:before, {{WRAPPER}} .twentytwenty-vertical .twentytwenty-after-label:before' => 'left: {{SIZE}}{{UNIT}};'
        //         ],
        //         'condition' => [
        //             'position_toggle' => 'yes',
        //         ]
        //     ]
        // );

        // $this->end_popover();

        // $this->add_group_control(
        //     Group_Control_Border::get_type(),
        //     [
        //         'name' => 'label_border',
        //         'selector' => '{{WRAPPER}} .twentytwenty-before-label:before, {{WRAPPER}} .twentytwenty-after-label:before',
        //     ]
        // );

        // $this->add_responsive_control(
        //     'label_border_radius',
        //     [
        //         'label' => __( 'Border Radius', 'aa_elementor' ),
        //         'type' => Controls_Manager::DIMENSIONS,
        //         'size_units' => [ 'px', '%' ],
        //         'selectors' => [
        //             '{{WRAPPER}} .twentytwenty-before-label:before, {{WRAPPER}} .twentytwenty-after-label:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        //         ],
        //     ]
        // );

        // $this->add_control(
        //     'label_color',
        //     [
        //         'label' => __( 'Color', 'aa_elementor' ),
        //         'type' => Controls_Manager::COLOR,
        //         'selectors' => [
        //             '{{WRAPPER}} .twentytwenty-before-label:before, {{WRAPPER}} .twentytwenty-after-label:before' => 'color: {{VALUE}}',
        //         ],
        //     ]
        // );

        // $this->add_control(
        //     'label_bg_color',
        //     [
        //         'label' => __( 'Background Color', 'aa_elementor' ),
        //         'type' => Controls_Manager::COLOR,
        //         'selectors' => [
        //             '{{WRAPPER}} .twentytwenty-before-label:before, {{WRAPPER}} .twentytwenty-after-label:before' => 'background-color: {{VALUE}}',
        //         ],
        //     ]
        // );

        // $this->add_group_control(
        //     Group_Control_Box_Shadow::get_type(),
        //     [
        //         'name' => 'label_box_shadow',
        //         'selector' => '{{WRAPPER}} .twentytwenty-before-label:before, {{WRAPPER}} .twentytwenty-after-label:before'
        //     ]
        // );

        // $this->add_group_control(
        //     Group_Control_Typography::get_type(),
        //     [
        //         'name' => 'label_typography',
        //         'selector' => '{{WRAPPER}} .twentytwenty-before-label:before, {{WRAPPER}} .twentytwenty-after-label:before',
        //         'scheme' => Scheme_Typography::TYPOGRAPHY_3,
        //     ]
        // );

        // $this->end_controls_section();
        
		
    }
    
	protected function render() {
		require AAE_PATH . '/modules/image-compare/template/view.php';
    }
    



}
