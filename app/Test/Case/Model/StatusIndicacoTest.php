<?php
App::uses('StatusIndicaco', 'Model');

/**
 * StatusIndicaco Test Case
 *
 */
class StatusIndicacoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.status_indicaco'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->StatusIndicaco = ClassRegistry::init('StatusIndicaco');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->StatusIndicaco);

		parent::tearDown();
	}

}
