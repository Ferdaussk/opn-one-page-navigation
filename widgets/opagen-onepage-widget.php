<?php
/**
 * 
 * @Start a new widget from here. The plugin is One Page Navigation 
 * 
 */
namespace opagen_onepage_namespace\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class OPAGEN_Effective_widgets extends Widget_Base {

	public function get_name() {
		return esc_html__( 'OnePageNavigation', 'opn-one-page-navigation' );
	}

	public function get_title() {
		return esc_html__( 'One Page Navigation', 'opn-one-page-navigation' );
	}

	public function get_icon() {
		return 'opagen-effective-icon eicon-single-page';
	}

	public function get_categories() {
		return [ 'bwdthebest_general_category' ];
	}
	
	public function get_keywords() {
		return ['nav' , 'one page nav', 'menu' , 'animation' , 'nav menu'];
	}
	
	protected function register_controls() {

		$this->start_controls_section(
			'contentSection',
			[
				'label' => esc_html__( 'One Page Navigation', 'opn-one-page-navigation' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'section_title',
			[
				'label'                 => __('Section Title', 'opn-one-page-navigation'),
				'type'                  => Controls_Manager::TEXT,
				'dynamic'               => [
					'active'            => true,
				],
				'default'               => __('Section Title', 'opn-one-page-navigation'),
			]
		);
		$repeater->add_control(
			'section_id',
			[
				'label'                 => __('Section ID', 'opn-one-page-navigation'),
				'type'                  => Controls_Manager::TEXT,
				'dynamic'               => [
					'active'            => true,
				],
				'default'               => '',
			]
		);
		$repeater->add_control(
			'dot_icon_new',
			[
				'label'                 => __('Navigation Dot', 'opn-one-page-navigation'),
				'type'                  => Controls_Manager::ICONS,
				'fa4compatibility' => 'dot_icon',
				'default' => [
					'value' => 'fas fa-circle',
					'library' => 'fa-solid',
				],
			]
		);
		$this->add_control(
			'nav_dots',
			[
				'label'                 => '',
				'type'                  => Controls_Manager::REPEATER,
				'default'               => [
					[
						'section_title'   => __('Section #1', 'opn-one-page-navigation'),
						'section_id'      => 'section1',
						'dot_icon'        => 'fa fa-circle',
					],
					[
						'section_title'   => __('Section #2', 'opn-one-page-navigation'),
						'section_id'      => 'section2',
						'dot_icon'        => 'fa fa-circle',
					],
					[
						'section_title'   => __('Section #3', 'opn-one-page-navigation'),
						'section_id'      => 'section3',
						'dot_icon'        => 'fa fa-circle',
					],
				],
				'fields'                =>  $repeater->get_controls(),
				'title_field'           => '{{{ section_title }}}',
			]
		);
		$this->end_controls_section();

		/**
		 * 
		 * @Here goes to start all settings for my One Page Navigation
		 * 
		 */
		$this->start_controls_section(
			'section_onepage_nav_settings',
			[
				'label'                 => __('Settings', 'opn-one-page-navigation'),
			]
		);
		$this->add_control(
			'nav_tooltip',
			[
				'label'                 => __('Tooltip', 'opn-one-page-navigation'),
				'description'           => __('Show tooltip on hover', 'opn-one-page-navigation'),
				'type'                  => Controls_Manager::SWITCHER,
				'default'               => 'yes',
				'label_on'              => __('Yes', 'opn-one-page-navigation'),
				'label_off'             => __('No', 'opn-one-page-navigation'),
				'return_value'          => 'yes',
			]
		);
		$this->add_control(
			'tooltip_arrow',
			[
				'label'                 => __('Tooltip Arrow', 'opn-one-page-navigation'),
				'type'                  => Controls_Manager::SWITCHER,
				'default'               => 'yes',
				'label_on'              => __('Show', 'opn-one-page-navigation'),
				'label_off'             => __('Hide', 'opn-one-page-navigation'),
				'return_value'          => 'yes',
				'condition'             => [
					'nav_tooltip'   => 'yes',
				],
			]
		);
		$this->add_control(
			'scroll_wheel',
			[
				'label'                 => __('Scroll Wheel', 'opn-one-page-navigation'),
				'description'           => __('Use mouse wheel to navigate from one row to another', 'opn-one-page-navigation'),
				'type'                  => Controls_Manager::SWITCHER,
				'default'               => 'off',
				'label_on'              => __('On', 'opn-one-page-navigation'),
				'label_off'             => __('Off', 'opn-one-page-navigation'),
				'return_value'          => 'on',
			]
		);
		$this->add_control(
			'scroll_touch',
			[
				'label'                 => __('Touch Swipe', 'opn-one-page-navigation'),
				'description'           => __('Use touch swipe to navigate from one row to another in mobile devices', 'opn-one-page-navigation'),
				'type'                  => Controls_Manager::SWITCHER,
				'default'               => 'off',
				'label_on'              => __('On', 'opn-one-page-navigation'),
				'label_off'             => __('Off', 'opn-one-page-navigation'),
				'return_value'          => 'on',
				'condition'             => [
					'scroll_wheel'   => 'on',
				],
			]
		);
		$this->add_control(
			'scroll_keys',
			[
				'label'                 => __('Scroll Keys', 'opn-one-page-navigation'),
				'description'           => __('Use UP and DOWN arrow keys to navigate from one row to another', 'opn-one-page-navigation'),
				'type'                  => Controls_Manager::SWITCHER,
				'default'               => 'off',
				'label_on'              => __('On', 'opn-one-page-navigation'),
				'label_off'             => __('Off', 'opn-one-page-navigation'),
				'return_value'          => 'on',
			]
		);
		$this->add_control(
			'top_offset',
			[
				'label'                 => __('Row Top Offset', 'opn-one-page-navigation'),
				'type'                  => Controls_Manager::SLIDER,
				'default'               => ['size' => '0'],
				'range'                 => [
					'px' => [
						'min'   => 0,
						'max'   => 300,
						'step'  => 1,
					],
				],
				'size_units'            => ['px'],
			]
		);
		$this->add_control(
			'scrolling_speed',
			[
				'label'                 => __('Scrolling Speed', 'opn-one-page-navigation'),
				'type'                  => Controls_Manager::NUMBER,
				'default'               => '700',
			]
		);
		$this->end_controls_section();

		/**
		 * 
		 * Here goes to start style tab section
		 * 
		 */
		$this->start_controls_section(
			'section_nav_box_style',
			[
				'label'                 => __('Navigation Box', 'opn-one-page-navigation'),
				'tab'                   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'heading_alignment',
			[
				'label'                 => __('Alignment', 'opn-one-page-navigation'),
				'type'                  => Controls_Manager::CHOOSE,
				'options'               => [
					'top'          => [
						'title'    => __('Top', 'opn-one-page-navigation'),
						'icon'     => 'eicon-v-align-top',
					],
					'bottom'       => [
						'title'    => __('Bottom', 'opn-one-page-navigation'),
						'icon'     => 'eicon-v-align-bottom',
					],
					'left'         => [
						'title'    => __('Left', 'opn-one-page-navigation'),
						'icon'        => 'eicon-h-align-left',
					],
					'right'        => [
						'title'    => __('Right', 'opn-one-page-navigation'),
						'icon'        => 'eicon-h-align-right',
					],
				],
				'default'               => 'right',
				'prefix_class'          => 'nav-align-',
				'frontend_available'    => true,
				'selectors'             => [
					'{{WRAPPER}} .opagen-caldera-form-heading' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'              => 'nav_container_background',
				'types'             => ['classic', 'gradient'],
				'selector'          => '{{WRAPPER}} .opagen-one-page-nav',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'                  => 'nav_container_border',
				'label'                 => __('Border', 'opn-one-page-navigation'),
				'placeholder'           => '1px',
				'default'               => '1px',
				'selector'              => '{{WRAPPER}} .opagen-one-page-nav'
			]
		);
		$this->add_control(
			'nav_container_border_radius',
			[
				'label'                 => __('Border Radius', 'opn-one-page-navigation'),
				'type'                  => Controls_Manager::DIMENSIONS,
				'size_units'            => ['px', '%'],
				'selectors'             => [
					'{{WRAPPER}} .opagen-one-page-nav' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'nav_container_margin',
			[
				'label'                 => __('Margin', 'opn-one-page-navigation'),
				'type'                  => Controls_Manager::DIMENSIONS,
				'size_units'            => ['px', '%'],
				'selectors'             => [
					'{{WRAPPER}} .opagen-one-page-nav-container' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'nav_container_padding',
			[
				'label'                 => __('Padding', 'opn-one-page-navigation'),
				'type'                  => Controls_Manager::DIMENSIONS,
				'size_units'            => ['px', '%'],
				'selectors'             => [
					'{{WRAPPER}} .opagen-one-page-nav' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name'                  => 'nav_container_box_shadow',
				'selector'              => '{{WRAPPER}} .opagen-one-page-nav',
				'separator'             => 'before',
			]
		);
		$this->end_controls_section();

		/**
		 * 
		 * @Here goes to style for the dots
		 * 
		 */

		$this->start_controls_section(
			'section_dots_style',
			[
				'label'                 => __('Navigation Dots', 'opn-one-page-navigation'),
				'tab'                   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'dots_size',
			[
				'label'                 => __('Size', 'opn-one-page-navigation'),
				'type'                  => Controls_Manager::SLIDER,
				'default'               => ['size' => '10'],
				'range'                 => [
					'px' => [
						'min'   => 5,
						'max'   => 60,
						'step'  => 1,
					],
				],
				'size_units'            => ['px'],
				'selectors'             => [
					'{{WRAPPER}} .opagen-nav-dot' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'dots_spacing',
			[
				'label'                 => __('Spacing', 'opn-one-page-navigation'),
				'type'                  => Controls_Manager::SLIDER,
				'default'               => ['size' => '10'],
				'range'                 => [
					'px' => [
						'min'   => 2,
						'max'   => 30,
						'step'  => 1,
					],
				],
				'size_units'            => ['px'],
				'selectors'             => [
					'{{WRAPPER}}.nav-align-right .opagen-one-page-nav-item, {{WRAPPER}}.nav-align-left .opagen-one-page-nav-item' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.nav-align-top .opagen-one-page-nav-item, {{WRAPPER}}.nav-align-bottom .opagen-one-page-nav-item' => 'margin-right: {{SIZE}}{{UNIT}}; margin-left: 0',
					'.rtl {{WRAPPER}}.nav-align-top .opagen-one-page-nav-item, {{WRAPPER}}.nav-align-bottom .opagen-one-page-nav-item' => 'margin-left: {{SIZE}}{{UNIT}};margin-right: 0;',
				],
			]
		);
		$this->add_responsive_control(
			'dots_padding',
			[
				'label'                 => __('Padding', 'opn-one-page-navigation'),
				'type'                  => Controls_Manager::DIMENSIONS,
				'size_units'            => ['px', '%'],
				'selectors'             => [
					'{{WRAPPER}} .opagen-nav-dot-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name'                  => 'dots_box_shadow',
				'selector'              => '{{WRAPPER}} .opagen-nav-dot-wrap',
				'separator'             => 'before',
			]
		);
		$this->start_controls_tabs('tabs_dots_style');

		$this->start_controls_tab(
			'tab_dots_normal',
			[
				'label'                 => __('Normal', 'opn-one-page-navigation'),
			]
		);
		$this->add_control(
			'dots_color_normal',
			[
				'label'                 => __('Color', 'opn-one-page-navigation'),
				'type'                  => Controls_Manager::COLOR,
				'default'               => '',
				'selectors'             => [
					'{{WRAPPER}} .opagen-nav-dot' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'dots_bg_color_normal',
			[
				'label'                 => __('Background Color', 'opn-one-page-navigation'),
				'type'                  => Controls_Manager::COLOR,
				'default'               => '',
				'selectors'             => [
					'{{WRAPPER}} .opagen-nav-dot-wrap' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'                  => 'dots_border',
				'label'                 => __('Border', 'opn-one-page-navigation'),
				'placeholder'           => '1px',
				'default'               => '1px',
				'selector'              => '{{WRAPPER}} .opagen-nav-dot-wrap'
			]
		);
		$this->add_control(
			'dots_border_radius',
			[
				'label'                 => __('Border Radius', 'opn-one-page-navigation'),
				'type'                  => Controls_Manager::DIMENSIONS,
				'size_units'            => ['px', '%'],
				'selectors'             => [
					'{{WRAPPER}} .opagen-nav-dot-wrap' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_dots_hover',
			[
				'label'                 => __('Hover', 'opn-one-page-navigation'),
			]
		);
		$this->add_control(
			'dots_color_hover',
			[
				'label'                 => __('Color', 'opn-one-page-navigation'),
				'type'                  => Controls_Manager::COLOR,
				'default'               => '',
				'selectors'             => [
					'{{WRAPPER}} .opagen-one-page-nav-item .opagen-nav-dot-wrap:hover .opagen-nav-dot' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'dots_bg_color_hover',
			[
				'label'                 => __('Background Color', 'opn-one-page-navigation'),
				'type'                  => Controls_Manager::COLOR,
				'default'               => '',
				'selectors'             => [
					'{{WRAPPER}} .opagen-one-page-nav-item .opagen-nav-dot-wrap:hover' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'dots_border_color_hover',
			[
				'label'                 => __('Border Color', 'opn-one-page-navigation'),
				'type'                  => Controls_Manager::COLOR,
				'default'               => '',
				'selectors'             => [
					'{{WRAPPER}} .opagen-one-page-nav-item .opagen-nav-dot-wrap:hover' => 'border-color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_dots_active',
			[
				'label'                 => __('Active', 'opn-one-page-navigation'),
			]
		);
		$this->add_control(
			'dots_color_active',
			[
				'label'                 => __('Color', 'opn-one-page-navigation'),
				'type'                  => Controls_Manager::COLOR,
				'default'               => '',
				'selectors'             => [
					'{{WRAPPER}} .opagen-one-page-nav-item.active .opagen-nav-dot' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'dots_bg_color_active',
			[
				'label'                 => __('Background Color', 'opn-one-page-navigation'),
				'type'                  => Controls_Manager::COLOR,
				'default'               => '',
				'selectors'             => [
					'{{WRAPPER}} .opagen-one-page-nav-item.active .opagen-nav-dot-wrap' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'dots_border_color_active',
			[
				'label'                 => __('Border Color', 'opn-one-page-navigation'),
				'type'                  => Controls_Manager::COLOR,
				'default'               => '',
				'selectors'             => [
					'{{WRAPPER}} .opagen-one-page-nav-item.active .opagen-nav-dot-wrap' => 'border-color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

		/**
		 * 
		 * @This style goes to fro tooltip section
		 * 
		 */
		$this->start_controls_section(
			'section_tooltips_style',
			[
				'label'                 => __('Tooltip', 'opn-one-page-navigation'),
				'tab'                   => Controls_Manager::TAB_STYLE,
				'condition'             => [
					'nav_tooltip'  => 'yes',
				],
			]
		);
		$this->add_control(
			'tooltip_bg_color',
			[
				'label'                 => __('Background Color', 'opn-one-page-navigation'),
				'type'                  => Controls_Manager::COLOR,
				'default'               => '',
				'selectors'             => [
					'{{WRAPPER}} .opagen-nav-dot-tooltip-content' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .opagen-nav-dot-tooltip' => 'color: {{VALUE}}',
				],
				'condition'             => [
					'nav_tooltip'  => 'yes',
				],
			]
		);
		$this->add_control(
			'tooltip_color',
			[
				'label'                 => __('Text Color', 'opn-one-page-navigation'),
				'type'                  => Controls_Manager::COLOR,
				'default'               => '',
				'selectors'             => [
					'{{WRAPPER}} .opagen-nav-dot-tooltip-content' => 'color: {{VALUE}}',
				],
				'condition'             => [
					'nav_tooltip'  => 'yes',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'                  => 'tooltip_typography',
				'label'                 => __('Typography', 'opn-one-page-navigation'),
				// 'scheme'                => Typography::TYPOGRAPHY_4,
				'selector'              => '{{WRAPPER}} .opagen-nav-dot-tooltip',
				'condition'             => [
					'nav_tooltip'  => 'yes',
				],
			]
		);
		$this->add_responsive_control(
			'tooltip_padding',
			[
				'label'                 => __('Padding', 'opn-one-page-navigation'),
				'type'                  => Controls_Manager::DIMENSIONS,
				'size_units'            => ['px', '%'],
				'selectors'             => [
					'{{WRAPPER}} .opagen-nav-dot-tooltip-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		if ( $settings['nav_dots'] ) {
			foreach (  $settings['nav_dots'] as $item ) {
				echo '<div class="elementor-repeater-item-' . esc_attr( $item['_id'] ) . '">';
				echo '<a href="#'.$item['section_id'].'" aria-expanded="true">'.$item['section_title'].'</a>';
				echo '</div>';
			}
		}
		?>
    <div id="section1" class="section">
			<div class="text-wr">
				<h1 class="title">
					<div class="title-top">Section 1</div>
				</h1>
			</div>
    </div>
    <div id="section2" class="section">
			<div class="text-wr">
				<h1 class="title">Section 2</h1>
			</div>
    </div>
    <div id="section3" class="section">
			<div class="text-wr">
				<h1 class="title">Section 3</h1>
			</div>
    </div>
    <div id="section4" class="section">
			<div class="text-wr">
				<h1 class="title">Section 4</h1>
			</div>
    </div>
		<?php
	}
}