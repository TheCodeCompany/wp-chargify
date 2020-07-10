<?php
/**
 * The model for WP Chargify Users.
 *
 * @file    wp-chargify/includes/model/chargify-user.php
 * @package WPChargify
 */

namespace Chargify\Model;

use Chargify\Libraries\User;

/**
 * The model for WP Chargify Users. Can be a base for theme user model extension.
 */
class ChargifyUser extends User {

	const ROLE              = 'chargify_user';
	const ROLE_NAME         = 'Chargify User';
	const ROLE_CAPABILITIES = [
		'read' => true, // Same as the standard subscriber.
	];

	const META_CHARGIFY_ACCOUNT_ID = 'chargify_account_id';

	/**
	 * Stores the chargify account id.
	 *
	 * @var null|bool
	 */
	protected $chargify_account_id = null;

	/**
	 * Stores the chargify account.
	 *
	 * @var null|bool
	 */
	protected $chargify_account = null;

	/**
	 * Stores the check for is chargify user.
	 *
	 * @var null|bool
	 */
	protected $is_chargify_user = null;

	/**
	 * =========================================================================
	 * Getters
	 * -------------------------------------------------------------------------
	 */

	/**
	 * Checks if this user is a single purpose user.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized in a
	 *                        parameter.
	 *
	 * @return bool|null
	 */
	public function get_chargify_account_id( $new_fetch = false ) {

		if ( null === $this->chargify_account_id || $new_fetch ) {
			$value = $this->get_meta( self::META_CHARGIFY_ACCOUNT_ID );

			$this->chargify_account_id = $value && is_numeric( $value ) ? (int) $value : 0;
		}

		return $this->chargify_account_id;
	}

	/**
	 * Checks if this user is a single purpose user.
	 *
	 * @param bool $new_fetch Fetch the stored value from the database even if this value has been localized in a
	 *                        parameter.
	 *
	 * @return bool|null
	 */
	public function get_chargify_account( $new_fetch = false ) {

		$chargify_account_id = $this->get_chargify_account_id( $new_fetch );

		if ( $chargify_account_id && ( null === $this->chargify_account || $new_fetch ) ) {
			$chargify_account_factory = new ChargifyAccountFactory();
			$this->chargify_account         = $chargify_account_factory->get_by_id( $chargify_account_id );
		}

		return $this->chargify_account;
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
	public function is_chargify_user() {
		if ( null === $this->is_admin ) {
			$this->is_admin = in_array( self::ROLE, (array) $this->roles, true );
		}

		return $this->is_admin;
	}

	public function is_active() {
		return false;
	}

}
