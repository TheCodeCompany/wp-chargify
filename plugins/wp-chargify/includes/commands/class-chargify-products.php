<?php
namespace Chargify\Commands\Chargify\Products;
use WP_CLI;
use Chargify\Chargify\Endpoints\Product_Families;

/**
 * Implements example command.
 */
class Chargify_Products {

	/**
	 * Lists the products in Chargify.
	 *
	 * ## EXAMPLES
	 *
	 *     wp chargify product-families list
	 *
	 * @when after_wp_load
	 */
	function list() {
		WP_CLI::log( "Fetching the products from Chargify..." );
		$products = Product_Families\get_products();

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
	}
}

\WP_CLI::add_command( 'chargify products', __NAMESPACE__ . '\\Chargify_Products' );
