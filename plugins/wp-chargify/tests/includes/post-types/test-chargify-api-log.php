<?php
class Test_Chargify_API_Log extends WP_UnitTestCase {

	function setUp() {
		add_filter( 'chargify_show_api_logs', __return_true() );
	}

	function test_chargify_account_cpt(){
		$custom_post_types = get_post_types();
		$this->assertArrayHasKey('chargify_api_log', $custom_post_types );
	}

	function test_chargify_account_filter() {
		$this->assertTrue( has_filter( 'chargify_show_api_logs' ) );
	}
}
