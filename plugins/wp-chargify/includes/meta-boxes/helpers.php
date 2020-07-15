<?php
namespace Chargify\Meta_Boxes\Helpers;
/**
 * Remove the Permalink.
 *
 * @param $return
 * @param $post_id
 * @return string
 */
function hide_permalink( $return, $post_id ) {
	if ( 'chargify_account' === get_post_type( $post_id ) || 'chargify_api_log' === get_post_type( $post_id ) ) {
		return '';
	}
	return $return;
}


/**
 * Sets the frontend post form field values if form has already been submitted, or value present in GET.
 *
 * @param object $field_args Current field args.
 * @param object $field      Current field object.
 *
 * @return string
 */
function maybe_convert_cents_to_dollars( $field_args, $field ) {

	global $post;

	$cost_in_cents = 0;

	if ( null !== $post ) {
		$cost_in_cents = get_post_meta( $post->ID, $field->id(), true );
	}

	$cost_in_dollars = convert_cents_to_dollars( $cost_in_cents, ',' );

	ob_start();
	?>
	<input
		type="text"
		class="regular-text"
		name="<?php echo esc_attr( $field->id() ); ?>_extended"
		id="<?php echo esc_attr( $field->id() ); ?>_extended"
		value="<?php echo esc_html( $cost_in_dollars ); ?>"
		readonly="readonly"
		disabled="disabled">
	<?php
	return ob_get_clean();
}

/**
 * Convert cents to dollars for visuals.
 *
 * @param int    $cents               The cents to be converted.
 * @param string $thousands_seperator The thousands separator to use.
 *
 * @return string
 */
function convert_cents_to_dollars( $cents, $thousands_seperator = '' ) {
	return number_format( ( $cents / 100 ), 2, '.', $thousands_seperator );
}

function maybe_convert_boolean_yes_no( $field_args, $field ) {
	global $post;

	$value = 'N/A';

	if ( null !== $post ) {
		$meta = get_post_meta( $post->ID, $field->id(), true );

		if ( '0' === $meta ) {
			$value = 'No';
		} elseif ( '1' === $meta ) {
			$value = 'Yes';
		}
	}

	ob_start();
	?>
	<input
		type="text"
		class="regular-text"
		name="<?php echo esc_attr( $field->id() ); ?>_extended"
		id="<?php echo esc_attr( $field->id() ); ?>_extended"
		value="<?php echo esc_html( $value ); ?>"
		readonly="readonly"
		disabled="disabled">
	<?php
	return ob_get_clean();
}
