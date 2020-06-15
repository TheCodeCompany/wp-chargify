<?php
namespace Chargify\Roles;

/**
 * A function to add a new Chargify User role.
 */
function add_chargify_role() {
	$subscriber = get_role( 'subscriber' );
	add_role( 'chargify_user', __( 'Chargify User', 'chargify' ), $subscriber->capabilities );
}

/**
 * A function to remove the Chargify User role.
 */
function remove_chargify_role() {
	remove_role( 'chargify_user' );
}
