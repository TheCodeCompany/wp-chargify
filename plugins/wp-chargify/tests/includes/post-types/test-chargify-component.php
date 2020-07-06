<?php
class Test_Chargify_Component extends WP_UnitTestCase {
	function setUp() {
		add_filter( 'chargify_show_components', __return_true() );
	}

	function test_chargify_component_cpt() {
		$custom_post_types = get_post_types();
		$this->assertArrayHasKey( 'chargify_component', $custom_post_types );
	}

	function test_chargify_component_filter() {
		$this->assertTrue( has_filter( 'chargify_show_components' ) );
	}
}
