<?php
/**
 * PHPUnit bootstrap file.
 *
 * @package DevExperiments
 */

// Composer autoloader.
require_once dirname( __DIR__ ) . '/vendor/autoload.php';

// Define constants.
define( 'DEV_EXPERIMENTS_PLUGIN_DIR', dirname( __DIR__ ) . '/' );
define( 'DEV_EXPERIMENTS_PLUGIN_URL', 'http://localhost/wp-content/plugins/dev-experiments/' );
define( 'DEV_EXPERIMENTS_VERSION', '1.0.0' );

// WordPress test environment setup would go here for integration tests.
// For now, we'll keep it simple for unit tests.
