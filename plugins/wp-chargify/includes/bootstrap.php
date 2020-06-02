<?php
namespace Chargify;

/**
 * Add a function to load our code in where we need it.
 */
function bootstrap() {
	add_action( 'cmb2_admin_init',       'Chargify\\Admin\\register_chargify_options_metabox' );
	add_action( 'init',                  'Chargify\\Post_Types\\Product\\chargify_product_init' );
	add_filter( 'post_updated_messages', 'Chargify\\Post_Types\\Product\\chargify_product_updated_messages' );
}

add_action( 'plugins_loaded', __NAMESPACE__ . '\\bootstrap' );
