<?php
/**
 * Plugin Name: Meta slider and carousel with lightbox
 * Plugin URI: https://www.wponlinesupport.com/plugins/
 * Description: Plugin add a gallery meta box in your post, page and create a Image gallery menu tab. Display with a lightbox. Also work with Gutenberg shortcode block.
 * Author: WP OnlineSupport 
 * Text Domain: meta-slider-and-carousel-with-lightbox
 * Domain Path: /languages/
 * Version: 1.2.4
 * Author URI: https://www.wponlinesupport.com/
 *
 * @package WordPress
 * @author WP OnlineSupport
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

if( !defined( 'WP_IGSP_VERSION' ) ) {
	define( 'WP_IGSP_VERSION', '1.2.4' ); // Version of plugin
}
if( !defined( 'WP_IGSP_DIR' ) ) {
	define( 'WP_IGSP_DIR', dirname( __FILE__ ) ); // Plugin dir
}
if( !defined( 'WP_IGSP_URL' ) ) {
	define( 'WP_IGSP_URL', plugin_dir_url( __FILE__ ) ); // Plugin url
}
if( !defined( 'WP_IGSP_POST_TYPE' ) ) {
	define( 'WP_IGSP_POST_TYPE', 'wp_igsp_gallery' ); // Plugin post type
}
if( !defined( 'WP_IGSP_META_PREFIX' ) ) {
	define( 'WP_IGSP_META_PREFIX', '_wp_igsp_' ); // Plugin metabox prefix
}

/**
 * Load Text Domain
 * This gets the plugin ready for translation
 * 
 * @package Meta slider and carousel with lightbox
 * @since 1.0.0
 */
function wp_igsp_load_textdomain() {
	load_plugin_textdomain( 'meta-slider-and-carousel-with-lightbox', false, dirname( plugin_basename(__FILE__) ) . '/languages/' );
}
add_action('plugins_loaded', 'wp_igsp_load_textdomain');

/**
 * Activation Hook
 * 
 * Register plugin activation hook.
 * 
 * @package Meta slider and carousel with lightbox
 * @since 1.0.0
 */
register_activation_hook( __FILE__, 'wp_igsp_install' );

/**
 * Deactivation Hook
 * 
 * Register plugin deactivation hook.
 * 
 * @package Meta slider and carousel with lightbox
 * @since 1.0.0
 */
register_deactivation_hook( __FILE__, 'wp_igsp_uninstall');

/**
 * Plugin Setup (On Activation)
 * 
 * Does the initial setup,
 * set default values for the plugin options.
 * 
 * @package Meta slider and carousel with lightbox
 * @since 1.0.0
 */
function wp_igsp_install() {
	
	// Register post type function
	wp_igsp_register_post_type();

	// IMP need to flush rules for custom registered post type
	flush_rewrite_rules();

	// Deactivate pro version
	if( is_plugin_active('meta-slider-and-carousel-with-lightbox-pro/frontend-gallery-slider.php') ) {
		add_action('update_option_active_plugins', 'wp_igsp_deactivate_pro_version');
	}
}

/**
 * Deactivate pro plugin
 * 
 * @package Meta slider and Carousel with lightbox
 * @since 1.1.3
 */
function wp_igsp_deactivate_pro_version() {
	deactivate_plugins('meta-slider-and-carousel-with-lightbox-pro/frontend-gallery-slider.php', true);
}

/**
 * Function to display admin notice of activated plugin.
 * 
 * @package Meta slider and Carousel with lightbox
 * @since 1.1.3
 */
