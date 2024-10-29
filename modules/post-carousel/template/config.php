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
class AAE_Post_Carousel extends Widget_Base {

	public function get_name() {
		return 'aae-post-carousel';
	}

	public function get_title() {
		return esc_html__( 'Post Carousel', 'aa_elementor' );
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
		return [ 'aae-carousel' ];
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

        $terms = get_terms( array(
            'taxonomy' => 'category',
            'hide_empty' => false,
        ) );
        $cat_names = array();
        foreach( $terms as $t ):
            $cat_names[$t->term_id] = $t->name;
        endforeach;

		$this->start_controls_section(
            '_section_title',
            [
                'label' => __( 'Post Section', 'aa_elementor' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'cat_name',
                [
                    'label'       => __( 'From Category', 'aa_elementor' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'uncategorized',
                    'options' => $cat_names,
                ]
        );


        $this->add_control(
			'posts_limit',
			[
				'label'   => esc_html__( 'Posts Limit', 'aa_elementor' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 5,
			]
        );
        
        $this->add_control(
            'custom_order',
            [
                'label' => esc_html__( 'Custom order', 'aa_elementor' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->add_control(
            'postorder',
            [
                'label' => esc_html__( 'Order', 'aa_elementor' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'DESC',
                'options' => [
                    'DESC'  => esc_html__('Descending','aa_elementor'),
                    'ASC'   => esc_html__('Ascending','aa_elementor'),
                ],
                'condition' => [
                    'custom_order!' => 'yes',
                ]
            ]
        );

        $this->add_control(
            'orderby',
            [
                'label' => esc_html__( 'Orderby', 'aa_elementor' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'none',
                'options' => [
                    'none'          => esc_html__('None','aa_elementor'),
                    'ID'            => esc_html__('ID','aa_elementor'),
                    'date'          => esc_html__('Date','aa_elementor'),
                    'name'          => esc_html__('Name','aa_elementor'),
                    'title'         => esc_html__('Title','aa_elementor'),
                    'comment_count' => esc_html__('Comment count','aa_elementor'),
                    'rand'          => esc_html__('Random','aa_elementor'),
                ],
                'condition' => [
                    'custom_order' => 'yes',
                ]
            ]
        );

        $this->add_control(
			'show_date',
			[
				'label'   => esc_html__( 'Date', 'aa_elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
        );
        

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_common',
            [
                'label' => __( 'Post Content', 'aa_elementor' ),
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
                    '{{WRAPPER}} .advanced_addons_blog_post_carousel' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

    
        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_title',
            [
                'label' => __( 'Post Title', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'title_typography',
                'label'    => __( 'Typography', 'aa_elementor' ),
                'selector' => '{{WRAPPER}} .advanced_addons_blog_post_carousel.type-1 .advanced_addons_blog_post_block .block_post_title',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

		$this->add_control(
            'text_color',
            [
                'label'     => __( 'Title Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_blog_post_carousel.type-1 .advanced_addons_blog_post_block .block_post_title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_meta',
            [
                'label' => __( 'Post Meta', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
		);

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'post_meta_typography',
                'label'    => __( 'Typography', 'aa_elementor' ),
                'selector' => '{{WRAPPER}} .advanced_addons_blog_post_carousel.type-1 .blog_post_head span',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

        $this->add_responsive_control(
            'meta_spacing',
            [
                'label'      => __( 'Post Meta Bottom Spacing', 'aa_elementor' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .advanced_addons_blog_post_carousel.type-1 .blog_post_head span' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

		$this->add_control(
            'meta_color',
            [
                'label'     => __( 'Post Meta Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_blog_post_carousel.type-1 .blog_post_head span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_bar',
            [
                'label' => __( 'Bar', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'bar_color',
            [
                'label'     => __( 'Bar Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_blog_post_carousel.type-1 .slick-center .section-design.type-1,.advanced_addons_blog_post_carousel.type-1 .slick-center .section-design.type-1::before, .advanced_addons_blog_post_carousel.type-1 .slick-center .section-design.type-1::after' => 'background: {{VALUE}} !important',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_desc',
            [
                'label' => __( 'Post Description', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'post_desc_typography',
                'label'    => __( 'Typography', 'aa_elementor' ),
                'selector' => '{{WRAPPER}} .advanced_addons_blog_post_carousel.type-1 .slick-center .blog_post_body p',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

		$this->add_responsive_control(
            'desc_spacing',
            [
                'label'      => __( 'Description Bottom Spacing', 'aa_elementor' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .advanced_addons_blog_post_carousel.type-1 .slick-center .blog_post_body p' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

		$this->add_control(
            'desc_color',
            [
                'label'     => __( 'Description Text Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_blog_post_carousel.type-1 .slick-center .blog_post_body p' => 'color: {{VALUE}}',
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
            Group_Control_Typography::get_type(),
            [
                'name'     => 'post_footer_typography',
                'label'    => __( 'Typography', 'aa_elementor' ),
                'selector' => '{{WRAPPER}} .advanced_addons_blog_post_carousel.type-1 .slick-center .blog_post_body a',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

        $this->add_responsive_control(
            'button_spacing',
            [
                'label'      => __( 'Button Bottom Spacing', 'aa_elementor' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .advanced_addons_blog_post_carousel.type-1 .slick-center .blog_post_body a' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

		$this->add_control(
            'button_color',
            [
                'label'     => __( 'Button Text Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_blog_post_carousel.type-1 .slick-center .blog_post_body a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
       
		

	}

	protected function render() {
		require AAE_PATH . '/modules/post-carousel/template/view.php';
    }
    
    
    

}
