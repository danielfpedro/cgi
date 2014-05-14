<?php
App::uses('Subprojeto', 'Model');

/**
 * Subprojeto Test Case
 *
 */
class SubprojetoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.subprojeto'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Subprojeto = ClassRegistry::init('Subprojeto');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Subprojeto);

		parent::tearDown();
	}

}
