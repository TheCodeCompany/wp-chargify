<?php

namespace Chargify\Meta_Boxes\Account;

/**
 * Register all the meta fields so we can map Chargify product information to it.
 */
function account_meta_boxes() {

	$cmb2 = new_cmb2_box(
		[
			'id'           => 'chargify_account_details',
			'title'        => __( 'Account Details', 'chargify' ),
			'object_types' => [ 'chargify_account' ],
			'context'      => 'normal',
			'priority'     => 'high',
			'show_names'   => true,
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'WordPress User ID', 'chargify' ),
			'desc'       => __( 'The ID of the user in WordPress.', 'chargify' ),
			'id'         => 'chargify_wordpress_user_id',
			'type'       => 'text_small',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
				'type'     => 'number',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Chargify User ID', 'chargify' ),
			'desc'       => __( 'The ID of the user in Chargify.', 'chargify' ),
			'id'         => 'chargify_user_id',
			'type'       => 'text_small',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
				'type'     => 'number',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'             => __( 'Subscription Status', 'chargify' ),
			'desc'             => __( 'The status of this users subscription in Chargify.', 'chargify' ),
			'id'               => 'chargify_subscription_status',
			'type'             => 'select',
			'show_option_none' => true,
			'default'          => 'expired',
			'options'          => [
				'active'               => __( 'Active', 'chargify' ),
				'cancelled'            => __( 'Cancelled', 'chargify' ),
				'expired'              => __( 'Expired', 'chargify' ),
				'expired_cards'        => __( 'Expired Cards', 'chargify' ),
				'on_hold'              => __( 'On Hold', 'chargify' ),
				'past_due'             => __( 'Past Due', 'chargify' ),
				'pending_cancellation' => __( 'Pending Cancellation', 'chargify' ),
				'pending_renewal'      => __( 'Pending Renewal', 'chargify' ),
				'suspended'            => __( 'Suspended', 'chargify' ),
				'trial_ended'          => __( 'Trial Ended', 'chargify' ),
				'unpaid'               => __( 'Unpaid', 'chargify' ),
			],
			'attributes'       => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Expiration Date', 'chargify' ),
			'id'         => 'chargify_expiration_date',
			'type'       => 'text_date',
			'default'    => date( "d/m/Y" ),
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'              => __( 'Chargify Products', 'chargify' ),
			'desc'              => __( 'The Chargify Products the user is subscribed to.', 'chargify' ),
			'id'                => 'chargify_products_multicheck',
			'type'              => 'multicheck',
			'select_all_button' => false,
			'options_cb'        => 'Chargify\\Post_Types\\Helpers\\get_product_values',
			'attributes'        => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

}
