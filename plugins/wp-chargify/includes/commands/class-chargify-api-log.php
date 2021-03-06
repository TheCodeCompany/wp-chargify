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

	/**
	 * Lists the logs stored in WordPress.
	 *
	 * ## EXAMPLES
	 *
	 *     wp chargify log list
	 *
	 * @when after_wp_load
	 */
	function get( $args, $assoc_args ) {
		$id = $args[0];

		$log = get_post( $id );

		$log_details = [
			[
				'date'     => $log->post_date,
				'endpoint' => get_post_meta( $id, '_chargify_endpoint', true ),
				'status'   => get_post_meta( $id, '_chargify_status', true ),
				'type'     => $log->post_title,
			]
		];

		# If we have an array then we have logs.
		if ( ! empty( $log_details ) ) {
			WP_CLI\Utils\format_items( 'table', $log_details, [ 'type', 'endpoint', 'status', 'date' ] );
		} else {
			WP_CLI::error( "Chargify API log #{$id} was not found." );
		}
	}

	/**
	 * Lists the logs stored in WordPress.
	 *
	 * ## EXAMPLES
	 *
	 *     wp chargify log list
	 *
	 * @when after_wp_load
	 */
	function list( $args, $assoc_args ) {

		$defaults   = [
			'posts_per_page' => -1,
			'post_status'    => 'any',
			'post_type'      => 'chargify_api_log',
		];

		$query_args = array_merge( $defaults, $assoc_args );
		$query = new \WP_Query( $query_args );
		$logs = $query->posts;

		# If we have an array then we have logs.
		if ( ! empty( $logs ) ) {
			WP_CLI\Utils\format_items( 'table', $logs, ['ID', 'post_title', 'post_date' ] );
		} else {
			WP_CLI::error( 'No Chargify API logs found.' );
		}
	}
}

\WP_CLI::add_command('chargify log', __NAMESPACE__ . '\\Chargify_API_Log');
