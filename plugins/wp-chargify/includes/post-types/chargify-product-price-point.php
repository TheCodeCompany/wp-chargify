<?php
/**
 * Register the custom post type for product price points.
 *
 * @file    wp-chargify/includes/post-types/chargify-product-price-point.php
 * @package WPChargify
 */

namespace Chargify\Post_Types\Product_Price_Point;

use Chargify\Model\ChargifyProductPricePoint;

/**
 * Registers the `chargify_price_point` post type.
 */
function chargify_product_price_point_init() {
	// Allow developers to hide the Products custom post types.
	$show_product_price_points = apply_filters( 'chargify_show_product_price_points', true );

	register_post_type(
		ChargifyProductPricePoint::POST_TYPE,
		[
			'labels'                => [
				'name'                  => __( 'Product Price Points', 'chargify' ),
				'singular_name'         => __( 'Product Price Point', 'chargify' ),
				'all_items'             => __( 'All Product Price Points', 'chargify' ),
				'archives'              => __( 'Product Price Point Archives', 'chargify' ),
				'attributes'            => __( 'Product Price Point Attributes', 'chargify' ),
				'insert_into_item'      => __( 'Insert into Product Price Point', 'chargify' ),
				'uploaded_to_this_item' => __( 'Uploaded to this Product Price Point', 'chargify' ),
				'featured_image'        => _x( 'Featured Image', 'chargify_product_price_point', 'chargify' ),
				'set_featured_image'    => _x( 'Set featured image', 'chargify_product_price_point', 'chargify' ),
				'remove_featured_image' => _x( 'Remove featured image', 'chargify_product_price_point', 'chargify' ),
				'use_featured_image'    => _x( 'Use as featured image', 'chargify_product_price_point', 'chargify' ),
				'filter_items_list'     => __( 'Filter Product Price Points list', 'chargify' ),
				'items_list_navigation' => __( 'Product Price Points list navigation', 'chargify' ),
				'items_list'            => __( 'Product Price Points list', 'chargify' ),
				'new_item'              => __( 'New Product Price Point', 'chargify' ),
				'add_new'               => __( 'Add New', 'chargify' ),
				'add_new_item'          => __( 'Add New Product Price Point', 'chargify' ),
				'edit_item'             => __( 'Edit Product Price Point', 'chargify' ),
				'view_item'             => __( 'View Product Price Point', 'chargify' ),
				'view_items'            => __( 'View Product Price Points', 'chargify' ),
				'search_items'          => __( 'Search Product Price Points', 'chargify' ),
				'not_found'             => __( 'No Product Price Points found', 'chargify' ),
				'not_found_in_trash'    => __( 'No Product Price Points found in trash', 'chargify' ),
				'parent_item_colon'     => __( 'Parent Product Price Point:', 'chargify' ),
				'menu_name'             => __( 'Product Price Points', 'chargify' ),
			],
			'public'                => true,
			'hierarchical'          => false,
			'show_ui'               => $show_product_price_points,
			'show_in_menu'          => 'wp-chargify.php',
			'show_in_nav_menus'     => false,
			'supports'              => [ 'title', 'editor', 'revisions' ],
			'has_archive'           => true,
			'rewrite'               => true,
			'query_var'             => true,
			'menu_position'         => 22,
			'menu_icon'             => 'dashicons-cart',
			'show_in_rest'          => true,
			'rest_base'             => ChargifyProductPricePoint::POST_TYPE,
			'rest_controller_class' => 'WP_REST_Posts_Controller',
		]
	);

}

/**
 * Sets the post updated messages for the `chargify_product_price_point` post type.
 *
 * @param array $messages Post updated messages.
 *
 * @return array Messages for the `chargify_product_price_point` post type.
 */
function chargify_product_price_point_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['chargify_product_price_point'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Product Price Point updated. <a target="_blank" href="%s">View Product Price Point</a>', 'chargify' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'chargify' ),
		3  => __( 'Custom field deleted.', 'chargify' ),
		4  => __( 'Product Price Point updated.', 'chargify' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Product Price Point restored to revision from %s', 'chargify' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Product Price Point published. <a href="%s">View Product Price Point</a>', 'chargify' ), esc_url( $permalink ) ),
		7  => __( 'Product Price Point saved.', 'chargify' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Product Price Point submitted. <a target="_blank" href="%s">Preview Product Price Point</a>', 'chargify' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Product Price Point scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Product Price Point</a>', 'chargify' ),
			date_i18n( __( 'M j, Y @ G:i', 'chargify' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Product Price Point draft updated. <a target="_blank" href="%s">Preview Product Price Point</a>', 'chargify' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
