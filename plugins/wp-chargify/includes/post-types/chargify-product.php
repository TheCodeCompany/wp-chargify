<?php

namespace Chargify\Post_Types\Product;

use Chargify\Model\Chargify_Product;

/**
 * Registers the `chargify_product` post type.
 */
function chargify_product_init() {
	// Allow developers to hide the Products custom post types.
	$show_products = apply_filters( 'chargify_show_products', true );

	register_post_type(
		Chargify_Product::POST_TYPE,
		[
			'labels'                => [
				'name'                  => __( 'Products', 'chargify' ),
				'singular_name'         => __( 'Products', 'chargify' ),
				'all_items'             => __( 'All Products', 'chargify' ),
				'archives'              => __( 'Products Archives', 'chargify' ),
				'attributes'            => __( 'Products Attributes', 'chargify' ),
				'insert_into_item'      => __( 'Insert into Products', 'chargify' ),
				'uploaded_to_this_item' => __( 'Uploaded to this Product', 'chargify' ),
				'featured_image'        => _x( 'Featured Image', 'chargify_product', 'chargify' ),
				'set_featured_image'    => _x( 'Set featured image', 'chargify_product', 'chargify' ),
				'remove_featured_image' => _x( 'Remove featured image', 'chargify_product', 'chargify' ),
				'use_featured_image'    => _x( 'Use as featured image', 'chargify_product', 'chargify' ),
				'filter_items_list'     => __( 'Filter Products list', 'chargify' ),
				'items_list_navigation' => __( 'Products list navigation', 'chargify' ),
				'items_list'            => __( 'Products list', 'chargify' ),
				'new_item'              => __( 'New Product', 'chargify' ),
				'add_new'               => __( 'Add New', 'chargify' ),
				'add_new_item'          => __( 'Add New Product', 'chargify' ),
				'edit_item'             => __( 'Edit Product', 'chargify' ),
				'view_item'             => __( 'View Products', 'chargify' ),
				'view_items'            => __( 'View Products', 'chargify' ),
				'search_items'          => __( 'Search Products', 'chargify' ),
				'not_found'             => __( 'No Products found', 'chargify' ),
				'not_found_in_trash'    => __( 'No Products found in trash', 'chargify' ),
				'parent_item_colon'     => __( 'Parent Product:', 'chargify' ),
				'menu_name'             => __( 'Products', 'chargify' ),
			],
			'public'                => true,
			'hierarchical'          => false,
			'show_ui'               => $show_products,
			'show_in_menu'          => 'wp-chargify.php',
			'show_in_nav_menus'     => false,
			'supports'              => [ 'title', 'editor', 'revisions' ],
			'has_archive'           => true,
			'rewrite'               => true,
			'query_var'             => true,
			'menu_position'         => 22,
			'menu_icon'             => 'dashicons-cart',
			'show_in_rest'          => true,
			'rest_base'             => Chargify_Product::POST_TYPE,
			'rest_controller_class' => 'WP_REST_Posts_Controller',
		]
	);

}

/**
 * Sets the post updated messages for the `chargify_product` post type.
 *
 * @param array $messages Post updated messages.
 *
 * @return array Messages for the `chargify_product` post type.
 */
function chargify_product_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['chargify_product'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Products updated. <a target="_blank" href="%s">View Products</a>', 'chargify' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'chargify' ),
		3  => __( 'Custom field deleted.', 'chargify' ),
		4  => __( 'Products updated.', 'chargify' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Products restored to revision from %s', 'chargify' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Products published. <a href="%s">View Products</a>', 'chargify' ), esc_url( $permalink ) ),
		7  => __( 'Products saved.', 'chargify' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Products submitted. <a target="_blank" href="%s">Preview Products</a>', 'chargify' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Products scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Products</a>', 'chargify' ),
			date_i18n( __( 'M j, Y @ G:i', 'chargify' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Products draft updated. <a target="_blank" href="%s">Preview Products</a>', 'chargify' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
