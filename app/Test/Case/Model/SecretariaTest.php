<?php
App::uses('Secretaria', 'Model');

/**
 * Secretaria Test Case
 *
 */
class SecretariaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.secretaria',
		'app.indicacao',
		'app.status_indicacao',
		'app.projeto',
		'app.status_projeto',
		'app.bairro',
		'app.troca_mensagem',
		'app.usuario',
		'app.cargo',
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
		$this->Secretaria = ClassRegistry::init('Secretaria');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Secretaria);

		parent::tearDown();
	}

}
