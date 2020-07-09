<?php
/**
 * The coupon form fields.
 *
 * @file    wp-chargify/includes/forms/coupon-details.php
 * @package WPChargify
 */

namespace Chargify\Forms\Coupon_Details;

use CMB2;

/**
 * Register the coupon details form fields.
 *
 * @param CMB2 $signup_form The CMB2 object holding the form and form fields.
 *
 * @return mixed
 */
function register_coupon_fields( $signup_form ) {

	$signup_form->add_field(
		[
			'name' => __( 'Coupon Details', 'chargify' ),
			'desc' => __( 'Enter any coupon details below.', 'chargify' ),
			'type' => 'title',
			'id'   => 'chargify_coupon_title',
		]
	);

	$signup_form->add_field(
		[
			'name'       => __( 'Coupon Code', 'chargify' ),
			'id'         => 'chargify_coupon_code',
			'type'       => 'text',
			'desc'       => __( 'Enter a coupon code.', 'chargify' ),
			'default_cb' => 'Chargify\\Forms\\Submission\\maybe_set_default_from_posted_values',
		]
	);

	$signup_form->add_field(
		[
			'name'       => '',
			'id'         => 'chargify_coupon_verify_button',
			'type'       => 'text',
			'attributes' => [
				'value' => 'Verify Coupon',
				'type' => 'button',
			],
		]
	);

	$signup_form->add_field(
		[
			'name'         => '',
			'id'           => 'chargify_coupon_message',
			'type'         => 'title',
			'before_field' => 'Chargify\\Forms\\Coupon_Details\\render_coupon_message_html',
			'attributes'   => [
				'style' => 'display:none;',
			],
		]
	);

	$signup_form->add_field(
		[
			'name'         => '',
			'id'           => 'chargify_coupon_message',
			'type'         => 'title',
			'before_field' => 'Chargify\\Forms\\Coupon_Details\\render_coupon_message_html',
			'attributes'   => [
				'style' => 'display:none;',
			],
		]
	);

	$signup_form->add_field(
		[
			'name'         => '',
			'id'           => 'chargify_costs_bottom',
			'type'         => 'title',
			'before_field' => 'Chargify\\Forms\\Coupon_Details\\render_cost_bottom_html',
			'attributes'   => [
				'style' => 'display:none;',
			],
		]
	);

	// Filter the Coupon Details form.
	return apply_filters( 'chargify_coupon_fields', $signup_form );
}

/**
 * Cost elements.
 *
 * @return false|string
 */
function render_coupon_message_html() {

	return '<div id="chargify_coupon_messages_cntr" class="hidden"></div>';
}

function render_cost_bottom_html() {

	ob_start();
	?>
	<div class="costs">
		<p id="total_cost_container_bottom">
			<span class="total-cost-inc-cents"></span> /
			<span class="pricing-period"></span>
		</p>
		<p id="total_cost_discount_container" class="hidden">
			<span class="total-cost-dollars-discounted"></span> /
			<span class="pricing-period"></span>
		</p>
	</div>
	<?php

	return ob_get_clean();
}
