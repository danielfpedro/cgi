<?php
App::uses('NotificacoesLidasController', 'Controller');

/**
 * NotificacoesLidasController Test Case
 *
 */
class NotificacoesLidasControllerTest extends ControllerTestCase {

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

}
