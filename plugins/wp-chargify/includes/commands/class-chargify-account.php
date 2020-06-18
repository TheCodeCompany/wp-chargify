<?php

namespace Chargify\Commands\Chargify\API_Log;

use WP_CLI;

/**
 * Implements `chargify log` commands.
 */
class Chargify_Account
{
	/**
	 * Deletes the accounts stored in WordPress.
	 *
	 * ## EXAMPLES
	 *
	 *     wp chargify account empty
	 *
	 * @when after_wp_load
	 */
	function empty()
	{
		$logs = new \WP_Query( [
			'post_type' => 'chargify_account',
		] );

		if ( $logs->have_posts() ) {
			while ( $logs->have_posts() ) {
				$logs->the_post();
				wp_delete_post( get_the_ID(), true );
			}
			WP_CLI::success( "Successfully deleted the Chargify accounts." );
		} else {
			WP_CLI::warning( "There are no Chargify accounts to delete." );
		}
	}

	/**
	 * Lists the accounts stored in WordPress.
	 *
	 * ## EXAMPLES
	 *
	 *     wp chargify account list
	 *
	 * @when after_wp_load
	 */
	function get( $args, $assoc_args ) {
		$id = $args[0];

		$log = get_post( $id );

		$log_details = [
			[
				'created' => $log->post_date,
				'expires' => get_post_meta( $id, 'chargify_expiration_date', true ),
				'status'  => get_post_meta( $id, 'chargify_subscription_status', true ),
				'email'   => $log->post_title,
			]
		];

		# Check if we have a log to display.
		if ( ! empty( $log_details ) && ! empty( $log ) ) {
			WP_CLI\Utils\format_items( 'table', $log_details, [ 'email', 'status', 'expires', 'created' ] );
		} else {
			WP_CLI::error( "Chargify account #{$id} was not found." );
		}
	}

	/**
	 * Lists the accounts stored in WordPress.
	 *
	 * ## EXAMPLES
	 *
	 *     wp chargify account list
	 *
	 * @when after_wp_load
	 */
	function list( $args, $assoc_args ) {

		$defaults   = [
			'posts_per_page' => -1,
			'post_status'    => 'any',
			'post_type'      => 'chargify_account',
		];

		$query_args = array_merge( $defaults, $assoc_args );
		$query      = new \WP_Query( $query_args );
		$accounts   = $query->posts;

		# If we have an array then we have logs.
		if ( ! empty( $accounts ) ) {
			WP_CLI\Utils\format_items( 'table', $accounts, [ 'ID', 'post_title', 'post_date' ] );
		} else {
			WP_CLI::error( 'No Chargify accounts found.' );
		}
	}
}

\WP_CLI::add_command( 'chargify account', __NAMESPACE__ . '\\Chargify_Account');
