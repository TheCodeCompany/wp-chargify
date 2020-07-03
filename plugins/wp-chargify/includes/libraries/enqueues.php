<?php
/**
 * This class is used as a helper to enqueue assets.
 *
 * @file    wp-content/mu-plugins/core/libraries/enqueues.php
 * @package Core
 */

namespace Chargify\Libraries;

use function wp_register_style;
use function wp_enqueue_style;
use function wp_register_script;
use function wp_localize_script;
use function wp_enqueue_script;

/**
 * This class is used as a helper to enqueue assets.
 * Identifies and enqueues unminified versions for local if the file exists.
 * For all other cases it will enqueue the minified asset.
 */
class Enqueue {

	/**
	 * Asset global identifier for the enqueue.
	 *
	 * @var string|null
	 */
	private static $stored_data = null;

	/**
	 * Initialize and add async attribute.
	 */
	public function __construct() {
		add_filter( 'script_loader_tag', [ $this, 'add_async_attribute' ], 10, 2 );
	}

	/**
	 * Register the script. Automatically detects local environment and attempts to load unminified version.
	 *
	 * @param string $identifier The identifier is used to prepend to the handle.
	 * @param string $src        The src url for the asset, this can be .min version of the script, relative to the
	 *                           plugin base URL.
	 * @param array  $deps       Array of script dependencies.
	 * @param string $version    Script version.
	 * @param bool   $in_footer  To display in footer or not, default true.
	 * @param bool   $async      To add the async attribute.
	 */
	public static function register_script( $identifier, $src, $deps = [], $version = null, $in_footer = true, $async = true ) {

		$type = 'js';

		// Whenever a script is registered the enqueue data is stored.
		self::store_enqueue_data( $identifier, $src, $type, $async );

		$handle  = self::get_enqueue_handle( $identifier, $type );
		$src     = self::get_src( $identifier, $type );
		$version = self::get_version( $identifier, $type, $version );

		wp_register_script( $handle, $src, $deps, $version, $in_footer );
	}

	/**
	 * Register the stylesheet.
	 *
	 * @param string $identifier The identifier is used to prepend to the handle.
	 * @param string $src        The src url for the asset, this can be .min version of the script, relative to the
	 *                           plugin base URL.
	 * @param array  $deps       Array of stylesheet dependencies.
	 * @param string $version    Stylesheet version.
	 */
	public static function register_style( $identifier, $src, $deps = [], $version = null ) {

		$type = 'css';

		// Whenever a script is registered the enqueue data is stored.
		self::store_enqueue_data( $identifier, $src, $type );

		$handle  = self::get_enqueue_handle( $identifier, $type );
		$src     = self::get_src( $identifier, $type );
		$version = self::get_version( $identifier, $type, $version );

		wp_register_style( $handle, $src, $deps, $version );
	}

	/**
	 * Enqueue the script using WordPress 'wp_enqueue_script' function.
	 *
	 * @param string $identifier The identifier is used to prepend to the handle.
	 * @param string $src        The src url for the asset, this can be .min version of the script, relative to the
	 *                           plugin base URL.
	 * @param array  $deps       Array of script dependencies.
	 * @param string $version    Script version.
	 * @param bool   $in_footer  To display in footer or not, default true.
	 * @param bool   $async      To add the async attribute.
	 */
	public static function enqueue_script( $identifier, $src = '', $deps = [], $version = null, $in_footer = true, $async = true ) {
		$handle = self::get_enqueue_handle( $identifier, 'js' );

		if ( is_string( $handle ) && ! empty( $handle ) ) {
			wp_enqueue_script( $handle );
		} elseif ( ! empty( $src ) ) {
			// Attempt to register and enqueue.
			self::register_script( $identifier, $src, $deps, $version, $in_footer, $async );
			self::enqueue_script( $identifier );
		} elseif ( self::is_local() ) {
			trigger_error( "Asset error js. Handle not found: $handle", E_USER_WARNING ); // phpcs:ignore
		}
	}

