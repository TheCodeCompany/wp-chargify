<?php

namespace Chargify\Helpers\Forms_Products;

use Chargify\Libraries\Requests;
use Chargify\Model\ChargifyComponentFactory;
use Chargify\Model\ChargifyComponentPricePointFactory;
use Chargify\Model\ChargifyProduct;
use Chargify\Model\ChargifyProductFactory;
use Chargify\Model\ChargifyProductPricePoint;
use Chargify\Model\ChargifyProductPricePointFactory;
use function Chargify\Helpers\Costs\convert_cents_to_dollars;
use function Chargify\Helpers\Forms\maybe_set_default_value;

/**
 * Given some pieces of the puzzle, verify if REQUEST data has been set, if not set it.
 * This requires at a minimum that the id or product handle be set in any REQUEST type such as GET/POST, also
 * uses the price point id or handle if set, else the default product price point is used.
 *
 * REQUEST is used so that during page render these details cna be added to help pre fill after the headers have been sent.
 */
function setup_product_post_data() {

	$requests = new Requests();

	/*
	 * Product data.
	 */
	$product_id     = $requests->request_variables( 'product_id', false );
	$product_handle = $requests->request_variables( 'product_handle', false );

	if ( $product_id ) {
		$product_identifier = $product_id;
	} elseif ( $product_handle ) {
		$product_identifier = $product_handle;
	} else {
		// Filter the Chargify Product handle.
		$product_identifier = apply_filters( 'chargify_default_product', '' );
	}

	// Gather the product wrapped object.
	$product_factory = new ChargifyProductFactory();
	if ( is_numeric( $product_identifier ) ) {
		$product = $product_factory->get_by_product_id( $product_identifier );
	} elseif ( is_string( $product_identifier ) && ! empty( $product_identifier ) ) {
		$product = $product_factory->get_by_product_handle( $product_identifier );
	} else {
		$product = null;
	}

	// Bail early the product is unknown.
	if ( ! $product instanceof ChargifyProduct ) {
		return;
	}


	// Set product data in REQUEST prams if not set.
	if ( ! $product_id ) {
		$_REQUEST['product_id'] = $product->get_chargify_id();
	}

	if ( ! $product_handle ) {
		$_REQUEST['product_handle'] = $product->get_chargify_handle();
	}


	/*
	 * Family data.
	 */
	// Set family data in REQUEST prams if not set.
	$family_id = $requests->request_variables( 'family_id', false );
	if ( ! $family_id ) {
		$_REQUEST['family_id'] = $product->get_chargify_id();
	}

	$family_handle = $requests->request_variables( 'family_handle', false );
	if ( ! $family_handle ) {
		$_REQUEST['family_handle'] = $product->get_chargify_handle();
	}


	/*
	 * Product price point data.
	 */
	$product_price_point_id     = $requests->request_variables( 'product_price_point_id', false );
	$product_price_point_handle = $requests->request_variables( 'product_price_point_handle', false );

	if ( $product_price_point_id ) {
		$product_price_point_identifier = $product_price_point_id;
	} elseif ( $product_price_point_handle ) {
		$product_price_point_identifier = $product_price_point_handle;
	} else {
		$product_price_point_identifier = $product->get_chargify_default_price_point_id();
	}

	// Gather the product price point wrapped object.
	$product_price_point_factory = new ChargifyProductPricePointFactory();
	if ( is_numeric( $product_price_point_identifier ) ) {
		$product_price_point = $product_price_point_factory->get_by_product_price_point_id( $product_price_point_identifier );
	} elseif ( is_string( $product_price_point_identifier ) && ! empty( $product_price_point_identifier ) ) {
		$product_price_point = $product_price_point_factory->get_by_product_price_point_handle( $product->get_chargify_id(), $product_price_point_identifier );
	} else {
		$product_price_point = null;
	}

	// Still no price point. Gather default price point for product.
	if ( ! $product_price_point instanceof ChargifyProductPricePoint ) {
		$product_price_point = $product_price_point_factory->get_by_product_price_point_id( $product->get_chargify_default_price_point_id() );
	}

	if ( $product_price_point instanceof ChargifyProductPricePoint ) {
		// Set product price point data in REQUEST prams if not set.
		$product_price_point_id = $requests->request_variables( 'product_price_point_id', false );
		if ( ! $product_price_point_id ) {
			$_REQUEST['product_price_point_id'] = $product_price_point->get_chargify_id();
		}

		$product_price_point_handle = $requests->request_variables( 'product_price_point_handle', false );
		if ( ! $product_price_point_handle ) {
			$_REQUEST['product_price_point_handle'] = $product_price_point->get_chargify_handle();
		}
	}

	// Finally cost related data.
	// Check if discounts have been applied.
	$chargify_product_price_in_cents_discounted = $requests->request_variables( 'product_price_in_cents_discounted', false );
	if ( ! $chargify_product_price_in_cents_discounted ) {
		$chargify_product_price_in_cents_discounted = $requests->request_variables( 'product_price_in_cents', false );
	}

	$chargify_product_price_in_dollars_discounted = $requests->request_variables( 'product_price_in_dollars_discounted', false );
	if ( ! $chargify_product_price_in_dollars_discounted ) {
		$chargify_product_price_in_dollars_discounted = $requests->request_variables( 'product_price_in_dollars', false );
	}

	$product_costs = [
		'product_price_in_cents'              => $requests->request_variables( 'product_price_in_cents', false ),
		'product_price_in_cents_discounted'   => $chargify_product_price_in_cents_discounted,
		'product_price_in_dollars'            => $requests->request_variables( 'product_price_in_dollars', false ),
		'product_price_in_dollars_discounted' => $chargify_product_price_in_dollars_discounted,
		'product_interval'                    => $requests->request_variables( 'product_interval', false ),
		'product_interval_unit'               => $requests->request_variables( 'product_interval_unit', false ),
		'product_taxable'                     => $requests->request_variables( 'product_taxable', false ),
	];

	// If one value has not been set, gather and set the costs.
	if ( in_array( false, $product_costs, true ) ) {

		if ( $product_price_point instanceof ChargifyProductPricePoint ) {
			// Gather price point data.
			$product_costs['product_price_in_cents']              = $product_price_point->get_chargify_price_in_cents();
			$product_costs['product_price_in_cents_discounted']   = $product_price_point->get_chargify_price_in_cents();
			$product_costs['product_price_in_dollars']            = convert_cents_to_dollars( $product_price_point->get_chargify_price_in_cents(), ',' );
			$product_costs['product_price_in_dollars_discounted'] = convert_cents_to_dollars( $product_price_point->get_chargify_price_in_cents(), ',' );
			$product_costs['product_interval']                    = $product_price_point->get_chargify_interval();
			$product_costs['product_interval_unit']               = $product_price_point->get_chargify_interval_unit();
			$product_costs['product_taxable']                     = $product->get_chargify_taxable();
		} else {
			// Gather product base data.
			$product_costs['product_price_in_cents']              = $product->get_chargify_price_in_cents();
			$product_costs['product_price_in_cents_discounted']   = $product->get_chargify_price_in_cents();
			$product_costs['product_price_in_dollars']            = convert_cents_to_dollars( $product->get_chargify_price_in_cents(), ',' );
			$product_costs['product_price_in_dollars_discounted'] = convert_cents_to_dollars( $product->get_chargify_price_in_cents(), ',' );
			$product_costs['product_interval']                    = $product->get_chargify_interval();
			$product_costs['product_interval_unit']               = $product->get_chargify_interval_unit();
			$product_costs['product_taxable']                     = $product->get_chargify_taxable();
		}

		// Set them as REQUEST variables for latter use in signup form.
		foreach ( $product_costs as $key => $value ) {
			$_REQUEST[ $key ] = $value;
		}
	}

}


