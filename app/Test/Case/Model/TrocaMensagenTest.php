<?php
App::uses('TrocaMensagen', 'Model');

/**
 * TrocaMensagen Test Case
 *
 */
class TrocaMensagenTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.troca_mensagen',
		'app.usuario',
		'app.indicacao'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TrocaMensagen = ClassRegistry::init('TrocaMensagen');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TrocaMensagen);

		parent::tearDown();
	}

}
