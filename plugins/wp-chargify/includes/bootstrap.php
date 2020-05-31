<?php

namespace Chargify;

/**
 * Add a function to load our code in where we need it.
 */
function bootstrap() {
	add_action( 'cmb2_admin_init', 'Chargify\\Admin\\register_chargify_options_metabox' );
}

add_action( 'plugins_loaded', __NAMESPACE__ . '\\bootstrap' );
