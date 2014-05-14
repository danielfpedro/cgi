<?php
App::uses('AppModel', 'Model');
/**
 * MainMenu Model
 *
 * @property Projeto $Projeto
 */
class MainMenu extends AppModel {
	public $useTable = false;

	public function getPrincipal(){
		$items_menu = array(
			array(
				'label'=> 'Indicações',
				'icon'=> 'list-alt',
				'url'=> array('controller'=> 'indicacoes', 'action'=> 'index'),
			),
			array(
				'label'=> 'Projetos',
				'icon'=> 'th-large',
				'url'=> array('controller'=> 'projetos', 'action'=> 'index'),
			)
		);

		return $items_menu;
	}
	public function getRelatorios(){
		$items_menu = array(
			array(
				'label'=> 'Indicações',

				'url'=> array('controller'=> 'indicacoes', 'action'=> 'index'),
			),
			array(
				'label'=> 'Projetos',
				'url'=> array('controller'=> 'projetos', 'action'=> 'index'),
			)
		);

		return $items_menu;
	}
}
