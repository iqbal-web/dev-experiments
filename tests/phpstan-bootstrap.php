<?php
/**
 * PHPStan bootstrap file.
 *
 * @package DevExperiments
 */

// Define WordPress constants for PHPStan analysis.
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', '/tmp/wordpress/' );
}

if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', true );
}

if ( ! defined( 'WP_CONTENT_DIR' ) ) {
	define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );
}

if ( ! defined( 'WP_PLUGIN_DIR' ) ) {
	define( 'WP_PLUGIN_DIR', WP_CONTENT_DIR . '/plugins' );
}

// Define plugin constants.
if ( ! defined( 'DEV_EXPERIMENTS_VERSION' ) ) {
	define( 'DEV_EXPERIMENTS_VERSION', '1.0.0' );
}

if ( ! defined( 'DEV_EXPERIMENTS_PLUGIN_DIR' ) ) {
	define( 'DEV_EXPERIMENTS_PLUGIN_DIR', __DIR__ . '/' );
}

if ( ! defined( 'DEV_EXPERIMENTS_PLUGIN_URL' ) ) {
	define( 'DEV_EXPERIMENTS_PLUGIN_URL', 'http://localhost/wp-content/plugins/dev-experiments/' );
}

// Mock WordPress functions for static analysis.
require_once __DIR__ . '/wordpress-stubs.php';
