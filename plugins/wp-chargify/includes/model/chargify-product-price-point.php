<?php
/**
 * The Product Price Point model.
 *
 * @file    wp-chargify/includes/model/chargify-product-price-point.php
 * @package WPChargify
 */

namespace Chargify\Model;

use Chargify\Libraries\GenericPost;
use WP_Post;

/**
 * The Product Price Point Model.
 */
class ChargifyProductPricePoint extends GenericPost {

	const POST_TYPE = 'chargify_product_pp';
	const CPT       = self::POST_TYPE;

	// Linking Meta.
	const META_CHARGIFY_PRODUCT_ID  = 'chargify_product_id'; // The Chargify Product ID.
	const META_WORDPRESS_PRODUCT_ID = 'wordpress_product_id'; // The WordPress Product ID.

	// General Chargify Meta.
	const META_CHARGIFY_ID                         = 'chargify_id';
	const META_CHARGIFY_NAME                       = 'chargify_name';
	const META_CHARGIFY_HANDLE                     = 'chargify_handle';
	const META_CHARGIFY_PRICE_IN_CENTS             = 'chargify_price_in_cents';
	const META_CHARGIFY_INTERVAL                   = 'chargify_interval';
	const META_CHARGIFY_INTERVAL_UNIT              = 'chargify_interval_unit';
	const META_CHARGIFY_TRIAL_PRICE_IN_CENTS       = 'chargify_trial_price_in_cents';
	const META_CHARGIFY_TRIAL_INTERVAL             = 'chargify_trial_interval';
	const META_CHARGIFY_TRIAL_INTERVAL_UNIT        = 'chargify_trial_interval_unit';
	const META_CHARGIFY_TRIAL_TYPE                 = 'chargify_trial_type';
	const META_CHARGIFY_INTRODUCTORY_OFFER         = 'chargify_introductory_offer';
	const META_CHARGIFY_INITIAL_CHARGE_IN_CENTS    = 'chargify_initial_charge_in_cents';
	const META_CHARGIFY_INITIAL_CHARGE_AFTER_TRIAL = 'chargify_initial_charge_after_trial';
	const META_CHARGIFY_EXPIRATION_INTERVAL        = 'chargify_expiration_interval';
	const META_CHARGIFY_EXPIRATION_INTERVAL_UNIT   = 'chargify_expiration_interval_unit';
	const META_CHARGIFY_ARCHIVED_AT                = 'chargify_archived_at';
	const META_CHARGIFY_CREATED_AT                 = 'chargify_created_at';
	const META_CHARGIFY_UPDATED_AT                 = 'chargify_updated_at';

	/**
	 * The product id that it is linked to.
	 *
	 * @var null|int
	 */
	protected $chargify_product_id = null;

	/**
	 * The WordPress product id that it is linked to.
	 *
	 * @var null|int
	 */
	protected $wordpress_product_id = null;

	/**
	 * The product price point id.
	 *
	 * @var null|int
	 */
	protected $chargify_id = null;

	/**
	 * The product price point name.
	 *
	 * @var null|string
	 */
	protected $chargify_name = null;

	/**
	 * The product price point handle.
	 *
	 * @var null|string
	 */
	protected $chargify_handle = null;

	/**
	 * The product price point price in cents.
	 *
	 * @var null|int
	 */
	protected $chargify_price_in_cents = null;

	/**
	 * The product price point interval.
	 *
	 * @var null|int
	 */
	protected $chargify_interval = null;

	/**
	 * The product price point interval unit.
	 *
	 * @var null|string
	 */
	protected $chargify_interval_unit = null;

	/**
	 * The product price point trial price in cents.
	 *
	 * @var null|int
	 */
	protected $chargify_trial_price_in_cents = null;

	/**
	 * The product price point trial interval.
	 *
	 * @var null|int
	 */
	protected $chargify_trial_interval = null;

	/**
	 * The product price point trial interval unit, e.g month.
	 *
	 * @var null|string
	 */
	protected $chargify_trial_interval_unit = null;

	/**
	 * The product price point trial type.
	 *
	 * @var null|string
	 */
	protected $chargify_trial_type = null;

	/**
	 * The product price point introductory offer.
	 *
	 * @var null|string
	 */
	protected $chargify_introductory_offer = null;

	/**
	 * The product price point initial cost in cents.
	 *
	 * @var null|int
	 */
	protected $chargify_initial_charge_in_cents = null;

	/**
	 * The product price point initial charge after trial.
	 *
	 * @var null|string
	 */
	protected $chargify_initial_charge_after_trial = null;

	/**
	 * The product price point expiration interval.
	 *
	 * @var null|int
	 */
	protected $chargify_expiration_interval = null;

	/**
	 * The product price point expiration interval unit, e.g never.
	 *
	 * @var null|string
	 */
	protected $chargify_expiration_interval_unit = null;

	/**
	 * The product price point archived at. Date format stored as "ISO 8601 date format", as per Chargify format.
	 *
	 * @var null|string
	 */
	protected $chargify_archived_at = null;

	/**
	 * The product price point created at. Date format stored as "ISO 8601 date format", as per Chargify format.
	 *
	 * @var null|string
	 */
	protected $chargify_created_at = null;

	/**
	 * The product price point handle. Date format stored as "ISO 8601 date format", as per Chargify format.
	 *
	 * @var null|string
	 */
	protected $chargify_updated_at = null;

