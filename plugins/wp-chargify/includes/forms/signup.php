<?php
namespace Chargify\Forms\Signup;

function chargify_signup_form() {
	$metabox_id = 'chargify_signup_form';

	# Just a placeholder object id.
	$object_id  = 'temp-object-id';

	$form = cmb2_get_metabox( $metabox_id, $object_id );

	$output = cmb2_get_metabox_form(
		$form,
		$object_id,
		[
			'save_button' => __( 'Signup', 'chargify' )
		]
	);


	return $output;
}
