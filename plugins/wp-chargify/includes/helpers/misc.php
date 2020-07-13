<?php

namespace Chargify\Helpers\Misc;

/**
 * Given an array look for a partial match of each value, matching to the string.
 *
 * @param array  $array    The array to fetch values from to find a partial match within the string.
 * @param string $string   The string to search within for the partial match.
 * @param bool   $traverse To traverse a multidimensional array.
 * @param int    $max      The number of dimensions to traverse the array.
 *
 * @return bool|mixed
 */
function partial_match_array_value_in_string( array $array, $string, $traverse = false, $max = 1 ) {
	$match = false;

	foreach ( $array as $item ) {
		if ( $traverse && is_array( $item ) && $max > 0 ) {
			$match = partial_match_array_value_in_string( $item, $string, $traverse, ( $max -- ) );
		} elseif ( is_string( $item ) ) {
			$match = false !== strpos( $string, $item );
		}

		if ( $match ) {
			break;
		}
	}

	return $match;
}
