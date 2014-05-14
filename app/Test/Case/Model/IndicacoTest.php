<?php
App::uses('Indicaco', 'Model');

/**
 * Indicaco Test Case
 *
 */
class IndicacoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.indicaco',
		'app.secretaria',
		'app.status_indicacao',
		'app.vereadore',
		'app.indicacoes_vereadore'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Indicaco = ClassRegistry::init('Indicaco');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Indicaco);

		parent::tearDown();
	}

}
