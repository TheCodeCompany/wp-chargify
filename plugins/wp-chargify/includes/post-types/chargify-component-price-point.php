<?php
/**
 * Register the custom post type for price points.
 *
 * @file    wp-chargify/includes/post-types/chargify-product-price-point.php
 * @package WPChargify
 */

namespace Chargify\Post_Types\Component_Price_Point;

use Chargify\Model\Chargify_Component_Price_Point;

/**
 * Registers the `chargify_component_price_point` post type.
 */
function chargify_component_price_point_init() {
	// Allow developers to hide the Products custom post types.
	$show_component_price_points = apply_filters( 'chargify_show_component_price_points', true );

	register_post_type(
		Chargify_Component_Price_Point::POST_TYPE,
		[
			'labels'                => [
				'name'                  => __( 'Component Price Points', 'chargify' ),
				'singular_name'         => __( 'Component Price Point', 'chargify' ),
				'all_items'             => __( 'All Component Price Points', 'chargify' ),
				'archives'              => __( 'Component Price Point Archives', 'chargify' ),
				'attributes'            => __( 'Component Price Point Attributes', 'chargify' ),
				'insert_into_item'      => __( 'Insert into Component Price Point', 'chargify' ),
				'uploaded_to_this_item' => __( 'Uploaded to this Component Price Point', 'chargify' ),
				'featured_image'        => _x( 'Featured Image', 'chargify_component_price_point', 'chargify' ),
				'set_featured_image'    => _x( 'Set featured image', 'chargify_component_price_point', 'chargify' ),
				'remove_featured_image' => _x( 'Remove featured image', 'chargify_component_price_point', 'chargify' ),
				'use_featured_image'    => _x( 'Use as featured image', 'chargify_component_price_point', 'chargify' ),
				'filter_items_list'     => __( 'Filter Component Price Points list', 'chargify' ),
				'items_list_navigation' => __( 'Component Price Points list navigation', 'chargify' ),
				'items_list'            => __( 'Component Price Points list', 'chargify' ),
				'new_item'              => __( 'New Component Price Point', 'chargify' ),
				'add_new'               => __( 'Add New', 'chargify' ),
				'add_new_item'          => __( 'Add New Component Price Point', 'chargify' ),
				'edit_item'             => __( 'Edit Component Price Point', 'chargify' ),
				'view_item'             => __( 'View Component Price Point', 'chargify' ),
				'view_items'            => __( 'View Component Price Points', 'chargify' ),
				'search_items'          => __( 'Search Component Price Points', 'chargify' ),
				'not_found'             => __( 'No Component Price Points found', 'chargify' ),
				'not_found_in_trash'    => __( 'No Component Price Points found in trash', 'chargify' ),
				'parent_item_colon'     => __( 'Parent Component Price Point:', 'chargify' ),
				'menu_name'             => __( 'Component Price Points', 'chargify' ),
			],
			'public'                => true,
			'hierarchical'          => false,
			'show_ui'               => $show_component_price_points,
			'show_in_menu'          => 'wp-chargify.php',
			'show_in_nav_menus'     => false,
			'supports'              => [ 'title', 'editor', 'revisions' ],
			'has_archive'           => true,
			'rewrite'               => true,
			'query_var'             => true,
			'menu_position'         => 22,
			'menu_icon'             => 'dashicons-cart',
			'show_in_rest'          => true,
			'rest_base'             => Chargify_Component_Price_Point::POST_TYPE,
			'rest_controller_class' => 'WP_REST_Posts_Controller',
		]
	);

}

/**
 * Sets the post updated messages for the `chargify_component_price_point` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `chargify_component_price_point` post type.
 */
function chargify_component_price_point_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['chargify_component_price_point'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Component Price Point updated. <a target="_blank" href="%s">View Component Price Point</a>', 'chargify' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'chargify' ),
		3  => __( 'Custom field deleted.', 'chargify' ),
		4  => __( 'Component Price Point updated.', 'chargify' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Component Price Point restored to revision from %s', 'chargify' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Component Price Point published. <a href="%s">View Component Price Point</a>', 'chargify' ), esc_url( $permalink ) ),
		7  => __( 'Component Price Point saved.', 'chargify' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Component Price Point submitted. <a target="_blank" href="%s">Preview Component Price Point</a>', 'chargify' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Component Price Point scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Component Price Point</a>', 'chargify' ),
		date_i18n( __( 'M j, Y @ G:i', 'chargify' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Component Price Point draft updated. <a target="_blank" href="%s">Preview Component Price Point</a>', 'chargify' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
