<?php
App::uses('Partido', 'Model');

/**
 * Partido Test Case
 *
 */
class PartidoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.partido',
		'app.vereador',
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
		$this->Partido = ClassRegistry::init('Partido');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Partido);

		parent::tearDown();
	}

}
