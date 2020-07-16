<?php
/**
 * The Chargify Product factory.
 *
 * @file    wp-chargify/includes/model/chargify-product-factory.php
 * @package WPChargify
 */

namespace Chargify\Model;

use Chargify\Libraries\Generic_Post;
use Chargify\Libraries\Generic_Post_Factory;
use WP_Post;

/**
 * The Product factory.
 */
class Chargify_Product_Factory extends Generic_Post_Factory {

	/**
	 * Return a wrapped instance of the given post or post ID.
	 *
	 * @param string|int|WP_Post $post The post object or ID to wrap.
	 *
	 * @return Chargify_Product|Generic_Post
	 */
	public function wrap( $post ) {
		return new Chargify_Product( $post );
	}

	/**
	 * Get the post type for the custom post type associated with this model
	 * factory.
	 *
	 * @return string
	 */
	public function get_post_type() {
		return Chargify_Product::POST_TYPE;
	}

	/**
	 * Returns a `Generic_Post` with the given ID.
	 *
	 * @param int|string $id The post ID.
	 *
	 * @return null|Chargify_Product
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
	 * Get the Chargify Product by product id.
	 *
	 * @param int $product_id Product id.
	 *
	 * @return Generic_Post|Chargify_Product|null
	 */
	public function get_by_product_id( $product_id ) {

		return $this->get_by_unique_meta( Chargify_Product::META_CHARGIFY_ID, $product_id );
	}

	/**
	 * Get the Chargify Product by product handle.
	 *
	 * @param string $product_handle Product handle.
	 *
	 * @return Generic_Post|Chargify_Product|null
	 */
	public function get_by_product_handle( $product_handle ) {

		return $this->get_by_unique_meta( Chargify_Product::META_CHARGIFY_HANDLE, $product_handle );
	}

	/**
	 * Get the Chargify Product by unique meta id, fails if more than one found.
	 *
	 * @param string $meta_key   The meta key.
	 * @param mixed  $meta_value The meta value, usually int or string, must be unique, like product id, handle etc.
	 *
	 * @return Generic_Post|Chargify_Product|null
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

		// Should only be one.		// Should only be one.
		$query = new \WP_Query( $args );

		if ( $query instanceof \WP_Query && $query->post_count === 1 ) {
			return $this->wrap( $query->posts[0] );
		} else {
			return null;
		}
	}

	/**
	 * Static helper method to check that the post is of Chargify_Product post type.
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
			Chargify_Product::POST_TYPE === $post->post_type;
	}

}
