<?php
/**
 * Admin functionality.
 *
 * @package DevExperiments
 */

namespace DevExperiments\Admin;

defined( 'ABSPATH' ) || exit;

/**
 * Admin class.
 *
 * Handles all admin-related functionality including settings pages and menus.
 */
class Admin {
	/**
	 * Constructor.
	 *
	 * Sets up admin hooks.
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
		add_action( 'admin_init', array( $this, 'admin_init' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_assets' ) );
	}

	/**
	 * Register admin menu.
	 *
	 * Adds the plugin settings page to the WordPress admin menu.
	 */
	public function admin_menu() {
		add_menu_page(
			__( 'Dev Experiments', 'dev-experiments' ),
			__( 'Dev Experiments', 'dev-experiments' ),
			'manage_options',
			'dev_experiments',
			array( $this, 'render_admin_page' ),
			'dashicons-lightbulb',
			58
		);

		add_submenu_page(
			'dev_experiments',
			__( 'Settings', 'dev-experiments' ),
			__( 'Settings', 'dev-experiments' ),
			'manage_options',
			'dev_experiments',
			array( $this, 'render_admin_page' )
		);

		add_submenu_page(
			'dev_experiments',
			__( 'About', 'dev-experiments' ),
			__( 'About', 'dev-experiments' ),
			'manage_options',
			'dev_experiments_about',
			array( $this, 'render_about_page' )
		);
	}

	/**
	 * Initialize admin settings.
	 *
	 * Registers settings, sections, and fields.
	 */
	public function admin_init() {
		register_setting(
			'dev_experiments_settings',
			'dev_experiments_options',
			array( $this, 'sanitize_settings' )
		);

		add_settings_section(
			'dev_experiments_general',
			__( 'General Settings', 'dev-experiments' ),
			array( $this, 'render_section_general' ),
			'dev_experiments'
		);

		add_settings_field(
			'enable_features',
			__( 'Enable Experimental Features', 'dev-experiments' ),
			[ $this, 'render_field_enable_features' ],
			'dev_experiments',
			'dev_experiments_general'
		);
	}

	/**
	 * Enqueue admin assets.
	 *
	 * @param string $hook The current admin page hook.
	 */
	public function enqueue_admin_assets( $hook ) {
		// Only load on our admin pages.
		if ( strpos( $hook, 'dev_experiments' ) === false ) {
			return;
		}

		wp_enqueue_style(
			'dev-experiments-admin',
			DEV_EXPERIMENTS_PLUGIN_URL . 'assets/css/admin.css',
			array(),
			DEV_EXPERIMENTS_VERSION
		);
	}

	/**
	 * Render the main admin page.
	 */
	public function render_admin_page() {
		// Check user capabilities.
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( esc_html__( 'You do not have sufficient permissions to access this page.', 'dev-experiments' ) );
		}

		?>
		<div class="wrap dev-experiments-admin-wrapper">
			<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
			
			<?php settings_errors( 'dev_experiments_messages' ); ?>
			
			<form method="post" action="options.php">
				<?php
				settings_fields( 'dev_experiments_settings' );
				do_settings_sections( 'dev_experiments' );
				submit_button( __( 'Save Settings', 'dev-experiments' ) );
				?>
			</form>

			<div class="dev-experiments-info-card">
				<h2><?php esc_html_e( 'About This Plugin', 'dev-experiments' ); ?></h2>
				<p><?php esc_html_e( 'Dev Experiments is a modern Gutenberg block plugin built with best practices and AI assistance.', 'dev-experiments' ); ?></p>
				<p>
					<strong><?php esc_html_e( 'Version:', 'dev-experiments' ); ?></strong> <?php echo esc_html( DEV_EXPERIMENTS_VERSION ); ?><br>
					<strong><?php esc_html_e( 'Documentation:', 'dev-experiments' ); ?></strong> <a href="https://github.com/iqbal-web/dev-experiments#readme" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'View on GitHub', 'dev-experiments' ); ?></a>
				</p>
			</div>
		</div>
		<?php
	}

	/**
	 * Render the about page.
	 */
	public function render_about_page() {
		// Check user capabilities.
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( esc_html__( 'You do not have sufficient permissions to access this page.', 'dev-experiments' ) );
		}

		?>
		<div class="wrap dev-experiments-about-wrapper">
			<h1><?php esc_html_e( 'About Dev Experiments', 'dev-experiments' ); ?></h1>
			
			<div class="dev-experiments-about-content">
				<h2><?php esc_html_e( 'Features', 'dev-experiments' ); ?></h2>
				<ul>
					<li><?php esc_html_e( 'Custom Gutenberg Block with rich text editing', 'dev-experiments' ); ?></li>
					<li><?php esc_html_e( 'Color and spacing controls', 'dev-experiments' ); ?></li>
					<li><?php esc_html_e( 'Responsive design with animations', 'dev-experiments' ); ?></li>
					<li><?php esc_html_e( 'Accessibility-ready with ARIA labels', 'dev-experiments' ); ?></li>
					<li><?php esc_html_e( 'Built with WordPress coding standards', 'dev-experiments' ); ?></li>
				</ul>

				<h2><?php esc_html_e( 'Support', 'dev-experiments' ); ?></h2>
				<p>
					<?php
					printf(
						/* translators: %s: GitHub issues URL */
						esc_html__( 'For support, please visit our %s.', 'dev-experiments' ),
						'<a href="https://github.com/iqbal-web/dev-experiments/issues" target="_blank" rel="noopener noreferrer">' . esc_html__( 'GitHub Issues page', 'dev-experiments' ) . '</a>'
					);
					?>
				</p>
			</div>
		</div>
		<?php
	}

	/**
	 * Render general settings section.
	 */
	public function render_section_general() {
		echo '<p>' . esc_html__( 'Configure the plugin settings below.', 'dev-experiments' ) . '</p>';
	}

	/**
	 * Render enable features field.
	 */
	public function render_field_enable_features() {
		$options = get_option( 'dev_experiments_options', array() );
		$checked = isset( $options['enable_features'] ) ? $options['enable_features'] : false;
		?>
		<label>
			<input type="checkbox" name="dev_experiments_options[enable_features]" value="1" <?php checked( $checked, 1 ); ?>>
			<?php esc_html_e( 'Enable experimental features (may be unstable)', 'dev-experiments' ); ?>
		</label>
		<?php
	}

	/**
	 * Sanitize settings before saving.
	 *
	 * @param array $input The input values from the settings form.
	 * @return array Sanitized values.
	 */
	public function sanitize_settings( $input ) {
		$sanitized = array();

		if ( isset( $input['enable_features'] ) ) {
			$sanitized['enable_features'] = (bool) $input['enable_features'];
		}

		return $sanitized;
	}
}