<?php
/**
 * The Chargify Account factory.
 *
 * @file    wp-chargify/includes/model/chargify-account-factory.php
 * @package WPChargify
 */

namespace Chargify\Model;

use Chargify\Libraries\GenericPost;
use Chargify\Libraries\GenericPostFactory;
use WP_Post;

/**
 * The Account factory.
 */
class ChargifyAccountFactory extends GenericPostFactory {

	/**
	 * Return a wrapped instance of the given post or post ID.
	 *
	 * @param string|int|WP_Post $post The post object or ID to wrap.
	 *
	 * @return ChargifyAccount|GenericPost
	 */
	public function wrap( $post ) {
		return new ChargifyAccount( $post );
	}

	/**
	 * Get the post type for the custom post type associated with this model
	 * factory.
	 *
	 * @return string
	 */
	public function get_post_type() {
		return ChargifyAccount::POST_TYPE;
	}

	/**
	 * Returns a `GenericPost` with the given ID.
	 *
	 * @param int|string $id The post ID.
	 *
	 * @return null|ChargifyAccount
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
	 * Get the Chargify Account by WordPress user id.
	 *
	 * @param int $user_id WordPress user id.
	 *
	 * @return GenericPost|ChargifyAccount|null
	 */
	public function get_by_wordpress_user_id( $user_id ) {

		return $this->get_by_unique_meta( ChargifyAccount::META_CHARGIFY_WORDPRESS_USER_ID, $user_id );
	}

	/**
	 * Get the Chargify Account by subscription id.
	 *
	 * @param string $subscription_id Subscription id.
	 *
	 * @return GenericPost|ChargifyAccount|null
	 */
	public function get_by_subscription_id( $subscription_id ) {

		return $this->get_by_unique_meta( ChargifyAccount::META_CHARGIFY_SUBSCRIPTION_ID, $subscription_id );
	}

	/**
	 * Get the Chargify Account by unique meta id, fails if more than one found.
	 *
	 * @param string $meta_key   The meta key.
	 * @param mixed  $meta_value The meta value, usually int or string, must be unique, like account id, handle etc.
	 *
	 * @return GenericPost|ChargifyAccount|null
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
	 * Static helper method to check that the post is of ChargifyAccount post type.
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
			ChargifyAccount::POST_TYPE === $post->post_type;
	}

}
