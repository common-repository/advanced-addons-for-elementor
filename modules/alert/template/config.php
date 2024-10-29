<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use \Elementor\Group_Control_Background as Group_Control_Background;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Perfecto aae Portfolio
 *
 * Elementor widget for aae portfolio
 *
 * @since 1.0.0
 */
class AAE_Alert extends Widget_Base {

	public function get_name() {
		return 'aae-alert';
	}

	public function get_title() {
		return esc_html__( 'Alert', 'aa_elementor' );
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
		return [ 'aae-for-elementor-portfolio' ];
	}

	protected function _register_controls() {
		
		$this->start_controls_section(
			'_section_info',
			[
				'label' => __( 'Alert', 'aa_elementor' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		/*-------------------------------------
			Visual Style
		-------------------------------------*/
        $this->add_control(
            'style',
            [
                'label'   => __( 'Visual Style', 'aa_elementor' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'style1',
                'options' => [
                    'style1' => __( 'Alert Bordered', 'aa_elementor' ),
                    'style2' => __( 'Alert Gradient', 'aa_elementor' ),
                    'style3' => __( 'Alert Capsul Gradient', 'aa_elementor' ),
                    'style4' => __( 'Alert Underline', 'aa_elementor' ),
                    
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
					'primary' => __( 'Primary', 'aa_elementor' ),
					'success' => __( 'Success', 'aa_elementor' ),
					'warning' => __( 'Warning', 'aa_elementor' ),
					'danger'  => __( 'Danger', 'aa_elementor' ),
				],
				'style_transfer' => true,
			]
		);

		$this->add_control(
			'pre_title',
			[
				'label'       => __( ' Pre Title', 'aa_elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your pre title', 'aa_elementor' ),
				'default'     => __( 'Well done!', 'aa_elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'alert_title',
			[
				'label'       => __( 'Title', 'aa_elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your title', 'aa_elementor' ),
				'default'     => __( 'You successfully read this important alert message.', 'aa_elementor' ),
				'label_block' => true,
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
        
				$this->end_controls_section();
				
				$this->start_controls_section(
					'_section_style_common',
					[
							'label' => __( 'Common Style', 'aa_elementor' ),
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
									'{{WRAPPER}} .advanced_addons_alert' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
					]
			);
			 $this->add_group_control(
					Group_Control_Background::get_type(),
					[
							'name' => 'p_background',
							'label' => __( 'Background Color', 'aa_elementor' ),
							'types' => [ 'classic', 'gradient'],
							'selector' => '{{WRAPPER}} .advanced_addons_alert',
					]
			);
			 $this->add_responsive_control(
					'border_radius',
					[
							'label'      => __( 'Border Radius', 'aa_elementor' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%' ],
							'selectors'  => [
									'{{WRAPPER}} .advanced_addons_alert' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
					]
			);
			 $this->add_responsive_control(
					'border_width',
					[
							'label'      => __( 'Border  Width ', 'aa_elementor' ),
							'type'       => Controls_Manager::SLIDER,
							'size_units' => [ 'px', '%' ],
							'selectors'  => [
									'{{WRAPPER}} .advanced_addons_alert' =>'border-width: {{VALUE}} !important',
							],
							'condition'     => [
									'style' => 'style1,style4'
							]
					]
			);
			 $this->add_responsive_control(
					'pre_color',
					[
							'label'      => __( 'Pre  Color ', 'aa_elementor' ),
							'type'       => Controls_Manager::COLOR,
							'size_units' => [ 'px', '%' ],
							'selectors'  => [
									'{{WRAPPER}} .advanced_addons_alert strong ' =>'color: {{VALUE}} !important',
							]
					]
			);
			
			$this->add_responsive_control(
					'border_color',
					[
							'label'      => __( 'Border  Color ', 'aa_elementor' ),
							'type'       => Controls_Manager::COLOR,
							'size_units' => [ 'px', '%' ],
							'selectors'  => [
									'{{WRAPPER}} .advanced_addons_alert' =>'border-color: {{VALUE}} !important',
							],
							'condition'     => [
									'style' => ['style1,style4'],
							]
					]
			);
			$this->add_responsive_control(
					'alert_color',
					[
							'label'      => __( 'Text  Color ', 'aa_elementor' ),
							'type'       => Controls_Manager::COLOR,
							'size_units' => [ 'px', '%' ],
							'selectors'  => [
									'{{WRAPPER}} .advanced_addons_alert p ' =>'color: {{VALUE}} !important',
							]
					]
			);

			$this->end_controls_section();
			
			/*------------------------------------------------
			------------------------------------------------*/
			$this->start_controls_section(
					'_section_style_icon',
					[
							'label' => __( 'Icon Style', 'aa_elementor' ),
							'tab'   => Controls_Manager::TAB_STYLE,
					]
			);
			$this->add_responsive_control(
					'icon_border_radius',
					[
							'label'      => __( 'Icon Border Radius', 'aa_elementor' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%' ],
							'selectors'  => [
									'{{WRAPPER}} .advanced_addons_alert.advanced_addons_success span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
							'condition'     => [
									'style' => 'style1'
							]
					]
			);
			$this->add_group_control(
					Group_Control_Background::get_type(),
					[
							'name' => 'icon_background',
							'label' => __( 'Icon Background', 'aa_elementor' ),
							'types' => [ 'classic', 'gradient'],
							'selector' => '{{WRAPPER}} .advanced_addons_alert.advanced_addons_success span',
							'condition'     => [
									'style' => 'style1'
							]
							
					]
					
					);
					$this->add_responsive_control(
					'icon_color',
					[
							'label'      => __( 'Icon Color', 'aa_elementor' ),
							'type'       => Controls_Manager::COLOR,
							'size_units' => [ 'px', '%' ],
							'selectors'  => [
									'{{WRAPPER}} .alert-icon i' =>'color: {{VALUE}} !important',
							]
					]
			);
			$this->end_controls_section();
			/*--------------------------------------------
			--------------------------------------------*/
			/*------------------------------------------------
			------------------------------------------------*/
			$this->start_controls_section(
					'_section_style_typo',
					[
							'label' => __( 'Typhography & Aditional Settings', 'aa_elementor' ),
							'tab'   => Controls_Manager::TAB_STYLE,
					]
			);

			$this->add_group_control(
					Group_Control_Typography:: get_type(),
					[
							'name'     => 'alert_typography',
							'label'    => __( 'Alert Typography', 'aa_elementor' ),
							'selector' => '{{WRAPPER}} .advanced_addons_alert  p',
							'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
					]
			);
			$this->add_group_control(
					Group_Control_Typography:: get_type(),
					[
							'name'     => 'pre_typography',
							'label'    => __( 'Pre Typography', 'aa_elementor' ),
							'selector' => '{{WRAPPER}} .advanced_addons_alert  strong',
							'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
					]
			);
	
	
			$this->end_controls_section();

	}

	protected function render() {
		require AAE_PATH . '/modules/alert/template/view.php';
	}

	protected function _content_template() {
		require AAE_PATH . '/modules/alert/template/content-template.php';
	}

}
