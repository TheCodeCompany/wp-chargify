<?php
/**
 * The Product model.
 *
 * @file    wp-chargify/includes/model/chargify-product.php
 * @package WPChargify
 */

namespace Chargify\Model;

use Chargify\Libraries\GenericPost;
use WP_Post;

/**
 * The Product Model.
 */
class ChargifyProduct extends GenericPost {

	const POST_TYPE = 'chargify_product';
	const CPT       = self::POST_TYPE;

	// Linking Meta.
	const META_CHARGIFY_PRICE_POINT_ID  = 'chargify_price_point_id'; // The Chargify Product Price Point ID. Not Unique.
	const META_WORDPRESS_PRICE_POINT_ID = 'wordpress_price_point_id'; // The WordPress Product Price Point ID. Not Unique.

	// Product Family Meta.
	const META_CHARGIFY_FAMILY_ID     = 'chargify_family_id';
	const META_CHARGIFY_FAMILY_NAME   = 'chargify_family_name';
	const META_CHARGIFY_FAMILY_HANDLE = 'chargify_family_handle';

	// General Chargify Meta.
	const META_CHARGIFY_ID                         = 'chargify_id';
	const META_CHARGIFY_NAME                       = 'chargify_name';
	const META_CHARGIFY_HANDLE                     = 'chargify_handle';
	const META_CHARGIFY_DESCRIPTION                = 'chargify_description';
	const META_CHARGIFY_ACCOUNTING_CODE            = 'chargify_accounting_code';
	const META_CHARGIFY_REQUEST_CREDIT_CARD        = 'chargify_request_credit_card';
	const META_CHARGIFY_EXPIRATION_INTERVAL        = 'chargify_expiration_interval';
	const META_CHARGIFY_EXPIRATION_INTERVAL_UNIT   = 'chargify_expiration_interval_unit';
	const META_CHARGIFY_CREATED_AT                 = 'chargify_created_at';
	const META_CHARGIFY_UPDATED_AT                 = 'chargify_updated_at';
	const META_CHARGIFY_PRICE_IN_CENTS             = 'chargify_price_in_cents';
	const META_CHARGIFY_INTERVAL                   = 'chargify_interval';
	const META_CHARGIFY_INTERVAL_UNIT              = 'chargify_interval_unit';
	const META_CHARGIFY_INITIAL_CHARGE_IN_CENTS    = 'chargify_initial_charge_in_cents';
	const META_CHARGIFY_TRIAL_PRICE_IN_CENTS       = 'chargify_trial_price_in_cents';
	const META_CHARGIFY_TRIAL_INTERVAL             = 'chargify_trial_interval';
	const META_CHARGIFY_TRIAL_INTERVAL_UNIT        = 'chargify_trial_interval_unit';
	const META_CHARGIFY_ARCHIVED_AT                = 'chargify_archived_at';
	const META_CHARGIFY_REQUIRE_CREDIT_CARD        = 'chargify_require_credit_card';
	const META_CHARGIFY_TAXABLE                    = 'chargify_taxable';
	const META_CHARGIFY_TAX_CODE                   = 'chargify_tax_code';
	const META_CHARGIFY_INITIAL_CHARGE_AFTER_TRIAL = 'chargify_initial_charge_after_trial';
	const META_CHARGIFY_VERSION_NUMBER             = 'chargify_version_number';
	const META_CHARGIFY_DEFAULT_PRICE_POINT_ID     = 'chargify_default_price_point_id';
	const META_CHARGIFY_REQUEST_BILLING_ADDRESS    = 'chargify_request_billing_address';
	const META_CHARGIFY_REQUIRE_BILLING_ADDRESS    = 'chargify_require_billing_address';
	const META_CHARGIFY_REQUIRE_SHIPPING_ADDRESS   = 'chargify_require_shipping_address';

	/**
	 * The product price point Chargify ID.
	 * Not Unique.
	 *
	 * @var null|int
	 */
	protected $chargify_price_point_id = null;

	/**
	 * The product price point WordPress ID.
	 * Not Unique.
	 *
	 * @var null|int
	 */
	protected $wordpress_price_point_id = null;