	/**
	 * Enqueue the stylesheet using WordPress 'wp_enqueue_style' function.
	 *
	 * @param string $identifier The identifier is used to prepend to the handle.
	 * @param string $src        The src url for the asset, this can be .min version of the script, relative to the
	 *                           plugin base URL.
	 * @param array  $deps       Array of stylesheet dependencies.
	 * @param string $version    Stylesheet version.
	 */
	public static function enqueue_style( $identifier, $src = '', $deps = [], $version = null ) {
		$handle = self::get_enqueue_handle( $identifier, 'css' );

		if ( is_string( $handle ) && ! empty( $handle ) ) {
			wp_enqueue_style( $handle );
		} elseif ( ! empty( $src ) ) {
			// Attempt to register and enqueue.
			self::register_style( $identifier, $src, $deps, $version );
			self::enqueue_style( $identifier );
		} elseif ( self::is_local() ) {
			trigger_error( "Asset error css. Handle not found: $handle", E_USER_WARNING ); // phpcs:ignore
		}
	}

	/**
	 * Localize the script using WordPress 'wp_localize_script' function.
	 *
	 * @param string $identifier  The identifier is used to prepend to the handle.
	 * @param string $object_name Name of the root object.
	 * @param array  $data        Data array.
	 */
	public static function localize_script( $identifier, $object_name, $data ) {
		wp_localize_script( self::get_enqueue_handle( $identifier, 'js' ), $object_name, $data );
	}

	/**
	 * =========================================================================
	 * Storing data for localized use.
	 * -------------------------------------------------------------------------
	 */

	/**
	 * Store the enqueue data for easy retrieval against the identifier.
	 *
	 * @param string $identifier The identifier is used to prepend to the handle.
	 * @param string $src        The src url for the asset, this can be .min version of the script, relative to the
	 *                           plugin base URL.
	 * @param string $type       The asset extension, 'css' or 'js'.
	 * @param bool   $async      To add a async attribute, used for js types.
	 */
	protected static function store_enqueue_data( $identifier, $src, $type, $async = true ) {
		$filename = self::get_filename_from_uri( $src );
		$path     = self::get_path_from_uri( $src );

		if ( defined( 'ABSPATH' ) ) {
			$absolute_path = trim( preg_replace( '/\/wp\/$/', '', ABSPATH ), '/' ) . $path;
			$absolute_path = '/' . ltrim( $absolute_path, '/' );
		} else {
			$absolute_path = '';
		}

		$path_uri = home_url() . $path;

		self::$stored_data[ $identifier ] = [
			$type => [
				'enqueue_handle' => $identifier,
				'filename'       => $filename,
				'path'           => $path,
				'path_absolute'  => $absolute_path,
				'path_uri'       => $path_uri,
				'src_absolute'   => '',
				'src'            => '',
				'version'        => '',
			],
		];

		// Store async for latter use.
		if ( 'js' === $type ) {
			self::$stored_data[ $identifier ][ $type ]['async'] = $async;
		}

		$standard_file               = $filename . '.' . $type;
		$minified_file               = $filename . '.min.' . $type;
		$standard_file_absolute_path = $absolute_path . $standard_file;
		$minified_file_absolute_path = $absolute_path . $minified_file;

		if ( self::is_local() && file_exists( $standard_file_absolute_path ) ) {
			// Local environment check if a unminified version exists and enqueue that.
			self::$stored_data[ $identifier ][ $type ]['src_absolute'] = $standard_file_absolute_path;
			self::$stored_data[ $identifier ][ $type ]['src']          = $path_uri . $standard_file;
			self::$stored_data[ $identifier ][ $type ]['version']      = filemtime( $standard_file_absolute_path );

		} elseif ( file_exists( $minified_file_absolute_path ) ) {
			// Check if a minified version exists and enqueue that.
			self::$stored_data[ $identifier ][ $type ]['src_absolute'] = $minified_file_absolute_path;
			self::$stored_data[ $identifier ][ $type ]['src']          = $path_uri . $minified_file;
			self::$stored_data[ $identifier ][ $type ]['version']      = filemtime( $minified_file_absolute_path );

		} elseif ( file_exists( $standard_file_absolute_path ) ) {
			// Last resort check for a unminified version exists and enqueue that.
			self::$stored_data[ $identifier ][ $type ]['src_absolute'] = $standard_file_absolute_path;
			self::$stored_data[ $identifier ][ $type ]['src']          = $path_uri . $standard_file;
			self::$stored_data[ $identifier ][ $type ]['version']      = filemtime( $standard_file_absolute_path );

		} elseif ( self::is_local() ) {
			trigger_error( "Asset error. $filename file not found . $standard_file_absolute_path", E_USER_WARNING ); // phpcs:ignore
		}
	}

