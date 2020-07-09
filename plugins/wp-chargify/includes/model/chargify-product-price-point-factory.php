<?php
/**
 * The Chargify Product Price Point factory.
 *
 * @file    wp-chargify/includes/model/chargify-product-price-point-factory.php
 * @package WPChargify
 */

namespace Chargify\Model;

use Chargify\Libraries\GenericPost;
use Chargify\Libraries\GenericPostFactory;
use WP_Post;

/**
 * The Product Price Point factory.
 */
class ChargifyProductPricePointFactory extends GenericPostFactory {

	/**
	 * Return a wrapped instance of the given post or post ID.
	 *
	 * @param string|int|WP_Post $post The post object or ID to wrap.
	 *
	 * @return ChargifyProductPricePoint|GenericPost
	 */
	public function wrap( $post ) {
		return new ChargifyProductPricePoint( $post );
	}

	/**
	 * Get the post type for the custom post type associated with this model
	 * factory.
	 *
	 * @return string
	 */
	public function get_post_type() {
		return ChargifyProductPricePoint::POST_TYPE;
	}

	/**
	 * Returns a `GenericPost` with the given ID.
	 *
	 * @param int|string $id The post ID.
	 *
	 * @return null|ChargifyProductPricePoint
	 */
	public function get_by_id( $id ) {

		$post = get_post( $id );
		if ( empty( $post ) ) {
			return null;
		} else {
			return $this->wrap( $post );
		}

	}

	/**
	 * Get the Chargify Product Price Point by product id.
	 *
	 * @param int $product_price_point_id ProductPricePoint id.
	 *
	 * @return GenericPost|ChargifyProductPricePoint|null
	 */
	public function get_by_product_price_point_id( $product_price_point_id ) {

		return $this->get_by_unique_meta( ChargifyProductPricePoint::META_CHARGIFY_PRODUCT_PRICE_POINT_ID, $product_price_point_id );
	}

	/**
	 * Get the Chargify ProductPricePoint by product id.
	 *
	 * @param string $product_price_point_handle ProductPricePoint handle.
	 *
	 * @return GenericPost|ChargifyProductPricePoint|null
	 */
	public function get_by_product_price_point_handle( $product_price_point_handle ) {

		return $this->get_by_unique_meta( ChargifyProductPricePoint::META_CHARGIFY_PRODUCT_PRICE_POINT_HANDLE, $product_price_point_handle );
	}

	/**
	 * Get the Chargify ProductPricePoint by unique meta id, fails if more than one found.
	 *
	 * @param string $meta_key   The meta key.
	 * @param mixed  $meta_value The meta value, usually int or string, must be unique, like product id, handle etc.
	 *
	 * @return GenericPost|ChargifyProductPricePoint|null
	 */
	public function get_by_unique_meta( $meta_key, $meta_value ) {

		$args = [
			'post_type'  => $this->get_post_type(),
			'meta_query' => [ // phpcs:ignore
				[
					'key'     => $meta_key,
					'value'   => $meta_value,
					'compare' => '=',
				],
			],
		];

		// Should only be one.
		$posts = get_posts( $args );

		if ( is_array( $posts ) && count( $posts ) === 1 ) {
			return $this->wrap( $posts[0] );
		} else {
			return null;
		}
	}

	/**
	 * Static helper method to check that the post is of Chargify Product Price Point post type.
	 * Removes multiple lines in if statements as sometimes global $post is null or
	 * stdClass and results in Undefined property notices.
	 *
	 * @param null|WP_Post $post The post object, default global $post.
	 *
	 * @return bool
	 */
	public static function is_post_type( $post = null ) {

		if ( null === $post ) {
			global $post;
		}

		return null !== $post &&
			isset( $post->post_type ) &&
			ChargifyProductPricePoint::POST_TYPE === $post->post_type;
	}

}
