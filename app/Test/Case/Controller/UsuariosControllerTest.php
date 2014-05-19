<?php
App::uses('UsuariosController', 'Controller');

/**
 * UsuariosController Test Case
 *
 */
class UsuariosControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
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

}
