<?php

namespace Chargify\Post_Types\Helpers;

use Chargify\Model\ChargifyProduct;
use Chargify\Model\ChargifyProductFactory;
use Chargify\Model\ChargifyProductPricePoint;
use Chargify\Model\ChargifyProductPricePointFactory;
use Chargify\Model\ChargifyComponent;
use Chargify\Model\ChargifyComponentFactory;
use Chargify\Model\ChargifyComponentPricePoint;
use Chargify\Model\ChargifyComponentPricePointFactory;

/**
 * Helper method to create product posts.
 *
 * @param array $products Formatted array of product data from chargify.
 */
function populate_product_posts( $products ) {
	// Save all the products to an option.
	update_option( 'chargify_products_all', $products, false );

	// Map the product data to our Product Custom Post type.
	foreach ( $products as $product ) {

		$product_name        = sanitize_text_field( $product['name'] );
		$product_description = wp_filter_post_kses( $product['description'] );

		$args = [
			'post_title'   => $product_name,
			'post_content' => $product_description,
		];

		// phpcs:disable
		$meta_fields = [
			ChargifyProduct::META_CHARGIFY_ID                         => absint( $product['id'] ),
			ChargifyProduct::META_CHARGIFY_NAME                       => $product_name,
			ChargifyProduct::META_CHARGIFY_HANDLE                     => sanitize_text_field( $product['handle'] ),
			ChargifyProduct::META_CHARGIFY_DESCRIPTION                => $product_description,
			ChargifyProduct::META_CHARGIFY_ACCOUNTING_CODE            => sanitize_text_field( $product['accounting_code'] ),
			ChargifyProduct::META_CHARGIFY_REQUEST_CREDIT_CARD        => intval( $product['request_credit_card'] ),
			ChargifyProduct::META_CHARGIFY_EXPIRATION_INTERVAL        => absint( $product['expiration_interval'] ),
			ChargifyProduct::META_CHARGIFY_EXPIRATION_INTERVAL_UNIT   => sanitize_text_field( $product['expiration_interval_unit'] ),
			ChargifyProduct::META_CHARGIFY_CREATED_AT                 => sanitize_text_field( $product['created_at'] ),
			ChargifyProduct::META_CHARGIFY_UPDATED_AT                 => sanitize_text_field( $product['updated_at'] ),
			ChargifyProduct::META_CHARGIFY_PRICE_IN_CENTS             => absint( $product['price_in_cents'] ),
			ChargifyProduct::META_CHARGIFY_INTERVAL                   => absint( $product['interval'] ),
			ChargifyProduct::META_CHARGIFY_INTERVAL_UNIT              => sanitize_text_field( $product['interval_unit'] ),
			ChargifyProduct::META_CHARGIFY_INITIAL_CHARGE_IN_CENTS    => absint( $product['initial_charge_in_cents'] ),
			ChargifyProduct::META_CHARGIFY_TRIAL_PRICE_IN_CENTS       => absint( $product['trial_price_in_cents'] ),
			ChargifyProduct::META_CHARGIFY_TRIAL_INTERVAL             => absint( $product['trial_interval'] ),
			ChargifyProduct::META_CHARGIFY_TRIAL_INTERVAL_UNIT        => sanitize_text_field( $product['trial_interval_unit'] ),
			ChargifyProduct::META_CHARGIFY_ARCHIVED_AT                => sanitize_text_field( $product['archived_at'] ),
			ChargifyProduct::META_CHARGIFY_REQUIRE_CREDIT_CARD        => intval( $product['require_credit_card'] ),
			ChargifyProduct::META_CHARGIFY_TAXABLE                    => intval( $product['taxable'] ),
			ChargifyProduct::META_CHARGIFY_TAX_CODE                   => sanitize_text_field( $product['tax_code'] ),
			ChargifyProduct::META_CHARGIFY_INITIAL_CHARGE_AFTER_TRIAL => intval( $product['initial_charge_after_trial'] ),
			ChargifyProduct::META_CHARGIFY_VERSION_NUMBER             => absint( $product['version_number'] ),
			ChargifyProduct::META_CHARGIFY_DEFAULT_PRICE_POINT_ID     => absint( $product['default_product_price_point_id'] ),
			ChargifyProduct::META_CHARGIFY_REQUEST_BILLING_ADDRESS    => intval( $product['request_billing_address'] ),
			ChargifyProduct::META_CHARGIFY_REQUIRE_BILLING_ADDRESS    => intval( $product['require_billing_address'] ),
			ChargifyProduct::META_CHARGIFY_REQUIRE_SHIPPING_ADDRESS   => intval( $product['require_shipping_address'] ),
			ChargifyProduct::META_CHARGIFY_FAMILY_ID                  => absint( $product['product_family']['id'] ),
			ChargifyProduct::META_CHARGIFY_FAMILY_NAME                => sanitize_text_field( $product['product_family']['name'] ),
			ChargifyProduct::META_CHARGIFY_FAMILY_HANDLE              => sanitize_text_field( $product['product_family']['handle'] ),
		];
		// phpcs:enable

		/**
		 * Variable Type definition.
		 *
		 * @var    ChargifyProduct           $product             The wrapped product object.
		 * @var    ChargifyProductPricePoint $product_price_point The wrapped product price point object.
		 */
		$product_factory = new ChargifyProductFactory();
		$product         = $product_factory->create_post( $args, $meta_fields );
	}
}

