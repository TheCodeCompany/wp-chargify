<?php
/**
 * Register the product fields for the Chargify signup form.
 *
 * @file    wp-chargify/includes/forms/product-details.php
 * @package WPChargify
 */

namespace Chargify\Forms\Product_Details;

use CMB2;

/**
 * Register the product and cost(top) fields.
 *
 * @param CMB2 $signup_form The signup form CMB2 object.
 *
 * @return mixed
 */
function register_product_details_fields( $signup_form ) {

	$signup_form->add_field(
		[
			'name'         => '',
			'id'           => 'chargify_costs_top',
			'type'         => 'title',
			'before_field' => 'Chargify\\Forms\\Message_Details\\total_costs_top_html',
			'attributes'   => [
				'style' => 'display:none;',
			],
		]
	);

	// Filter the Customer Details form.
	$fields = apply_filters( 'chargify_product_details_fields', $signup_form );

	return $fields;
}

function total_costs_top_html() {

	// TODO look at functionality such as .
//	$product_id = maybe_set_default_product_value();
	ob_start()
	?>
	<div class="costs">
		<p id="total_cost_container_top">
			<span class="total-cost-inc-cents"></span> /
			<span class="pricing-period"></span>
		</p>
	</div>
	<?php
	return ob_get_clean();
}
