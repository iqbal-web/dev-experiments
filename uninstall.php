<?php
/**
 * Uninstall script for Dev Experiments plugin.
 *
 * This file runs when the plugin is uninstalled (deleted).
 * It cleans up all plugin data from the database.
 *
 * @package DevExperiments
 */

// If uninstall not called from WordPress, exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

/**
 * Delete plugin options.
 */
delete_option( 'dev_experiments_options' );
delete_option( 'dev_experiments_settings' );

/**
 * For multisite, delete options from all sites.
 */
if ( is_multisite() ) {
	global $wpdb;

	// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
	$dev_experiments_blog_ids = $wpdb->get_col( "SELECT blog_id FROM {$wpdb->blogs}" );

	foreach ( $dev_experiments_blog_ids as $dev_experiments_blog_id ) {
		switch_to_blog( $dev_experiments_blog_id );

		// Delete options for this site.
		delete_option( 'dev_experiments_options' );
		delete_option( 'dev_experiments_settings' );

		restore_current_blog();
	}
}

/**
 * Clean up any transients.
 */
delete_transient( 'dev_experiments_cache' );

// Clear any cached data.
wp_cache_flush();
