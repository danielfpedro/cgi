<?php
App::uses('Notificacao', 'Model');

/**
 * Notificacao Test Case
 *
 */
class NotificacaoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.notificacao',
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
		$this->Notificacao = ClassRegistry::init('Notificacao');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Notificacao);

		parent::tearDown();
	}

}
