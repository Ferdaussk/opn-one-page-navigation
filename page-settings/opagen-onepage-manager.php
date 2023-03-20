<?php
namespace opagen_onepage_namespace\PageSettings;

use Elementor\Controls_Manager;
use Elementor\Core\DocumentTypes\PageBase;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

class Page_Settings {

	const PANEL_TAB = 'new-tab';

	public function __construct() {
		add_action( 'elementor/init', [ $this, 'opagen_adpreloader_add_panel_tab' ] );
		add_action( 'elementor/documents/register_controls', [ $this, 'opagen_adpreloader_register_document_controls' ] );
	}

	public function opagen_adpreloader_add_panel_tab() {
		Controls_Manager::add_tab( self::PANEL_TAB, esc_html__( 'One Page Navigation', 'opn-one-page-navigation' ) );
	}

	public function opagen_adpreloader_register_document_controls( $document ) {
		if ( ! $document instanceof PageBase || ! $document::get_property( 'has_elements' ) ) {
			return;
		}

		$document->start_controls_section(
			'opagen_new_section',
			[
				'label' => esc_html__( 'Settings', 'opn-one-page-navigation' ),
				'tab' => self::PANEL_TAB,
			]
		);

		$document->add_control(
			'opagen_text',
			[
				'label' => esc_html__( 'Title', 'opn-one-page-navigation' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Title', 'opn-one-page-navigation' ),
			]
		);

		$document->end_controls_section();
	}
}
