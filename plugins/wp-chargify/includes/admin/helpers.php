<?php
namespace Chargify\Admin\Helpers;

/**
 * A function to delete all the Chargify options.
 */
function delete_settings() {
	delete_option( 'chargify_settings' );
	delete_option( 'chargify_options' );
	delete_option( 'chargify_webhooks' );
	delete_option( 'chargify_products_all' );
}
