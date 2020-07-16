<?php
/**
 * The model for WP Chargify Users.
 *
 * @file    wp-chargify/includes/model/chargify-user.php
 * @package WPChargify
 */

namespace Chargify\Model;

use Chargify\Libraries\Date_Helper;
use Chargify\Libraries\User;

/**
 * The model for WP Chargify Users. Can be a base for theme user model extension.
 */
class Chargify_User extends User {

	const ROLE              = 'chargify_user';
	const ROLE_CAPABILITIES = [
		'read' => true, // Same as the standard subscriber.
	];

	const META_CHARGIFY_ACCOUNT_ID = 'chargify_account_id';

	/**
	 * Account state constants.
	 *
	 * Known Chargify constants.
	 * Active       'active'
	 * Canceled     'canceled'
	 * Expired      'expired'
	 * On Hold      'on_hold'
	 * Past Due     'past_due'
	 * Soft Failure 'soft_failure'
	 * Trialing     'trialing'
	 * Trial Ended  'trial_ended'
	 * Unpaid       'unpaid'
	 */
	const VALUE_CHARGIFY_ACCOUNT_STATUS_ACTIVE       = 'active';
	const VALUE_CHARGIFY_ACCOUNT_STATUS_CANCELED     = 'canceled';
	const VALUE_CHARGIFY_ACCOUNT_STATUS_EXPIRED      = 'expired';
	const VALUE_CHARGIFY_ACCOUNT_STATUS_ON_HOLD      = 'on_hold';
	const VALUE_CHARGIFY_ACCOUNT_STATUS_PAST_DUE     = 'past_due';
	const VALUE_CHARGIFY_ACCOUNT_STATUS_SOFT_FAILURE = 'soft_failure';
	const VALUE_CHARGIFY_ACCOUNT_STATUS_TRIALING     = 'trialing';
	const VALUE_CHARGIFY_ACCOUNT_STATUS_TRIAL_ENDED  = 'trial_ended';
	const VALUE_CHARGIFY_ACCOUNT_STATUS_UNPAID       = 'unpaid';

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
	 * Returns a the role name translated.
	 *
	 * @return mixed
	 */
	public function get_role_name() {
		return __( 'Chargify User', 'chargify' );
	}

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
	 * @return bool|null|Chargify_Account
	 */
	public function get_chargify_account( $new_fetch = false ) {

		$chargify_account_id = $this->get_chargify_account_id( $new_fetch );

		if ( $chargify_account_id && ( null === $this->chargify_account || $new_fetch ) ) {
			$chargify_account_factory = new Chargify_Account_Factory();
			$this->chargify_account   = $chargify_account_factory->get_by_id( $chargify_account_id );
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

	/**
	 * For the account to be active and in date, the account must be in active or trialing state.
	 * Also the account expiry date must be after today.
	 *
	 * @return bool
	 */
	public function is_account_active_and_in_date() {
		return ( $this->is_account_active() || $this->is_account_trialing() ) && $this->is_account_date_valid();
	}

	/**
	 * Checks the accounts date to see if it has not expired.
	 *
	 * @return bool|null
	 */
	public function is_account_date_valid() {
		$chargify_account = $this->get_chargify_account();
		$is               = false;

		if ( $chargify_account instanceof Chargify_Account ) {
			$expiration_date_iso_8601 = $chargify_account->get_chargify_expiration_date();

			if ( $expiration_date_iso_8601 ) {
				$expiration_date = gmdate( Date_Helper::DATE_FORMAT_DEFAULT, strtotime( $expiration_date_iso_8601 ) );

				// Check that the expiration date is after today, today cannot be the expiration date.
				$is = Date_Helper::date_is_after_today( $expiration_date );
			}
		}

		return $is;
	}

	/**
	 * Base method to check account state.
	 *
	 * @param string $account_state To check if account state matches.
	 *
	 * @return bool
	 */
	protected function is_account_state( $account_state ) {
		$chargify_account = $this->get_chargify_account();
		$is               = false;

		if ( $chargify_account instanceof Chargify_Account ) {
			$subscription_status = $chargify_account->get_chargify_subscription_status();
			$is                  = $subscription_status === $account_state;
		}

		return $is;
	}

	/**
	 * Check if the account state is active.
	 *
	 * @return bool
	 */
	public function is_account_active() {
		return $this->is_account_state( self::VALUE_CHARGIFY_ACCOUNT_STATUS_ACTIVE );
	}

	/**
	 * Check if the account state is active.
	 *
	 * @return bool
	 */
	public function is_account_canceled() {
		return $this->is_account_state( self::VALUE_CHARGIFY_ACCOUNT_STATUS_CANCELED );
	}


	/**
	 * Check if the account state is expired.
	 *
	 * @return bool
	 */
	public function is_account_expired() {
		return $this->is_account_state( self::VALUE_CHARGIFY_ACCOUNT_STATUS_EXPIRED );
	}

	/**
	 * Check if the account state is on hold.
	 *
	 * @return bool
	 */
	public function is_account_on_hold() {
		return $this->is_account_state( self::VALUE_CHARGIFY_ACCOUNT_STATUS_ON_HOLD );
	}

	/**
	 * Check if the account state is past due.
	 *
	 * @return bool
	 */
	public function is_account_past_due() {
		return $this->is_account_state( self::VALUE_CHARGIFY_ACCOUNT_STATUS_PAST_DUE );
	}

	/**
	 * Check if the account state is soft failure.
	 *
	 * @return bool
	 */
	public function is_account_soft_failure() {
		return $this->is_account_state( self::VALUE_CHARGIFY_ACCOUNT_STATUS_SOFT_FAILURE );
	}

	/**
	 * Check if the account state is trialing.
	 *
	 * @return bool
	 */
	public function is_account_trialing() {
		return $this->is_account_state( self::VALUE_CHARGIFY_ACCOUNT_STATUS_TRIALING );
	}

	/**
	 * Check if the account state is trial ended.
	 *
	 * @return bool
	 */
	public function is_account_trial_ended() {
		return $this->is_account_state( self::VALUE_CHARGIFY_ACCOUNT_STATUS_TRIAL_ENDED );
	}

	/**
	 * Check if the account state is unpaid.
	 *
	 * @return bool
	 */
	public function is_account_unpaid() {
		return $this->is_account_state( self::VALUE_CHARGIFY_ACCOUNT_STATUS_UNPAID);
	}

}
