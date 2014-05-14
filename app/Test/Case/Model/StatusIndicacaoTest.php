<?php
App::uses('StatusIndicacao', 'Model');

/**
 * StatusIndicacao Test Case
 *
 */
class StatusIndicacaoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.status_indicacao',
		'app.indicacao',
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
		$this->StatusIndicacao = ClassRegistry::init('StatusIndicacao');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->StatusIndicacao);

		parent::tearDown();
	}

}
