<?php
class Test_Chargify_Account extends WP_UnitTestCase {

	function setUp() {
		add_filter( 'chargify_show_accounts', __return_true() );
	}

	function test_chargify_account_cpt(){
		$custom_post_types = get_post_types();
		$this->assertArrayHasKey('chargify_account', $custom_post_types );
	}

	function test_chargify_account_filter() {
		$this->assertTrue( has_filter( 'chargify_show_accounts' ) );
	}
}
