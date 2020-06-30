<?php
namespace Chargify\Commands\Webhooks;
use WP_CLI;
use Chargify\Webhooks;

class Chargify_Webhooks {
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
		WP_CLI::log( "Fetching the webhooks from Chargify..." );
		$webhooks = Webhooks\get_webhooks();

		# If we receive back an array then we have webhooks.
		if ( is_array( $webhooks ) ) {
			WP_CLI\Utils\format_items(
				'table',
				$webhooks,
				[
					'event',
					'id',
					'last_error',
					'last_error_at',
					'accepted_at',
					'last_sent_at',
					'last_sent_url',
					'created_at',
					'successful',
				]
			);
		} else {
			# We didn't receive a HTTP success code so output the error.
			WP_CLI::error( $webhooks );
		}
	}
}
\WP_CLI::add_command( 'chargify webhooks', __NAMESPACE__ . '\\Chargify_Webhooks' );
