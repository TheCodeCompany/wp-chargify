<?php
namespace Chargify\Admin;
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
		'id'              => 'chargify_resync_products',
		'type'            => 'checkbox',
		'sanitization_cb' => 'Chargify\\Post_Types\\Helpers\\resync_products',
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
		'name'       =>  __( 'Production subdomain:', 'chargify' ),
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
		'name'       =>  __( 'Test subdomain:', 'chargify' ),
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
		'default' => 'test',
	] );

}
