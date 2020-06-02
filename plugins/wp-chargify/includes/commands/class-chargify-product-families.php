<?php
namespace Chargify\Commands\Chargify;
use WP_CLI;
use Chargify\Chargify\Endpoints\Product_Families;

/**
 * Implements example command.
 */
class Chargify_Command {

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
		$product_families = Product_Families\get_product_families();

		foreach ( $product_families as $family ) {
			$rows[] = $family['product_family'];
		}

		WP_CLI\Utils\format_items('table', $rows, [ 'id', 'name', 'description', 'handle', 'accounting_code' ] );
	}
}

\WP_CLI::add_command( 'chargify product-families', __NAMESPACE__ . '\\Chargify_Command' );
