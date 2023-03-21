<?php
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
				'label' => esc_html__( 'One Page Content', 'opn-one-page-navigation' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'list_title',
			[
				'label' => esc_html__( 'Section ID', 'opn-one-page-navigation' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'List Title' , 'opn-one-page-navigation' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'list_title2',
			[
				'label' => esc_html__( 'Title', 'opn-one-page-navigation' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'List Title' , 'opn-one-page-navigation' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'list_color',
			[
				'label' => esc_html__( 'Color', 'opn-one-page-navigation' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}' => 'color: {{VALUE}}'
				],
			]
		);

		$this->add_control(
			'list',
			[
				'label' => esc_html__( 'Repeater List', 'opn-one-page-navigation' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => esc_html__( 'Title #1', 'opn-one-page-navigation' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'opn-one-page-navigation' ),
					],
					[
						'list_title' => esc_html__( 'Title #2', 'opn-one-page-navigation' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'opn-one-page-navigation' ),
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		if ( $settings['list'] ) {
			echo '<dl>';
			foreach (  $settings['list'] as $item ) {
				echo '<div class="elementor-repeater-item-' . esc_attr( $item['_id'] ) . '">';
				echo '<a href="#'.$item['list_title'].'" aria-expanded="true">'.$item['list_title2'].'</a>';
				echo '</div>';
			}
			echo '</dl>';
		}
		?>
    <div id="section1" class="section">
        <div class="text-wr">
            <h1 class="title">
                <div class="title-top">Slide Nav Example</div>
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