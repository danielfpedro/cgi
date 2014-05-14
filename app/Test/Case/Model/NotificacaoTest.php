<?php
App::uses('Notificacao', 'Model');

/**
 * Notificacao Test Case
 *
 */
class NotificacaoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.notificacao'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Notificacao = ClassRegistry::init('Notificacao');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Notificacao);

		parent::tearDown();
	}

}
