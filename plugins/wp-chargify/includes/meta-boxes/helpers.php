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
