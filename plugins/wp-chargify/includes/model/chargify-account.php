<?php
/**
 * The Account model.
 *
 * @file    wp-chargify/includes/model/chargify-account.php
 * @package WPChargify
 */

namespace Chargify\Model;

use Chargify\Libraries\GenericPost;
use WP_Post;

/**
 * The Account Model.
 */
class ChargifyAccount extends GenericPost {

	const POST_TYPE = 'chargify_account';
	const CPT       = self::POST_TYPE;

	const META_CHARGIFY_WORDPRESS_USER_ID   = 'chargify_wordpress_user_id';
	const META_CHARGIFY_USER_ID             = 'chargify_user_id';
	const META_CHARGIFY_SUBSCRIPTION_ID     = 'chargify_subscription_id';
	const META_CHARGIFY_SUBSCRIPTION_STATUS = 'chargify_subscription_status';
	const META_CHARGIFY_EXPIRATION_DATE     = 'chargify_expiration_date';
	const META_CHARGIFY_PRODUCTS_MULTICHECK = 'chargify_products_multicheck';

	// TODO, store additional data.
	const META_CHARGIFY_PRODUCT_ID               = 'chargify_product_id';
	const META_CHARGIFY_ID   = 'chargify_product_price_point_id';
	const META_CHARGIFY_COMPONENT_ID             = 'chargify_component_id';
	const META_CHARGIFY_COMPONENT_PRICE_POINT_ID = 'chargify_component_price_point_id';

	/**
	 * WordPress user id.
	 *
	 * @var null|int
	 */
	protected $chargify_wordpress_user_id = null;

	/**
	 * Chargify user id.
	 *
	 * @var null|int
	 */
	protected $chargify_user_id = null;

	/**
	 * Chargify subscription id.
	 *
	 * @var null|int
	 */
	protected $chargify_subscription_id = null;

	/**
	 * The chargify subscription status.
	 *
	 * @var null|string
	 */
	protected $chargify_subscription_status = null;

	/**
	 * The chargify Subscription expiration date
	 *
	 * @var null|string
	 */
	protected $chargify_expiration_date = null;

	/**
	 * The products that is associated to the account.
	 *
	 * @var null|string
	 */
	protected $chargify_products_multicheck = null;

	/**
	 * The products handle that is associated to the account.
	 *
	 * @var null|string
	 */
	protected $get_chargify_product_handle = null;

	/**
	 * Get the WordPress user id.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return int|null
	 */
	public function get_chargify_wordpress_user_id( $new_fetch = false ) {

		if ( null === $this->chargify_wordpress_user_id || $new_fetch ) {
			$value = $this->get_meta( self::META_CHARGIFY_WORDPRESS_USER_ID );

			$this->chargify_wordpress_user_id = $value && is_numeric( $value ) ? (int) $value : 0;
		}

		return $this->chargify_wordpress_user_id;
	}

	/**
	 * Get the chargify user id.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return int|null
	 */
	public function get_chargify_user_id( $new_fetch = false ) {

		if ( null === $this->chargify_user_id || $new_fetch ) {
			$value = $this->get_meta( self::META_CHARGIFY_USER_ID );

			$this->chargify_user_id = $value && is_numeric( $value ) ? (int) $value : 0;
		}

		return $this->chargify_user_id;
	}

	/**
	 * Get the Chargify Subscription id.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return int|null
	 */
	public function get_chargify_subscription_id( $new_fetch = false ) {

		if ( null === $this->chargify_subscription_id || $new_fetch ) {
			$value = $this->get_meta( self::META_CHARGIFY_SUBSCRIPTION_ID );

			$this->chargify_subscription_id = $value && is_numeric( $value ) ? (int) $value : 0;
		}

		return $this->chargify_subscription_id;
	}

	/**
	 * Get the subscription status.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|string
	 */
	public function get_chargify_subscription_status( $new_fetch = false ) {

		if ( null === $this->chargify_subscription_status || $new_fetch ) {
			$this->chargify_subscription_status = $this->get_meta( self::META_CHARGIFY_SUBSCRIPTION_STATUS );
		}

		return $this->chargify_subscription_status;
	}

	/**
	 * Get the subscription expiration date.
	 * Meta created from subscription 'current_period_ends_at' data.
	 * Stored as Timestamp relating to the end of the current (recurring)
	 * period (i.e.,when the next regularly scheduled attempted charge will occur)
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|string String is in format of "ISO 8601 date format"
	 */
	public function get_chargify_expiration_date( $new_fetch = false ) {

		if ( null === $this->chargify_expiration_date || $new_fetch ) {
			$this->chargify_expiration_date = $this->get_meta( self::META_CHARGIFY_EXPIRATION_DATE );
		}

		return $this->chargify_expiration_date;
	}

	/**
	 * Get the subscription products value multicheck.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|string
	 */
	public function get_chargify_products_multicheck( $new_fetch = false ) {

		if ( null === $this->chargify_products_multicheck || $new_fetch ) {
			$this->chargify_products_multicheck = $this->get_meta( self::META_CHARGIFY_PRODUCTS_MULTICHECK );
		}

		return $this->chargify_products_multicheck;
	}

	/**
	 * Get the subscription product price point handle.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized on the
	 *                        model as a parameter.
	 *
	 * @return null|string
	 */
	public function get_chargify_product_handle( $new_fetch = false ) {

		if ( null === $this->get_chargify_product_handle || $new_fetch ) {

			// The product id.
			$product_id = $this->get_chargify_products_multicheck();

			$chargify_product_factory = new ChargifyProductFactory();
			$chargify_product         = $chargify_product_factory->get_by_id( $product_id );

			$this->get_chargify_product_handle = $chargify_product->get_chargify_product_handle();
		}

		return $this->get_chargify_product_handle;
	}

}
