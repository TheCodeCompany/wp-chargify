<?php
/**
 * The Component model.
 *
 * @file    wp-chargify/includes/model/chargify-component.php
 * @package WPChargify
 */

namespace Chargify\Model;

use Chargify\Libraries\Generic_Post;
use WP_Post;

/**
 * The Component Model.
 */
class Chargify_Component extends Generic_Post {

	const POST_TYPE = 'chargify_price_point';
	const CPT       = self::POST_TYPE;

	// Linking Meta.
	const META_CHARGIFY_PRICE_POINT_ID  = 'chargify_price_point_id'; // The Chargify Product Price Point ID. Not Unique.
	const META_WORDPRESS_PRICE_POINT_ID = 'wordpress_price_point_id'; // The WordPress Product Price Point ID. Not Unique.

	// Product Family Meta.
	const META_CHARGIFY_FAMILY_ID   = 'chargify_family_id';
	const META_CHARGIFY_FAMILY_NAME = 'chargify_family_name';

	// General Chargify Meta.
	const META_CHARGIFY_ID                       = 'chargify_id';
	const META_CHARGIFY_NAME                     = 'chargify_name';
	const META_CHARGIFY_HANDLE                   = 'chargify_handle';
	const META_CHARGIFY_DESCRIPTION              = 'chargify_description';
	const META_CHARGIFY_PRICE_SCHEMA             = 'chargify_pricing_scheme';
	const META_CHARGIFY_UNIT_NAME                = 'chargify_unit_name';
	const META_CHARGIFY_UNIT_PRICE               = 'chargify_unit_price';
	const META_CHARGIFY_PRICE_PER_UNIT_IN_CENTS  = 'chargify_price_per_unit_in_cents';
	const META_CHARGIFY_KIND                     = 'chargify_kind';
	const META_CHARGIFY_ARCHIVED                 = 'chargify_archived';
	const META_CHARGIFY_TAXABLE                  = 'chargify_taxable';
	const META_CHARGIFY_DEFAULT_PRICE_POINT_ID   = 'chargify_default_price_point_id';
	const META_CHARGIFY_DEFAULT_PRICE_POINT_NAME = 'chargify_default_price_point_name';
	const META_CHARGIFY_PRICE_POINT_COUNT        = 'chargify_price_point_count';
	const META_CHARGIFY_TAX_CODE                 = 'chargify_tax_code';
	const META_CHARGIFY_RECURRING                = 'chargify_recurring';
	const META_CHARGIFY_UPGRADE_CHARGE           = 'chargify_upgrade_charge';
	const META_CHARGIFY_DOWNGRADE_CREDIT         = 'chargify_downgrade_credit';
	const META_CHARGIFY_CREATED_AT               = 'chargify_created_at';
	const META_CHARGIFY_PRICES                   = 'chargify_prices';

	// TODO Getters.

}
