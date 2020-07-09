<?php
/**
 * The Chargify Component factory.
 *
 * @file    wp-chargify/includes/model/chargify-component-factory.php
 * @package WPChargify
 */

namespace Chargify\Model;

use Chargify\Libraries\GenericPost;
use Chargify\Libraries\GenericPostFactory;
use WP_Post;

/**
 * The Component factory.
 */
class ChargifyComponentFactory extends GenericPostFactory {

	/**
	 * Get the post type for the custom post type associated with this model
	 * factory.
	 *
	 * @return string
	 */
	public function get_post_type() {
		return ChargifyComponent::POST_TYPE;
	}

	/**
	 * Returns a `GenericPost` with the given ID.
	 *
	 * @param int|string $id The post ID.
	 *
	 * @return null|ChargifyComponent
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
	 * Return a wrapped instance of the given post or post ID.
	 *
	 * @param string|int|WP_Post $post The post object or ID to wrap.
	 *
	 * @return ChargifyComponent|GenericPost
	 */
	public function wrap( $post ) {
		return new ChargifyComponent( $post );
	}

	/**
	 * Static helper method to check that the post is of ChargifyComponent post type.
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
			ChargifyComponent::POST_TYPE === $post->post_type;
	}
}
