<?php

namespace Chargify\Commands\Chargify\API_Log;

use WP_CLI;

/**
 * Implements `chargify log` commands.
 */
class Chargify_API_Log
{
	/**
	 * Deletes the Chargify logs stored in WordPress.
	 *
	 * ## EXAMPLES
	 *
	 *     wp chargify log empty
	 *
	 * @when after_wp_load
	 */
	function empty()
	{
		WP_CLI::log("Deleting the logs in WordPress...");
		$logs = new \WP_Query( [
			'post_type' => 'chargify_api_log',
		] );

		if ( $logs->have_posts() ) {
			while ( $logs->have_posts() ) {
				$logs->the_post();
				wp_delete_post( get_the_ID(), true );
			}
			WP_CLI::success( "Successfully deleted the Chargify API logs." );
		} else {
			WP_CLI::warning( "There are no Chargify API logs to delete." );
		}
	}
}

\WP_CLI::add_command('chargify log', __NAMESPACE__ . '\\Chargify_API_Log');
