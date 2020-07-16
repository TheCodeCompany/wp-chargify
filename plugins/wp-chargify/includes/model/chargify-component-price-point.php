<?php
/**
 * The Component Price Point model.
 *
 * @file    wp-chargify/includes/model/chargify-component-price-point.php
 * @package WPChargify
 */

namespace Chargify\Model;

use Chargify\Libraries\Generic_Post;
use WP_Post;

/**
 * The Component Price Point Model.
 */
class Chargify_Component_Price_Point extends Generic_Post {

	const POST_TYPE = 'chargify_comp_pp';
	const CPT       = self::POST_TYPE;

	// Linking Meta.
	const META_CHARGIFY_COMPONENT_ID  = 'chargify_component_id'; // The Chargify Component ID.
	const META_WORDPRESS_COMPONENT_ID = 'wordpress_component_id'; // The WordPress Component ID.

	// General Chargify Meta.
	const META_CHARGIFY_ID           = 'chargify_id';
	const META_CHARGIFY_NAME         = 'chargify_name';
	const META_CHARGIFY_HANDLE       = 'chargify_handle';
	const META_CHARGIFY_DEFAULT      = 'chargify_default';
	const META_CHARGIFY_PRICE_SCHEMA = 'chargify_pricing_scheme';
	const META_CHARGIFY_ARCHIVED_AT  = 'chargify_archived_at';
	const META_CHARGIFY_CREATED_AT   = 'chargify_created_at';
	const META_CHARGIFY_UPDATED_AT   = 'chargify_updated_at';
	const META_CHARGIFY_PRICES       = 'chargify_prices';
	/**
	 * Prices array such as
	 * id
	 * component_id
	 * starting_quantity
	 * ending_quantity
	 * unit_price
	 */

	// TODO Getters.

}
