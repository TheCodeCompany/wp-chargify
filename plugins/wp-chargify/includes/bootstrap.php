<?php

namespace Chargify;

/**
 * Add a function to load our code in where we need it.
 */
function bootstrap() {
	// Load Composer’s autoloader for CMB2
	if ( ! class_exists( 'CMB2_Bootstrap_270' ) ) {
		require_once( dirname( dirname( __FILE__ ) ) . '/vendor/autoload.php' );
	}
}

add_action( 'plugins_loaded', __NAMESPACE__ . '\\bootstrap' );
