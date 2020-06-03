<?php
namespace Chargify\Commands\Chargify\Product_Families;
use WP_CLI;
use Chargify\Chargify\Endpoints\Product_Families;

/**
 * Implements chargify product-families command.
 */
class Chargify_Product_Families {

	/**
	 * Lists the product families in Chargify.
	 *
	 * ## EXAMPLES
	 *
	 *     wp chargify product-families list
	 *
	 * @when after_wp_load
	 */
	function list() {
		WP_CLI::log( "Fetching the product families from Chargify..." );
		$product_families = Product_Families\get_product_families();

		# If we receive back an array then we have product families.
		if ( is_array( $product_families ) ) {
			WP_CLI\Utils\format_items('table', $product_families, ['id', 'name', 'description', 'handle', 'accounting_code']);
		} else {
			# We didn't receive a HTTP success code so output the error.
			WP_CLI::error( $product_families );
		}
	}
}

\WP_CLI::add_command( 'chargify product-families', __NAMESPACE__ . '\\Chargify_Product_Families' );
