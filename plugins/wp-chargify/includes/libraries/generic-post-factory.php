<?php
/**
 * A factory for Generic_Post instances
 *
 * @file    wp-chargify/includes/libraries/generic-post-factory.php
 * @package WPCHargify
 */

namespace Chargify\Libraries;

use WP_Post;

/**
 * A factory which produces `PostModel` instances.  Where possible, a `PostModel`
 * instance should not be instantiated directly.  It should always go via one of
 * the methods in this class.
 */
class Generic_Post_Factory extends Model_Factory {

	/**
	 * Returns a `Generic_Post` with the given ID.
	 *
	 * @param int|string $id The post ID.
	 *
	 * @return null|Generic_Post
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
	 * Get the post object by the given identifyer.
	 *
	 * @param string|int $identifier      The identifyer value
	 * @param string     $identifier_type The type of identifyer, id or slug.
	 *
	 * @return Generic_Post|null
	 */
	public function get_by( $identifier, $identifier_type = 'id' ) {
		$post = null;

		// Get post by identifier.
		if ( 'id' === $identifier_type ) {
			$post = $this->get_by_id( $identifier );
		} elseif ( 'slug' === $identifier_type ) {
			$post = $this->get_by_slug( $identifier );
		}

		return $post;
	}

	/**
	 * Returns a `Generic_Post` with the given slug.
	 *
	 * @param string $slug The post_name or 'slug' to query for.
	 *
	 * @return null|Generic_Post
	 */
	public function get_by_slug( $slug ) {
		$post = null;

		$args = [
			'name'           => $slug,
			'posts_per_page' => 1,
		];

		$results = $this->get_posts( $args );
		if ( ! empty( $results ) ) {
			$post = $results[0]; // Retrieve first result.
		}

		return $post;
	}

	/**
	 * Returns an array of `Generic_Post`s which match the given search.
	 *
	 * @param array  $args   The get_posts() arguments.
	 * @param string $output What to output.
	 *
	 * @return array
	 */
	public function get_posts( $args, $output = 'post_wrapper' ) {

		$default_args = [
			'post_type'   => $this->get_post_type(),
			'post_status' => 'any',
		];

		$args = array_merge( $default_args, $args ); // SWAPPED!

		$query = new \WP_Query( $args );
		$posts = $query->posts;

		return $this->convert_posts_to_output( $posts, $output );
	}

	/**
	 * Returns a count of all posts that match with the arguments.
	 *
	 * @param array $args The arguments supplied to retrieve posts by.
	 *
	 * @return integer The number of posts found.
	 */
	public function get_found_posts( $args ) {

		$default_args = [
			'post_type' => $this->get_post_type(),
		];

		$args = array_merge( $args, $default_args );

		$query       = new \WP_Query( $args );
		$found_posts = $query->found_posts;

		return $found_posts;
	}

	/**
	 * Converts the array of WP Post objects into the desired output
	 *
	 * @param array  $posts  Array of WP_Post $posts.
	 * @param string $output 'post', 'post_wrapper' or 'id'.
	 *
	 * @return array The post in the desired output.
	 */
	public function convert_posts_to_output( $posts, $output = 'post' ) {
		$converted_posts = [];

		if ( 'post' === $output ) {
			$converted_posts = $posts;
		} else {
			foreach ( $posts as $post ) {
				$converted_posts[] = $this->convert_post_to_output( $post, $output );
			}
		}

		return $converted_posts;
	}

	/**
	 * Converts the WP Post object into the desired output
	 *
	 * @param WP_Post $post   The post object.
	 * @param string  $output 'post', 'post_wrapper' or 'id'.
	 *
	 * @return Generic_Post|null The post in the desired output.
	 */
	public function convert_post_to_output( $post, $output = 'post' ) {
		$converted_post = null;

		if ( 'post_wrapper' === $output ) {
			$converted_post = $this->wrap( $post );
		} elseif ( 'id' === $output ) {
			$converted_post = $post->ID;
		} elseif ( 'post' === $output ) {
			$converted_post = $post;
		}

		return $converted_post;
	}

	/**
	 * Creates a new post into the database,  returning the result as a `\alyte\Post` instance.
	 *
	 * @param array $insert_post_args The `wp_insert_post()` args.
	 * @param array $meta_fields      The meta fields to add. [ 'meta_key' => 'meta_value' ].
	 *
	 * @return array|Generic_Post|WP_Post|null
	 */
	public function create_post( $insert_post_args = [], $meta_fields = [] ) {

		$post_type = $this->get_post_type();

		if ( 'any' === $post_type ) {
			$post_type = 'post'; // WP default.
		}

		$default_args = [
			'post_type'   => $post_type,
			'post_status' => 'publish',
		];

		$insert_post_args = array_merge( $default_args, $insert_post_args );

		// Insert the post object.
		$id = wp_insert_post( $insert_post_args );
		if ( empty( $id ) ) {
			return null;
		}

		// The inserted post instance.
		$post = get_post( $id );
		assert( ! empty( $post ) );
		$post = $this->wrap( $post );
		assert( ! empty( $post ) );

		// Set all of the custom meta fields.
		foreach ( $meta_fields as $key => $value ) {
			$post->set_meta( $key, $value );
		}

		return $post;

	}

	/**
	 * Deletes the post
	 *
	 * @param WP_Post $post         The Post object.
	 * @param boolean $force_delete To force the deletion of the post.
	 */
	public function delete_post( $post, $force_delete = false ) {
		$this->delete_post_by_id( $post->ID, $force_delete );
	}

	/**
	 * Deletes the post identified by ID
	 *
	 * @param int     $post_id      The id of the post being deleted.
	 * @param boolean $force_delete To force the deletion of the post.
	 */
	public function delete_post_by_id( $post_id, $force_delete = false ) {
		wp_delete_post( $post_id, $force_delete );
	}

	/**
	 * Gets post type of the custom post type associated with this model factory.
	 */
	public function get_post_type() {
		return 'any';
	}

	/**
	 * Returns a Generic_Post instance which wraps the given post.
	 *
	 * @param WP_Post $post The post being wrapped.
	 *
	 * @return Generic_Post
	 */
	public function wrap( $post ) {
		assert( ! empty( $post ) );

		return new Generic_Post( $post );
	}
}
