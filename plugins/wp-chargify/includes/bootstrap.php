<?php
namespace Chargify;

/**
 * Add a function to load our code in where we need it.
 */
function bootstrap() {
	add_action( 'cmb2_admin_init',       'Chargify\\Admin\\register_chargify_options_metabox' );
	add_action( 'init',                  'Chargify\\Post_Types\\Product\\chargify_product_init' );
	add_action( 'init',                  'Chargify\\Post_Types\\Account\\chargify_account_init' );
	add_filter( 'post_updated_messages', 'Chargify\\Post_Types\\Product\\chargify_product_updated_messages' );
	add_filter( 'post_updated_messages', 'Chargify\\Post_Types\\Account\\chargify_account_updated_messages' );
	add_action( 'cmb2_admin_init',       'Chargify\\Meta_Boxes\\Product\\product_meta_boxes');
	add_action( 'cmb2_admin_init',       'Chargify\\Meta_Boxes\\Account\\account_meta_boxes');
}

add_action( 'plugins_loaded', __NAMESPACE__ . '\\bootstrap' );
