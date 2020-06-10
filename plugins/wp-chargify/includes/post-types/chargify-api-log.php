<?php
namespace Chargify\Post_Types\API_Log;
/**
 * Registers the `chargify_api_log` post type.
 */
function chargify_api_log_init() {
	register_post_type( 'chargify_api_log', [
		'labels'                => [
			'name'                  => __( 'Logs', 'chargify' ),
			'singular_name'         => __( 'Log', 'chargify' ),
			'all_items'             => __( 'All Logs', 'chargify' ),
			'archives'              => __( 'Log Archives', 'chargify' ),
			'attributes'            => __( 'Log Attributes', 'chargify' ),
			'insert_into_item'      => __( 'Insert into Log', 'chargify' ),
			'filter_items_list'     => __( 'Filter Logs list', 'chargify' ),
			'items_list_navigation' => __( 'Logs list navigation', 'chargify' ),
			'items_list'            => __( 'Logs list', 'chargify' ),
			'new_item'              => __( 'New Log', 'chargify' ),
			'add_new'               => __( 'Add New', 'chargify' ),
			'add_new_item'          => __( 'Add New Log', 'chargify' ),
			'edit_item'             => __( 'Edit Log', 'chargify' ),
			'view_item'             => __( 'View Log', 'chargify' ),
			'view_items'            => __( 'View Logs', 'chargify' ),
			'search_items'          => __( 'Search Logs', 'chargify' ),
			'not_found'             => __( 'No Log found', 'chargify' ),
			'not_found_in_trash'    => __( 'No Log found in trash', 'chargify' ),
			'parent_item_colon'     => __( 'Parent Logs:', 'chargify' ),
			'menu_name'             => __( 'Logs', 'chargify' ),
		],
		'public'                => false,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_nav_menus'     => false,
		'supports'      => [ 'author' ],
		'capabilities' => [
			'create_post'           => 'do_not_allow',
			'create_posts'          => 'do_not_allow',
			'read_post'             => 'read_chargify_api_log',
			'edit_post'             => 'edit_chargify_api_log',
			'edit_others_post'      => 'edit_others_chargify_api_log',
			'publish_post'          => 'publish_chargify_api_log',
			'read_private_post'     => 'read_private_chargify_api_log',
			'delete_post'           => 'delete_chargify_api_log',
			'delete_private_post'   => 'delete_private_chargify_api_log',
			'delete_published_post' => 'delete_published_chargify_api_log',
			'delete_others_post'    => 'delete_others_chargify_api_log',
			'edit_private_post'     => 'edit_private_chargify_api_log',
			'edit_published_post'   => 'edit_published_chargify_api_log',
		],
		'map_meta_cap'          => true,
		'has_archive'           => true,
		'rewrite'               => true,
		'query_var'             => true,
		'menu_position'         => 23,
		'menu_icon'             => 'dashicons-hammer',
		'show_in_rest'          => false,
	] );

}

/**
 * Sets the post updated messages for the `chargify_api_log` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `chargify_api_log` post type.
 */
function chargify_api_log_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['chargify_api_log'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Log updated. <a target="_blank" href="%s">View Log</a>', 'chargify' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'chargify' ),
		3  => __( 'Custom field deleted.', 'chargify' ),
		4  => __( 'Logs updated.', 'chargify' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Logs restored to revision from %s', 'chargify' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Log published. <a href="%s">View Log</a>', 'chargify' ), esc_url( $permalink ) ),
		7  => __( 'Logs saved.', 'chargify' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Log submitted. <a target="_blank" href="%s">Preview Logs</a>', 'chargify' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Log scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Log</a>', 'chargify' ),
		date_i18n( __( 'M j, Y @ G:i', 'chargify' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Log draft updated. <a target="_blank" href="%s">Preview Log</a>', 'chargify' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}

/**
 * Rename the links on the post list table for API Logs.
 *
 * (The action for the link should say "View", not "Edit", since there's no
 * editing involved.)
 *
 * @param  array    $actions List of post row links
 * @param  \WP_Post $post    Post.
 * @return array             Updated array of post row links.
 */
function page_row_actions( $actions, $post ) {
	if ( 'chargify_api_log' !== $post->post_type ) {
		return $actions;
	}

	if ( ! empty( $actions['edit'] ) ) {
		$actions['edit'] = sprintf(
			'<a href="%s" aria-label="%s">%s</a>',
			get_edit_post_link( $post->ID ),
			esc_attr( sprintf( __( 'View log for &#8220;%s&#8221;', 'chargify' ), get_the_title( $post->ID ) ) ),
			__( 'View' )
		);
		unset( $actions['inline hide-if-no-js'] );
	}

	return $actions;
}
