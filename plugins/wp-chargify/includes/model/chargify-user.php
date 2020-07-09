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

	/**
	 * Stores the check for is chargify user.
	 *
	 * @var null|bool
	 */
	protected $is_chargify_user = null;

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

}