/**
 * Sets the frontend post form field values if form has already been submitted, or find the value.
 *
 * @param object $field_args Current field args.
 * @param object $field      Current field object.
 *
 * @return string
 */
function maybe_set_default_product_value( $field_args, $field ) {

	$value = maybe_set_default_value( $field_args, $field );

	if ( ! $value ) {
		// Data missing run the setup and check again.
		setup_product_post_data();
		$value = maybe_set_default_value( $field_args, $field );
	}

	return $value;
}


/**
 * Gather the price data for a product and product price point.
 *
 * @return null|array
 */
function get_product_costs() {

	$requests = new Requests();

	$product_costs = [
		'product_price_in_cents'              => $requests->request_variables( 'product_price_in_cents', false ),
		'product_price_in_cents_discounted'   => $requests->request_variables( 'product_price_in_cents_discounted', false ),
		'product_price_in_dollars'            => $requests->request_variables( 'product_price_in_dollars', false ),
		'product_price_in_dollars_discounted' => $requests->request_variables( 'product_price_in_dollars_discounted', false ),
		'product_interval'                    => $requests->request_variables( 'product_interval', false ),
		'product_interval_unit'               => $requests->request_variables( 'product_interval_unit', false ),
		'product_taxable'                     => $requests->request_variables( 'product_taxable', false ),
	];

	// If one value has not been set, attempt to set product data and gather again.
	if ( in_array( false, $product_costs, true ) ) {
		setup_product_post_data();
		$product_costs = [
			'product_price_in_cents'              => $requests->request_variables( 'product_price_in_cents', false ),
			'product_price_in_cents_discounted'   => $requests->request_variables( 'product_price_in_cents_discounted', false ),
			'product_price_in_dollars'            => $requests->request_variables( 'product_price_in_dollars', false ),
			'product_price_in_dollars_discounted' => $requests->request_variables( 'product_price_in_dollars_discounted', false ),
			'product_interval'                    => $requests->request_variables( 'product_interval', false ),
			'product_interval_unit'               => $requests->request_variables( 'product_interval_unit', false ),
			'product_taxable'                     => $requests->request_variables( 'product_taxable', false ),
		];
	}

	return $product_costs;
}