/**
 * Helper method to create price point posts.
 *
 * @param array $product_price_points Formatted array of price point data from chargify.
 */
function populate_product_price_point_posts( $product_price_points ) {

	if ( empty( $product_price_points ) ) {
		return;
	}

	$product_price_point_factory = new ChargifyProductPricePointFactory();

	foreach ( $product_price_points as $price_points ) {
		/**
		 * Variable Type definition.
		 *
		 * @var    ChargifyProduct           $product             The wrapped product object.
		 * @var    ChargifyProductPricePoint $product_price_point The wrapped product price point object.
		 */
		$product_factory = new ChargifyProductFactory();
		$product         = $product_factory->get_by_product_id( $price_points['product_id'] );

		if ( $product instanceof ChargifyProduct ) {

			$price_point_name = sanitize_text_field( $price_points['name'] );
			$post_title       = $product->get_chargify_name() . ' - ' . $price_point_name;

			$args = [
				'post_title'   => $post_title,
				'post_content' => $price_point_name,
			];

			// phpcs:disable
			$meta_fields = [
				ChargifyProductPricePoint::META_WORDPRESS_PRODUCT_ID                => $product->ID,
				ChargifyProductPricePoint::META_CHARGIFY_PRODUCT_ID                 => absint( $price_points['product_id'] ),
				ChargifyProductPricePoint::META_CHARGIFY_ID                         => absint( $price_points['id'] ),
				ChargifyProductPricePoint::META_CHARGIFY_NAME                       => $price_point_name,
				ChargifyProductPricePoint::META_CHARGIFY_HANDLE                     => sanitize_text_field( $price_points['handle'] ),
				ChargifyProductPricePoint::META_CHARGIFY_PRICE_IN_CENTS             => absint( $price_points['price_in_cents'] ),
				ChargifyProductPricePoint::META_CHARGIFY_INTERVAL                   => absint( $price_points['interval'] ),
				ChargifyProductPricePoint::META_CHARGIFY_INTERVAL_UNIT              => sanitize_text_field( $price_points['interval_unit'] ),
				ChargifyProductPricePoint::META_CHARGIFY_TRIAL_PRICE_IN_CENTS       => absint( $price_points['trial_price_in_cents'] ),
				ChargifyProductPricePoint::META_CHARGIFY_TRIAL_INTERVAL             => absint( $price_points['trial_interval'] ),
				ChargifyProductPricePoint::META_CHARGIFY_TRIAL_INTERVAL_UNIT        => sanitize_text_field( $price_points['trial_interval_unit'] ),
				ChargifyProductPricePoint::META_CHARGIFY_TRIAL_TYPE                 => sanitize_text_field( $price_points['trial_type'] ),
				ChargifyProductPricePoint::META_CHARGIFY_INTRODUCTORY_OFFER         => intval( $price_points['introductory_offer'] ),
				ChargifyProductPricePoint::META_CHARGIFY_INITIAL_CHARGE_IN_CENTS    => absint( $price_points['initial_charge_in_cents'] ),
				ChargifyProductPricePoint::META_CHARGIFY_INITIAL_CHARGE_AFTER_TRIAL => intval( $price_points['initial_charge_after_trial'] ),
				ChargifyProductPricePoint::META_CHARGIFY_EXPIRATION_INTERVAL        => absint( $price_points['expiration_interval'] ),
				ChargifyProductPricePoint::META_CHARGIFY_EXPIRATION_INTERVAL_UNIT   => sanitize_text_field( $price_points['expiration_interval_unit'] ),
				ChargifyProductPricePoint::META_CHARGIFY_ARCHIVED_AT                => sanitize_text_field( $price_points['archived_at'] ),
				ChargifyProductPricePoint::META_CHARGIFY_CREATED_AT                 => sanitize_text_field( $price_points['created_at'] ),
				ChargifyProductPricePoint::META_CHARGIFY_UPDATED_AT                 => sanitize_text_field( $price_points['updated_at'] ),
			];
			// phpcs:enable

			// Create the price point post, adding meta.
			$product_price_point = $product_price_point_factory->create_post( $args, $meta_fields );

			// Update the product meta, with the new price point.
			if ( $product_price_point instanceof ChargifyProductPricePoint ) {
				$product->set_meta( ChargifyProduct::META_CHARGIFY_PRICE_POINT_ID, $product_price_point->get_chargify_id() );
				$product->set_meta( ChargifyProduct::META_WORDPRESS_PRICE_POINT_ID, $product_price_point->ID );
			}
		}
	}
}