	// Product Family Meta.

	/**
	 * The product family Chargify ID.
	 *
	 * @var null|int
	 */
	protected $chargify_family_id = null;

	/**
	 * The product family name.
	 *
	 * @var null|string
	 */
	protected $chargify_family_name = null;

	/**
	 * The product family handle.
	 *
	 * @var null|string
	 */
	protected $chargify_family_handle = null;

	/**
	 * The product ID.
	 *
	 * @var null|int
	 */
	protected $chargify_id = null;

	/**
	 * The product name.
	 *
	 * @var null|string
	 */
	protected $chargify_name = null;

	/**
	 * The product handle.
	 *
	 * @var null|string
	 */
	protected $chargify_handle = null;

	/**
	 * The product description.
	 *
	 * @var null|string
	 */
	protected $chargify_description = null;

	/**
	 * The product account code.
	 *
	 * @var null|string
	 */
	protected $chargify_accounting_code = null;

	/**
	 * The product request credit card.
	 *
	 * @var null|bool
	 */
	protected $chargify_request_credit_card = null;


	/**
	 * The product expiration interval.
	 *
	 * @var null|int
	 */
	protected $chargify_expiration_interval = null;

	/**
	 * The product expiration interval unit. e.g 'never', 'month'.
	 *
	 * @var null|string
	 */
	protected $chargify_expiration_interval_unit = null;

	/**
	 * The product created at. Date format stored as "ISO 8601 date format", as per Chargify format.
	 *
	 * @var null|string
	 */
	protected $chargify_created_at = null;

	/**
	 * The product updated at. Date format stored as "ISO 8601 date format", as per Chargify format.
	 *
	 * @var null|string
	 */
	protected $chargify_updated_at = null;

	/**
	 * The product price in cents.
	 *
	 * @var null|int
	 */
	protected $chargify_price_in_cents = null;

	/**
	 * The product interval.
	 *
	 * @var null|int
	 */
	protected $chargify_interval = null;

	/**
	 * The product interval unit. e.g. 'month'.
	 *
	 * @var null|string
	 */
	protected $chargify_interval_unit = null;

	/**
	 * The product initial charge in cents.
	 *
	 * @var null|int
	 */
	protected $chargify_initial_charge_in_cents = null;

	/**
	 * The product trial price in cents.
	 *
	 * @var null|int
	 */
	protected $chargify_trial_price_in_cents = null;

	/**
	 * The product trial interval.
	 *
	 * @var null|int
	 */
	protected $chargify_trial_interval = null;

	/**
	 * The product trial interval unit. e.g. 'month'.
	 *
	 * @var null|string
	 */
	protected $chargify_trial_interval_unit = null;

	/**
	 * The product archived at. Date format stored as "ISO 8601 date format", as per Chargify format.
	 *
	 * @var null|string
	 */
	protected $chargify_archived_at = null;

	/**
	 * The product required credit card.
	 *
	 * @var null|bool
	 */
	protected $chargify_require_credit_card = null;

	/**
	 * The product taxable.
	 *
	 * @var null|bool
	 */
	protected $chargify_taxable = null;

	/**
	 * The product tax code.
	 *
	 * @var null|string
	 */
	protected $chargify_tax_code = null;

	/**
	 * The product initial charge after trial.
	 *
	 * @var null|bool
	 */
	protected $chargify_initial_charge_after_trial = null;

	/**
	 * The product version number.
	 *
	 * @var null|int
	 */
	protected $chargify_version_number = null;


	/**
	 * The product default product price point ID.
	 *
	 * @var null|string
	 */
	protected $chargify_default_price_point_id = null;

	/**
	 * The product request billing address.
	 *
	 * @var null|bool
	 */
	protected $chargify_request_billing_address = null;

	/**
	 * The product require billing address.
	 *
	 * @var null|bool
	 */
	protected $chargify_require_billing_address = null;

	/**
	 * The product require shipping address.
	 *
	 * @var null|string
	 */
	protected $chargify_require_shipping_address = null;

	/**
	 * =========================================================================
	 * Getters
	 * -------------------------------------------------------------------------
	 */

