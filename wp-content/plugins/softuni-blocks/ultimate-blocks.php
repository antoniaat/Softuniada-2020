<?php
/**
 * Plugin Name: SoftUni Blocks
 * Description: Custom Blocks for Bloggers and Marketers. Create Better Content With Gutenberg.
 * Version: 2.1.5
 * License: GPL3+
 * Text Domain: softuni-blocks
 * Domain Path: /languages
 *
 * @package UB
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once 'includes/class-ultimate-blocks-constants.php';

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 */
define( 'ULTIMATE_BLOCKS_VERSION', Ultimate_Blocks_Constants::plugin_version() );
/**
 * Plugin Name
 */
define( 'ULTIMATE_BLOCKS_NAME', Ultimate_Blocks_Constants::plugin_name() );
/**
 * Plugin Path
 */
define( 'ULTIMATE_BLOCKS_PATH', Ultimate_Blocks_Constants::plugin_path() );
/**
 * Plugin URL
 */
define( 'ULTIMATE_BLOCKS_URL', Ultimate_Blocks_Constants::plugin_url() );
/**
 * Plugin TextDomain
 */
define( 'ULTIMATE_BLOCKS_TEXT_DOMAIN', Ultimate_Blocks_Constants::text_domain() );

/**
 * Block Initializer.
 */
require_once plugin_dir_path( __FILE__ ) . 'src/init.php';


/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ultimate-blocks-activator.php
 */
function activate_ultimate_blocks() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ultimate-blocks-activator.php';
	Ultimate_Blocks_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ultimate-blocks-deactivator.php
 */
function deactivate_ultimate_blocks() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ultimate-blocks-deactivator.php';
	Ultimate_Blocks_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_ultimate_blocks' );
register_deactivation_hook( __FILE__, 'deactivate_ultimate_blocks' );

if ( ! function_exists( 'ub_safe_welcome_redirect' ) ) {

	add_action( 'admin_init', 'ub_safe_welcome_redirect' );

	function ub_safe_welcome_redirect() {

		if ( ! get_transient( '_welcome_redirect_ub' ) ) {
			return;
		}

		delete_transient( '_welcome_redirect_ub' );

		if ( is_network_admin() || isset( $_GET['activate-multi'] ) ) {
			return;
		}

		wp_safe_redirect( add_query_arg(
			array(
				'page' => 'ultimate-blocks-help'
				),
			admin_url( 'admin.php' )
		) );

	}

}

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-ultimate-blocks.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.2
 */
function run_ultimate_blocks() {

	$plugin = new Ultimate_Blocks();
	$plugin->run();

}
run_ultimate_blocks();