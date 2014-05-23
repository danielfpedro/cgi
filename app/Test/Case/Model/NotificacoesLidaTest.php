<?php
App::uses('NotificacoesLida', 'Model');

/**
 * NotificacoesLida Test Case
 *
 */
class NotificacoesLidaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.notificacoes_lida',
		'app.usuario',
		'app.cargo',
		'app.secretaria',
		'app.indicacao',
		'app.status_indicacao',
		'app.projeto',
		'app.status_projeto',
		'app.bairro',
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
		$this->NotificacoesLida = ClassRegistry::init('NotificacoesLida');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->NotificacoesLida);

		parent::tearDown();
	}

}
