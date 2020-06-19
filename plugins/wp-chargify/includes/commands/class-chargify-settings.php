<?php
namespace Chargify\Commands\Settings;
use WP_CLI;
use Chargify\Admin\Helpers;

/**
 * Implements `chargify settings` command.
 */
class Chargify_Settings {
	/**
	 * Deletes the Chargify settings stored in WordPress.
	 *
	 * ## EXAMPLES
	 *
	 *     wp chargify settings empty
	 *
	 * @when after_wp_load
	 */
	function empty() {
		Helpers\delete_settings();
		WP_CLI::success( 'Successfully deleted the Chargify settings.' );
	}
}
\WP_CLI::add_command( 'chargify settings', __NAMESPACE__ . '\\Chargify_Settings' );
