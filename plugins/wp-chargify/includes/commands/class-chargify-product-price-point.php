<?php
namespace Chargify\Commands\Chargify\Product_Price_Points;

use WP_CLI;
use Chargify\Chargify\Endpoints\Product_Price_Points;
/**
 * Implements `chargify price points` command.
 */
class Chargify_Product_Price_Points {

	/**
	 * Lists a price point stored in Chargify.
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

		$product_id             = $args[0];
		$product_price_point_id = $args[1];

		WP_CLI::log( "Fetching the product price point $product_price_point_id from Chargify..." );
		$product_price_point = Product_Price_Points\get_product_price_point( $product_id, $product_price_point_id );

		// If we receive back an array then we have product families.
		if ( is_array( $product_price_point ) ) {
			WP_CLI\Utils\format_items(
				'table',
				$product_price_point,
				[
					'id',
					'name',
					'handle',
					'kind',
				]
			);
		} else {
			// We didn't receive a HTTP success code so output the error.
			WP_CLI::error( $product_price_point );
		}
	}

	/**
	 * Lists the price points in Chargify.
	 *
	 * //// EXAMPLES
	 *
	 *     wp chargify price_point list
	 *
	 * @when after_wp_load
	 */
	function list( $args, $assoc_args ) {
		$product_id = $args[0];
		WP_CLI::log( "Fetching the price points from Chargify..." );
		$product_price_points = Product_Price_Points\get_product_price_points( $product_id );

		// If we receive back an array then we have product families.
		if ( is_array( $product_price_points ) ) {
			WP_CLI\Utils\format_items(
				'table',
				$product_price_points,
				[
					'id',
					'name',
					'handle',
					'kind',
				]
			);
		} else {
			// We didn't receive a HTTP success code so output the error.
			WP_CLI::error( $product_price_points );
		}
	}
}

\WP_CLI::add_command( 'chargify price point', __NAMESPACE__ . '\\Chargify_Product_Price_Points' );
