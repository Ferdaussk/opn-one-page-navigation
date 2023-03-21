<?php
/**
 * Plugin Name: One Page Navigation
 * Description: One Page Navigation plugin for Elementor with 20+ responsive and modern preloader designs.
 * Plugin URI:  https://bwdplugins.com/plugins/opn-one-page-navigation
 * Version:     1.0
 * Author:      Best WP Developer
 * Author URI:  https://bestwpdeveloper.com/
 * Text Domain: opn-one-page-navigation
 * Elementor tested up to: 3.0.0
 * Elementor Pro tested up to: 3.7.3
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
require_once ( plugin_dir_path(__FILE__) ) . '/includes/opagen-plugin-activition.php';
final class opagen_swiper_preloader{

	const VERSION = '1.0';

	const MINIMUM_ELEMENTOR_VERSION = '3.0.0';

	const MINIMUM_PHP_VERSION = '7.0';

	public function __construct() {
		// Load translation
		add_action( 'opagen_init', array( $this, 'opagen_loaded_textdomain' ) );
		// opagen_init Plugin
		add_action( 'plugins_loaded', array( $this, 'opagen_init' ) );
	}

	public function opagen_loaded_textdomain() {
		load_plugin_textdomain( 'opn-one-page-navigation' );
	}

	public function opagen_init() {
		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', 'opagen_addon_failed_load');
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', array( $this, 'opagen_admin_notice_minimum_elementor_version' ) );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', array( $this, 'opagen_admin_notice_minimum_php_version' ) );
			return;
		}

		// Once we get here, We have passed all validation checks so we can safely include our plugin
		require_once( 'opagen-onepage-boots.php' );
	}

	public function opagen_admin_notice_minimum_elementor_version() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'opn-one-page-navigation' ),
			'<strong>' . esc_html__( 'One Page Navigation', 'opn-one-page-navigation' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'opn-one-page-navigation' ) . '</strong>',
			self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>' . esc_html__('%1$s', 'opn-one-page-navigation') . '</p></div>', $message );
	}

	public function opagen_admin_notice_minimum_php_version() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'opn-one-page-navigation' ),
			'<strong>' . esc_html__( 'One Page Navigation', 'opn-one-page-navigation' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'opn-one-page-navigation' ) . '</strong>',
			self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>' . esc_html__('%1$s', 'opn-one-page-navigation') . '</p></div>', $message );
	}
}
function sk_my_plugin() {
	return \Elementor\Plugin::instance();
}
// Instantiate preloader.
new opagen_swiper_preloader();
remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );