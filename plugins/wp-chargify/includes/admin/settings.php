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

	/**
	 * A placeholder for when we add the Products options later.
	 */
	$products_options->add_field( [
		'name' => __( 'Chargify Products', 'chargify' ),
		'desc' => __( 'Select the Chargify Products you want to import below.', 'chargify' ),
		'type' => 'title',
		'id'   => 'chargify_products_title'
	] );

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
		'name' =>  __( 'Production API Key:', 'chargify' ),
		'id'   => 'chargify_production_API_key',
		'type' => 'text',
	] );

	$settings_options->add_field( [
		'name'       =>  __( 'Production subdomain:', 'chargify' ),
		'id'         => 'chargify_production_subdomain',
		'default'    => 'https://productionsubdomain.chargify.com',
		'attributes' => [
			'class' => 'cmb2-text-url regular-text',
		],
		'type'       => 'text_url',
		'protocols'  => [ 'http', 'https' ],
	] );

	$settings_options->add_field( [
		'name' =>  __( 'Test API Key:', 'chargify' ),
		'id'   => 'chargify_test_API_key',
		'type' => 'text',
	] );

	$settings_options->add_field( [
		'name'       =>  __( 'Test subdomain:', 'chargify' ),
		'id'         => 'chargify_test_subdomain',
		'default'    => 'https://testsubdomain.chargify.com',
		'attributes' => [
			'class' => 'cmb2-text-url regular-text',
		],
		'type'       => 'text_url',
		'protocols'  => [ 'http', 'https' ],
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
