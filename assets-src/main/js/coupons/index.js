// Library imports.
import $ from 'jquery';

// Local imports.
import { ValidateCoupon } from './validate-coupon';

/**
 * Initialize the country and state selectors.
 */
$( document ).ready( function() {
	// Validate Coupon functionality.
	new ValidateCoupon( '#chargify_coupon_verify_button', '#chargify_coupon_code' );
} );
