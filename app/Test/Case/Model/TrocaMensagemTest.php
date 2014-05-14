<?php
App::uses('TrocaMensagem', 'Model');

/**
 * TrocaMensagem Test Case
 *
 */
class TrocaMensagemTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.troca_mensagem',
		'app.usuario',
		'app.cargo',
		'app.secretaria',
		'app.indicacao',
		'app.status_indicacao',
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
		$this->TrocaMensagem = ClassRegistry::init('TrocaMensagem');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TrocaMensagem);

		parent::tearDown();
	}

}
