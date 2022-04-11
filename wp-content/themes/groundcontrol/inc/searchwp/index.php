<?php

//defined( 'ABSPATH' ) || exit;

define( 'SEARCHWP_VERSION', '4.1.22' );
define( 'SEARCHWP_PREFIX', 'searchwp_' );
define( 'SEARCHWP_SEPARATOR', '.' );
define( 'SEARCHWP_PLUGIN_DIR', dirname( __FILE__ ) );
//define( 'SEARCHWP_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'SEARCHWP_PLUGIN_URL', get_template_directory() . '/inc/searchwp' );
define( 'SEARCHWP_PLUGIN_FILE', __FILE__ );
define( 'SEARCHWP_EDD_STORE_URL', 'https://searchwp.com' );
define( 'SEARCHWP_EDD_ITEM_NAME', 'SearchWP 4' );

// Minimum PHP version requirement.
if ( version_compare( PHP_VERSION, '7.2.0', '<' ) ) {
	require_once ABSPATH . '/wp-admin/includes/plugin.php';
	deactivate_plugins( __FILE__ );
	wp_die( esc_html( __( 'SearchWP requires PHP 7.2 or higher and as a result has been deactivated. Please contact your host to upgrade PHP before activating this plugin.', 'searchwp' ) ) . ' <a href="' . esc_url( admin_url( 'plugins.php' ) ) . '">WordPress Admin</a>' );
}

if ( ! function_exists( 'searchwp_plugin_deactivate' ) ) {
	/**
	 * Callback for plugin deactivation. Removes scheduled events.
	 *
	 * @since 4.0
	 */
	function searchwp_plugin_deactivate() {
		// Remove maintenance cron job.
		$maintenance_timestamp = wp_next_scheduled( SEARCHWP_PREFIX . 'maintenance' );

		if ( $maintenance_timestamp ) {
			wp_unschedule_event( $maintenance_timestamp, SEARCHWP_PREFIX . 'maintenance' );
		}
	}
}

//register_deactivation_hook( __FILE__, 'searchwp_plugin_deactivate' );

if ( ! function_exists( 'searchwp_plugin_activate' ) ) {
	/**
	 * Callback for plugin activation. Compatibility checks.
	 *
	 * @since 4.0
	 * @return void
	 */
	function searchwp_plugin_activate( $network_wide = false ) {
		// Minimum WordPress version requirement.
		$wp_version = get_bloginfo( 'version' );
		if ( version_compare( $wp_version, '5.2', '<' ) ) {
			require_once ABSPATH . '/wp-admin/includes/plugin.php';
			deactivate_plugins( __FILE__ );
			wp_die( esc_html( __( 'SearchWP requires WordPress 5.3 or higher and as a result has been deactivated. Please upgrade WordPress before activating this plugin.', 'searchwp' ) ) . ' <a href="' . esc_url( admin_url( 'plugins.php' ) ) . '">WordPress Admin</a>' );
		}

		// Minimum database version requirement.
		$db_info      = \SearchWP\Utils::get_db_details();
		$engine_ver   = $db_info['version'];
		$required_ver = $db_info['engine'] == 'MariaDB' ? '10.0.0' : '5.6.0';

		if ( version_compare( $engine_ver, $required_ver, '<' ) ) {
			require_once ABSPATH . '/wp-admin/includes/plugin.php';
			deactivate_plugins( __FILE__ );
			wp_die( sprintf(
				// Translators: placeholder is the number "1"
				__( 'SearchWP requires %s %s or higher and as a result has been deactivated. Please contact your host to upgrade %s before activating this plugin.', 'searchwp' ),
				$db_info['engine'],
				$required_ver,
				$db_info['engine']
			) . ' <a href="' . esc_url( admin_url( 'plugins.php' ) ) . '">WordPress Admin</a>' );
		}

		// Create index database tables.
		$index = new \SearchWP\Index\Controller();
		foreach ( $index->get_tables() as $table ) {
			if ( ! $table->exists() ) {
				$table->install();
			}
		}

		// Add baseline for cron health check.
		update_site_option( SEARCHWP_PREFIX . 'last_health_check', current_time( 'timestamp' ) );

		// Flag install.
		if ( is_multisite() && $network_wide ) {
			wp_schedule_single_event( time(), SEARCHWP_PREFIX . 'network_install' );
		} else if ( ! is_multisite() || ( is_multisite() && ! $network_wide ) ) {
			// Trigger a redirect to the Welcome screen.
			if ( empty( \SearchWP\Settings::_get_engines_settings( true ) ) ) {
				\SearchWP\Settings::update( 'new_activation', true );
			}
		}
	}
}

add_action( 'admin_init', 'searchwp_plugin_activate' );

// Kickoff!
require_once SEARCHWP_PLUGIN_URL . '/lib/vendor/scoper-autoload.php';
require_once SEARCHWP_PLUGIN_URL . '/includes/SearchWP.php';
require_once SEARCHWP_PLUGIN_URL . '/lib/class.swp-query.php';

new SearchWP();
