<?php
/**
 * The Chargify Component Price Point factory.
 *
 * @file    wp-chargify/includes/model/chargify-component-price-point-factory.php
 * @package WPChargify
 */

namespace Chargify\Model;

use Chargify\Libraries\Generic_Post;
use Chargify\Libraries\Generic_Post_Factory;
use WP_Post;
use WP_Query;

/**
 * The Component Price Point factory.
 */
class Chargify_Component_Price_Point_Factory extends Generic_Post_Factory {

	/**
	 * Return a wrapped instance of the given post or post ID.
	 *
	 * @param string|int|WP_Post $post The post object or ID to wrap.
	 *
	 * @return Chargify_Component_Price_Point|Generic_Post
	 */
	public function wrap( $post ) {
		return new Chargify_Component_Price_Point( $post );
	}

	/**
	 * Get the post type for the custom post type associated with this model
	 * factory.
	 *
	 * @return string
	 */
	public function get_post_type() {
		return Chargify_Component_Price_Point::POST_TYPE;
	}

	/**
	 * Returns a `Generic_Post` with the given ID.
	 *
	 * @param int|string $id The post ID.
	 *
	 * @return null|Chargify_Component_Price_Point
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
	 * Get the Chargify Component Price Point by component price point id.
	 *
	 * @param int $component_price_point_id ComponentPricePoint id.
	 *
	 * @return Generic_Post|Chargify_Component_Price_Point|null
	 */
	public function get_by_component_price_point_id( $component_price_point_id ) {

		return $this->get_by_unique_meta( Chargify_Component_Price_Point::META_CHARGIFY_ID, $component_price_point_id );
	}

	/**
	 * Get the Chargify Component Price Point by component price point handle.
	 *
	 * @param int    $component_chargify_id        The component chargify id.
	 * @param string $component_price_point_handle Component price point handle.
	 *
	 * @return Generic_Post|Chargify_Component_Price_Point|null
	 */
	public function get_by_component_price_point_handle( $component_chargify_id, $component_price_point_handle ) {

		$args = [
			'post_type'  => $this->get_post_type(),
			'meta_query' => [ // phpcs:ignore
				[
					'key'     => Chargify_Component_Price_Point::META_CHARGIFY_HANDLE,
					'value'   => $component_price_point_handle,
					'compare' => '=',
				],
				[
					'key'     => Chargify_Component_Price_Point::META_CHARGIFY_COMPONENT_ID,
					'value'   => $component_chargify_id,
					'compare' => '=',
				],
			],
		];

		// Should only be one.
		$query = new \WP_Query( $args );

		if ( $query instanceof \WP_Query && $query->post_count === 1 ) {
			return $this->wrap( $query->posts[0] );
		} else {
			return null;
		}
	}

	/**
	 * Get the Chargify ComponentPricePoint by unique meta id, fails if more than one found.
	 *
	 * @param string $meta_key   The meta key.
	 * @param mixed  $meta_value The meta value, usually int or string, must be unique, like component id, handle etc.
	 *
	 * @return Generic_Post|Chargify_Component_Price_Point|null
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
		$query = new \WP_Query( $args );

		if ( $query instanceof \WP_Query && $query->post_count === 1 ) {
			return $this->wrap( $query->posts[0] );
		} else {
			return null;
		}
	}

	/**
	 * Static helper method to check that the post is of Chargify Component Price Point post type.
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
			Chargify_Component_Price_Point::POST_TYPE === $post->post_type;
	}

}
