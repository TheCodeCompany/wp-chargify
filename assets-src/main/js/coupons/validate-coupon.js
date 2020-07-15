import $ from 'jquery';

import { log } from '../../../helpers/logger';
import check from '../../../helpers/check-data-types';
// import { check, log, centsToDollars } from '../helpers';

// Grab config params.
const {
	ajaxURL,
	validateCouponAction,
	validateCouponNonce,
} = window.wpChargifyMainConfig;

export class ValidateCoupon {

	// Buttons.
	_validateButtonEl;
	_validateButtonElHtml;

	// Elements
	_couponInputEl;
	_couponMessageEl;

	_productFamilyIdEl;
	_couponApplied = false;


	// Flags
	_showMessage = false;
	_showingMessage = false;
	_messageTimeoutTriggered = false;

	/**
	 * Constructor for the validate coupon js.
	 *
	 * @param {jQuery|HTMLElement|string} validateButtonID The container of valid id selector to use with jQuery.
	 * @param {jQuery|HTMLElement|string} couponInputID The container of valid id selector to use with jQuery.
	 *
	 * TODO.
	 * need elements
	 * current price in cents, hidden, with attached current price in dollars visual.
	 * discount %
	 * discount fixed %
	 * discounted price in cents, hidden, with attached current price in dollars visual only if discount is different to current.
	 */
	constructor( validateButtonID, couponInputID ) {
		this.validateButtonEl = $( validateButtonID );
		this.couponInputEl = $( couponInputID );
		this.couponMessageEl = $( '#chargify_coupon_messages_cntr' );

		// Sanity check that the elements exists.
		if ( this.validateButtonEl.length && this.couponInputEl.length && this.couponMessageEl.length ) {

			// The original button html.
			this.validateButtonElHtml = this.validateButtonEl.html();

			// functionality.
			this.onInput();
			this.onSubmit();
			this.couponMessageEvents();

		} else {
			log( {
				type: 'debug',
				message: 'No coupon fields on this page.',
			} );
		}
	}

	/** ------------------------------------------------------------------------------------------
	 * Submit Process
	 * ------------------------------------------------------------------------------------------ */

	/**
	 * Form submit.
	 */
	onSubmit() {
		// Form should be valid before submit button works.
		this.validateButtonEl.click( ( e ) => {
			e.preventDefault();

			const coupon = this.couponInputEl.val();

			// If there is a coupon proceed.
			if ( coupon.length ) {
				this.submitting( true );

				this.showDiscountEls( false );
				this.clearDiscountEls();

				// Start process.
				// STEP 1. Check via admin ajax that the coupon is valid, and retrieve its information.
				this.validateCoupon().then( ( response ) => {

					// Display the return message.
					if ( check.isDefined( response.message ) ) {
						const messageType = response.success ? 'success' : 'warning';
						this.displayMessage( response.message, messageType );
					}

					if ( response.success ) {
						const { data } = response;
						const { coupon } = data;

						log( {
							type: 'info',
							message: 'Successful retrieved the coupon.',
							details: { response },
						} );

						// TODO continue testing.
						// TODO delete Current Test Codes; TCCTESTCOUPONFIXED, TCCTESTCOUPONPERCENT

						// TODO.
						this.processCouponResult( coupon );
						this.showDiscountEls( true );
						this.submitting( false );
						this.couponInputEl.trigger( 'coupon_message' );

						return true;
					}
					throw new Error();
				} ).catch( () => {
					// Don't log errors, leave that to log(). Reset for and scroll to message.
					this.clearDiscountEls();
					this.showDiscountEls( false );
					this.submitting( false );
				} );
			} else {
				this.displayMessage( 'Please enter a coupon.', 'warning' );
			}
		} );
	}

