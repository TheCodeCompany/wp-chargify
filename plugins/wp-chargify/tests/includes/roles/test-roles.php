<?php
class Test_Roles extends WP_UnitTestCase {

	protected static $users = [
		'chargify_user' => null,
	];

	public static function wpSetUpBeforeClass( $factory ) {
		self::$users = [
			'chargify_user' => $factory->user->create_and_get( [ 'role' => 'chargify_user' ] ),
		];
	}

	function test_chargify_roles() {
		$this->assertTrue( self::$users['chargify_user']->has_cap( 'chargify_user' ) );
	}
}
