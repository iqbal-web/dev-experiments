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