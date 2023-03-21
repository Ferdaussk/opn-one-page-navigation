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









function ferdaussk_menu_settings(){
	add_menu_page( 'Ferdaus Settings', 'Ferdaus sk', 'manage_options', 'ferdaussk_quickview_sk', 'ferdaussk_settings_cb', 'dashicons-visibility', 57 );
	add_action('admin_init','ferdaussk_settings');
}
add_action('admin_menu','ferdaussk_menu_settings');

function ferdaussk_settings(){
	
	add_settings_section(
		'ferdaussk-header-section-sk',
		'',
		'ferdaussk_header_section',
		'ferdaussk_quickview'
	);

}
function ferdaussk_settings_cb(){
	do_settings_sections('ferdaussk_quickview');
	echo '<div class="ferdaussk-save-btn">'; submit_button(); echo '</div>';
}
function ferdaussk_header_section(){
	echo '<p>Enter your section description here.</p>';
	$option_name = 'my_plugin_enable_feature';
	$option_value = get_option($option_name);
	$checked = ($option_value == 'on') ? 'checked' : '';

	echo '<label class="switch">';
	echo '<input type="hidden" name="' . $option_name . '" value="off" />';
	echo '<input type="checkbox" name="' . $option_name . '" id="' . $option_name . '" value="on" ' . $checked . '>';
	echo '<span class="slider round"></span>';
	echo '</label>';

	if ($option_value == 'on') {
			echo '<div class="onoffcontent">';
			echo '<p>This content will show when the switch is on.</p>';
			echo '</div>';
	} else {
			echo '<div class="onoffcontent" style="display:none;">';
			echo '<p>This content will hide when the switch is off.</p>';
			echo '</div>';
	}
	?>
	<div class="ferdaussk_the_class">
		<div class="ferdaussk_data ferdaussk_name"><a class="ferdaussk_au_title" href="https://wordpressplugs.com"><h2 class=""><?php _e('WORDPRESS PLUGS', 'global-quick-view'); ?></h2></a></div>
		<div class="ferdaussk_data ferdaussk_demo">
			<div class="ferdaussk_the_author"><a class="ferdaussk_the_demo" href="https://wordpressplugs.com/shop/"><?php _e('Demo', 'global-quick-view'); ?></a></div>
			<div class="ferdaussk_the_author"><a class="ferdaussk_the_author_a" href="https://wordpressplugs.com"><?php _e('Author', 'global-quick-view'); ?></a></div>
		</div>
	</div>
	<?php 
}










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