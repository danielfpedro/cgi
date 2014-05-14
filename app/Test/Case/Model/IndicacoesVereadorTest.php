<?php
App::uses('IndicacoesVereador', 'Model');

/**
 * IndicacoesVereador Test Case
 *
 */
class IndicacoesVereadorTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.indicacoes_vereador',
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
		'app.bairro'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->IndicacoesVereador = ClassRegistry::init('IndicacoesVereador');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->IndicacoesVereador);

		parent::tearDown();
	}

}
