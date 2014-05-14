<?php
App::uses('Indicacao', 'Model');

/**
 * Indicacao Test Case
 *
 */
class IndicacaoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.indicacao',
		'app.status_indicacao',
		'app.secretaria',
		'app.usuario',
		'app.cargo',
		'app.troca_mensagem',
		'app.projeto',
		'app.status_projeto',
		'app.bairro',
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
		$this->Indicacao = ClassRegistry::init('Indicacao');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Indicacao);

		parent::tearDown();
	}

}
