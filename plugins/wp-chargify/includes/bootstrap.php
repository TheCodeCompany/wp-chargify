<?php
namespace Chargify;

/**
 * Add a function to load our code in where we need it.
 */
function bootstrap() {
	add_action( 'cmb2_admin_init',           'Chargify\\Admin\\register_chargify_options_metabox' );
	add_action( 'cmb2_admin_init',           'Chargify\\Meta_Boxes\\API_Log\\add_api_log_metaboxes' );

	add_action( 'init',                      'Chargify\\Post_Types\\Account\\chargify_account_init' );
	add_action( 'init',                      'Chargify\\Post_Types\\Component\\chargify_component_init' );
	add_action( 'init',                      'Chargify\\Post_Types\\Component_Price_Point\\chargify_component_price_point_init' );
	add_action( 'init',                      'Chargify\\Post_Types\\API_Log\\chargify_api_log_init' );
	add_action( 'init',                      'Chargify\\Post_Types\\Product\\chargify_product_init' );
	add_action( 'init',                      'Chargify\\Post_Types\\Product_Price_Point\\chargify_product_price_point_init' );

	add_filter( 'post_updated_messages',     'Chargify\\Post_Types\\Account\\chargify_account_updated_messages' );
	add_filter( 'post_updated_messages',     'Chargify\\Post_Types\\Component\\chargify_component_updated_messages' );
	add_filter( 'post_updated_messages',     'Chargify\\Post_Types\\Component_Price_Point\\chargify_component_price_point_updated_messages' );
	add_filter( 'post_updated_messages',     'Chargify\\Post_Types\\API_Log\\chargify_api_log_updated_messages' );
	add_filter( 'post_updated_messages',     'Chargify\\Post_Types\\Product\\chargify_product_updated_messages' );
	add_filter( 'post_updated_messages',     'Chargify\\Post_Types\\Product_Price_Point\\chargify_product_price_point_updated_messages' );

	add_action( 'cmb2_admin_init',           'Chargify\\Meta_Boxes\\Account\\account_meta_boxes' );
	add_action( 'cmb2_admin_init',           'Chargify\\Meta_Boxes\\Component\\component_meta_boxes' );
	add_action( 'cmb2_admin_init',           'Chargify\\Meta_Boxes\\Component_Price_Point\\component_price_point_meta_boxes' );
	add_action( 'cmb2_admin_init',           'Chargify\\Meta_Boxes\\Product\\product_meta_boxes' );
	add_action( 'cmb2_admin_init',           'Chargify\\Meta_Boxes\\Product_Price_point\\product_price_point_meta_boxes' );

	add_filter( 'page_row_actions',          'Chargify\\Post_Types\\API_Log\\page_row_actions', 10, 2 );
	add_action( 'admin_enqueue_scripts',     'Chargify\\Meta_Boxes\\API_Log\\remove_autosave' );
	add_action( 'cmb2_render_chargify_code', 'Chargify\\Meta_Boxes\\API_Log\\render_chargify_code', 10, 5 );
	add_action( 'chargify\log_request',      'Chargify\\Logging\\Logger\\logger', 10, 9 );
	add_action( 'rest_api_init',             'Chargify\\Endpoints\\Base\\register_customer_update_webhook' );
	add_filter( 'get_sample_permalink_html', 'Chargify\\Meta_Boxes\\Helpers\\hide_permalink', 10, 2 );
	add_action( 'cmb2_init',                 'Chargify\\Forms\\Signup\\chargify_signup_form' );
	add_action( 'cmb2_render_text_password', 'Chargify\\Forms\\Password\\render_callback_for_password', 10, 5 );
	add_filter( 'get_sample_permalink_html', 'Chargify\\Meta_Boxes\\Helpers\\hide_permalink', 10, 2 );
	add_shortcode( 'chargify-signup-form',   'Chargify\\Forms\\Signup\\chargify_signup_form' );
	add_filter( 'query_vars',                'Chargify\\Forms\\Submission\\query_vars' );
	add_action( 'cmb2_save_field',           'Chargify\\Webhooks\\maybe_update_webhook', 10, 4 );
	add_action( 'cmb2_save_field',           'Chargify\\Webhooks\\maybe_toggle_webhooks', 10, 4 );

	// Controllers.
	new Controllers\AdminPageWPChargifyController();
	new Controllers\CMB2TabsController();
	new Controllers\EnqueuesController();
	new Controllers\MetaBoxController();

	new Controllers\ValidateCouponController();
}

add_action( 'plugins_loaded', __NAMESPACE__ . '\\bootstrap' );
