<?php
/**
 * Plugin Name: Dev Experiments
 * Plugin URI: https://example.com/dev-experiments
 * Description: A plugin for testing and experimenting with development features.
 * Version: 1.0.0
 * Author: Dev Team
 * Author URI: https://example.com
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: dev-experiments
 *
 * @package DevExperiments
 */

namespace DevExperiments;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Define plugin constants.
define( 'DEV_EXPERIMENTS_VERSION', '1.0.0' );
define( 'DEV_EXPERIMENTS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'DEV_EXPERIMENTS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function register_dev_experiments_block() {
	register_block_type( __DIR__ . '/build' );
}
add_action( 'init', __NAMESPACE__ . '\register_dev_experiments_block' );

/**
 * Load plugin text domain for translations.
 */
function load_textdomain() {
	load_plugin_textdomain(
		'dev-experiments',
		false,
		dirname( plugin_basename( __FILE__ ) ) . '/languages'
	);
}
add_action( 'plugins_loaded', __NAMESPACE__ . '\load_textdomain' );

/**
 * Enqueue block assets for frontend and editor.
 */
function enqueue_block_assets() {
	// Ensure Dashicons are loaded on frontend for the icon.
	wp_enqueue_style( 'dashicons' );
}
add_action( 'enqueue_block_assets', __NAMESPACE__ . '\enqueue_block_assets' );


/**
 * Autoloader for plugin classes.
 */
spl_autoload_register(
	function ( $classname ) {
		// Project-specific namespace prefix.
		$prefix = 'DevExperiments\\';

		// Base directory for the namespace prefix.
		$base_dir = DEV_EXPERIMENTS_PLUGIN_DIR . 'includes/';

		// Does the class use the namespace prefix?
		$len = strlen( $prefix );
		if ( strncmp( $prefix, $classname, $len ) !== 0 ) {
			return;
		}

		// Get the relative class name.
		$relative_class = substr( $classname, $len );

		// Replace the namespace prefix with the base directory, replace namespace
		// separators with directory separators, and append .php.
		$file = $base_dir . str_replace( '\\', '/', $relative_class ) . '.php';

		// If the file exists, require it.
		if ( file_exists( $file ) ) {
			require $file;
		}
	}
);

/**
 * Initialize the plugin.
 */
function init_plugin() {
	// Initialize Admin class.
	if ( is_admin() ) {
		new Admin\Admin();
	}
}
add_action( 'plugins_loaded', __NAMESPACE__ . '\init_plugin' );

/**
 * Adds action links to the plugin list table.
 *
 * @param array $links Array of plugin action links.
 * @return array Modified array of plugin action links.
 */
function plugin_action_links( $links ) {
	$settings_link = sprintf(
		'<a href="%1$s">%2$s</a>',
		admin_url( 'admin.php?page=dev_experiments' ),
		esc_html__( 'Settings', 'dev-experiments' )
	);

	array_unshift( $links, $settings_link );

	return $links;
}
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), __NAMESPACE__ . '\plugin_action_links' );
