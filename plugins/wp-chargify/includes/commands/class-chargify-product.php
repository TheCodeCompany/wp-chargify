<?php
namespace Chargify\Commands\Chargify\Products;
use WP_CLI;
use Chargify\Chargify\Endpoints\Product_Families;
use Chargify\Post_Types\Helpers;

/**
 * Implements `chargify products` command.
 */
class Chargify_Products {

	/**
	 * Lists the products in Chargify.
	 *
	 * ## EXAMPLES
	 *
	 *     wp chargify product list
	 *
	 * @when after_wp_load
	 */
	function list() {
		WP_CLI::log( "Fetching the products from Chargify..." );
		$products = Product_Families\get_products();

		# If we receive back an array then we have product families.
		if ( is_array( $products ) ) {
			WP_CLI\Utils\format_items(
				'table',
				$products,
				[
					'id',
					'name',
					'description',
					'price_in_cents',
					'interval',
					'interval_unit',
					'initial_charge_in_cents',
					'trial_price_in_cents',
					'trial_interval',
					'trial_interval_unit',
				]
			);
		} else {
			# We didn't receive a HTTP success code so output the error.
			WP_CLI::error( $products );
		}
	}

	/**
	 * Lists a product stored in Chargify.
	 *
	 * ## OPTIONS
	 *
	 * <id>
	 * : The product id in Chargify.
	 *
	 * ## EXAMPLES
	 *
	 *     wp chargify product get <id>
	 *
	 * @when after_wp_load
	 */
	function get( $args, $assoc_args ) {
		$id = $args[0];
		WP_CLI::log( "Fetching the product $id from Chargify..." );
		$product = Product_Families\get_product( $id );

		# If we receive back an array then we have product families.
		if ( is_array( $product ) ) {
			WP_CLI\Utils\format_items(
				'table',
				$product,
				[
					'id',
					'name',
					'description',
					'price_in_cents',
					'interval',
					'interval_unit',
					'initial_charge_in_cents',
					'trial_price_in_cents',
					'trial_interval',
					'trial_interval_unit',
					'created_at'
				]
			);
		} else {
			# We didn't receive a HTTP success code so output the error.
			WP_CLI::error( $product );
		}
	}

	/**
	 * Deletes the Chargify products stored in WordPress.
	 *
	 * ## EXAMPLES
	 *
	 *     wp chargify product empty
	 *
	 * @when after_wp_load
	 */
	function empty() {
		WP_CLI::log( "Deleting the products in WordPress..." );
		$products = Helpers\resync_chargify();
		if ( false === $products ) {
			WP_CLI::error( "There were no products to delete." );
		} else {
			WP_CLI::success( "Successfully deleted the Chargify products." );
		}
	}
}

\WP_CLI::add_command( 'chargify product', __NAMESPACE__ . '\\Chargify_Products' );
