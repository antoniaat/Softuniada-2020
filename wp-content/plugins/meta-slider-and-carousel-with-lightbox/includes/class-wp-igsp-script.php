<?php
/**
 * Script Class
 *
 * Handles the script and style functionality of plugin
 *
 * @package Meta slider and carousel with lightbox
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

class WP_Igsp_Script {
	
	function __construct() {
		
		// Action to add style at front side
		add_action( 'wp_enqueue_scripts', array($this, 'wp_igsp_front_style') );
		
		// Action to add script at front side
		add_action( 'wp_enqueue_scripts', array($this, 'wp_igsp_front_script') );
		
		// Action to add style in backend
		add_action( 'admin_enqueue_scripts', array($this, 'wp_igsp_admin_style') );
		
		// Action to add script at admin side
		add_action( 'admin_enqueue_scripts', array($this, 'wp_igsp_admin_script') );
	}

	/**
	 * Function to add style at front side
	 * 
	 * @package Meta slider and carousel with lightbox
	 * @since 1.0.0
	 */
	function wp_igsp_front_style() {

		// Registring and enqueing magnific css
		if( !wp_style_is( 'wpos-magnific-style', 'registered' ) ) {
			wp_register_style( 'wpos-magnific-style', WP_IGSP_URL.'assets/css/magnific-popup.css', array(), WP_IGSP_VERSION );
			wp_enqueue_style( 'wpos-magnific-style');
		}

		// Registring and enqueing slick css
		if( !wp_style_is( 'wpos-slick-style', 'registered' ) ) {
			wp_register_style( 'wpos-slick-style', WP_IGSP_URL.'assets/css/slick.css', array(), WP_IGSP_VERSION );
			wp_enqueue_style( 'wpos-slick-style');
		}
		
		// Registring and enqueing public css
		wp_register_style( 'wp-igsp-public-css', WP_IGSP_URL.'assets/css/wp-igsp-public.css', null, WP_IGSP_VERSION );
		wp_enqueue_style( 'wp-igsp-public-css' );
	}
	
	/**
	 * Function to add script at front side
	 * 
	 * @package Meta slider and carousel with lightbox
	 * @since 1.0.0
	 */
	function wp_igsp_front_script() {

		// Registring magnific popup script
		if( !wp_script_is( 'wpos-magnific-script', 'registered' ) ) {
			wp_register_script( 'wpos-magnific-script', WP_IGSP_URL.'assets/js/jquery.magnific-popup.min.js', array('jquery'), WP_IGSP_VERSION, true );
		}
		
		// Registring slick slider script
		if( !wp_script_is( 'wpos-slick-jquery', 'registered' ) ) {
			wp_register_script( 'wpos-slick-jquery', WP_IGSP_URL.'assets/js/slick.min.js', array('jquery'), WP_IGSP_VERSION, true );
		}

		// Registring public script
		wp_register_script( 'wp-igsp-public-js', WP_IGSP_URL.'assets/js/wp-igsp-public.js', array('jquery'), WP_IGSP_VERSION, true );
		wp_localize_script( 'wp-igsp-public-js', 'WpIsgp', array(
															'is_mobile' 		=>	(wp_is_mobile()) 	? 1 : 0,
															'is_rtl' 			=>	(is_rtl()) 			? 1 : 0,
														));
	}
	
	/**
	 * Enqueue admin styles
	 * 
	 * @package Meta slider and carousel with lightbox
	 * @since 1.0.0
	 */
	function wp_igsp_admin_style( $hook ) {

		global $post_type, $typenow;
		
		$registered_posts = wp_igsp_get_post_types(); // Getting registered post types

		// If page is plugin setting page then enqueue script
		if( in_array($post_type, $registered_posts) ) {
			
			// Registring admin script
			wp_register_style( 'wp-igsp-admin-style', WP_IGSP_URL.'assets/css/wp-igsp-admin.css', null, WP_IGSP_VERSION );
			wp_enqueue_style( 'wp-igsp-admin-style' );
		}
	}

	/**
	 * Function to add script at admin side
	 * 
	 * @package Meta slider and carousel with lightbox
	 * @since 1.0.0
	 */
	function wp_igsp_admin_script( $hook ) {
		
		global $wp_version, $wp_query, $typenow, $post_type;
		
		$registered_posts = wp_igsp_get_post_types(); // Getting registered post types
		$new_ui = $wp_version >= '3.5' ? '1' : '0'; // Check wordpress version for older scripts
		
		if( in_array($post_type, $registered_posts) ) {

			// Enqueue required inbuilt sctipt
			wp_enqueue_script( 'jquery-ui-sortable' );

			// Registring admin script
			wp_register_script( 'wp-igsp-admin-script', WP_IGSP_URL.'assets/js/wp-igsp-admin.js', array('jquery'), WP_IGSP_VERSION, true );
			wp_localize_script( 'wp-igsp-admin-script', 'WpIgspAdmin', array(
																	'new_ui' 				=>	$new_ui,
																	'img_edit_popup_text'	=> __('Edit Image in Popup', 'meta-slider-and-carousel-with-lightbox'),
																	'attachment_edit_text'	=> __('Edit Image', 'meta-slider-and-carousel-with-lightbox'),
																	'img_delete_text'		=> __('Remove Image', 'meta-slider-and-carousel-with-lightbox'),
																));
			wp_enqueue_script( 'wp-igsp-admin-script' );
			wp_enqueue_media(); // For media uploader
		}
	}
}

$wp_igsp_script = new WP_Igsp_Script();