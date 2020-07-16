<?php
/**
 * The factory for chargify users.
 *
 * @file    wp-chargify/includes/model/chargify-user-factory.php
 * @package WPChargify
 */

namespace Chargify\Model;

use Chargify\Libraries\User;
use Chargify\Libraries\User_Factory;
use WP_User;

/**
 * The factory for chargify users.
 */
class ChargifyUser_Factory extends User_Factory {

	/**
	 * User object.
	 *
	 * @param WP_User|User|ChargifyUser $user User object.
	 *
	 * @return ChargifyUser
	 */
	public function wrap( $user ) {
		assert( ! empty( $user ) );

		return new ChargifyUser( $user );
	}

}