	/**
	 * Gather the base product data that may be used by the endpoint to verify the coupon.
	 * Typically the product family id is the only thing required, however if its not present the other fields may be used to back trace and find within the controller.
	 *
	 * @returns {Object}
	 */
	productDetails() {

		// Base object to gather details for.
		let productDetails = {
			chargify_product_family_id: '',
			chargify_product_id: '',
			chargify_product_handle: '',
			chargify_price_point_id: '',
			chargify_price_point_handle: '',
			chargify_component_id: '',
			chargify_component_handle: '',
			chargify_component_price_point_id: '',
			chargify_component_price_point_handle: '',
		}

		// Gather the values from the inputs.
		const productFamilyIdField = $( '#chargify_product_family_id' );
		if ( productFamilyIdField.length && productFamilyIdField.val() ) {
			productDetails[ 'chargify_product_family_id' ] = productFamilyIdField.val();
		}

		// Gather the values from the inputs.
		const productIdField = $( '#chargify_product_id' );
		if ( productIdField.length && productIdField.val() ) {
			productDetails[ 'chargify_product_id' ] = productIdField.val();
		}

		// Gather the values from the inputs.
		const productHandleField = $( '#chargify_product_handle' );
		if ( productHandleField.length && productHandleField.val() ) {
			productDetails[ 'chargify_product_handle' ] = productHandleField.val();
		}

		// Gather the values from the inputs.
		const productPricePointIdField = $( '#chargify_price_point_id' );
		if ( productPricePointIdField.length && productPricePointIdField.val() ) {
			productDetails[ 'chargify_price_point_id' ] = productPricePointIdField.val();
		}

		// Gather the values from the inputs.
		const productPricePointHandleField = $( '#chargify_price_point_handle' );
		if ( productPricePointHandleField.length && productPricePointHandleField.val() ) {
			productDetails[ 'chargify_price_point_handle' ] = productPricePointHandleField.val();
		}

		// Gather the values from the inputs.
		const productComponentIdField = $( '#chargify_component_id' );
		if ( productComponentIdField.length && productComponentIdField.val() ) {
			productDetails[ 'chargify_component_id' ] = productComponentIdField.val();
		}

		// Gather the values from the inputs.
		const productComponentHandleField = $( '#chargify_component_handle' );
		if ( productComponentHandleField.length && productComponentHandleField.val() ) {
			productDetails[ 'chargify_component_handle' ] = productComponentHandleField.val();
		}

		// Gather the values from the inputs.
		const productComponentPricePointIdField = $( '#chargify_component_price_point_id' );
		if ( productComponentPricePointIdField.length && productComponentPricePointIdField.val() ) {
			productDetails[ 'chargify_component_price_point_id' ] = productComponentPricePointIdField.val();
		}

		// Gather the values from the inputs.
		const productComponentPricePointHandleField = $( '#chargify_component_price_point_handle' );
		if ( productComponentPricePointHandleField.length && productComponentPricePointHandleField.val() ) {
			productDetails[ 'chargify_component_price_point_handle' ] = productComponentPricePointHandleField.val();
		}

		return productDetails;
	}

	/**
	 * Connects with WP ajax to validate the coupon.
	 *
	 * @returns {Promise<*>}
	 */
	async validateCoupon() {
		const data = {
			action: validateCouponAction,
			wp_nonce: validateCouponNonce,
			coupon_code: this.couponInputEl.val(),
			...this.productDetails(),
		};

		return await $.post( ajaxURL, data, ( response ) => {
			if ( ! check.isDefined( response ) ) {
				response = {};
				response.success = false;
				response.message = 'An unexpected error validating coupon.';
				log( {
					type: 'error',
					message: 'Response undefined in validateCoupon().',
				} );
			}

			return response;
		} ).fail( ( xhr, status, error ) => {
			log( {
				type: 'error',
				message: 'Error validating coupon.',
				details: {
					xhr,
					status,
					error,
				},
			} );
		} );
	}

	/**
	 * Reset the coupon information if the input changes after the coupons been applied
	 */
	onInput() {
		this.couponInputEl.on( 'input', () => {
			console.log( 'coupon input' );
			if ( this.couponApplied ) {
				this.clearDiscountEls();
				this.showDiscountEls( false );
			}
		} );
	}

	/**
	 * Process the result from the server.
	 *
	 * @param coupon
	 */
	processCouponResult( coupon ) {

		const {
			amount_in_cents,
			percentage,
		} = coupon;

		// Gather the total cost from the hidden input.
		const totalCostIncCentsEl = $( '#chargify_total_in_cents' );
		const totalCostIncCentsDiscountedEl = $( '#chargify_total_in_cents_discounted' );

		// Element for visual display of the discount.
		const totalCostsContainerEl = $( '#total_cost_container' );
		const couponDiscountEl = $( '.coupon-discount' );
		const totalCostDiscountedEl = $( '.total-cost-dollars-discounted' );
		const totalCostIncludingCentsDiscountedInputEls = $( 'input.total-cost-cents-discounted-input' );

		// Calculation variables.
		let couponAppliedText = '',
			totalCostCents = 0,
			totalDiscountInCents = 0,
			totalDiscountedCostDollars = 0.0,
			percent;

		if ( totalCostIncCentsEl.length && totalCostIncCentsEl.val() && couponDiscountEl.length ) {

			totalCostCents = parseInt( totalCostIncCentsEl.val() );
			let totalCostCentsDiscounted = 0;

			if ( null !== amount_in_cents ) {
				// Calculated visuals.
				couponAppliedText = `$${ amount_in_cents / 100 }`;
				totalCostCentsDiscounted = totalCostCents - amount_in_cents;
				totalDiscountedCostDollars = centsToDollars( totalCostCentsDiscounted );
			} else if ( null !== percentage ) {
				percent = parseFloat( percentage ) / 100;
				totalDiscountInCents = totalCostCents * percent;

				// Calculated visuals.
				couponAppliedText = `${ percentage }%`;
				totalCostCentsDiscounted = totalCostCents - totalDiscountInCents;
				totalDiscountedCostDollars = centsToDollars( totalCostCentsDiscounted );
			}

			totalCostsContainerEl.addClass( 'discounted' );
			couponDiscountEl.html( couponAppliedText );
			totalCostDiscountedEl.html( `$${ totalDiscountedCostDollars }` );
			totalCostIncludingCentsDiscountedInputEls.val( totalCostCentsDiscounted );
			this.couponApplied = true;

		} else {
			this.clearDiscountEls();
			this.showDiscountEls( false );
			log( {
				type: 'error',
				message: 'Necessary coupon related elements are missing from the dom.',
				details: { totalCostIncCentsEl, couponDiscountEl },
			} );
		}
	}

