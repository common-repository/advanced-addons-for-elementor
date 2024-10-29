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
class AAE_Promo_Box extends Widget_Base {

	public function get_name() {
		return 'aae-promo-box';
	}

	public function get_title() {
		return esc_html__( 'Promo Box', 'aa_elementor' );
	}

	public function get_icon() {
		return 'ad ad-bulb';
	}

	public function get_categories() {
		return [ 'aae_elementor' ];
	}

	/**
	 * A list of scripts that the widgets is depended in
	 * @since 1.3.0
	 **/
	public function get_script_depends() {
		return [ 'aae-for-elementor-caldera-forms' ];
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
                'label' => __( 'Title & Description', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label'       => __( 'Title', 'aa_elementor' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXT,
                'default'     => __( 'New offer for this summer', 'aa_elementor' ),
                'placeholder' => __( 'Type Promo Box Title', 'aa_elementor' ),
            ]
        );

        $this->add_control(
            'description',
            [
                'label'       => __( 'Description', 'aa_elementor' ),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'aa_elementor' ),
                'placeholder' => __( 'Type Promo box description', 'aa_elementor' ),
                'rows'        => 5
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_button',
            [
                'label' => __( 'Button', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label'       => __( 'Text', 'aa_elementor' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => __( 'Button', 'aa_elementor' ),
                'placeholder' => __( 'Type button text here', 'aa_elementor' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'link',
            [
                'label'       => __( 'Link', 'aa_elementor' ),
                'type'        => Controls_Manager::URL,
                'placeholder' => __( 'https://example.com/', 'aa_elementor' ),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_common',
            [
                'label' => __( 'PromoBox Content', 'aa_elementor' ),
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
                    '{{WRAPPER}} .advanced_addons_promo_box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'bg_color',
            [
                'label'     => __( 'Background Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_promo_box' => 'background-color: {{VALUE}}',
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
                'selector' => '{{WRAPPER}} .advanced_addons_promo_box h5',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

		$this->add_control(
            'title_color',
            [
                'label'     => __( 'Title Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_promo_box h5' => 'color: {{VALUE}}',
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
                'selector' => '{{WRAPPER}} .advanced_addons_promo_box p',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );


		$this->add_control(
            'desc_color',
            [
                'label'     => __( 'Description Text Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_promo_box p' => 'color: {{VALUE}}',
                ],
            ]
        );

        
        $this->end_controls_section();


        $this->start_controls_section(
            '_section_style_button',
            [
                'label' => __( 'Button', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography:: get_type(),
            [
                'name'     => 'btn_typography',
                'label'    => __( 'Typography', 'aa_elementor' ),
                'selector' => '{{WRAPPER}} .advanced_addons_btn',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

		$this->add_control(
            'button_color',
            [
                'label'     => __( 'Button Text Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_btn' => 'color: {{VALUE}}',
                ],
            ]
        );

		$this->add_control(
            'button_bgcolor',
            [
                'label'     => __( 'Button Background Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_btn' => 'background-color: {{VALUE}}',
                ],
            ]
        );

		$this->add_control(
            'button_bordercolor',
            [
                'label'     => __( 'Button Border Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_btn' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
		
	}

	protected function render() {
		require AAE_PATH . '/modules/promo-box/template/view.php';
    }

    protected function _content_template() {
		require AAE_PATH . '/modules/promo-box/template/content-template.php';
    }
    
    



}
