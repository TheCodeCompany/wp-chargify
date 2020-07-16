<?php

namespace Chargify\Helpers\Costs;

/**
 * Convert cents to dollars for visuals.
 *
 * @param int    $cents               The cents to be converted.
 * @param string $thousands_separator The thousands separator to use.
 *
 * @return string
 */
function convert_cents_to_dollars( $cents, $thousands_separator = '' ) {
	return number_format( ( $cents / 100 ), 2, '.', $thousands_separator );
}