	/**
	 * Get the filename from the src uri.
	 *
	 * @param string $src     The src uri for the asset file.
	 * @param string $default The default return value.
	 *
	 * @return false|string
	 */
	protected static function get_filename_from_uri( $src, $default = '' ) {

		$stored_data = wp_parse_url( $src );

		if ( isset( $stored_data['path'] ) ) {
			$file = basename( $stored_data['path'] );

			if ( strrpos( $file, '.min' ) ) {
				$filename = substr( $file, 0, strrpos( $file, '.min', 0 ) );
			} else {
				$filename = substr( $file, 0, strrpos( $file, '.', 0 ) );
			}
		} else {
			$filename = $default;
		}

		return $filename;
	}

	/**
	 * Get the path from the src uri.
	 *
	 * @param string $src     The src uri for the asset file.
	 * @param string $default The default return value.
	 *
	 * @return false|string
	 */
	protected static function get_path_from_uri( $src, $default = '' ) {

		$stored_data = wp_parse_url( $src );

		if ( isset( $stored_data['path'] ) ) {
			$path = str_replace( basename( $stored_data['path'] ), '', $stored_data['path'] );
		} else {
			$path = $default;
		}

		return $path;
	}

	/**
	 * =========================================================================
	 * Retrival of localized data.
	 * -------------------------------------------------------------------------
	 */

	/**
	 * Get data from the stored enqueued information array.
	 *
	 * @param string      $identifier The identify for this enqueued asset.
	 * @param null|string $key        The key for the data being stored.
	 * @param null|string $type       The type, 'css' or 'js'.
	 * @param string      $default    The default return value if nothing is found.
	 *
	 * @return mixed|string
	 */
	protected static function get_stored_value( $identifier, $key = null, $type = null, $default = '' ) {

		if ( null !== $key && null !== $type &&
			isset( self::$stored_data[ $identifier ][ $type ][ $key ] ) ) {
			$value = self::$stored_data[ $identifier ][ $type ][ $key ];

		} elseif ( null !== $key && null === $type &&
			isset( self::$stored_data[ $identifier ][ $key ] ) ) {
			$value = self::$stored_data[ $identifier ][ $key ];

		} elseif ( isset( self::$stored_data[ $identifier ] ) ) {
			$value = self::$stored_data[ $identifier ];

		} else {
			$value = $default;
		}

		return $value;
	}

	/**
	 * Get the handle of the asset by concatenating the type onto the asset name.
	 *
	 * @param string $identifier File type, css or js.
	 * @param string $type       File type, css or js.
	 *
	 * @return string
	 */
	protected static function get_enqueue_handle( $identifier, $type ) {
		return self::get_stored_value( $identifier, 'enqueue_handle', $type );
	}

	/**
	 * Get the full src path including the asset file name and extension.
	 *
	 * @param string $identifier The calling identifier.
	 * @param string $type       File type, css or js.
	 *
	 * @return string
	 */
	protected static function get_src( $identifier, $type ) {
		return self::get_stored_value( $identifier, 'src', $type );
	}

	/**
	 * Get the version to apply to the enqueued asset.
	 *
	 * @param string           $identifier The calling identifier.
	 * @param string           $type       File type, css or js.
	 * @param null|bool|string $version    The version to apply to the asset.
	 *
	 * @return string
	 */
	protected static function get_version( $identifier, $type, $version = null ) {
		if ( true === $version ) {
			$version = self::get_stored_value( $identifier, 'version', $type );
		}

		return $version;
	}

	/**
	 * Add async attribute to the tag for siteads-js handle.
	 *
	 * @param string $tag    Contains the script tag.
	 * @param string $handle Handle used to define script for WP.
	 *
	 * @return mixed
	 */
	public function add_async_attribute( $tag, $handle ) {

		if ( is_array( self::$stored_data ) ) {
			foreach ( self::$stored_data as $identifier => $type_data ) {
				if ( isset( $type_data['js']['async'] ) &&
					$type_data['js']['async'] &&
					self::get_enqueue_handle( $identifier, 'js' ) === $handle ) {
					$tag = str_replace( ' src', ' async src', $tag );
				}
			}
		}

		return $tag;
	}

	/**
	 * Quick check for local environment.
	 *
	 * @return bool
	 */
	public static function is_local() {
		return ( defined( 'WP_ENV' ) && 'local' === WP_ENV ) ||
			( defined( 'WP_LOCAL_DEV' ) && WP_LOCAL_DEV );
	}
}

// Initialize the constructor, this is a standalone feature.
new Enqueue();

