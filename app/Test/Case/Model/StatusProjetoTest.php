<?php
App::uses('StatusProjeto', 'Model');

/**
 * StatusProjeto Test Case
 *
 */
class StatusProjetoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.status_projeto',
		'app.projeto',
		'app.bairro',
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
		$this->StatusProjeto = ClassRegistry::init('StatusProjeto');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->StatusProjeto);

		parent::tearDown();
	}

}