	/**
	 * Get the Chargify product id.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|int
	 */
	public function get_chargify_product_id( $new_fetch = false ) {

		if ( null === $this->chargify_product_id || $new_fetch ) {
			$this->chargify_product_id = (int) $this->get_meta( self::META_CHARGIFY_PRODUCT_ID );
		}

		return $this->chargify_product_id;
	}

	/**
	 * Get the WordPress product id.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|int
	 */
	public function get_wordpress_product_id( $new_fetch = false ) {

		if ( null === $this->wordpress_product_id || $new_fetch ) {
			$this->wordpress_product_id = (int) $this->get_meta( self::META_WORDPRESS_PRODUCT_ID );
		}

		return $this->wordpress_product_id;
	}

	/**
	 * Get the product price point id.
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
	 * Get the product price point name.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|string
	 */
	public function get_chargify_name( $new_fetch = false ) {

		if ( null === $this->chargify_name || $new_fetch ) {
			$this->chargify_name = $this->get_meta( self::META_CHARGIFY_NAME );
		}

		return $this->chargify_name;
	}

	/**
	 * Get the product price point handle.
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
	 * Get the product price point price in cents.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|int
	 */
	public function get_chargify_price_in_cents( $new_fetch = false ) {

		if ( null === $this->chargify_price_in_cents || $new_fetch ) {
			$this->chargify_price_in_cents = (int) $this->get_meta( self::META_CHARGIFY_PRICE_IN_CENTS );
		}

		return $this->chargify_price_in_cents;
	}

	/**
	 * Get the product price point interval.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|int
	 */
	public function get_chargify_interval( $new_fetch = false ) {

		if ( null === $this->chargify_interval || $new_fetch ) {
			$this->chargify_interval = (int) $this->get_meta( self::META_CHARGIFY_INTERVAL );
		}

		return $this->chargify_interval;
	}

	/**
	 * Get the product price point interval unit. e.g 'month'.
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
	 * Get the product price point trial price in cents.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|int
	 */
	public function get_chargify_trial_price_in_cents( $new_fetch = false ) {

		if ( null === $this->chargify_trial_price_in_cents || $new_fetch ) {
			$this->chargify_trial_price_in_cents = (int) $this->get_meta( self::META_CHARGIFY_TRIAL_PRICE_IN_CENTS );
		}

		return $this->chargify_trial_price_in_cents;
	}

	/**
	 * Get the product price point trial interval.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|int
	 */
	public function get_chargify_trial_interval( $new_fetch = false ) {

		if ( null === $this->chargify_trial_interval || $new_fetch ) {
			$this->chargify_trial_interval = (int) $this->get_meta( self::META_CHARGIFY_TRIAL_INTERVAL );
		}

		return $this->chargify_trial_interval;
	}

	/**
	 * Get the product price point trial interval unit.  e.g 'month'.
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
	 * Get the product price point trial type.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|string
	 */
	public function get_chargify_trial_type( $new_fetch = false ) {

		if ( null === $this->chargify_trial_type || $new_fetch ) {
			$this->chargify_trial_type = $this->get_meta( self::META_CHARGIFY_TRIAL_TYPE );
		}

		return $this->chargify_trial_type;
	}

	/**
	 * Get the product price point introductory offer.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|bool
	 */
	public function get_chargify_introductory_offer( $new_fetch = false ) {

		if ( null === $this->chargify_introductory_offer || $new_fetch ) {
			$this->chargify_introductory_offer = (bool) $this->get_meta( self::META_CHARGIFY_INTRODUCTORY_OFFER );
		}

		return $this->chargify_introductory_offer;
	}

	/**
	 * Get the product price point initial charge in cents.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|string
	 */
	public function get_chargify_initial_charge_in_cents( $new_fetch = false ) {

		if ( null === $this->chargify_initial_charge_in_cents || $new_fetch ) {
			$this->chargify_initial_charge_in_cents = (int) $this->get_meta( self::META_CHARGIFY_INITIAL_CHARGE_IN_CENTS );
		}

		return $this->chargify_initial_charge_in_cents;
	}

	/**
	 * Get the product price point initial charge after trial.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|int
	 */
	public function get_chargify_initial_charge_after_trial( $new_fetch = false ) {

		if ( null === $this->chargify_initial_charge_after_trial || $new_fetch ) {
			$this->chargify_initial_charge_after_trial = $this->get_meta( self::META_CHARGIFY_INITIAL_CHARGE_AFTER_TRIAL );
		}

		return $this->chargify_initial_charge_after_trial;
	}

	/**
	 * Get the product price point expiration interval.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|bool
	 */
	public function get_chargify_expiration_interval( $new_fetch = false ) {

		if ( null === $this->chargify_expiration_interval || $new_fetch ) {
			$this->chargify_expiration_interval = (bool) $this->get_meta( self::META_CHARGIFY_EXPIRATION_INTERVAL );
		}

		return $this->chargify_expiration_interval;
	}

	/**
	 * Get the product price point expiration interval unit. e.g 'month'.
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
	 * Get the product price point archived at. Date format stored as "ISO 8601 date format", as per Chargify format.
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
	 * Get the product price point created at. Date format stored as "ISO 8601 date format", as per Chargify format.
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
	 * Get the product price point update at. Date format stored as "ISO 8601 date format", as per Chargify format.
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

}
