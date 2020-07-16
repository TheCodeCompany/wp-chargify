<?php
namespace Chargify\Commands\Chargify\Component_Price_Point;

use WP_CLI;
use Chargify\Chargify\Endpoints\Component_Price_Points;
/**
 * Implements `chargify component price points` command.
 */
class Chargify_Component_Price_Point {

	/**
	 * Lists a component price point stored in Chargify.
	 *
	 * ## OPTIONS
	 *
	 * <handle>
	 * : The product handle in Chargify.
	 *
	 * ## EXAMPLES
	 *
	 *     wp chargify product get <id>
	 *
	 * @when after_wp_load
	 */
	function get( $args, $assoc_args ) {
		$handle = $args[0];
		WP_CLI::log( "Fetching the component price point $handle from Chargify..." );
		$component_price_point = Component_Price_Points\get_component_price_point( $handle );

		// TODO: component price points.
		// If we receive back an array then we have product families.
		if ( is_array( $component_price_point ) ) {
			WP_CLI\Utils\format_items(
				'table',
				$component_price_point,
				[
					'id',
					'name',
					'handle',
					'kind',
				]
			);
		} else {
			// We didn't receive a HTTP success code so output the error.
			WP_CLI::error( $component_price_point );
		}
	}

	/**
	 * Lists the component price points in Chargify.
	 *
	 * // EXAMPLES
	 *
	 *     wp chargify component_price_point list
	 *
	 * @when after_wp_load
	 */
	function list( $args, $assoc_args ) {
		// TODO: component price points.
		$component_id = $args[0];
		WP_CLI::log( "Fetching the component price points from Chargify..." );
		$component_price_points = Component_Price_Points\get_component_price_points( $component_id );

		// TODO: component price points.
		// If we receive back an array then we have product families.
		if ( is_array( $component_price_points ) ) {
			WP_CLI\Utils\format_items(
				'table',
				$component_price_points,
				[
					'id',
					'name',
					'handle',
					'kind',
				]
			);
		} else {
			// We didn't receive a HTTP success code so output the error.
			WP_CLI::error( $component_price_points );
		}
	}
}

\WP_CLI::add_command( 'chargify component price point', __NAMESPACE__ . '\\Chargify_Component_Price_Points' );
