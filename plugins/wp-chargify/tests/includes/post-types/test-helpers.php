<?php
use Chargify\Post_Types\Helpers;
class Test_Post_Type_Helpers extends WP_UnitTestCase {
	function test_populate_product_post_types() {
		Helpers\populate_product_post_types( $this->mock_product_families_products_request() );

		$products = new WP_Query([
			'post_type' => 'chargify_product',
		]);

		$this->assertEquals( 'Standard Plan', $products->posts[1]->post_title );
		$this->assertEquals( 'Pariatur in beatae et tempore.  Vero impedit eum reiciendis.  Omnis inventore vel quisquam.', $products->posts[1]->post_content );
		$this->assertEquals( '99', get_post_meta( $products->posts[1]->ID, 'chargify_price', true ) );
		$this->assertEmpty( get_post_meta( $products->posts[1]->ID, 'chargify_initial_cost', true ) );
		$this->assertEquals( 'month', get_post_meta( $products->posts[1]->ID, 'chargify_interval_unit', true ) );
		$this->assertEquals( '1', get_post_meta( $products->posts[1]->ID, 'chargify_interval', true ) );
		$this->assertEquals( '1525024', get_post_meta( $products->posts[1]->ID, 'chargify_product_family_id', true ) );
		$this->assertEquals( 'Cloud Compute Servers', get_post_meta( $products->posts[1]->ID, 'chargify_product_family', true ) );
	}

	function test_chargify_products_all_option() {
		Helpers\populate_product_post_types( $this->mock_product_families_products_request() );

		$this->assertNotEmpty( get_option( 'chargify_products_all' ) );
	}

	public function mock_product_families_products_request() {
		return
				[
					[
						'id'                             => 5230866,
						'name'                           => 'Standard Plan',
						'handle'                         => 'server-standard',
						'description'                    => 'Pariatur in beatae et tempore.  Vero impedit eum reiciendis.  Omnis inventore vel quisquam.',
						'accounting_code'                => null,
						'request_credit_card'            => true,
						'expiration_interval'            => null,
						'expiration_interval_unit'       => null,
						'created_at'                     => '2019-04-14T00:00:38-04:00',
						'updated_at'                     => '2019-04-14T00:00:38-04:00',
						'price_in_cents'                 => 9900,
						'interval'                       => 1,
						'interval_unit'                  => 'month',
						'initial_charge_in_cents'        => null,
						'trial_price_in_cents'           => null,
						'trial_interval'                 => null,
						'trial_interval_unit'            => null,
						'archived_at'                    => null,
						'require_credit_card'            => true,
						'return_params'                  => null,
						'taxable'                        => true,
						'update_return_url'              => null,
						'tax_code'                       => null,
						'initial_charge_after_trial'     => false,
						'version_number'                 => 1,
						'update_return_params'           => null,
						'default_product_price_point_id' => 929380,
						'request_billing_address'        => false,
						'require_billing_address'        => false,
						'require_shipping_address'       => false,
						'product_price_point_id'         => 929380,
						'product_price_point_name'       => 'Default',
						'product_price_point_handle'     => 'uuid:671e5980-77c5-0138-aae6-0a4d7438a8ec',
						'product_family'                 => [
							'id'              => 1525024,
							'name'            => 'Cloud Compute Servers',
							'description'     => null,
							'handle'          => 'cloud-compute-servers',
							'accounting_code' => null
						],
						'public_signup_pages'=> []
					],
					[
						'id'                             => 5230867,
						'name'                           => 'Professional Plan',
						'handle'                         => 'server-professional',
						'description'                    => 'Et optio quaerat dolores sapiente a voluptas.  Ut eius placeat et possimus enim accusantium.  Ab illum recusandae quam.',
						'accounting_code'                => null,
						'request_credit_card'            => true,
						'expiration_interval'            => null,
						'expiration_interval_unit'       => null,
						'created_at'                     => '2019-04-14T00:00:38-04:00',
						'updated_at'                     => '2019-04-14T00:00:38-04:00',
						'price_in_cents'                 => 29900,
						'interval'                       => 1,
						'interval_unit'                  => 'month',
						'initial_charge_in_cents'        => null,
						'trial_price_in_cents'           => null,
						'trial_interval'                 => null,
						'trial_interval_unit'            => null,
						'archived_at'                    => null,
						'require_credit_card'            => true,
						'return_params'                  => null,
						'taxable'                        => true,
						'update_return_url'              => null,
						'tax_code'                       => null,
						'initial_charge_after_trial'     => false,
						'version_number'                 => 1,
						'update_return_params'           => null,
						'default_product_price_point_id' => 929381,
						'request_billing_address'        => false,
						'require_billing_address'        => false,
						'require_shipping_address'       => false,
						'product_price_point_id'         => 929381,
						'product_price_point_name'       => 'Default',
						'product_price_point_handle'     => 'uuid:674311f0-77c5-0138-aae6-0a4d7438a8ec',
						'product_family'                 => [
							'id'              => 1525024,
							'name'            => 'Cloud Compute Servers',
							'description'     => null,
							'handle'          => 'cloud-compute-servers',
							'accounting_code' => null
						],
						'public_signup_pages'=> []
					]
		];
	}
}