/**
 * Converts the meta into a dollar value for display purposes in admin area.
 *
 * @param object $field_args Current field args.
 * @param object $field      Current field object.
 *
 * @return string
 */
function costs_top_html( $field_args, $field ) {
	$product_costs = get_product_costs();

	// TODO get from a WP Option.
	$currency_in_cents = true;

	$html = costs_html( $product_costs, $currency_in_cents, 'top' );

	return apply_filters( 'chargify_signup_form_costs_html_top', $html, $product_costs, $currency_in_cents );
}

/**
 * Gathers the .
 *
 * @param object $field_args Current field args.
 * @param object $field      Current field object.
 *
 * @return string
 */
function costs_bottom_html( $field_args, $field ) {
	$product_costs = get_product_costs();

	// TODO get from a WP Option.
	$currency_in_cents = true;

	$html = costs_html( $product_costs, $currency_in_cents, 'bottom' );

	return apply_filters( 'chargify_signup_form_costs_html_bottom', $html, $product_costs, $currency_in_cents );
}

/**
 * Build html based on product price data.
 *
 * @param array  $product_costs      Array of costs.
 *                                   'product_price_in_cents',
 *                                   'product_price_in_cents_discounted',
 *                                   'product_price_in_dollars',
 *                                   'product_price_in_dollars_discounted',
 *                                   'product_interval',
 *                                   'product_interval_unit',
 *                                   'product_taxable'.
 * @param bool   $currency_inc_cents To display the currency including cents.
 * @param string $position           Position within the signup form, 'top' or 'bottom'.
 *
 * @return false|string
 */
function costs_html( $product_costs = [], $currency_inc_cents = true, $position = 'top' ) {

	if ( $currency_inc_cents ) {
		$total_cost = $product_costs['product_price_in_dollars'];
	} else {
		$total_cost = $product_costs['product_price_in_cents'];
	}

	if ( $product_costs['product_interval'] > 1 ) {
		$product_costs['product_interval_unit'] .= 's';

		$product_interval_text = $product_costs['product_interval'] . ' ' . ucfirst( $product_costs['product_interval_unit'] );
	} else {
		$product_interval_text = ucfirst( $product_costs['product_interval_unit'] );
	}

	ob_start()
	?>
	<div class="costs">
		<p id="total_cost_container_<?php echo esc_html( $position ); ?>">
			<span class="total-cost"
				data-currency-inc-cents="<?php echo $currency_inc_cents ? 'true' : 'false'; ?>">
				$ <?php echo esc_html( $total_cost ); ?>
			</span> /
			<span class="pricing-period"><?php echo esc_html( ucfirst( $product_interval_text ) ); ?></span>
		</p>
	</div>
	<?php
	return ob_get_clean();
}

