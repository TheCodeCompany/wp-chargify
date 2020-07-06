<?php
namespace Chargify\Commands\Chargify\Components;
use WP_CLI;
use Chargify\Chargify\Endpoints\Components;
use Chargify\Post_Types\Helpers;

/**
 * Implements `chargify components` command.
 */
class Chargify_Components {

	/**
	 * Lists the products in Chargify.
	 *
	 * ## EXAMPLES
	 *
	 *     wp chargify component list
	 *
	 * @when after_wp_load
	 */
	function list() {
		WP_CLI::log( "Fetching the components from Chargify..." );
		$components = Components\get_components();

		# If we receive back an array then we have product families.
		if ( is_array( $components ) ) {
			WP_CLI\Utils\format_items(
				'table',
				$components,
				[
					'id',
					'name',
					'handle',
					'kind',
					'default_price_point_id',
					'price_point_count',
					'default_price_point_name',
				]
			);
		} else {
			# We didn't receive a HTTP success code so output the error.
			WP_CLI::error( $components );
		}
	}
}

\WP_CLI::add_command( 'chargify component', __NAMESPACE__ . '\\Chargify_Components' );
