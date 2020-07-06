import $ from 'jquery';

import { check, log, centsToDollars } from '../helpers';
import { Base } from './index';
import { configParams } from "../config";

// Grab config params.
const {
	ajaxURL,
	validateCouponAction,
	validateCouponNonce,
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

				// TODO.
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

	/**
	 * Gather the base product data that may be used by the endpoint to verify the coupon.
	 * Typically the product family id is the only thing required, however if its not present the other fields may be used to back trace and find within the controller.
	 *
	 * @returns {{product_family_id: string, component_id: string, component_price_point_id: string, price_point_handle: string, price_point_id: string, product_id: string, component_price_point_handle: string, product_handle: string, component_handle: string}}
	 */
	productDetails() {

		let productDetails = {
			product_family_id: '',
			product_id: '',
			product_handle: '',
			price_point_id: '',
			price_point_handle: '',
			component_id: '',
			component_handle: '',
			component_price_point_id: '',
			component_price_point_handle: '',
		}

		// Gather the values from the inputs.
		const productFamilyIdField = $( '#product_family_id');
		if ( productFamilyIdField.length && productFamilyIdField.val() ) {
			productDetails[ 'product_family_id' ] = productFamilyIdField.val();
		}

		// Gather the values from the inputs.
		const productIdField = $( '#product_id');
		if ( productIdField.length && productIdField.val() ) {
			productDetails[ 'product_id' ] = productIdField.val();
		}

		// Gather the values from the inputs.
		const productHandleField = $( '#product_handle');
		if ( productHandleField.length && productHandleField.val() ) {
			productDetails[ 'product_handle' ] = productHandleField.val();
		}

		// Gather the values from the inputs.
		const productPricePointIdField = $( '#price_point_id');
		if ( productPricePointIdField.length && productPricePointIdField.val() ) {
			productDetails[ 'price_point_id' ] = productPricePointIdField.val();
		}

		// Gather the values from the inputs.
		const productPricePointHandleField = $( '#price_point_handle');
		if ( productPricePointHandleField.length && productPricePointHandleField.val() ) {
			productDetails[ 'price_point_handle' ] = productPricePointHandleField.val();
		}

		// Gather the values from the inputs.
		const productComponentIdField = $( '#component_id');
		if ( productComponentIdField.length && productComponentIdField.val() ) {
			productDetails[ 'component_id' ] = productComponentIdField.val();
		}

		// Gather the values from the inputs.
		const productComponentHandleField = $( '#component_handle');
		if ( productComponentHandleField.length && productComponentHandleField.val() ) {
			productDetails[ 'component_handle' ] = productComponentHandleField.val();
		}

		// Gather the values from the inputs.
		const productComponentPricePointIdField = $( '#component_price_point_id');
		if ( productComponentPricePointIdField.length && productComponentPricePointIdField.val() ) {
			productDetails[ 'component_price_point_id' ] = productComponentPricePointIdField.val();
		}

		// Gather the values from the inputs.
		const productComponentPricePointHandleField = $( '#component_price_point_handle');
		if ( productComponentPricePointHandleField.length && productComponentPricePointHandleField.val() ) {
			productDetails[ 'component_price_point_handle' ] = productComponentPricePointHandleField.val();
		}

		return productDetails;
	}

	async applyCoupon() {
		const data = {
			action: validateCouponAction,
			wp_nonce: validateCouponNonce,
			coupon_code: this.couponInputEl.val(),
			...this.productDetails(),
		};

		console.log( data ); return;

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
		this.couponInputEl.on( 'input', () => {
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

	get couponApplied() {
		return this._couponApplied;
	}

}
