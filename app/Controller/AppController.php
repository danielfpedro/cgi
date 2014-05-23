<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	// public $components = array(
	// 	'Session',
	// 	'Auth'=> array(
	// 		'userModel'=> 'Usuario',
	// 		'loginRedirect'=> array(
	// 			'controller'=> 'indicacoes'),
	// 		'logoutRedirect'=> array(
	// 			'controller'=> 'usuarios', 'action'=> 'login'),
	// 		'loginAction'=> array(
	// 			'controller'=> 'usuarios',
	// 			'action'=> 'login'),
	// 		'authenticate'=> array(
	// 			'Form'=> array(
	// 				'userModel'=> 'Usuario',
	// 				'fields'=> array(
	// 					'username'=> 'email',
	// 					'password'=> 'senha')
	// 				)
	// 			)
	// 		)
	// 	);

	// Informações do Auth gambi
	public $Auth = false;
	public $Auth_ususario_id = null;
	public $Auth_nome = null;
	public $Auth_email = null;
	public $Auth_cargo = null;

	public function beforeFilter() {
		//Auth gambi
		$this->customAuth();

		$site_name = 'SGI';

		$this->loadModel('MainMenu');
		$items_menu = $this->MainMenu->getPrincipal();
		$items_menu_relatorios = $this->MainMenu->getRelatorios();
		$items_menu_dados_extras = $this->MainMenu->getDadosExtras();
		$this->set(compact('items_menu', 'items_menu_relatorios', 'site_name', 'items_menu_dados_extras'));

		if ($this->Auth) {
			$this->loadModel('Notificacao');
			$notificacoes = $this->Notificacao->find(
				'all',
				array(
					'order'=> 'Notificacao.created DESC',
					'limit'=> 10,
					'conditions'=> array(
						'or'=> array(
							array('Notificacao.usuario_id'=> Null),
							array('Notificacao.usuario_id'=> $this->Auth_usuario_id),
							)
							)));

			$this->loadModel('Usuario');
			$total_notificacoes_novas = 0;
			$last_view = $this->Usuario->find('first', array(
				'conditions'=> array(
					'Usuario.id'=> $this->Auth_usuario_id
				)));

			if (!empty($last_view['Usuario']['ultima_notificacao_lida'])) {
				$last_view = $last_view['Usuario']['ultima_notificacao_lida'];
				// Debugger::dump($last_view);
				// exit();
			} else {
				$last_view = '0000-00-00 00:00:00';
			}

			$total_notificacoes_novas = $this->Notificacao->find('count', array(
					'conditions'=> array(
						'or'=> array(
							array('Notificacao.usuario_id'=> Null),
							array('Notificacao.usuario_id'=> $this->Auth_usuario_id)
							),
						'Notificacao.created >'=> $last_view)));
			
			// Debugger::dump($total_notificacoes_novas);
			// exit();
			$this->set(compact('notificacoes', 'total_notificacoes_novas'));
			# code...
		}
	}

	public function customAuth() {
		if ($this->Session->read('Auth.flag')) {

			$this->Auth = true;
			$this->Auth_usuario_id = $this->Session->read('Auth.usuario_id');
			$this->Auth_nome = $this->Session->read('Auth.nome');
			$this->Auth_email = $this->Session->read('Auth.email');
			$this->Auth_cargo_id = $this->Session->read('Auth.cargo_id');
			$this->Auth_cargo = $this->Session->read('Auth.cargo');
			$this->Auth_secretaria_id = $this->Session->read('Auth.secretaria_id');
			$this->Auth_secretaria = $this->Session->read('Auth.secretaria');

			$this->set('Auth_usuario_id', $this->Auth_usuario_id);
			$this->set('Auth_nome', $this->Auth_nome);
			$this->set('Auth_email', $this->Auth_email);
			$this->set('Auth_cargo_id', $this->Auth_cargo_id);
			$this->set('Auth_cargo', $this->Auth_cargo);
			$this->set('Auth_secretaria_id', $this->Auth_secretaria_id);
			$this->set('Auth_secretaria', $this->Auth_secretaria);

			if ($this->params['controller'] == 'usuarios' AND $this->params['action'] == 'login') {
				return $this->redirect(array('controller'=> 'indicacoes', 'action'=> 'index'));
			}

			// Controle de acesso dos controllers
			$black_list_a = array(
				'partidos',
				'vereadores',
				'vereadores',
				'secretarias',
				'statusIndicacoes', 'statusProjetos', 'bairros', 'usuarios');

			$white_list_actions = array('logout', 'ranking_list', 'add_ajax');

			switch ($this->Auth_cargo_id) {
				//Prefeito
				case 1:
				//Secretario
				case 2:
					if (in_array($this->params['controller'], $black_list_a)) {
						if (!in_array($this->params['action'], $white_list_actions)) {
							throw new MethodNotAllowedException ("Você não tem permissão para acessar esta página");	
						}
					}
					break;
				//TI
				case 3:
					# code...
					break;
				
				default:
					# code...
					break;
			}

		} else {
			if ($this->params['controller'] == 'usuarios' AND $this->params['action'] == 'login') {

			} else {
				return $this->redirect(array('controller'=> 'usuarios', 'action'=> 'login'));
			}
		}
	}

	public function validationErrorsToList($array) {
		$errors = '';
		foreach ($array as $validationError) {
			$errors .= $validationError . '<br>';
		}
		return $erros;
	}

}
