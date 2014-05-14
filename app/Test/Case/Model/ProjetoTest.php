<?php
App::uses('Projeto', 'Model');

/**
 * Projeto Test Case
 *
 */
class ProjetoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.projeto',
		'app.status_projeto',
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
		$this->Projeto = ClassRegistry::init('Projeto');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Projeto);

		parent::tearDown();
	}

}
