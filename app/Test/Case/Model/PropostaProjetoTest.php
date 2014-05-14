<?php
App::uses('PropostaProjeto', 'Model');

/**
 * PropostaProjeto Test Case
 *
 */
class PropostaProjetoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.proposta_projeto'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PropostaProjeto = ClassRegistry::init('PropostaProjeto');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PropostaProjeto);

		parent::tearDown();
	}

}
