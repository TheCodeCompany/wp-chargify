<?php

/**
 * Class Test_Plugins
 * Test all the CMB2 related functions.
 */
class Test_Plugins extends WP_UnitTestCase {
	function test_plugins_required_plugins() {
		$cmb2 = class_exists( 'CMB2_Bootstrap_270' );
		$this->assertTrue( $cmb2,    'CMB2 loaded.' );
	}
}
