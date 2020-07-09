<?php
/**
 * The Price Point model.
 *
 * @file    wp-chargify/includes/model/chargify-price-point.php
 * @package WPChargify
 */

namespace Chargify\Model;

use Chargify\Libraries\GenericPost;
use WP_Post;

/**
 * The Price Point Model.
 */
class ChargifyPricePoint extends GenericPost {

	const POST_TYPE = 'chargify_price_point';
	const CPT       = self::POST_TYPE;

	const META_CHARGIFY_PRODUCT_PRICE_POINT_ID     = 'chargify_price_point_id';
	const META_CHARGIFY_PRODUCT_PRICE_POINT_HANDLE = 'chargify_price_point_handle';
	const META_CHARGIFY_PRODUCT_ID                 = 'chargify_product_id'; // The product that its linked to.
	const META_CHARGIFY_COMPONENT_ID               = 'chargify_product_id'; // The component that its linked to.

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
	 * The product id.
	 *
	 * @var null|int
	 */
	protected $chargify_product_id = null;

	/**
	 * The product id.
	 *
	 * @var null|int
	 */
	protected $chargify_component_id = null;

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
			$chargify_product_id = $this->get_meta( self::META_CHARGIFY_PRODUCT_ID );

			if ( $chargify_product_id && is_numeric( $chargify_product_id ) ) {
				$this->chargify_product_id = (int) $chargify_product_id;
			} else {
				$this->chargify_product_id = 0;
			}
		}

		return $this->chargify_product_id;
	}

	/**
	 * Get the component id.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return int|null
	 */
	public function get_chargify_component_id( $new_fetch = false ) {

		if ( null === $this->chargify_component_id || $new_fetch ) {
			$component_id = $this->get_meta( self::META_CHARGIFY_COMPONENT_ID );

			if ( $component_id && is_numeric( $component_id ) ) {
				$this->chargify_component_id = (int) $component_id;
			} else {
				$this->chargify_component_id = 0;
			}
		}

		return $this->chargify_component_id;
	}

	/**
	 * =========================================================================
	 * Is Conditionals
	 * -------------------------------------------------------------------------
	 */

	/**
	 * Checks if this is a product based price point.
	 *
	 * @return bool
	 */
	public function is_product_based_price_point() {
		return 0 !== $this->get_chargify_product_id();
	}

	/**
	 * Checks if this is a component based price point.
	 *
	 * @return bool
	 */
	public function is_component_based_price_point() {
		return 0 !== $this->get_chargify_component_id();
	}

}
