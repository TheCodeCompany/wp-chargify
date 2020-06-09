<?php
class Test_Chargify_Product extends WP_UnitTestCase {
	function setUp() {
		add_filter( 'chargify_show_products', __return_true() );
	}

	function test_chargify_product_cpt(){
		$custom_post_types = get_post_types();
		$this->assertArrayHasKey('chargify_product', $custom_post_types );
	}

	function test_chargify_account_filter() {
		$this->assertTrue( has_filter( 'chargify_show_products' ) );
	}
}
