<?php
/**
 * The Component model.
 *
 * @file    wp-chargify/includes/model/chargify-component.php
 * @package WPChargify
 */

namespace Chargify\Model;

use Chargify\Libraries\GenericPost;
use WP_Post;

/**
 * The Component Model.
 */
class ChargifyComponent extends GenericPost {

	const POST_TYPE = 'chargify_price_point';
	const CPT       = self::POST_TYPE;

	const META_CHARGIFY_PRODUCT_COMPONENT_ID     = 'chargify_component_id';
	const META_CHARGIFY_PRODUCT_COMPONENT_HANDLE = 'chargify_component_handle';
	const META_CHARGIFY_PRODUCT_ID               = 'chargify_product_id'; // The product that its linked to.
	const META_CHARGIFY_PRICE_POINT_ID           = 'chargify_price_point_id'; // The price points that its linked to.

	/**
	 * The component id.
	 *
	 * @var null|string
	 */
	protected $chargify_component_id = null;

	/**
	 * The component handle.
	 *
	 * @var null|string
	 */
	protected $chargify_component_handle = null;

	/**
	 * The product id.
	 *
	 * @var null|int
	 */
	protected $chargify_product_id = null;

	/**
	 * The component price point ids.
	 *
	 * @var null|int
	 */
	protected $chargify_price_point_ids;

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
			$value = $this->get_meta( self::META_CHARGIFY_PRODUCT_COMPONENT_ID );

			$this->chargify_component_id = $value && is_numeric( $value ) ? (int) $value : 0;
		}

		return $this->chargify_component_id;
	}

	/**
	 * Get the component handle.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|string
	 */
	public function get_chargify_component_handle( $new_fetch = false ) {

		if ( null === $this->chargify_component_handle || $new_fetch ) {
			$this->chargify_component_handle = $this->get_meta( self::META_CHARGIFY_PRODUCT_COMPONENT_HANDLE );
		}

		return $this->chargify_component_handle;
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
	 * Get the price point ids for this component.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return int|null
	 */
	public function get_chargify_price_point_ids( $new_fetch = false ) {

		if ( null === $this->chargify_price_point_ids || $new_fetch ) {
			$this->chargify_price_point_ids = $this->get_meta( self::META_CHARGIFY_PRICE_POINT_ID );
		}

		return $this->chargify_price_point_ids;
	}

}
