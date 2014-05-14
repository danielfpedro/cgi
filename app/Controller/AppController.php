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
	
	public function beforeFilter() {

		$site_name = 'SGI';

		$this->loadModel('MainMenu');
		$items_menu = $this->MainMenu->getPrincipal();
		$items_menu_relatorios = $this->MainMenu->getRelatorios();
		$this->set(compact('items_menu', 'items_menu_relatorios', 'site_name'));

		$this->loadModel('Notificacao');
		$notificacoes = $this->Notificacao->find('all', array('limit'=> 8));
		$this->set(compact('notificacoes'));
	}

	public function validationErrorsToList($array) {
		$errors = '';
		foreach ($array as $key => $item) {
			$errors .= '<strong>' . $key . '</strong>:<br>';
			foreach ($item as $i) {
				$errors .= $i . '<br>';
			}
		}
		return $errors;
	}

}