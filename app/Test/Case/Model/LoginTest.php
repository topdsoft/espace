<?php
App::uses('Login', 'Model');

/**
 * Login Test Case
 *
 */
class LoginTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.login',
		'app.member',
		'app.payment',
		'app.course',
		'app.instructor',
		'app.session',
		'app.courses_member'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Login = ClassRegistry::init('Login');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Login);

		parent::tearDown();
	}

}