/**
 * TODO Component Revise.
 *
 * @param $components
 */
function populate_component_posts( $components ) {

	// Save all the components to an option.
	update_option( 'chargify_components_all', $components, false );

	// Map the product data to our Product Custom Post type.
	foreach ( $components as $component ) {

		$component_name        = sanitize_text_field( $component['name'] );
		$component_description = wp_filter_post_kses( $component['description'] );

		$args = [
			'post_title'   => $component_name,
			'post_content' => $component_description,
		];

		// phpcs:disable
		$meta_fields = [
			chargifyComponent::META_CHARGIFY_ID                       => absint( $component['id'] ),
			chargifyComponent::META_CHARGIFY_NAME                     => $component_name,
			chargifyComponent::META_CHARGIFY_HANDLE                   => sanitize_text_field( $component['handle'] ),
			chargifyComponent::META_CHARGIFY_DESCRIPTION              => $component_description,
			chargifyComponent::META_CHARGIFY_PRICE_SCHEMA             => sanitize_text_field( $component['pricing_scheme'] ),
			chargifyComponent::META_CHARGIFY_UNIT_NAME                => sanitize_text_field( $component['unit_name'] ),
			chargifyComponent::META_CHARGIFY_UNIT_PRICE               => sanitize_text_field( $component['unit_price'] ),
			chargifyComponent::META_CHARGIFY_PRICE_PER_UNIT_IN_CENTS  => absint( $component['price_per_unit_in_cents'] ),
			chargifyComponent::META_CHARGIFY_KIND                     => sanitize_text_field( $component['kind'] ),
			chargifyComponent::META_CHARGIFY_ARCHIVED                 => sanitize_text_field( $component['archived'] ),
			chargifyComponent::META_CHARGIFY_TAXABLE                  => intval( $component['taxable'] ),
			chargifyComponent::META_CHARGIFY_DEFAULT_PRICE_POINT_ID   => absint( $component['default_price_point_id'] ),
			chargifyComponent::META_CHARGIFY_DEFAULT_PRICE_POINT_NAME => absint( $component['default_price_point_name'] ),
			chargifyComponent::META_CHARGIFY_PRICE_POINT_COUNT        => absint( $component['price_point_count'] ),
			chargifyComponent::META_CHARGIFY_TAX_CODE                 => sanitize_text_field( $component['tax_code'] ),
			chargifyComponent::META_CHARGIFY_RECURRING                => sanitize_text_field( $component['recurring'] ),
			chargifyComponent::META_CHARGIFY_UPGRADE_CHARGE           => sanitize_text_field( $component['upgrade_charge'] ),
			chargifyComponent::META_CHARGIFY_DOWNGRADE_CREDIT         => sanitize_text_field( $component['downgrade_credit'] ),
			chargifyComponent::META_CHARGIFY_CREATED_AT               => sanitize_text_field( $component['created_at'] ),
			chargifyComponent::META_CHARGIFY_PRICES                   => $component['prices'], // TODO Components.
			ChargifyComponent::META_CHARGIFY_FAMILY_ID                => absint( $component['product_family_id'] ),
			ChargifyComponent::META_CHARGIFY_FAMILY_NAME              => sanitize_text_field( $component['product_family_name'] ),
		];
		// phpcs:enable

		/**
		 * Variable Type definition.
		 *
		 * @var    ChargifyComponent           $component             The wrapped component object.
		 * @var    ChargifyComponentPricePoint $component_price_point The wrapped component price point object.
		 */
		$component_factory = new ChargifyComponentFactory();
		$component         = $component_factory->create_post( $args, $meta_fields );
	}

}

