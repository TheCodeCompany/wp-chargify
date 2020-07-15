<?php
/**
 * General user factory, can be extended from for specific user variants.
 *
 * @file     wp-chargify/includes/libraries/user-factory.php
 * @package  WPChargify
 */

namespace Chargify\Libraries;

use Chargify\Libraries\ModelFactory;
use WP_User;
use WP_User_Query;

/**
 * General user factory, can be extended from for specific user variants.
 */
class UserFactory extends ModelFactory {

	/**
	 * UserFactory constructor.
	 */
	public function __construct() {
	}

	/**
	 * Returns the `User` for the current logged in user.
	 */
	public function get_current() {
		return $this->get_by_id( get_current_user_id() );
	}

	/**
	 * Returns a `User` with the given ID.
	 *
	 * @param int $id User id.
	 *
	 * @return null|User
	 */
	public function get_by_id( $id ) {

		$user = get_user_by( 'id', $id );
		if ( empty( $user ) ) {
			return null;
		} else {
			return $this->wrap( $user );
		}

	}

	/**
	 * Get users.
	 *
	 * @param array  $args   The args to use in the query.
	 * @param string $output Output type.
	 *
	 * @return array
	 */
	public function get_users( $args, $output = 'user_wrapper' ) {

		$default_args = array();

		if ( method_exists( $this, 'get_user_role' ) ) {
			$default_args['role'] = $this->get_user_role();
		}

		$args = array_merge( $args, $default_args );

		$query = new WP_User_Query( $args );
		$users = $query->get_results();

		return $this->convert_users_to_output( $users, $output );
	}

	/**
	 * Helper formatting method.
	 *
	 * @param array  $users  Array of users from a WP_User_Query get_results() array.
	 * @param string $output Output type.
	 *
	 * @return array
	 */
	public function convert_users_to_output( $users, $output = 'user' ) {
		$converted_users = array();

		if ( 'user' === $output ) {
			$converted_users = $users;
		} else {
			foreach ( $users as $user ) {
				$converted_users[] = $this->convert_user_to_output( $user, $output );
			}
		}

		return $converted_users;
	}

	/**
	 * Format the user for output.
	 *
	 * @param WP_User $user   The user object.
	 * @param string  $output Output type.
	 *
	 * @return User|null
	 */
	public function convert_user_to_output( $user, $output = 'user' ) {
		$converted_user = null;

		if ( 'user_wrapper' === $output ) {
			$converted_user = $this->wrap( $user );
		} elseif ( 'id' === $output ) {
			$converted_user = $user->ID;
		} elseif ( 'user' === $output ) {
			$converted_user = $user;
		}

		return $converted_user;
	}

	/**
	 * Creates a new user into the database, returning the result as a `User` instance.
	 *
	 * @param string $username    The user's username.
	 * @param string $password    The user's password.
	 * @param string $email       Optional. The user's email. Default empty.
	 * @param array  $meta_fields The meta fields for the user.
	 *
	 * @return User null if failed.
	 */
	public function create_user( $username, $password, $email, $meta_fields = array() ) {

		// Insert the post object.
		$id = wp_create_user( $username, $password, $email );

		// Return WP_Error if process failed.
		if ( is_wp_error( $id ) ) {
			return $id;
		}

		// The inserted post instance.
		$user = get_user_by( 'id', $id );
		assert( ! empty( $user ) );
		$user = $this->wrap( $user );
		assert( ! empty( $user ) );

		// Set all of the custom meta fields.
		foreach ( $meta_fields as $key => $value ) {
			$user->set_meta( $key, $value );
		}

		return $user;

	}

	/**
	 * Deletes the given user.
	 *
	 * @param WP_User|User $user         The user object.
	 * @param boolean      $force_delete Flag to force deletion of user.
	 */
	public function delete_user( $user, $force_delete = false ) {
		$this->delete_user_by_id( $user->ID, $force_delete );
	}

	/**
	 * Deletes the user identified by ID.
	 *
	 * @param int  $user_id      The ID of the user being deleted.
	 * @param bool $force_delete To force deletion or not.
	 *
	 * @return bool
	 */
	public function delete_user_by_id( $user_id, $force_delete = false ) {

		$deleted = false;

		// Multisite delete.
		if ( function_exists( 'wpmu_delete_user' ) ) {
			$deleted = wpmu_delete_user( $user_id );
		} elseif ( function_exists( 'wp_delete_user' ) ) {
			$deleted = wp_delete_user( $user_id, $force_delete );
		}

		return $deleted;
	}

	/**
	 * Returns a User instance which wraps the given post.
	 *
	 * @param WP_User|User $user The user object.
	 *
	 * @return User
	 */
	public function wrap( $user ) {
		assert( ! empty( $user ) );

		return new User( $user );
	}

	/**
	 * Retrieve wrapped user instance by a given field, shortcut for WordPress `get_user_by` function
	 *
	 * @param string $field The field to retrieve the user with. id | ID | slug | email | login.
	 * @param string $value A value for $field. A user ID, slug, email address, or login name.
	 *
	 * @return null|User
	 */
	public function get_user_by( $field, $value ) {
		$wrapped_user = null;

		$user = get_user_by( $field, $value );
		if ( ! empty( $user ) ) {
			$wrapped_user = $this->wrap( $user );
		}

		return $wrapped_user;
	}

}
