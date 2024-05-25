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
				'label' => esc_html__('Section Title', 'opn-one-page-navigation'),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_html__('Section Title', 'opn-one-page-navigation'),
			]
		);
		$repeater->add_control(
			'section_id',
			[
				'label' => esc_html__('Section ID', 'opn-one-page-navigation'),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => '',
			]
		);
		$repeater->add_control(
			'bwdopn_choose_icon',
			[
				'label'   => esc_html__( 'Choose Icon', 'effective-lottie-animation' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'fontawesome'  => esc_html__( 'FontAwesome', 'effective-lottie-animation' ),
					'lottie' => esc_html__( 'Lottie', 'effective-lottie-animation' ),
					'lord' => esc_html__( 'Lord', 'effective-lottie-animation' ),
				],
				'default' => 'fontawesome',
			]
		);
		$repeater->add_control(
			'dot_icon_new',
			[
				'label' => esc_html__('Navigation Dot', 'opn-one-page-navigation'),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'dot_icon',
				'default' => [
					'value' => 'fas fa-circle',
					'library' => 'fa-solid',
				],
				'condition' => [
					'bwdopn_choose_icon' => 'fontawesome',
				],
			]
		);
		$repeater->add_control(
			'bwdopn_lottie_url',
			[
				'label'       => __( 'Animation JSON URL', 'effective-lottie-animation' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => array( 'active' => true ),
				'default' 		=> 'https://assets4.lottiefiles.com/packages/lf20_DW2u8OuYdH.json',
				'description' => 'Get URL/JSON file from <a href="https://lottiefiles.com/featured" target="_blank">here...</a>',
				'label_block' => true,
				'condition' => [
					'bwdopn_choose_icon' => 'lottie',
				],
			]
		);
		$repeater->add_control(
			'bwdopn_lord_url',
			[
				'label'       => __( 'Animation JSON URL', 'effective-lottie-animation' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => array( 'active' => true ),
				'default' 		=> 'https://cdn.lordicon.com/mrjuyheh.json',
				'description' => 'Get URL/JSON file from <a href="https://lordicon.com/icons" target="_blank">here...!!</a> Follow <a href="https://prnt.sc/G0sKSPQLyi78" target="_blank">here...!!!</a>',
				'label_block' => true,
				'condition' => [
					'bwdopn_choose_icon' => 'lord',
				],
			]
		);
		$this->add_control(
			'nav_dots',
			[
				'label' => '',
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'section_title' => esc_html__('Section #1', 'opn-one-page-navigation'),
						'section_id' => 'section1',
						'dot_icon' => 'fa fa-circle',
					],
					[
						'section_title' => esc_html__('Section #2', 'opn-one-page-navigation'),
						'section_id' => 'section2',
						'dot_icon' => 'fa fa-circle',
					],
					[
						'section_title' => esc_html__('Section #3', 'opn-one-page-navigation'),
						'section_id' => 'section3',
						'dot_icon' => 'fa fa-circle',
					],
				],
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ section_title }}}',
			]
		);
		
		$this->add_control(
			'opn_nav_horizontal_align',
			[
				'label' => esc_html__( 'Horizontal Alignment', 'opn-one-page-navigation' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'opn-one-page-navigation' ),
						'icon' => 'eicon-h-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'opn-one-page-navigation' ),
						'icon' => 'eicon-h-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'opn-one-page-navigation' ),
						'icon' => 'eicon-h-align-right',
					],
				],
				'default' => 'right',
				'toggle' => true,
				'prefix_class' => 'bwdopn-hoalign-',
			]
		);
		
		$this->add_control(
			'opn_nav_vertical_align',
			[
				'label' => esc_html__( 'Vertical Alignment', 'opn-one-page-navigation' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'top' => [
						'title' => esc_html__( 'Top', 'opn-one-page-navigation' ),
						'icon' => 'eicon-v-align-top',
					],
					'middle' => [
						'title' => esc_html__( 'Middle', 'opn-one-page-navigation' ),
						'icon' => ' eicon-v-align-middle',
					],
					'bottom' => [
						'title' => esc_html__( 'Bottom', 'opn-one-page-navigation' ),
						'icon' => 'eicon-v-align-bottom',
					],
				],
				'default' => 'middle',
				'toggle' => true,
				'prefix_class' => 'bwdopn-vertical-align-',
			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'section_onepage_nav_settings',
			[
				'label' => esc_html__('Settings', 'opn-one-page-navigation'),
			]
		);
		$this->add_control(
			'nav_tooltip',
			[
				'label' => esc_html__('Enable Tooltip', 'opn-one-page-navigation'),
				'description' => esc_html__('Show tooltip on hover', 'opn-one-page-navigation'),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_on' => esc_html__('Yes', 'opn-one-page-navigation'),
				'label_off' => esc_html__('No', 'opn-one-page-navigation'),
				'return_value' => 'yes',
			]
		);
		$this->add_control(
			'tooltip_arrow',
			[
				'label' => esc_html__('Tooltip Arrow', 'opn-one-page-navigation'),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_on' => esc_html__('Show', 'opn-one-page-navigation'),
				'label_off' => esc_html__('Hide', 'opn-one-page-navigation'),
				'return_value' => 'yes',
				'condition' => [
					'nav_tooltip'   => 'yes',
				],
			]
		);
		$this->add_control(
			'top_offset',
			[
				'label' => esc_html__('Row Top Offset', 'opn-one-page-navigation'),
				'type' => Controls_Manager::SLIDER,
				'default' => ['size' => '40'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 300,
						'step' => 1,
					],
				],
				'size_units' => ['px'],
			]
		);
		$this->add_control(
			'scrolling_speed',
			[
				'label' => esc_html__('Scrolling Speed', 'opn-one-page-navigation'),
				'type' => Controls_Manager::NUMBER,
				'default' => '700',
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_nav_box_style',
			[
				'label' => esc_html__('Navigation Item', 'opn-one-page-navigation'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'nav_container_background',
				'types' => ['classic', 'gradient'],
				'selector' => '{{WRAPPER}} .bwdopn-nav-dot',
			]
		);
		
		// $this->add_responsive_control(
		// 	'bwdopn_nav_item_size',
		// 	[
		// 		'label' => esc_html__( 'Item Size', 'opn-one-page-navigation' ),
		// 		'type' => \Elementor\Controls_Manager::SLIDER,
		// 		'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
		// 		// 'default' => [
		// 		// 	'unit' => 'px',
		// 		// 	'size' => 30,
		// 		// ],
		// 		'selectors' => [
		// 			'{{WRAPPER}} .bwdopn-nav-dot' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
		// 		],
		// 	]
		// );
		
		$this->add_responsive_control(
			'bwdopn_nav_item_gap',
			[
				'label' => esc_html__( 'Item Gap', 'opn-one-page-navigation' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .bwdopn-one-page-nav' => 'gap: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'bwdopn_nav_item_border',
				'selector' => '{{WRAPPER}} .bwdopn-nav-dot',
			]
		);
		$this->add_responsive_control(
			'nav_container_border_radius',
			[
				'label' => esc_html__('Border Radius', 'opn-one-page-navigation'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .bwdopn-nav-dot' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'nav_container_padding',
			[
				'label' => esc_html__('Padding', 'opn-one-page-navigation'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .bwdopn-nav-dot' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'nav_container_box_shadow',
				'selector' => '{{WRAPPER}} .bwdopn-nav-dot',
				'separator' => 'before',
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_dots_style',
			[
				'label' => esc_html__('Navigation Dots', 'opn-one-page-navigation'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs(
			'bwdopn_nav_do_style_tabs'
		);

		$this->start_controls_tab(
			'bwdopn_nav_dot_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'opn-one-page-navigation' ),
			]
		);
		$this->add_control(
			'bwdopn_nav_item_color',
			[
				'label' => esc_html__( 'Icon Color', 'opn-one-page-navigation' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bwdopn-nav-dot' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'bwdopn_nav_item_icon_size',
			[
				'label' => esc_html__( 'Icon Size', 'opn-one-page-navigation' ),
				'description' => esc_html__( 'Note: To increase lord and lottie icon font go to navigation item section then item size.', 'opn-one-page-navigation' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .bwdopn-nav-dot' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'bwdopn_nav_dot_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'opn-one-page-navigation' ),
			]
		);
		$this->add_control(
			'bwdopn_nav_item_hover_color',
			[
				'label' => esc_html__( 'Icon Color', 'opn-one-page-navigation' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bwdopn-nav-dot:hover' => 'color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'bwdopn_nav_dot_active_tab',
			[
				'label' => esc_html__( 'Active', 'opn-one-page-navigation' ),
			]
		);
		$this->add_control(
			'bwdopn_nav_item_active_color',
			[
				'label' => esc_html__( 'Icon Color', 'opn-one-page-navigation' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bwdopn-one-page-nav[data-scroll-wheel="on"] .bwdopn-one-page-nav-item.active .bwdopn-nav-dot' => 'color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

		
		$this->start_controls_section(
			'section_tooltips_style',
			[
				'label' => esc_html__('Tooltip', 'opn-one-page-navigation'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'nav_tooltip' => 'yes',
				],
			]
		);
		$this->add_control(
			'tooltip_text_color',
			[
				'label' => esc_html__('Color', 'opn-one-page-navigation'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bwdopn-nav-dot-tooltip-content' => 'color: {{VALUE}}',
				],
				'condition' => [
					'nav_tooltip' => 'yes',
				],
			]
		);
		$this->add_control(
			'tooltip_bg_color',
			[
				'label' => esc_html__('Background Color', 'opn-one-page-navigation'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors'=> [
					'{{WRAPPER}} .bwdopn-nav-dot-tooltip-content, {{WRAPPER}} .bwdopn-nav-dot-tooltip-content::before' => 'background-color: {{VALUE}}',
				],
				'condition' => [
					'nav_tooltip'  => 'yes',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'tooltip_typography',
				'label' => esc_html__('Typography', 'opn-one-page-navigation'),
				'selector' => '{{WRAPPER}} .bwdopn-nav-dot-tooltip-content',
				'condition' => [
					'nav_tooltip' => 'yes',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'bwdopn_tooltip_border',
				'selector' => '{{WRAPPER}} .bwdopn-nav-dot-tooltip .bwdopn-nav-dot-tooltip-content',
			]
		);
		$this->add_responsive_control(
			'tooltip_border_radius',
			[
				'label' => esc_html__('Border Radius', 'opn-one-page-navigation'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .bwdopn-nav-dot-tooltip .bwdopn-nav-dot-tooltip-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'tooltip_padding',
			[
				'label' => esc_html__('Padding', 'opn-one-page-navigation'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .bwdopn-nav-dot-tooltip .bwdopn-nav-dot-tooltip-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
	}


	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div class="bwdopn-onepage-nav-container">
		<?php
		if ( $settings['nav_dots'] ) {
			foreach (  $settings['nav_dots'] as $item ) {
				echo '<div class="elementor-repeater-item-' . esc_attr( $item['_id'] ) . '">';
				echo '<a href="#'.$item['section_id'].'" aria-expanded="true">';
				?>
				<span class="bwdopn-nav-dot-wrap">
					<span class="bwdopn-nav-dot bwdopn-icon">
						<?php if($item['bwdopn_choose_icon'] === 'lottie') : ?>
						<lottie-player src="<?php echo esc_url( $item['bwdopn_lottie_url'] ); ?>"  background="transparent"  speed="1"  style="width: 30px; height: 30px;" loop autoplay></lottie-player>
						<?php elseif($item['bwdopn_choose_icon'] === 'lord') : ?>
						<lord-icon
							src="<?php echo esc_url( $item['bwdopn_lord_url'] ); ?>"
							trigger="loop"
							style="width: 30px; height: 30px;"
						</lord-icon>
						<?php elseif($item['bwdopn_choose_icon'] === 'fontawesome') : ?>
						<?php \Elementor\Icons_Manager::render_icon( $item['dot_icon_new'], [ 'aria-hidden' => 'true' ] ); ?>
						<?php endif; ?>
					</span>
				</span>
				<?php
				echo '</a>';
				echo '</div>';
			}
		}
		?>
		</div>
    
		<?php
	}
}