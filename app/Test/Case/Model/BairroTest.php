<?php
App::uses('Bairro', 'Model');

/**
 * Bairro Test Case
 *
 */
class BairroTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.bairro',
		'app.projeto',
		'app.status_projeto',
		'app.indicacao',
		'app.status_indicacao',
		'app.secretaria',
		'app.usuario',
		'app.cargo',
		'app.troca_mensagem',
		'app.vereador',
		'app.partido',
		'app.indicacoes_vereador'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Bairro = ClassRegistry::init('Bairro');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Bairro);

		parent::tearDown();
	}

}
