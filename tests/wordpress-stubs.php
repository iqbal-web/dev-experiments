<?php
/**
 * WordPress function stubs for PHPStan.
 *
 * @package DevExperiments
 */

// phpcs:disable

if ( ! function_exists( 'add_action' ) ) {
	function add_action( $hook, $callback, $priority = 10, $accepted_args = 1 ) {}
}

if ( ! function_exists( 'add_filter' ) ) {
	function add_filter( $hook, $callback, $priority = 10, $accepted_args = 1 ) {}
}

if ( ! function_exists( 'register_block_type' ) ) {
	function register_block_type( $block_type, $args = array() ) {}
}

if ( ! function_exists( 'load_plugin_textdomain' ) ) {
	function load_plugin_textdomain( $domain, $deprecated = false, $plugin_rel_path = false ) {}
}

if ( ! function_exists( 'plugin_dir_path' ) ) {
	function plugin_dir_path( $file ) { return ''; }
}

if ( ! function_exists( 'plugin_dir_url' ) ) {
	function plugin_dir_url( $file ) { return ''; }
}

if ( ! function_exists( 'plugin_basename' ) ) {
	function plugin_basename( $file ) { return ''; }
}

if ( ! function_exists( 'wp_enqueue_style' ) ) {
	function wp_enqueue_style( $handle, $src = '', $deps = array(), $ver = false, $media = 'all' ) {}
}

if ( ! function_exists( 'add_menu_page' ) ) {
	function add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $callback = '', $icon_url = '', $position = null ) {}
}

if ( ! function_exists( 'add_submenu_page' ) ) {
	function add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $callback = '' ) {}
}

if ( ! function_exists( 'register_setting' ) ) {
	function register_setting( $option_group, $option_name, $args = array() ) {}
}

if ( ! function_exists( 'add_settings_section' ) ) {
	function add_settings_section( $id, $title, $callback, $page ) {}
}

if ( ! function_exists( 'add_settings_field' ) ) {
	function add_settings_field( $id, $title, $callback, $page, $section = 'default', $args = array() ) {}
}

if ( ! function_exists( 'get_option' ) ) {
	function get_option( $option, $default = false ) { return $default; }
}

if ( ! function_exists( 'delete_option' ) ) {
	function delete_option( $option ) { return false; }
}

if ( ! function_exists( 'delete_transient' ) ) {
	function delete_transient( $transient ) { return false; }
}

if ( ! function_exists( 'wp_cache_flush' ) ) {
	function wp_cache_flush() { return true; }
}

if ( ! function_exists( 'admin_url' ) ) {
	function admin_url( $path = '', $scheme = 'admin' ) { return ''; }
}

if ( ! function_exists( '__' ) ) {
	function __( $text, $domain = 'default' ) { return $text; }
}

if ( ! function_exists( 'esc_html__' ) ) {
	function esc_html__( $text, $domain = 'default' ) { return $text; }
}

if ( ! function_exists( 'esc_html_e' ) ) {
	function esc_html_e( $text, $domain = 'default' ) { echo $text; }
}

if ( ! function_exists( 'esc_html' ) ) {
	function esc_html( $text ) { return $text; }
}

if ( ! function_exists( 'esc_url' ) ) {
	function esc_url( $url, $protocols = null, $_context = 'display' ) { return $url; }
}

if ( ! function_exists( 'esc_attr' ) ) {
	function esc_attr( $text ) { return $text; }
}

if ( ! function_exists( 'current_user_can' ) ) {
	function current_user_can( $capability, ...$args ) { return false; }
}

if ( ! function_exists( 'wp_die' ) ) {
	function wp_die( $message = '', $title = '', $args = array() ) { exit; }
}

if ( ! function_exists( 'settings_fields' ) ) {
	function settings_fields( $option_group ) {}
}

if ( ! function_exists( 'do_settings_sections' ) ) {
	function do_settings_sections( $page ) {}
}

if ( ! function_exists( 'submit_button' ) ) {
	function submit_button( $text = null, $type = 'primary', $name = 'submit', $wrap = true, $other_attributes = null ) {}
}

if ( ! function_exists( 'settings_errors' ) ) {
	function settings_errors( $setting = '', $sanitize = false, $hide_on_update = false ) {}
}

if ( ! function_exists( 'get_admin_page_title' ) ) {
	function get_admin_page_title() { return ''; }
}

if ( ! function_exists( 'is_admin' ) ) {
	function is_admin() { return false; }
}

if ( ! function_exists( 'is_multisite' ) ) {
	function is_multisite() { return false; }
}

if ( ! function_exists( 'switch_to_blog' ) ) {
	function switch_to_blog( $blog_id ) { return false; }
}

if ( ! function_exists( 'restore_current_blog' ) ) {
	function restore_current_blog() { return false; }
}

if ( ! function_exists( 'checked' ) ) {
	function checked( $checked, $current = true, $echo = true ) { return ''; }
}

// phpcs:enable
