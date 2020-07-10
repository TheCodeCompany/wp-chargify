<?php
/**
 * Plugin Name:     WP Chargify
 * Plugin URI:      https://thecode.co/
 * Description:     A plugin to add Chargify payments to your WordPress site.
 * Author:          The Code Company
 * Author URI:      https://thecode.co/
 * Text Domain:     wp-chargify
 * Domain Path:     /languages
 * Version:         0.1.0
 * Requires PHP:    7.0
 *
 * @package         WPChargify
 */

if ( ! defined( 'ABSPATH' ) ) exit;

if ( defined( 'WP_CLI' ) && WP_CLI ) {
	require_once dirname(__FILE__) . '/includes/commands/class-chargify-account.php';
	require_once dirname(__FILE__) . '/includes/commands/class-chargify-api-log.php';
	require_once dirname(__FILE__) . '/includes/commands/class-chargify-component.php';
	require_once dirname(__FILE__) . '/includes/commands/class-chargify-component-price-point.php';
	require_once dirname(__FILE__) . '/includes/commands/class-chargify-product-families.php';
	require_once dirname(__FILE__) . '/includes/commands/class-chargify-product-price-point.php';
	require_once dirname(__FILE__) . '/includes/commands/class-chargify-product.php';
	require_once dirname(__FILE__) . '/includes/commands/class-chargify-settings.php';
	require_once dirname(__FILE__) . '/includes/commands/class-chargify-webhooks.php';
}

define( 'WP_CHARGIFY_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
define( 'WP_CHARGIFY_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'WP_CHARGIFY_PLUGIN_DIR_PATH', plugin_dir_path( __FILE__ ) );

require_once( dirname( __FILE__ ) . '/vendor/autoload.php' );
require_once( 'includes/bootstrap.php' );

// Primary functions or helper methods.
require_once( 'includes/admin/settings.php' );
require_once( 'includes/admin/helpers.php' );

// Libraries.
require_once( 'includes/libraries/enqueues.php' );
require_once( 'includes/libraries/enqueues-functions.php' );

require_once( 'includes/libraries/requests.php' );

// Libraries base Models and Factories.
require_once( 'includes/libraries/model.php' );
require_once( 'includes/libraries/model-factory.php' );
require_once( 'includes/libraries/generic-post.php' );
require_once( 'includes/libraries/generic-post-factory.php' );
require_once( 'includes/libraries/user.php' );
require_once( 'includes/libraries/user-factory.php' );

// Models and Factories.
require_once( 'includes/model/chargify-account.php' );
require_once( 'includes/model/chargify-account-factory.php' );
require_once( 'includes/model/chargify-product.php' );
require_once( 'includes/model/chargify-product-factory.php' );
require_once( 'includes/model/chargify-product-price-point.php' );
require_once( 'includes/model/chargify-product-price-point-factory.php' );
require_once( 'includes/model/chargify-component.php' );
require_once( 'includes/model/chargify-component-factory.php' );
require_once( 'includes/model/chargify-component-price-point.php' );
require_once( 'includes/model/chargify-component-price-point-factory.php' );
require_once( 'includes/model/chargify-user.php' );
require_once( 'includes/model/chargify-user-factory.php' );

// Controllers.
require_once( 'includes/ctrl/admin-page-wp-chargify-controller.php' );
require_once( 'includes/ctrl/enqueues-controller.php' );
require_once( 'includes/ctrl/validate-coupon-controller.php' );

// Chargify Endpoints.
require_once( 'includes/chargify/endpoints/coupons.php' );
require_once( 'includes/chargify/endpoints/components.php' );
require_once( 'includes/chargify/endpoints/component-price-points.php' );
require_once( 'includes/chargify/endpoints/product-families.php' );
require_once( 'includes/chargify/endpoints/product-price-points.php' );
require_once( 'includes/chargify/endpoints/subscriptions.php' );
require_once( 'includes/chargify/endpoints/webhooks.php' );

require_once( 'includes/chargify/customers/namespace.php' );
require_once( 'includes/chargify/renewal/namespace.php' );
require_once( 'includes/chargify/subscription/namespace.php' );
require_once( 'includes/endpoints/base.php' );
require_once( 'includes/forms/account-details.php' );
require_once( 'includes/forms/billing-details.php' );
require_once( 'includes/forms/coupon-details.php' );
require_once( 'includes/forms/customer-details.php' );
require_once( 'includes/forms/hidden-details.php' );
require_once( 'includes/forms/message-details.php' );
require_once( 'includes/forms/payment-details.php' );
require_once( 'includes/forms/product-details.php' );
require_once( 'includes/forms/signup.php' );
require_once( 'includes/forms/submission.php' );
require_once( 'includes/helpers/customers.php' );
require_once( 'includes/helpers/forms.php' );
require_once( 'includes/helpers/options.php' );
require_once( 'includes/logging/logger.php' );
require_once( 'includes/meta-boxes/chargify-account.php' );
require_once( 'includes/meta-boxes/chargify-api-log.php' );
require_once( 'includes/meta-boxes/chargify-component-price-points.php' );
require_once( 'includes/meta-boxes/chargify-components.php' );
require_once( 'includes/meta-boxes/chargify-product.php' );
require_once( 'includes/meta-boxes/chargify-product-price-points.php' );
require_once( 'includes/meta-boxes/helpers.php' );

// Post types.
require_once( 'includes/post-types/chargify-account.php' );
require_once( 'includes/post-types/chargify-component.php' );
require_once( 'includes/post-types/chargify-component-price-point.php' );
require_once( 'includes/post-types/chargify-api-log.php' );
require_once( 'includes/post-types/chargify-product.php' );
require_once( 'includes/post-types/chargify-product-price-point.php' );
require_once( 'includes/post-types/helpers.php' );

// Roles.
require_once( 'includes/roles/namespace.php' );

# Setup the activation and deactivation routines.
register_activation_hook( __FILE__, 'Chargify\\Roles\\add_chargify_role' );
register_deactivation_hook( __FILE__ , 'Chargify\\Roles\\remove_chargify_role' );
