<?php
App::uses('IndicacoesVereadore', 'Model');

/**
 * IndicacoesVereadore Test Case
 *
 */
class IndicacoesVereadoreTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.indicacoes_vereadore',
		'app.vereador',
		'app.indicacao'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->IndicacoesVereadore = ClassRegistry::init('IndicacoesVereadore');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->IndicacoesVereadore);

		parent::tearDown();
	}

}
