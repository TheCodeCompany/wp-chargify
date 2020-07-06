// Library imports.
import $ from 'jquery';

// Local imports.
import { CountryStateSelector } from './country-state-selector';

/**
 * Initialize the country and state selectors.
 */
$(document).ready(function() {
	// Standard address country and state selectors.
	window.select_country_field = new CountryStateSelector( '#chargify_country', '#chargify_state' );

	// Billing address country and state selectors.
	window.select_country_field = new CountryStateSelector( '#chargify_billing_country', '#chargify_billing_state' );
});
