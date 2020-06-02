<?php
class Test_Chargify_Product extends WP_UnitTestCase {
		function test_chargify_product_cpt(){
			$custom_post_types = get_post_types();
			$this->assertArrayHasKey('chargify_product', $custom_post_types );
		}
}
