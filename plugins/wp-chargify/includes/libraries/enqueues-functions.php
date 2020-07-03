<?php
/**
 * Add the enqueue functions.
 *
 * @file    wp-content/mu-plugins/core/functions/enqueues-functions.php
 * @package Core
 */

namespace Chargify\Libraries;

if ( ! function_exists( 'wp_register_style_auto_ver' ) ) {
	/**
	 * Register the stylesheet.
	 *
	 * @param string $identifier The identifier is used to prepend to the handle.
	 * @param string $src        The src url for the asset, this can be .min version of the script, relative to the plugin base URL.
	 * @param array  $deps       Array of stylesheet dependencies.
	 * @param string $version    Stylesheet version.
	 */
	function wp_register_style_auto_ver( $identifier, $src, $deps = [], $version = null ) {
		Enqueue::register_style( $identifier, $src, $deps, $version );
	}
}

if ( ! function_exists( 'wp_enqueue_style_auto_ver' ) ) {
	/**
	 * Enqueue the stylesheet using WordPress 'wp_enqueue_style' function.
	 *
	 * @param string $identifier The identifier is used to prepend to the handle.
	 * @param string $src        The src url for the asset, this can be .min version of the script, relative to the plugin base URL.
	 * @param array  $deps       Array of stylesheet dependencies.
	 * @param string $version    Stylesheet version.
	 */
	function wp_enqueue_style_auto_ver( $identifier, $src = '', $deps = [], $version = null ) {
		Enqueue::enqueue_style( $identifier, $src, $deps, $version );
	}
}

if ( ! function_exists( 'wp_register_script_auto_ver' ) ) {
	/**
	 * Register the script. Automatically detects local environment and attempts to load unminified version.
	 *
	 * @param string $identifier The identifier is used to prepend to the handle.
	 * @param string $src        The src url for the asset, this can be .min version of the script, relative to the plugin base URL.
	 * @param array  $deps       Array of script dependencies.
	 * @param string $version    Script version.
	 * @param bool   $in_footer  To display in footer or not, default true.
	 * @param bool   $async      To add the async attribute.
	 */
	function wp_register_script_auto_ver( $identifier, $src, $deps = [], $version = null, $in_footer = true, $async = true ) {
		Enqueue::register_script( $identifier, $src, $deps, $version, $in_footer, $async );
	}
}

if ( ! function_exists( 'wp_localize_script_auto_ver' ) ) {
	/**
	 * Localize the script using WordPress 'wp_localize_script' function.
	 *
	 * @param string $identifier  The identifier is used to prepend to the handle.
	 * @param string $object_name Name of the root object.
	 * @param array  $data        Data array.
	 */
	function wp_localize_script_auto_ver( $identifier, $object_name, $data ) {
		Enqueue::localize_script( $identifier, $object_name, $data );
	}
}

if ( ! function_exists( 'wp_enqueue_script_auto_ver' ) ) {
	/**
	 * Enqueue the script using WordPress 'wp_enqueue_script' function.
	 *
	 * @param string $identifier The identifier is used to prepend to the handle.
	 * @param string $src        The src url for the asset, this can be .min version of the script, relative to the plugin base URL.
	 * @param array  $deps       Array of script dependencies.
	 * @param string $version    Script version.
	 * @param bool   $in_footer  To display in footer or not, default true.
	 * @param bool   $async      To add the async attribute.
	 */
	function wp_enqueue_script_auto_ver( $identifier, $src = '', $deps = [], $version = null, $in_footer = true, $async = true ) {
		Enqueue::enqueue_script( $identifier, $src, $deps, $version, $in_footer, $async );
	}
}
