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

	const META_CHARGIFY_PRODUCT_PRICE_POINT_ID     = 'chargify_product_price_point_id';
	const META_CHARGIFY_PRODUCT_PRICE_POINT_HANDLE = 'chargify_product_price_point_handle';
	const META_CHARGIFY_PRODUCT_ID                 = 'chargify_product_id'; // The product that its linked to.
	const META_CHARGIFY_PRODUCT_FAMILY_ID          = 'chargify_product_family_id'; // The product family that its linked to.

	/**
	 * The product price point id.
	 *
	 * @var null|string
	 */
	protected $chargify_product_price_point_id = null;

	/**
	 * The product price point handle.
	 *
	 * @var null|string
	 */
	protected $chargify_product_price_point_handle = null;

	/**
	 * The product id.
	 *
	 * @var null|int
	 */
	protected $chargify_product_id = null;

	/**
	 * The product family id.
	 *
	 * @var null|int
	 */
	protected $chargify_product_family_id = null;

	/**
	 * Get the product price point id.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return int|null
	 */
	public function get_chargify_product_price_point_id( $new_fetch = false ) {

		if ( null === $this->chargify_product_price_point_id || $new_fetch ) {
			$value = $this->get_meta( self::META_CHARGIFY_PRODUCT_PRICE_POINT_ID );

			$this->chargify_product_price_point_id = $value && is_numeric( $value ) ? (int) $value : 0;
		}

		return $this->chargify_product_price_point_id;
	}

	/**
	 * Get the product id.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|string
	 */
	public function get_chargify_product_price_point_handle( $new_fetch = false ) {

		if ( null === $this->chargify_product_price_point_handle || $new_fetch ) {
			$this->chargify_product_price_point_handle = $this->get_meta( self::META_CHARGIFY_PRODUCT_PRICE_POINT_HANDLE );
		}

		return $this->chargify_product_price_point_handle;
	}

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
			$value = $this->get_meta( self::META_CHARGIFY_PRODUCT_ID );

			$this->chargify_product_id = $value && is_numeric( $value ) ? (int) $value : 0;
		}

		return $this->chargify_product_id;
	}

	/**
	 * Get the product family id.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return int|null
	 */
	public function get_chargify_product_family_id( $new_fetch = false ) {

		if ( null === $this->chargify_product_family_id || $new_fetch ) {
			$value = $this->get_meta( self::META_CHARGIFY_PRODUCT_FAMILY_ID );

			$this->chargify_product_family_id = $value && is_numeric( $value ) ? (int) $value : 0;
		}

		return $this->chargify_product_family_id;
	}

}