	/**
	 * Get the product price point Chargify ID.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|int
	 */
	public function get_chargify_price_point_id( $new_fetch = false ) {

		if ( null === $this->chargify_price_point_id || $new_fetch ) {
			$this->chargify_price_point_id = (int) $this->get_meta( self::META_CHARGIFY_PRICE_POINT_ID );
		}

		return $this->chargify_price_point_id;
	}

	/**
	 * Get the product price point WordPress ID.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|int
	 */
	public function get_wordpress_price_point_id( $new_fetch = false ) {

		if ( null === $this->wordpress_price_point_id || $new_fetch ) {
			$this->wordpress_price_point_id = (int) $this->get_meta( self::META_WORDPRESS_PRICE_POINT_ID );
		}

		return $this->wordpress_price_point_id;
	}

	/**
	 * Get the product family ID.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|int
	 */
	public function get_chargify_family_id( $new_fetch = false ) {

		if ( null === $this->chargify_family_id || $new_fetch ) {
			$this->chargify_family_id = (int) $this->get_meta( self::META_CHARGIFY_FAMILY_ID );
		}

		return $this->chargify_family_id;
	}

	/**
	 * Get the product family name.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|string
	 */
	public function get_chargify_family_name( $new_fetch = false ) {

		if ( null === $this->chargify_family_name || $new_fetch ) {
			$this->chargify_family_name = $this->get_meta( self::META_CHARGIFY_FAMILY_NAME );
		}

		return $this->chargify_family_name;
	}

	/**
	 * Get the product family handle.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|string
	 */
	public function get_chargify_family_handle( $new_fetch = false ) {

		if ( null === $this->chargify_family_handle || $new_fetch ) {
			$this->chargify_family_handle = $this->get_meta( self::META_CHARGIFY_FAMILY_HANDLE );
		}

		return $this->chargify_family_handle;
	}

	/**
	 * Get the product ID.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|int
	 */
	public function get_chargify_id( $new_fetch = false ) {

		if ( null === $this->chargify_id || $new_fetch ) {
			$this->chargify_id = (int) $this->get_meta( self::META_CHARGIFY_ID );
		}

		return $this->chargify_id;
	}

	/**
	 * Get the product name.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|int
	 */
	public function get_chargify_name( $new_fetch = false ) {

		if ( null === $this->chargify_name || $new_fetch ) {
			$this->chargify_name = $this->get_meta( self::META_CHARGIFY_NAME );
		}

		return $this->chargify_name;
	}

	/**
	 * Get the product handle.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|string
	 */
	public function get_chargify_handle( $new_fetch = false ) {

		if ( null === $this->chargify_handle || $new_fetch ) {
			$this->chargify_handle = $this->get_meta( self::META_CHARGIFY_HANDLE );
		}

		return $this->chargify_handle;
	}

	/**
	 * Get the product description.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|string
	 */
	public function get_chargify_description( $new_fetch = false ) {

		if ( null === $this->chargify_description || $new_fetch ) {
			$this->chargify_description = $this->get_meta( self::META_CHARGIFY_DESCRIPTION );
		}

		return $this->chargify_description;
	}

	/**
	 * Get the product accounting code.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|string
	 */
	public function get_chargify_accounting_code( $new_fetch = false ) {

		if ( null === $this->chargify_accounting_code || $new_fetch ) {
			$this->chargify_accounting_code = $this->get_meta( self::META_CHARGIFY_ACCOUNTING_CODE );
		}

		return $this->chargify_accounting_code;
	}

	/**
	 * Get the product request credit card.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|bool
	 */
	public function get_chargify_request_credit_card( $new_fetch = false ) {

		if ( null === $this->chargify_request_credit_card || $new_fetch ) {
			$this->chargify_request_credit_card = (bool) $this->get_meta( self::META_CHARGIFY_REQUEST_CREDIT_CARD );
		}

		return $this->chargify_request_credit_card;
	}

