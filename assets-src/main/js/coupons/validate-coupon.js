import $ from 'jquery';

import { check, log, centsToDollars } from '../helpers';
import { Base } from './index';
import { configParams } from "../config";

// Grab config params.
const {
	ajax_url,
	coupon_validation_action,
	coupon_validation_nonce,
} = configParams;

export class ValidateCoupon {

	// Buttons.
	_validateButton;
	_validateButtonHtml;

	_productFamilyIdEl;
	_couponInputEl;
	_couponApplied = false;

	/**
	 * Constructor for the validate coupon js.
	 *
	 * @param {jQuery|HTMLElement|string} validateButtonSelector The container of valid id selector to use with jQuery.
	 * @param {jQuery|HTMLElement|string} couponInputSelector The container of valid id selector to use with jQuery.
	 */
	constructor( validateButtonSelector, couponInputSelector ) {
		this.validateButton = $( validateButtonSelector );
		this.couponInputEl = $( couponInputSelector );

		// Sanity check that the form exists.
		if ( this.validateButton.length && this.couponInputEl.length ) {

			this._validateButtonHtml = this.validateButton.html();
			this._productFamilyIdEl = $( '#product_family_id' );

			// functionality.
			this.onInput();
			this.onSubmit();

		} else {
			log( {
				type: 'debug',
				message: 'No validate coupon button on this page.',
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
		this.validateButton.click( ( e ) => {
			e.preventDefault();

			const coupon = this.couponInputEl.val();

			// If there is a coupon proceed.
			if ( coupon.length ) {
				this.submitting( true );
				this.showDiscountEls( false );
				this.clearDiscountEls();
				// Start process.
				// STEP 1. Check via admin ajax that the coupon is valid, and retrieve its information.
				this.applyCoupon().then( ( response ) => {
					if ( response.success ) {
						log( {
							type: 'info',
							message: 'Successful retrieved the coupon.',
							details: { response },
						} );

						// TODO continue testing. TCCSTAGINGTESTFIXED, TCCSTAGINGTESTPERCENT

						const { data } = response;
						const { coupon } = data;

						this.processCouponResult( coupon );

						this.showDiscountEls( true );
						this.submitting( false, 'success' );
						this.couponInputEl.trigger( 'page_message' );
						return true;
					}
					throw new Error();
				} ).catch( () => {
					// Don't log errors, leave that to log(). Reset for and scroll to message.
					this.clearDiscountEls();
					this.showDiscountEls( false );
					this.submitting( false, 'fail' );
					this.pageMessage.scrollToPageMessage();
					this.couponInputEl.trigger( 'page_message' );
				} );
			}
		} );
	}

	async applyCoupon() {
		const data = {
			action: coupon_validation_action,
			wp_nonce: coupon_validation_nonce,
			product_family_id: this.productFamilyIdEl.val(),
			coupon_code: this.couponInputEl.val(),
		};

		return await $.post( ajax_url, data, ( response ) => {
			// TODO
			let message = '';
			if ( ! check.isUndefined( response ) ) {
				// If message is present display it.
				if ( ! check.isUndefined( response.message ) ) {
					const type = response.success ? 'success' : 'warning';
					message = response.message;
				}
			} else {
				message = 'An unexpected error validating coupon, please contact us for assistance.';
				response = {};
				response.success = false;
				log( {
					type: 'error',
					message: 'Response undefined in applyCoupon()',
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
		this.couponInputEl.on('input', () => {
			if ( this.couponApplied ) {
				this.clearDiscountEls();
				this.showDiscountEls( false );
			}
		});
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
		const totalCostIncCentsEl = $( '#total_cost_cents' );

		// Element for visual display of the discount.
		const totalCostsContainerEl = $('#total_cost_container');
		const couponDiscountEl = $( '.coupon-discount' );
		const totalCostDiscountedEl = $('.total-cost-dollars-discounted');
		const totalCostIncludingCentsDiscountedInputEls = $( 'input.total-cost-cents-discounted-input');

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

			totalCostsContainerEl.addClass('discounted');
			couponDiscountEl.html( couponAppliedText );
			totalCostDiscountedEl.html( `$${totalDiscountedCostDollars}` );
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
		const totalCostsContainerEl = $('#total_cost_container');
		const couponDiscountEl = $( '.coupon-discount' );
		const totalCostDiscountedEl = $('.total-cost-dollars-discounted');

		couponDiscountEl.html('');
		totalCostDiscountedEl.html('');
		totalCostsContainerEl.removeClass('discounted');
		this.couponApplied = false;
	}

	/**
	 * Display or hide the discount elements.
	 *
	 * @param value
	 */
	showDiscountEls( value ) {
		// TODO.
		const totalCostsDiscountContainerEl = $('#total_cost_discount_container');
		const couponDiscountContainer = $('#coupon_discount_container');
		if ( value ) {
			totalCostsDiscountContainerEl.removeClass( 'hidden' );
			couponDiscountContainer.removeClass( 'hidden' );
		} else {
			totalCostsDiscountContainerEl.addClass( 'hidden' );
			couponDiscountContainer.addClass( 'hidden' );
		}
	}

	/**
	 * Submitting animation and restrictions for coupon button.
	 *
	 * @param {boolean} value Is the form submitting or not.
	 * @param type
	 */
	submitting( value, type = 'loading' ) {
		if ( this.validateButton ) {
			this.validateButton.prop( 'disabled', value );
			if ( value ) {
				this.validateButton.html( 'Validating...' );
			} else {
				this.validateButton.html( this.validateButtonHtml );
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

	set validateButton( value ) {
		this._validateButton = value;
	}

	set couponInputEl( value ) {
		this._couponInputEl = value;
	}

	set validateButtonHtml( value ) {
		this._validateButtonHtml = value;
	}

	set couponApplied( value ) {
		this._couponApplied = value;
	}

	/** ------------------------------------------------------------------------------------------
	 * Getters.
	 * ------------------------------------------------------------------------------------------ */

	get validateButton() {
		return this._validateButton;
	}

	get validateButtonHtml() {
		return this._validateButtonHtml;
	}
	
	get couponInputEl() {
		return this._couponInputEl;
	}

	get productFamilyIdEl() {
		return this._productFamilyIdEl;
	}

	get couponApplied() {
		return this._couponApplied;
	}

}
