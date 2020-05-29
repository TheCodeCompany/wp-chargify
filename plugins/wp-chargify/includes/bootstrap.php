<?php

namespace Chargify;
use Chargify\Admin;

/**
 * Add a function to load our code in where we need it.
 */
function bootstrap() {
	
}

add_action( 'plugins_loaded', __NAMESPACE__ . '\\bootstrap' );
