<?php

namespace Chargify\Post_Types\Component;

use Chargify\Model\Chargify_Component;

/**
 * Registers the `chargify_component` post type.
 */
function chargify_component_init() {
	// Allow developers to hide the Products custom post types.
	$show_components = apply_filters( 'chargify_show_components', true );

	register_post_type(
		Chargify_Component::POST_TYPE,
		[
			'labels'                => [
				'name'                  => __( 'Components', 'chargify' ),
				'singular_name'         => __( 'Component', 'chargify' ),
				'all_items'             => __( 'All Components', 'chargify' ),
				'archives'              => __( 'Component Archives', 'chargify' ),
				'attributes'            => __( 'Component Attributes', 'chargify' ),
				'insert_into_item'      => __( 'Insert into Component', 'chargify' ),
				'uploaded_to_this_item' => __( 'Uploaded to this Component', 'chargify' ),
				'featured_image'        => _x( 'Featured Image', 'chargify_component', 'chargify' ),
				'set_featured_image'    => _x( 'Set featured image', 'chargify_component', 'chargify' ),
				'remove_featured_image' => _x( 'Remove featured image', 'chargify_component', 'chargify' ),
				'use_featured_image'    => _x( 'Use as featured image', 'chargify_component', 'chargify' ),
				'filter_items_list'     => __( 'Filter Components list', 'chargify' ),
				'items_list_navigation' => __( 'Components list navigation', 'chargify' ),
				'items_list'            => __( 'Components list', 'chargify' ),
				'new_item'              => __( 'New Component', 'chargify' ),
				'add_new'               => __( 'Add New', 'chargify' ),
				'add_new_item'          => __( 'Add New Component', 'chargify' ),
				'edit_item'             => __( 'Edit Component', 'chargify' ),
				'view_item'             => __( 'View Component', 'chargify' ),
				'view_items'            => __( 'View Components', 'chargify' ),
				'search_items'          => __( 'Search Components', 'chargify' ),
				'not_found'             => __( 'No Components found', 'chargify' ),
				'not_found_in_trash'    => __( 'No Components found in trash', 'chargify' ),
				'parent_item_colon'     => __( 'Parent Component:', 'chargify' ),
				'menu_name'             => __( 'Components', 'chargify' ),
			],
			'public'                => true,
			'hierarchical'          => false,
			'show_ui'               => $show_components,
			'show_in_menu'          => 'wp-chargify.php',
			'show_in_nav_menus'     => false,
			'supports'              => [ 'title', 'editor', 'revisions' ],
			'has_archive'           => true,
			'rewrite'               => true,
			'query_var'             => true,
			'menu_position'         => 20,
			'menu_icon'             => 'dashicons-cart',
			'show_in_rest'          => true,
			'rest_base'             => Chargify_Component::POST_TYPE,
			'rest_controller_class' => 'WP_REST_Posts_Controller',
		]
	);

}

/**
 * Sets the post updated messages for the `chargify_component` post type.
 *
 * @param array $messages Post updated messages.
 *
 * @return array Messages for the `chargify_component` post type.
 */
function chargify_component_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['chargify_component'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Component updated. <a target="_blank" href="%s">View Component</a>', 'chargify' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'chargify' ),
		3  => __( 'Custom field deleted.', 'chargify' ),
		4  => __( 'Component updated.', 'chargify' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Component restored to revision from %s', 'chargify' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Component published. <a href="%s">View Component</a>', 'chargify' ), esc_url( $permalink ) ),
		7  => __( 'Component saved.', 'chargify' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Component submitted. <a target="_blank" href="%s">Preview Component</a>', 'chargify' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Component scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Component</a>', 'chargify' ),
			date_i18n( __( 'M j, Y @ G:i', 'chargify' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Component draft updated. <a target="_blank" href="%s">Preview Component</a>', 'chargify' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