	/**
	 * Get the product expiration interval.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|int
	 */
	public function get_chargify_expiration_interval( $new_fetch = false ) {

		if ( null === $this->chargify_expiration_interval || $new_fetch ) {
			$this->chargify_expiration_interval = (int) $this->get_meta( self::META_CHARGIFY_EXPIRATION_INTERVAL );
		}

		return $this->chargify_expiration_interval;
	}

	/**
	 * Get the product expiration interval unit.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|string
	 */
	public function get_chargify_expiration_interval_unit( $new_fetch = false ) {

		if ( null === $this->chargify_expiration_interval_unit || $new_fetch ) {
			$this->chargify_expiration_interval_unit = $this->get_meta( self::META_CHARGIFY_EXPIRATION_INTERVAL_UNIT );
		}

		return $this->chargify_expiration_interval_unit;
	}

	/**
	 * Get the product created at.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|string
	 */
	public function get_chargify_created_at( $new_fetch = false ) {

		if ( null === $this->chargify_created_at || $new_fetch ) {
			$this->chargify_created_at = $this->get_meta( self::META_CHARGIFY_CREATED_AT );
		}

		return $this->chargify_created_at;
	}

	/**
	 * Get the product updated at.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|string
	 */
	public function get_chargify_updated_at( $new_fetch = false ) {

		if ( null === $this->chargify_updated_at || $new_fetch ) {
			$this->chargify_updated_at = $this->get_meta( self::META_CHARGIFY_UPDATED_AT );
		}

		return $this->chargify_updated_at;
	}

	/**
	 * Get the product price in cents.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|string
	 */
	public function get_chargify_price_in_cents( $new_fetch = false ) {

		if ( null === $this->chargify_price_in_cents || $new_fetch ) {
			$this->chargify_price_in_cents = $this->get_meta( self::META_CHARGIFY_PRICE_IN_CENTS );
		}

		return $this->chargify_price_in_cents;
	}

	/**
	 * Get the product interval.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|int
	 */
	public function get_chargify_interval( $new_fetch = false ) {

		if ( null === $this->chargify_interval || $new_fetch ) {
			$this->chargify_interval = $this->get_meta( self::META_CHARGIFY_INTERVAL );
		}

		return $this->chargify_interval;
	}

	/**
	 * Get the product interval unit.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|string
	 */
	public function get_chargify_interval_unit( $new_fetch = false ) {

		if ( null === $this->chargify_interval_unit || $new_fetch ) {
			$this->chargify_interval_unit = $this->get_meta( self::META_CHARGIFY_INTERVAL_UNIT );
		}

		return $this->chargify_interval_unit;
	}

	/**
	 * Get the product initial charge in cents.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|int
	 */
	public function get_chargify_initial_charge_in_cents( $new_fetch = false ) {

		if ( null === $this->chargify_initial_charge_in_cents || $new_fetch ) {
			$this->chargify_initial_charge_in_cents = $this->get_meta( self::META_CHARGIFY_INITIAL_CHARGE_IN_CENTS );
		}

		return $this->chargify_initial_charge_in_cents;
	}

	/**
	 * Get the product trial_price_in_cents.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|int
	 */
	public function get_chargify_trial_price_in_cents( $new_fetch = false ) {

		if ( null === $this->chargify_trial_price_in_cents || $new_fetch ) {
			$this->chargify_trial_price_in_cents = $this->get_meta( self::META_CHARGIFY_TRIAL_PRICE_IN_CENTS );
		}

		return $this->chargify_trial_price_in_cents;
	}

	/**
	 * Get the product trial_interval.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|int
	 */
	public function get_chargify_trial_interval( $new_fetch = false ) {

		if ( null === $this->chargify_trial_interval || $new_fetch ) {
			$this->chargify_trial_interval = $this->get_meta( self::META_CHARGIFY_TRIAL_INTERVAL );
		}

		return $this->chargify_trial_interval;
	}

	/**
	 * Get the product trial_interval_unit. e.g. 'month'
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|string
	 */
	public function get_chargify_trial_interval_unit( $new_fetch = false ) {

		if ( null === $this->chargify_trial_interval_unit || $new_fetch ) {
			$this->chargify_trial_interval_unit = $this->get_meta( self::META_CHARGIFY_TRIAL_INTERVAL_UNIT );
		}

		return $this->chargify_trial_interval_unit;
	}

