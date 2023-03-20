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
	
	public function select_elementor_page( $type ) {
		$args  = [
			'sk_tax_query'      => [
				[
					'taxonomy' => 'elementor_library_type',
					'field'    => 'slug',
					'terms'    => $type,
				],
			],
			'post_type'      => 'elementor_library',
			'posts_per_page' => -1,
		];
		$query = new \WP_Query( $args );
		$posts = $query->posts;
		foreach ( $posts as $post ) {
			$items[ $post->ID ] = $post->post_title;
		}
		if ( empty( $items ) ) {
			$items = [];
		}
		return $items;
	}

	protected function register_controls() {

		$this->start_controls_section(
			'contentSection',
			[
				'label' => esc_html__( 'Loader Content', 'opn-one-page-navigation' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		// Repeater start
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'opagen_social_type',
			[
				'label'   => esc_html__( 'Networks', 'opn-one-page-navigation' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'facebook'    => esc_html__( 'Facebook', 'opn-one-page-navigation' ),
					'twitter'     => esc_html__( 'Twitter', 'opn-one-page-navigation' ),
				],
				'default' => 'facebook',
			]
		);
		// Control add start
		$repeater->add_control(
			'sk_content_type',
			[
				'label'   => __( 'Type', 'opn-one-page-navigation' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'plain_content' => __( 'Plain/ HTML Text', 'opn-one-page-navigation' ),
					'saved_section' => __( 'Saved Section', 'opn-one-page-navigation' ),
					'saved_page'    => __( 'Saved Page', 'opn-one-page-navigation' ),
				],
				'default' => 'plain_content',
			]
		);
		$saved_sections = ['0' => __( 'Choose Section', 'opn-one-page-navigation' )];
		$saved_sections = $saved_sections + $this->select_elementor_page( 'section' );

		$repeater->add_control(
			'sk_saved_section',
			[
				'label'     => __( 'Sections', 'opn-one-page-navigation' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => $saved_sections,
				'default'   => '0',
				'condition' => [
					'sk_content_type' => 'saved_section',
				],
			]
		);

		$saved_page = ['0' => __( '--- Select Page ---', 'opn-one-page-navigation' )];
		$saved_page = $saved_page + $this->select_elementor_page( 'page' );

		$repeater->add_control(
			'sk_saved_pages',
			[
				'label'     => __( 'Pages', 'opn-one-page-navigation' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => $saved_page,
				'default'   => '0',
				'condition' => [
					'sk_content_type' => 'saved_page',
				],
			]
		);
		// Control add end
		$this->add_control(
			'opagen_all_social_btn',
			[
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'opagen_social_icons'    => [
							'value'   => 'fab fa-facebook',
							'library' => 'fa-brands',
						],
						'opagen_social_type' => 'facebook',
					],
					[
						'opagen_social_icons'    => [
							'value'   => 'fab fa-twitter',
							'library' => 'fa-brands',
						],
						'opagen_social_type' => 'twitter',
					],
					[
						'opagen_social_icons'    => [
							'value'   => 'fab fa-linkedin',
							'library' => 'fa-brands',
						],
						'opagen_social_type' => 'linkedin',
					],
				],
				'title_field' => '{{{ opagen_social_type }}}',
			]
		);
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		// echo sk_my_plugin()->frontend->get_builder_content_for_display( $settings['sk_saved_section'] );
		?>
		<section class="panel">content</section>
		<section class="module_3_wrapper scroll">
			<div class="module_3">
				<div class="slides">
					<div class="flex">
						<div class="flex-child"><?php echo sk_my_plugin()->frontend->get_builder_content_for_display( $settings['sk_saved_section'] ); ?></div>
					</div>
				</div>
				<div class="slides">
					<div class="flex">
						<div class="flex-child">slide 2 left content</div>
					</div>
				</div>
				<div class="slides">
					<div class="flex">
						<div class="flex-child">slide 3 left content</div>
					</div>
				</div>
				<div class="slides">
					<div class="flex">
						<div class="flex-child">slide 4 left content</div>
					</div>
				</div>
				<div class="slides">
					<div class="flex">
						<div class="flex-child">slide 5 left content</div>
					</div>
				</div>
			</div>
		</section>
		<section class="panel">content</section>
		<?php
	}
}