<?php
/**
 * The Component Price Point model.
 *
 * @file    wp-chargify/includes/model/chargify-component-price-point.php
 * @package WPChargify
 */

namespace Chargify\Model;

use Chargify\Libraries\GenericPost;
use WP_Post;

/**
 * The Component Price Point Model.
 */
class ChargifyComponentPricePoint extends GenericPost {

	const POST_TYPE = 'chargify_comp_pp';
	const CPT       = self::POST_TYPE;

	const META_CHARGIFY_COMPONENT_PRICE_POINT_ID     = 'chargify_component_price_point_id';
	const META_CHARGIFY_COMPONENT_PRICE_POINT_HANDLE = 'chargify_component_price_point_handle';
	const META_CHARGIFY_COMPONENT_ID                 = 'chargify_component_id'; // The component that its linked to.
	const META_CHARGIFY_PRODUCT_ID                   = 'chargify_product_family_id'; // The product that its linked to.
	const META_CHARGIFY_PRODUCT_FAMILY_ID            = 'chargify_product_family_id'; // The product family that its linked to.

	/**
	 * The component price point id.
	 *
	 * @var null|string
	 */
	protected $chargify_component_price_point_id = null;

	/**
	 * The component price point handle.
	 *
	 * @var null|string
	 */
	protected $chargify_component_price_point_handle = null;

	/**
	 * The component id.
	 *
	 * @var null|int
	 */
	protected $chargify_component_id = null;

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
	 * Get the component price point id.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return int|null
	 */
	public function get_chargify_component_price_point_id( $new_fetch = false ) {

		if ( null === $this->chargify_component_price_point_id || $new_fetch ) {
			$this->chargify_component_price_point_id = $this->get_meta( self::META_CHARGIFY_COMPONENT_PRICE_POINT_ID );
		}

		return $this->chargify_component_price_point_id;
	}

	/**
	 * Get the component id.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|string
	 */
	public function get_chargify_component_price_point_handle( $new_fetch = false ) {

		if ( null === $this->chargify_component_price_point_handle || $new_fetch ) {
			$this->chargify_component_price_point_handle = $this->get_meta( self::META_CHARGIFY_COMPONENT_PRICE_POINT_HANDLE );
		}

		return $this->chargify_component_price_point_handle;
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
			$value = $this->get_meta( self::META_CHARGIFY_COMPONENT_ID );

			$this->chargify_component_id = $value && is_numeric( $value ) ? (int) $value : 0;
		}

		return $this->chargify_component_id;
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