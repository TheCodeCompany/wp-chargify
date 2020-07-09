<?php
/**
 * Register the message field for the Chargify signup form.
 *
 * @file    wp-chargify/includes/forms/message-details.php
 * @package WPChargify
 */

namespace Chargify\Forms\Message_Details;

use CMB2;

/**
 * Register the server response message field.
 *
 * @param CMB2 $signup_form The signup form CMB2 object.
 *
 * @return mixed
 */
function register_message_details_fields( $signup_form ) {

	$signup_form->add_field(
		[
			'name'         => '',
			'id'           => 'total_cost',
			'type'         => 'title',
			'before_field' => 'Chargify\\Forms\\Message_Details\\total_costs_top_html',
			'attributes'   => [
				'style' => 'display:none;',
			],
		]
	);

	$signup_form->add_field(
		[
			'name'         => '',
			'id'           => 'chargify_form_messages',
			'type'         => 'title',
			'before_field' => 'Chargify\\Forms\\Message_Details\\render_messages_html',
			'attributes'   => [
				'class' => 'hidden',
			],
			'default_cb'   => 'Chargify\\Forms\\Submission\\maybe_set_default_from_posted_values',
		]
	);

	// Filter the Customer Details form.
	$fields = apply_filters( 'chargify_message_details_fields', $signup_form );

	return $fields;
}

/**
 * The message html callback function.
 *
 * @return mixed
 */
function render_messages_html() {

	$html                   = '';
	$chargify_form_messages = get_chargify_form_messages();
	$form_messages          = [];

	/*
	 * Check that the format of the messages is an array and sanitize.
	 */
	if ( is_array( $chargify_form_messages ) ) {
		array_walk_recursive(
			$chargify_form_messages,
			function ( &$array ) {
				$array = filter_var( trim( $array ), FILTER_SANITIZE_STRING );
			}
		);
		$form_messages = $chargify_form_messages;
	}

	if ( ! empty( $form_messages ) ) {
		ob_start();
		?>
		<div id="chargify_form_messages_cntr">
			<?php foreach ( $form_messages as $message_type => $messages ) { ?>
				<div class="<?php echo esc_attr( $message_type ); ?>">
					<?php foreach ( $messages as $message ) { ?>
						<p><?php echo esc_html( $message ); ?></p>
					<?php } ?>
				</div>
			<?php } ?>
		</div>
		<?php
		$html = ob_get_clean();
	}

	/**
	 * Filter the message html.
	 *
	 * @var string $html          The default rendered html.
	 * @var array  $form_messages An array of messages in the format of first level.
	 * being message type as key with an array of messages for that type.
	 * Example;
	 * $form_messages = [
	 *    'error' => [
	 *        'Credit card: cannot be expired.',
	 *        'Credit card number: must be a valid credit card number.',
	 *    ]
	 * ]
	 */
	$html = apply_filters( 'chargify_form_message_html', $html, $form_messages );

	return $html;
}

function total_costs_top_html() {
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