function wp_igsp_admin_notice() {
	
	global $pagenow;

	// If FREE plugin is active and PRO plugin exist
	$dir                = WP_PLUGIN_DIR . '/meta-slider-and-carousel-with-lightbox-pro/frontend-gallery-slider.php';
	$notice_link        = add_query_arg( array('message' => 'wp-igsp-plugin-notice'), admin_url('plugins.php') );
	$notice_transient   = get_transient( 'wp_igsp_install_notice' );

	if( $notice_transient == false && $pagenow == 'plugins.php' && file_exists( $dir ) && current_user_can( 'install_plugins' ) ) {
		  echo '<div class="updated notice" style="position:relative;">
				<p>
					<strong>'.sprintf( __('Thank you for activating %s', 'meta-slider-and-carousel-with-lightbox'), 'Meta slider and Carousel with lightbox').'</strong>.<br/>
					'.sprintf( __('It looks like you had PRO version %s of this plugin activated. To avoid conflicts the extra version has been deactivated and we recommend you delete it.', 'meta-slider-and-carousel-with-lightbox'), '<strong>(<em>Meta slider and Carousel with lightbox PRO</em>)</strong>' ).'
				</p>
				<a href="'.esc_url( $notice_link ).'" class="notice-dismiss" style="text-decoration:none;"></a>
			</div>';
	}
}

// Action to display notice
add_action( 'admin_notices', 'wp_igsp_admin_notice');

/**
 * Plugin Setup (On Deactivation)
 * 
 * Delete  plugin options.
 * 
 * @package Meta slider and carousel with lightbox
 * @since 1.0.0
 */
function wp_igsp_uninstall() {
	
	// IMP need to flush rules for custom registered post type
	flush_rewrite_rules();
}

// Functions File
require_once( WP_IGSP_DIR . '/includes/wp-igsp-functions.php' );

// Plugin Post Type File
require_once( WP_IGSP_DIR . '/includes/wp-igsp-post-types.php' );

// Script File
require_once( WP_IGSP_DIR . '/includes/class-wp-igsp-script.php' );

// Admin Class File
require_once( WP_IGSP_DIR . '/includes/admin/class-wp-igsp-admin.php' );

// Shortcode File
require_once( WP_IGSP_DIR . '/includes/shortcode/wp-igsp-meta-gallery-slider.php' );
require_once( WP_IGSP_DIR . '/includes/shortcode/wp-igsp-meta-gallery-carousel.php' );

// How it work file, Load admin files
if ( is_admin() || ( defined( 'WP_CLI' ) && WP_CLI ) ) {
	require_once( WP_IGSP_DIR . '/includes/admin/igsp-how-it-work.php' );
}

/* Plugin Wpos Analytics Data Starts */
function wpos_analytics_anl39_load() {

	require_once dirname( __FILE__ ) . '/wpos-analytics/wpos-analytics.php';

	$wpos_analytics =  wpos_anylc_init_module( array(
							'id'			=> 39,
							'file'			=> plugin_basename( __FILE__ ),
							'name'			=> 'Meta slider and carousel with lightbox',
							'slug'			=> 'meta-slider-and-carousel-with-lightbox',
							'type'			=> 'plugin',
							'menu'			=> 'edit.php?post_type=wp_igsp_gallery',
							'text_domain'	=> 'meta-slider-and-carousel-with-lightbox',
							'promotion'		=> array(
													'bundle' => array(
															'name'	=> 'Download FREE 50+ Plugins, 10+ Themes and Dashboard Plugin',
															'desc'	=> 'Download FREE 50+ Plugins, 10+ Themes and Dashboard Plugin',
															'file'	=> 'https://www.wponlinesupport.com/latest/wpos-free-50-plugins-plus-12-themes.zip'
														)
													),
							'offers'		=> array(
													'trial_premium' => array(
														'image'	=> 'http://analytics.wponlinesupport.com/?anylc_img=39',
														'link'	=> 'http://analytics.wponlinesupport.com/?anylc_redirect=39',
														'desc'	=> 'Or start using the plugin from admin menu',
													)
												),
						));

	return $wpos_analytics;
}

// Init Analytics
wpos_analytics_anl39_load();
/* Plugin Wpos Analytics Data Ends */