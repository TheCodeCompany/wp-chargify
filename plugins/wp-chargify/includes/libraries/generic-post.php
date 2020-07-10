<?php
/**
 * A WP_Post wrapper model.
 *
 * @file    wp-chargify/includes/libraries/generic-post.php
 * @package WPChargify
 */

namespace Chargify\Libraries;

use WP_Error;
use WP_Post;

/**
 * A model instance which wraps a `WP_Post` instance. You should extend this
 * class for a CPT instance.
 */
class GenericPost extends Model {

	/**
	 * The post object.
	 *
	 * @var array|\WP_Post|null
	 */
	protected $post;

	/**
	 * GenericPost constructor.
	 *
	 * @param int|WP_Post $post The post object or id.
	 */
	public function __construct( $post = 0 ) {
		assert( ! empty( $post ) );

		if ( 'object' === (string) gettype( $post ) ) {
			$this->post = $post;
		} else {
			$this->post = get_post( $post );
		}
	}

	/**
	 * Shortcut method for `wp_update_post()`.
	 *
	 * @param $args array The `wp_update_post()` arguments.  ID is automatically added.
	 *
	 * @return int|WP_Error
	 */
	public function update( $args ) {
		assert( ! empty( $args ) );
		$args['ID'] = $this->post->ID;

		return wp_update_post( $args );

	}

	/**
	 * Get post values.
	 *
	 * @param string $name The name of the value.
	 *
	 * @return mixed
	 */
	public function __get( $name ) {
		return $this->post->$name;
	}

	/**
	 * Set post values
	 *
	 * @param string $name  The name of the value.
	 * @param mixed  $value The value being set.
	 */
	public function __set( $name, $value ) {
		$this->post->$name = $value;
	}

	/**
	 * Returns the given meta field.
	 *
	 * @param string $key    The meta key to get for the post.
	 * @param bool   $single Whether to get a single value, or array of all metas. Default `true`.
	 *
	 * @return mixed
	 */
	public function get_meta( $key = null, $single = true ) {
		return get_post_meta( $this->post->ID, $key, $single );
	}

	/**
	 * Sets the given meta field - update_post_meta().
	 *
	 * @param string $key   The meta key to get for the post.
	 * @param mixed  $value The value to set the meta field to.
	 *
	 * @return bool|int
	 */
	public function set_meta( $key, $value ) {
		assert( ! empty( $key ) );

		return update_post_meta( $this->post->ID, $key, $value );
	}

	/**
	 * Adds the given meta field - add_post_meta().
	 *
	 * @param $key   string The meta key to get for the post.
	 * @param $value mixed The value to set the meta field to.
	 *
	 * @return false|int
	 */
	public function add_meta( $key, $value ) {
		assert( ! empty( $key ) );

		return add_post_meta( $this->post->ID, $key, $value );
	}

	/**
	 * Deletes the given meta field - delete_post_meta().
	 *
	 * @param string $key   The meta key to get for the post.
	 * @param string $value The value to set the meta field to.
	 *
	 * @return bool False for failure. True for success.
	 */
	public function delete_meta( $key, $value = '' ) {
		assert( ! empty( $key ) );

		return delete_post_meta( $this->post->ID, $key, $value );
	}

	/**
	 * Retrieve the terms for a post. Calls wp_get_post_terms for this post.
	 * https://codex.wordpress.org/Function_Reference/wp_get_post_terms.
	 *
	 * @param string $taxonomy The taxonomy for which to retrieve terms.
	 *                         Defaults to post_tag.
	 * @param array  $args     Overwrite the defaults.
	 *
	 * @return array|WP_Error Array of terms or WP_Error if taxonomy does not
	 * exist.
	 */
	public function get_terms( $taxonomy = 'post_tag', $args = [] ) {
		assert( ! empty( $taxonomy ) );

		return wp_get_post_terms( $this->post->ID, $taxonomy, $args );
	}

}
