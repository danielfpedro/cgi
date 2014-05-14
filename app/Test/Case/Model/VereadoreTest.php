<?php
App::uses('Vereadore', 'Model');

/**
 * Vereadore Test Case
 *
 */
class VereadoreTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.vereadore',
		'app.partido',
		'app.indicaco',
		'app.secretaria',
		'app.usuario',
		'app.cargo',
		'app.troca_mensagen',
		'app.indicacao',
		'app.status_indicacao',
		'app.indicacoes_vereadore'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Vereadore = ClassRegistry::init('Vereadore');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Vereadore);

		parent::tearDown();
	}

}