/**
 * TODO Component Price Point.
 *
 * @param $component_price_points
 */
function populate_component_price_point_posts( $component_price_points ) {

	if ( empty( $component_price_points ) ) {
		return;
	}

	$component_price_point_factory = new ChargifyComponentPricePointFactory();

	foreach ( $component_price_points as $price_point ) {
		/**
		 * Variable Type definition.
		 *
		 * @var    ChargifyComponent           $component             The wrapped component object.
		 * @var    ChargifyComponentPricePoint $component_price_point The wrapped component price point object.
		 */
		$component_factory = new ChargifyComponentFactory();
		$component         = $component_factory->get_by_component_id( $price_point['component_id'] );

		if ( $component instanceof ChargifyComponent ) {

			$price_point_name = sanitize_text_field( $price_point['name'] );
			$post_title       = $component->get_chargify_name() . ' - ' . $price_point_name;

			$args = [
				'post_title'   => $post_title,
				'post_content' => $price_point_name,
			];

			// phpcs:disable
			$meta_fields = [
				ChargifyComponentPricePoint::META_WORDPRESS_COMPONENT_ID => $component->ID,
				ChargifyComponentPricePoint::META_CHARGIFY_COMPONENT_ID  => absint( $price_point['component_id'] ),
				ChargifyComponentPricePoint::META_CHARGIFY_ID            => absint( $price_point['id'] ),
				ChargifyComponentPricePoint::META_CHARGIFY_NAME          => $price_point_name,
				ChargifyComponentPricePoint::META_CHARGIFY_HANDLE        => sanitize_text_field( $price_point['handle'] ),
				ChargifyComponentPricePoint::META_CHARGIFY_DEFAULT       => intval( $price_point['default'] ),
				ChargifyComponentPricePoint::META_CHARGIFY_PRICE_SCHEMA  => sanitize_text_field( $price_point['pricing_scheme'] ),
				ChargifyComponentPricePoint::META_CHARGIFY_ARCHIVED_AT   => sanitize_text_field( $price_point['archived_at'] ),
				ChargifyComponentPricePoint::META_CHARGIFY_CREATED_AT    => sanitize_text_field( $price_point['created_at'] ),
				ChargifyComponentPricePoint::META_CHARGIFY_UPDATED_AT    => sanitize_text_field( $price_point['updated_at'] ),
				ChargifyComponentPricePoint::META_CHARGIFY_PRICES        => $price_point['prices'],
			];
			// phpcs:enable

			// Create the price point post, adding meta.
			$component_price_point = $component_price_point_factory->create_post( $args, $meta_fields );

			// Update the component meta, with the new price point.
			if ( $component_price_point instanceof ChargifyComponentPricePoint ) {
				$component->set_meta( ChargifyComponent::META_CHARGIFY_PRICE_POINT_ID, $component_price_point->get_chargify_id() );
				$component->set_meta( ChargifyComponent::META_WORDPRESS_PRICE_POINT_ID, $component_price_point->ID );
			}
		}
	}
}