	/**
	 * Get the product archived at.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|string
	 */
	public function get_chargify_archived_at( $new_fetch = false ) {

		if ( null === $this->chargify_archived_at || $new_fetch ) {
			$this->chargify_archived_at = $this->get_meta( self::META_CHARGIFY_ARCHIVED_AT );
		}

		return $this->chargify_archived_at;
	}

	/**
	 * Get the product require_credit_card.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|bool
	 */
	public function get_chargify_require_credit_card( $new_fetch = false ) {

		if ( null === $this->chargify_require_credit_card || $new_fetch ) {
			$this->chargify_require_credit_card = (bool) $this->get_meta( self::META_CHARGIFY_REQUIRE_CREDIT_CARD );
		}

		return $this->chargify_require_credit_card;
	}

	/**
	 * Get the product taxable.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|bool
	 */
	public function get_chargify_taxable( $new_fetch = false ) {

		if ( null === $this->chargify_taxable || $new_fetch ) {
			$this->chargify_taxable = (bool) $this->get_meta( self::META_CHARGIFY_TAXABLE );
		}

		return $this->chargify_taxable;
	}

	/**
	 * Get the product tax code.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|string
	 */
	public function get_chargify_tax_code( $new_fetch = false ) {

		if ( null === $this->chargify_tax_code || $new_fetch ) {
			$this->chargify_tax_code = $this->get_meta( self::META_CHARGIFY_TAX_CODE );
		}

		return $this->chargify_tax_code;
	}

	/**
	 * Get the product initial charge after trial.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|bool|int
	 */
	public function get_chargify_initial_charge_after_trial( $new_fetch = false ) {

		if ( null === $this->chargify_initial_charge_after_trial || $new_fetch ) {
			$this->chargify_initial_charge_after_trial = (bool) $this->get_meta( self::META_CHARGIFY_INITIAL_CHARGE_AFTER_TRIAL );
		}

		return $this->chargify_initial_charge_after_trial;
	}

	/**
	 * Get the product version number.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|int
	 */
	public function get_chargify_version_number( $new_fetch = false ) {

		if ( null === $this->chargify_version_number || $new_fetch ) {
			$this->chargify_version_number = $this->get_meta( self::META_CHARGIFY_VERSION_NUMBER );
		}

		return $this->chargify_version_number;
	}

	/**
	 * Get the product default product price point ID.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|int
	 */
	public function get_chargify_default_price_point_id( $new_fetch = false ) {

		if ( null === $this->chargify_default_price_point_id || $new_fetch ) {
			$this->chargify_default_price_point_id = (int) $this->get_meta( self::META_CHARGIFY_DEFAULT_PRICE_POINT_ID );
		}

		return $this->chargify_default_price_point_id;
	}

	/**
	 * Get the product request billing address.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|bool
	 */
	public function get_chargify_request_billing_address( $new_fetch = false ) {

		if ( null === $this->chargify_request_billing_address || $new_fetch ) {
			$this->chargify_request_billing_address = (bool) $this->get_meta( self::META_CHARGIFY_REQUEST_BILLING_ADDRESS );
		}

		return $this->chargify_request_billing_address;
	}

	/**
	 * Get the product require billing address.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|bool
	 */
	public function get_chargify_require_billing_address( $new_fetch = false ) {

		if ( null === $this->chargify_require_billing_address || $new_fetch ) {
			$this->chargify_require_billing_address = (bool) $this->get_meta( self::META_CHARGIFY_REQUIRE_BILLING_ADDRESS );
		}

		return $this->chargify_require_billing_address;
	}

	/**
	 * Get the product require shipping address.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|bool
	 */
	public function get_chargify_require_shipping_address( $new_fetch = false ) {

		if ( null === $this->chargify_require_shipping_address || $new_fetch ) {
			$this->chargify_require_shipping_address = (bool) $this->get_meta( self::META_CHARGIFY_REQUIRE_SHIPPING_ADDRESS );
		}

		return $this->chargify_require_shipping_address;
	}

}
