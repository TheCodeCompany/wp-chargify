<?php
namespace Chargify\Admin;
use Chargify\Helpers\Options;

/**
 * Hook in and register a metabox to handle a the Chargify options page.
 */
function register_chargify_options_metabox() {

	# Allow developers to hide the options page.
	$hide_options = apply_filters( 'chargify_hide_options', false );

	if ( true === $hide_options ) {
		return;
	}

	/**
	 * Register the Chargify options page.
	 */
	$args = [
		'id'           => 'chargify_options_page',
		'title'        => __( 'Chargify Options', 'chargify' ),
		'object_types' => [ 'options-page' ],
		'option_key'   => 'chargify_options',
		'tab_group'    => 'chargify_options',
		'tab_title'    => __( 'Products', 'chargify' ),
		'icon_url'     => 'dashicons-products',
		'message_cb'   => 'Chargify\\Post_Types\\Helpers\\sync_message',
	];

	$products_options = new_cmb2_box( $args );

	$products_options->add_field( [
		'name' => __( 'Chargify Products', 'chargify' ),
		'desc' => __( 'Select the Chargify Products you want to import below.', 'chargify' ),
		'type' => 'title',
		'id'   => 'chargify_products_title'
	] );

	$products_options->add_field( [
		'name'       => __( 'Chargify Products', 'chargify' ),
		'desc'       => __( 'Select the Chargify Products you\'d like to use in WordPress', 'chargify' ),
		'id'         => 'chargify_products_multicheck',
		'type'       => 'multicheck',
		'options_cb' => 'Chargify\\Post_Types\\Helpers\\get_product_values',
	] );

	$products_options->add_field([
		'name'            => __( 'Resync Products', 'chargify' ),
		'desc'            => __( 'Select this checkbox and click "Save Changes" to trigger a resync of your Chargify products.' ),
		'id'              => 'chargify_resync_chargify',
		'type'            => 'checkbox',
	]);

	/**
	 * Registers the Settings options.
	 */
	$args = [
		'id'           => 'settings_page',
		'title'        => __( 'Settings', 'chargify' ),
		'object_types' => [ 'options-page' ],
		'option_key'   => 'chargify_settings',
		'parent_slug'  => 'chargify_options',
		'tab_group'    => 'chargify_options',
		'tab_title'    => __( 'Settings', 'chargify' ),
	];

	$settings_options = new_cmb2_box( $args );

	$settings_options->add_field( [
		'name' => __( 'Chargify Settings', 'chargify' ),
		'desc' => __( 'Login to your Chargify account to locate these settings.', 'chargify' ),
		'type' => 'title',
		'id'   => 'chargify_products_title'
	] );

	$settings_options->add_field( [
		'name' =>  __( 'Production API Key:', 'chargify' ),
		'id'   => 'chargify_production_API_key',
		'type' => 'text',
	] );

	$settings_options->add_field( [
		'name'       =>  __( 'Production Subdomain:', 'chargify' ),
		'id'         => 'chargify_production_subdomain',
		'attributes' => [
			'class'       => 'cmb2-text-url regular-text',
			'placeholder' => 'https://productionsubdomain.chargify.com',
		],
		'type'       => 'text_url',
		'protocols'  => [ 'http', 'https' ],
	] );

	$settings_options->add_field( [
		'name' =>  __( 'Production Shared Key:', 'chargify' ),
		'id'   => 'chargify_production_shared_key',
		'type' => 'text',
	] );

	$settings_options->add_field( [
		'name' =>  __( 'Test API Key:', 'chargify' ),
		'id'   => 'chargify_test_API_key',
		'type' => 'text',
	] );

	$settings_options->add_field( [
		'name'       =>  __( 'Test Subdomain:', 'chargify' ),
		'id'         => 'chargify_test_subdomain',
		'attributes' => [
			'class'       => 'cmb2-text-url regular-text',
			'placeholder' => 'https://testsubdomain.chargify.com',
		],
		'type'       => 'text_url',
		'protocols'  => [ 'http', 'https' ],
	] );

	$settings_options->add_field( [
		'name' =>  __( 'Test Shared Key:', 'chargify' ),
		'id'   => 'chargify_test_shared_key',
		'type' => 'text',
	] );

	$settings_options->add_field( [
		'name'    => __( 'Mode:', 'chargify' ),
		'id'      => 'chargify_mode',
		'type'    => 'radio_inline',
		'options' => [
			'test' => __( 'Test', 'chargify' ),
			'live' => __( 'Live', 'chargify' ),
		],
	] );

	/**
	 * Registers the Webhook options.
	 */
	$args = [
		'id'           => 'webhooks_page',
		'title'        => __( 'Webhooks', 'chargify' ),
		'object_types' => [ 'options-page' ],
		'option_key'   => 'chargify_webhooks',
		'parent_slug'  => 'chargify_options',
		'tab_group'    => 'chargify_options',
		'tab_title'    => __( 'Webhooks', 'chargify' ),
	];

	$webhooks_options = new_cmb2_box( $args );

	$url = Options\get_webhook_url();

	$webhooks_options->add_field( [
		'name' => __( 'Webhooks Settings', 'chargify' ),
		'desc' => __( "Your current webhook URL is: ${url}.", 'chargify' ),
		'type' => 'title',
		'id'   => 'chargify_products_title'
	] );

	$webhooks_options->add_field( [
		'name'       => __( 'Webhooks', 'chargify' ),
		'desc'       => __( 'Select the Chargify webhooks you\'d like to listen for in WordPress', 'chargify' ),
		'id'         => 'chargify_webhooks_multicheck',
		'type'       => 'multicheck',
		'options' => [
			'billing_date_change'         => '<code>billing_date_change</code>',
			'component_allocation_change' => '<code>component_allocation_change</code>',
			'customer_create'             => '<code>customer_create</code>',
			'customer_update'             => '<code>customer_update</code>',
			'dunning_step_reached'        => '<code>dunning_step_reached</code>',
			'expiration_date_change'      => '<code>expiration_date_change</code>',
			'expiring_card'               => '<code>expiring_card</code>',
			'invoice_issued'              => '<code>invoice_issued</code>',
			'metered_usage'               => '<code>metered_usage</code>',
			'payment_failure'             => '<code>payment_failure</code>',
			'payment_success'             => '<code>payment_success</code>',
			'prepaid_usage'               => '<code>prepaid_usage</code>',
			'renewal_failure'             => '<code>renewal_failure</code>',
			'renewal_success'             => '<code>renewal_success</code>',
			'signup_success'              => '<code>signup_success</code>',
			'signup_failure'              => '<code>signup_failure</code>',
			'subscription_card_update'    => '<code>subscription_card_update</code>',
			'subscription_product_change' => '<code>subscription_product_change</code>',
			'subscription_state_change'   => '<code>subscription_state_change</code>',
			'upcoming_renewal_notice'     => '<code>upcoming_renewal_notice</code>',
			'upgrade_downgrade_failure'   => '<code>upgrade_downgrade_failure</code>',
			'upgrade_downgrade_success'   => '<code>upgrade_downgrade_success</code>',
			'pending_cancellation_change' => '<code>pending_cancellation_change</code>',
		],
		'default_cb' => __NAMESPACE__ . '\\set_default_webhooks',
	] );

	$webhooks_options->add_field( [
		'name'    => __( 'Webhooks:', 'chargify' ),
		'id'      => 'chargify_webhook_status',
		'type'    => 'radio_inline',
		'options' => [
			'true'  => __( 'Enabled', 'chargify' ),
			'false' => __( 'Disabled', 'chargify' ),
		],
		'default_cb' => __NAMESPACE__ . '\\get_webhook_default',
	] );

}

/**
 * A function to return the default Webhook option
 *
 * @return string
 */
function get_webhook_default() {
	return 'false';
}

/**
 * Set the default webhooks we expect to receive when the plugin is active.
 *
 * @return array
 */
function set_default_webhooks() {
	return [
		'customer_update',
		'customer_create',
		'signup_success',
		'renewal_success',
		'expiration_date_change',
		'renewal_failure',
		'subscription_product_change'
	];
}
