<?php
/**
 * Class User. A Base user model to extend from.
 *
 * @file     wp-chargify/includes/libraries/user.php
 * @package  WPChargify
 */

namespace Chargify\Libraries;

use WP_User;

/**
 * Class User. A Base user model to extend from.
 */
class User {

	/**
	 * Constants
	 * User fields - these constants are string representations of the WP_User fields used.
	 */
	const CURRENT_PASSWORD   = 'current_password';
	const PASSWORD           = 'password';
	const REPEAT_PASSWORD    = 'repeat_password';
	const RESET_PASS_CODE    = 'reset_pass_code';
	const EMAIL_CONFIRMED    = 'email_confirmed';
	const CONFIRM_EMAIL_CODE = 'confirm_email_code';

	const FIELD_USER_LOGIN = 'user_login';
	const FIELD_USER_EMAIL = 'user_email';
	const META_FIRST_NAME  = 'first_name';
	const META_LAST_NAME   = 'last_name';
	const META_PASSWORD    = 'user_pass';

	/**
	 * The backing WP_User object.
	 *
	 * @var int|WP_User
	 */
	private $user;

	/**
	 * Stores the check for is admin.
	 *
	 * @var null|bool
	 */
	protected $is_admin = null;

	/**
	 * Stores the check for is subscriber.
	 *
	 * @var null|bool
	 */
	protected $is_subscriber = null;

	/**
	 * =========================================================================
	 * Base methods.
	 * -------------------------------------------------------------------------
	 */

	/**
	 * Get the full WP User object.
	 *
	 * @return int
	 */
	public function get_wp_user() {
		return $this->user;
	}

	/**
	 * User constructor.
	 *
	 * @param int|WP_User $user The User ID or WP User object.
	 */
	public function __construct( $user = 0 ) {
		assert( ! empty( $user ) );

		if ( 'object' === (string) gettype( $user ) ) {
			$this->user = $user;
		} else {
			$this->user = get_user_by( 'id', $user );
		}
	}

	/**
	 * Shortcut method for `wp_update_user()`.
	 *
	 * @param array $args The `wp_update_user()` arguments.  ID is automatically added.
	 *
	 * @return mixed
	 */
	public function update( $args ) {
		assert( ! empty( $args ) );
		$args['ID'] = $this->user->ID;

		return wp_update_user( $args );

	}

	/**
	 * Get user meta values.
	 *
	 * @param string $name Property name.
	 *
	 * @return mixed
	 */
	public function __get( $name ) {
		return $this->user->$name;
	}

	/**
	 * Set user meta values.
	 *
	 * @param string $name  Property name.
	 * @param mixed  $value Property value.
	 */
	public function __set( $name, $value ) {
		$this->user->$name = $value;
	}

	/**
	 * Call a function.
	 *
	 * @param string $name Property name.
	 * @param array  $args Args to use in the function.
	 *
	 * @return mixed
	 */
	public function __call( $name, $args ) {
		return call_user_func_array( array( $this->user, $name ), $args );
	}

	/**
	 * Returns the given meta field.
	 *
	 * @param string  $key    The meta key to get for the user.
	 * @param boolean $single Whether to get a single value, or array of all metas. Default `true`.
	 *
	 * @return mixed Will be an array if $single is false. Will be value of meta data field if $single is true.
	 */
	public function get_meta( $key = null, $single = true ) {
		return get_user_meta( $this->user->ID, $key, $single );
	}

	/**
	 * Sets the given meta field - update_user_meta().
	 *
	 * @param string $key   The meta key to get for the user.
	 * @param mixed  $value The value to set the meta field to.
	 *
	 * @return int|bool Meta ID if the key didn't exist, true on successful update, false on failure.
	 */
	public function set_meta( $key, $value ) {
		assert( ! empty( $key ) );

		return update_user_meta( $this->user->ID, $key, $value );
	}

	/**
	 * Adds the given meta field - add_user_meta().
	 *
	 * @param string $key    The meta key to get for the user.
	 * @param mixed  $value  The value to set the meta field to.
	 * @param bool   $unique Optional. Whether the same key should not be added. Default false.
	 *
	 * @return int|false Meta ID on success, false on failure.
	 */
	public function add_meta( $key, $value, $unique = false ) {
		assert( ! empty( $key ) );

		return add_user_meta( $this->user->ID, $key, $value, $unique );
	}

	/**
	 * Deletes the given meta field - delete_user_meta().
	 *
	 * @param string $key   The meta key to get for the user.
	 * @param string $value The value to set the meta field to.
	 *
	 * @return bool True on success, false on failure.
	 */
	public function delete_meta( $key, $value = '' ) {
		assert( ! empty( $key ) );

		return delete_user_meta( $this->user->ID, $key, $value );
	}

	/**
	 * Calls the set_role function on the user object
	 *
	 * @param string $role Role to pass to the set_role call on $this->user.
	 */
	public function set_role( $role ) {
		$this->user->set_role( $role );
	}

	/**
	 * Calls the add_role function on the user object
	 *
	 * @param string $role Role to pass to the add_role call on $this->user.
	 */
	public function add_role( $role ) {
		$this->user->add_role( $role );
	}

	/**
	 * Calls the remove_role function on the user object
	 *
	 * @param string $role Role to pass to the remove_role call on $this->user.
	 */
	public function remove_role( $role ) {
		$this->user->remove_role( $role );
	}

	/**
	 * =========================================================================
	 * Getters
	 * -------------------------------------------------------------------------
	 */

	/**
	 * Get the username of the user.
	 *
	 * @return string
	 */
	public function get_username() {
		$email = $this->user_login;

		return $email;
	}

	/**
	 * Get the full name of the user.
	 *
	 * @return string
	 */
	public function get_full_name() {
		$full_name = $this->first_name . ' ' . $this->last_name;

		return trim( $full_name );
	}

	/**
	 * Get the email address of the user.
	 *
	 * @return string
	 */
	public function get_email() {
		$email = $this->user_email;

		return $email;
	}

	/**
	 * =========================================================================
	 * Is Conditionals
	 * -------------------------------------------------------------------------
	 */

	/**
	 * Is the user an administrator.
	 *
	 * @return bool
	 */
	public function is_admin() {
		if ( null === $this->is_admin ) {
			$this->is_admin = in_array( 'administrator', (array) $this->roles, true );
		}

		return $this->is_admin;
	}

	/**
	 * Is the user an subscriber.
	 *
	 * @return bool
	 */
	public function is_subscriber() {
		if ( null === $this->is_subscriber ) {
			$this->is_subscriber = in_array( 'subscriber', (array) $this->roles, true );
		}

		return $this->is_subscriber;
	}

}
