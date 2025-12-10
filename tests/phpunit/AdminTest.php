<?php
/**
 * Sample test case for Admin class.
 *
 * @package DevExperiments
 */

namespace DevExperiments\Tests;

use PHPUnit\Framework\TestCase;

/**
 * Admin test case.
 */
class AdminTest extends TestCase {

	/**
	 * Test that Admin class exists.
	 */
	public function test_admin_class_exists() {
		$this->assertTrue( class_exists( 'DevExperiments\Admin\Admin' ) );
	}

	/**
	 * Test constants are defined.
	 */
	public function test_constants_defined() {
		$this->assertTrue( defined( 'DEV_EXPERIMENTS_VERSION' ) );
		$this->assertTrue( defined( 'DEV_EXPERIMENTS_PLUGIN_DIR' ) );
		$this->assertTrue( defined( 'DEV_EXPERIMENTS_PLUGIN_URL' ) );
	}

	/**
	 * Test version constant value.
	 */
	public function test_version_constant() {
		$this->assertEquals( '1.0.0', DEV_EXPERIMENTS_VERSION );
	}

	/**
	 * Test plugin directory constant is string.
	 */
	public function test_plugin_dir_is_string() {
		$this->assertIsString( DEV_EXPERIMENTS_PLUGIN_DIR );
	}

	/**
	 * Test plugin URL constant is string.
	 */
	public function test_plugin_url_is_string() {
		$this->assertIsString( DEV_EXPERIMENTS_PLUGIN_URL );
	}
}