	clearDiscountEls() {
		// TODO.
		// Element for visual display of the discount.
		const totalCostsContainerEl = $( '#total_cost_container' );
		const couponDiscountEl = $( '.coupon-discount' );
		const totalCostDiscountedEl = $( '.total-cost-dollars-discounted' );

		couponDiscountEl.html( '' );
		totalCostDiscountedEl.html( '' );
		totalCostsContainerEl.removeClass( 'discounted' );
		this.couponApplied = false;
	}

	/**
	 * Display or hide the discount elements.
	 *
	 * @param value
	 */
	showDiscountEls( value ) {
		// TODO.
		const totalCostsDiscountContainerEl = $( '#total_cost_discount_container' );
		const couponDiscountContainer = $( '#coupon_discount_container' );
		if ( value ) {
			totalCostsDiscountContainerEl.removeClass( 'hidden' );
			couponDiscountContainer.removeClass( 'hidden' );
		} else {
			totalCostsDiscountContainerEl.addClass( 'hidden' );
			couponDiscountContainer.addClass( 'hidden' );
		}
	}

	/** ------------------------------------------------------------------------------------------
	 * Message.
	 * ------------------------------------------------------------------------------------------ */

	couponMessageEvents() {
		// Any change to the coupon input clear message.
		$( this.couponInputEl ).on( 'clear_coupon_message_timeout', () => {

			if ( this.showMessage && ! this.showingMessage ) {
				this.showingMessage = true;

				setTimeout( () => {
					// Update html and classes.
					this.couponMessageEl.html( '' ).removeClass().addClass('hidden');

					// Flags.
					this.showMessage = false;
					this.showingMessage = false;
					this.messageTimeoutTriggered = false;
				}, 5000 );
			}
		} );
	}

	displayMessage( message, type ) {
		this.showMessage = true;

		// Add the message and the class name.
		this.couponMessageEl.html( message ).addClass( type );

		// Any change to the coupon input, clear the message.
		this.couponInputEl.on( 'keyup.coupon_message, change.coupon_message, paste.coupon_message, coupon_message', () => {

			if ( this.showMessage && ! this.messageTimeoutTriggered ) {
				// this.messageTimeoutTriggered = true; // temporarily prevents additional triggers.
				this.triggerClearCouponMessageTimeout();
				this.couponInputEl.off( 'keyup.coupon_message change.coupon_message paste.coupon_message' );
			}
		} );
	}

	/**
	 * Trigger the timeout to remove the message from screen.
	 */
	triggerClearCouponMessageTimeout() {
		$( this.couponInputEl ).trigger( 'clear_coupon_message_timeout' );
	}

	/** ------------------------------------------------------------------------------------------
	 * Misc.
	 * ------------------------------------------------------------------------------------------ */

	/**
	 * Submitting animation and restrictions for coupon button.
	 *
	 * @param {boolean} value Is the form submitting or not.
	 */
	submitting( value) {
		if ( this.validateButtonEl ) {
			this.validateButtonEl.prop( 'disabled', value );
			if ( value ) {
				this.validateButtonEl.html( 'Validating...' );
			} else {
				this.validateButtonEl.html( this.validateButtonElHtml );
			}
		} else {
			log( {
				type: 'error',
				message: 'Coupon validation button or animation issue, check element ids.',
			} );
		}
	}

	/** ------------------------------------------------------------------------------------------
	 * Setters.
	 * ------------------------------------------------------------------------------------------ */

	set validateButtonEl( value ) {
		this._validateButtonEl = value;
	}

	set couponInputEl( value ) {
		this._couponInputEl = value;
	}

	set couponMessageEl( value ) {
		this._couponMessageEl = value;
	}

	set validateButtonElHtml( value ) {
		this._validateButtonElHtml = value;
	}

	set couponApplied( value ) {
		this._couponApplied = value;
	}

	set showMessage( value ) {
		this._showMessage = value;
	}

	set showingMessage( value ) {
		this._showingMessage = value;
	}

	set messageTimeoutTriggered( value ) {
		this._messageTimeoutTriggered = value;
	}

	/** ------------------------------------------------------------------------------------------
	 * Getters.
	 * ------------------------------------------------------------------------------------------ */

	get validateButtonEl() {
		return this._validateButtonEl;
	}

	get validateButtonElHtml() {
		return this._validateButtonElHtml;
	}

	get couponInputEl() {
		return this._couponInputEl;
	}

	get couponMessageEl() {
		return this._couponMessageEl;
	}

	get couponApplied() {
		return this._couponApplied;
	}

	get showMessage() {
		return this._showMessage;
	}

	get showingMessage() {
		return this._showingMessage;
	}

	get messageTimeoutTriggered() {
		return this._messageTimeoutTriggered;
	}

}
