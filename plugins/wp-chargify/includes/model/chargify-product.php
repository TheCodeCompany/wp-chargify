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

	const META_CHARGIFY_PRODUCT_ID                 = 'chargify_product_id';
	const META_CHARGIFY_PRODUCT_HANDLE             = 'chargify_product_handle';
	const META_CHARGIFY_PRICE                      = 'chargify_price';
	const META_CHARGIFY_INITIAL_COST               = 'chargify_initial_cost';
	const META_CHARGIFY_INTERVAL_UNIT              = 'chargify_interval_unit';
	const META_CHARGIFY_INTERVAL                   = 'chargify_interval';
	const META_CHARGIFY_PRODUCT_FAMILY_ID          = 'chargify_product_family_id';
	const META_CHARGIFY_PRODUCT_FAMILY             = 'chargify_product_family';
	const META_CHARGIFY_PRODUCT_PRICE_POINT_ID     = 'chargify_price_point_id';
	const META_CHARGIFY_PRODUCT_PRICE_POINT_HANDLE = 'chargify_price_point_handle';

	/**
	 * The product id.
	 *
	 * @var null|int
	 */
	protected $chargify_product_id = null;

	/**
	 * The product handle.
	 *
	 * @var null|string
	 */
	protected $chargify_product_handle = null;

	/**
	 * The product price.
	 *
	 * @var null|string
	 */
	protected $chargify_price = null;

	/**
	 * The product initial cost.
	 *
	 * @var null|string
	 */
	protected $chargify_initial_cost = null;

	/**
	 * The product interval unit.
	 *
	 * @var null|string
	 */
	protected $chargify_interval_unit = null;

	/**
	 * The product interval.
	 *
	 * @var null|string
	 */
	protected $chargify_interval = null;

	/**
	 * The product family id.
	 *
	 * @var null|int
	 */
	protected $chargify_product_family_id = null;

	/**
	 * The product family name.
	 *
	 * @var null|string
	 */
	protected $chargify_product_family = null;

	/**
	 * The product price point id.
	 *
	 * @var null|string
	 */
	protected $chargify_price_point_id = null;

	/**
	 * The product price point handle.
	 *
	 * @var null|string
	 */
	protected $chargify_price_point_handle = null;

	/**
	 * Get the product id.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return int|null
	 */
	public function get_chargify_product_id( $new_fetch = false ) {

		if ( null === $this->chargify_product_id || $new_fetch ) {
			$this->chargify_product_id = $this->get_meta( self::META_CHARGIFY_PRODUCT_ID );
		}

		return $this->chargify_product_id;
	}

	/**
	 * Get the product handle.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|string
	 */
	public function get_chargify_product_handle( $new_fetch = false ) {

		if ( null === $this->chargify_product_handle || $new_fetch ) {
			$this->chargify_product_handle = $this->get_meta( self::META_CHARGIFY_PRODUCT_HANDLE );
		}

		return $this->chargify_product_handle;
	}

	/**
	 * Get the product price.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|string
	 */
	public function get_chargify_price( $new_fetch = false ) {

		if ( null === $this->chargify_price || $new_fetch ) {
			$this->chargify_price = $this->get_meta( self::META_CHARGIFY_PRICE );
		}

		return $this->chargify_price;
	}

	/**
	 * Get the product interval cost.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|string
	 */
	public function get_chargify_initial_cost( $new_fetch = false ) {

		if ( null === $this->chargify_initial_cost || $new_fetch ) {
			$this->chargify_initial_cost = $this->get_meta( self::META_CHARGIFY_INITIAL_COST );
		}

		return $this->chargify_initial_cost;
	}

	/**
	 * Get the product billing interval unit.
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
	 * Get the product billing interval.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|string
	 */
	public function get_chargify_interval( $new_fetch = false ) {

		if ( null === $this->chargify_interval || $new_fetch ) {
			$this->chargify_interval = $this->get_meta( self::META_CHARGIFY_INTERVAL );
		}

		return $this->chargify_interval;
	}

	/**
	 * Get the product family id.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return int
	 */
	public function get_chargify_product_family_id( $new_fetch = false ) {

		if ( null === $this->chargify_product_family_id || $new_fetch ) {
			$this->chargify_product_family_id = (int) $this->get_meta( self::META_CHARGIFY_PRODUCT_FAMILY_ID );
		}

		return $this->chargify_product_family_id;
	}

	/**
	 * Get the product family name.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|string
	 */
	public function get_chargify_product_family( $new_fetch = false ) {

		if ( null === $this->chargify_product_family || $new_fetch ) {
			$this->chargify_product_family = $this->get_meta( self::META_CHARGIFY_PRODUCT_FAMILY );
		}

		return $this->chargify_product_family;
	}

	/**
	 * Get the product price point id.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return int|null
	 */
	public function get_chargify_price_point_id( $new_fetch = false ) {

		if ( null === $this->chargify_price_point_id || $new_fetch ) {
			$this->chargify_price_point_id = $this->get_meta( self::META_CHARGIFY_PRODUCT_PRICE_POINT_ID );
		}

		return $this->chargify_price_point_id;
	}

	/**
	 * Get the product id.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|string
	 */
	public function get_chargify_price_point_handle( $new_fetch = false ) {

		if ( null === $this->chargify_price_point_handle || $new_fetch ) {
			$this->chargify_price_point_handle = $this->get_meta( self::META_CHARGIFY_PRODUCT_PRICE_POINT_HANDLE );
		}

		return $this->chargify_price_point_handle;
	}

}
