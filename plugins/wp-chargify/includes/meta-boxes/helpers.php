<?php

namespace Chargify\Meta_Boxes\Helpers;

use Chargify\Libraries\DateHelper;
use function Chargify\Helpers\Costs\convert_cents_to_dollars;

/**
 * Base input element for visuals within teh admin area, used to display instead of the CMB version.
 *
 * @param string $element_id The element ID.
 * @param string $value      The value of the input.
 *
 * @return false|string
 */
function base_input_replacement_html( $element_id, $value ) {
	ob_start();
	?>
	<input
		type="text"
		class="regular-text"
		name="<?php echo esc_attr( $element_id ); ?>_extended"
		id="<?php echo esc_attr( $element_id ); ?>_extended"
		value="<?php echo esc_html( $value ); ?>"
		readonly="readonly"
		disabled="disabled">
	<?php
	return ob_get_clean();
}

/**
 * Remove the Permalink.
 *
 * @param $return
 * @param $post_id
 *
 * @return string
 */
function hide_permalink( $return, $post_id ) {
	if ( 'chargify_account' === get_post_type( $post_id ) || 'chargify_api_log' === get_post_type( $post_id ) ) {
		return '';
	}

	return $return;
}

/**
 * Converts the meta into a dollar value for display purposes in admin area.
 *
 * @param object $field_args Current field args.
 * @param object $field      Current field object.
 *
 * @return string
 */
function maybe_convert_cents_to_dollars( $field_args, $field ) {

	global $post;

	$value = 0;

	if ( null !== $post ) {
		$value = get_post_meta( $post->ID, $field->id(), true );
	}

	$value = convert_cents_to_dollars( $value, ',' );

	return base_input_replacement_html( $field->id(), $value );
}

/**
 * Converts the boolean meta into a Yes, No, or N/A value for display purposes in admin area.
 *
 * @param object $field_args Current field args.
 * @param object $field      Current field object.
 *
 * @return string
 */
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

	return base_input_replacement_html( $field->id(), $value );
}


/**
 * Converts the boolean meta into a Yes, No, or N/A value for display purposes in admin area.
 *
 * @param object $field_args Current field args.
 * @param object $field      Current field object.
 *
 * @return string
 */
function maybe_convert_date( $field_args, $field ) {
	global $post;

	$value = 'N/A';

	if ( null !== $post ) {
		$meta = get_post_meta( $post->ID, $field->id(), true );

		if ( $meta ) {
			$value = DateHelper::format_date( $meta, DateHelper::DATE_FORMAT_DISPLAY );
		}
	}

	return base_input_replacement_html( $field->id(), $value );
}
