<?php
App::uses('Vereador', 'Model');

/**
 * Vereador Test Case
 *
 */
class VereadorTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.vereador',
		'app.partido',
		'app.indicacao',
		'app.status_indicacao',
		'app.secretaria',
		'app.usuario',
		'app.cargo',
		'app.troca_mensagem',
		'app.projeto',
		'app.status_projeto',
		'app.bairro',
		'app.indicacoes_vereador'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Vereador = ClassRegistry::init('Vereador');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Vereador);

		parent::tearDown();
	}

}
