<?php
namespace Chargify\Post_Types\Account;
/**
 * Registers the `chargify_account` post type.
 */
function chargify_account_init() {
	# Allow developers to hide the Accounts custom post types.
	$show_accounts = apply_filters( 'chargify_show_accounts', true );

	register_post_type( 'chargify_account', [
		'labels'                => [
			'name'                  => __( 'Accounts', 'chargify' ),
			'singular_name'         => __( 'Account', 'chargify' ),
			'all_items'             => __( 'All Accounts', 'chargify' ),
			'archives'              => __( 'Account Archives', 'chargify' ),
			'attributes'            => __( 'Account Attributes', 'chargify' ),
			'insert_into_item'      => __( 'Insert into Accounts', 'chargify' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Account', 'chargify' ),
			'featured_image'        => _x( 'Featured Image', 'chargify_account', 'chargify' ),
			'set_featured_image'    => _x( 'Set featured image', 'chargify_account', 'chargify' ),
			'remove_featured_image' => _x( 'Remove featured image', 'chargify_account', 'chargify' ),
			'use_featured_image'    => _x( 'Use as featured image', 'chargify_account', 'chargify' ),
			'filter_items_list'     => __( 'Filter Accounts list', 'chargify' ),
			'items_list_navigation' => __( 'Accounts list navigation', 'chargify' ),
			'items_list'            => __( 'Accounts list', 'chargify' ),
			'new_item'              => __( 'New Account', 'chargify' ),
			'add_new'               => __( 'Add New', 'chargify' ),
			'add_new_item'          => __( 'Add New Account', 'chargify' ),
			'edit_item'             => __( 'Edit Accounts', 'chargify' ),
			'view_item'             => __( 'View Accounts', 'chargify' ),
			'view_items'            => __( 'View Accounts', 'chargify' ),
			'search_items'          => __( 'Search Accounts', 'chargify' ),
			'not_found'             => __( 'No Account found', 'chargify' ),
			'not_found_in_trash'    => __( 'No Accounts found in trash', 'chargify' ),
			'parent_item_colon'     => __( 'Parent Accounts:', 'chargify' ),
			'menu_name'             => __( 'Accounts', 'chargify' ),
		],
		'public'                => true,
		'hierarchical'          => false,
		'show_ui'               => $show_accounts,
		'show_in_nav_menus'     => false,
		'supports'              => [ 'title' ],
		'has_archive'           => true,
		'rewrite'               => true,
		'query_var'             => true,
		'menu_position'         => 22,
		'menu_icon'             => 'dashicons-groups',
		'show_in_rest'          => false
	] );

}

/**
 * Sets the post updated messages for the `chargify_account` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `chargify_account` post type.
 */
function chargify_account_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['chargify_account'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Accounts updated. <a target="_blank" href="%s">View Account</a>', 'chargify' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'chargify' ),
		3  => __( 'Custom field deleted.', 'chargify' ),
		4  => __( 'Account updated.', 'chargify' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Account restored to revision from %s', 'chargify' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Account published. <a href="%s">View Accounts</a>', 'chargify' ), esc_url( $permalink ) ),
		7  => __( 'Account saved.', 'chargify' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Account submitted. <a target="_blank" href="%s">Preview Account</a>', 'chargify' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Account scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Account</a>', 'chargify' ),
		date_i18n( __( 'M j, Y @ G:i', 'chargify' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Account draft updated. <a target="_blank" href="%s">Preview Account</a>', 'chargify' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
