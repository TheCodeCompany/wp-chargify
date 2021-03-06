<?php
/**
 * A controller class for WP Chargify CPT meta boxes.
 *
 * @file    wp-chargify/includes/ctrl/metabox-controller.php
 * @package WPChargify
 */

namespace Chargify\Controllers;

use Chargify\Model\Chargify_Component;
use Chargify\Model\Chargify_Component_Price_Point;
use Chargify\Model\Chargify_Product;
use Chargify\Model\Chargify_Product_Price_Point;
use function \Chargify\Helpers\Misc\partial_match_array_value_in_string;

/**
 * A controller class for WP Chargify CPT meta boxes.
 */
class Metabox_Controller {

	/**
	 * All of the allowed meta boxes for this post type, can be a partial or full match.
	 *
	 * @var string[]
	 */
	protected $partial_meta_box_matches = [
		'acf-group', // ACF Meta Box.
		'chargify_account',
		'chargify_api_log',
		'chargify_product_details',
		'chargify_product_price_point_details',
		'chargify_component_details',
		'chargify_component_price_point_details',
	];

	/**
	 * Setup the controller.
	 */
	public function __construct() {
		$this->setup();
	}

	/**
	 * Register all actions, filters and routes
	 */
	public function setup() {
		add_action( 'do_meta_boxes', [ $this, 'remove_meta_boxes' ], 99999 );
	}

	/**
	 * Removes all meta boxes that is not part of the partial match array.
	 * Ensures a clean user interface for this CPT.
	 * $this->partial_meta_box_matches.
	 */
	public function remove_meta_boxes() {
		global $wp_meta_boxes;

		$effected_post_types = [
			'chargify_account',
			'chargify_api_log',
			Chargify_Product::POST_TYPE,
			Chargify_Product_Price_Point::POST_TYPE,
			Chargify_Component::POST_TYPE,
			Chargify_Component_Price_Point::POST_TYPE,
		];

		foreach ( $effected_post_types as $post_type ) {

			if ( is_array( $wp_meta_boxes ) &&
				isset( $wp_meta_boxes[ $post_type ] ) ) {

				$enterprise_agreement_meta_boxes = $wp_meta_boxes[ $post_type ];

				/**
				 * Post edit screen contexts include 'normal', 'side', and 'advanced'
				 * Thus $context can be 'normal', 'side', or 'advanced'.
				 */
				foreach ( $enterprise_agreement_meta_boxes as $context => $meta_box_by_context ) {
					/**
					 * The priority within the context is where the boxes should show,
					 * this can be'high', 'low' or 'default'.
					 */
					foreach ( $meta_box_by_context as $priority => $meta_box_by_priority ) {
						/**
						 * Looping over each meta box, if a id is set, it can be assessed for removal.
						 */
						foreach ( $meta_box_by_priority as $meta_box ) {
							if ( isset( $meta_box['id'] ) ) {
								$partial_meta_box_matches = apply_filters( 'chargify_partial_meta_box_matches_allowed', $this->partial_meta_box_matches );
								if ( ! partial_match_array_value_in_string( $partial_meta_box_matches, $meta_box['id'] ) ) {
									remove_meta_box( $meta_box['id'], $post_type, $context );
								}
							}
						}
					}
				}
			}
		}
	}

}
