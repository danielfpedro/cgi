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
				'label'=> 'Vereadores',

				'url'=> array('controller'=> 'vereadores', 'action'=> 'ranking_list'),
			),
			array(
				'label'=> 'Secretarias',
				'url'=> array('controller'=> 'secretarias', 'action'=> 'ranking_list'),
			)
		);

		return $items_menu;
	}
	public function getDadosExtras(){
		$items_menu = array(
			array(
				'label'=> 'Partidos',
				'url'=> array('controller'=> 'partidos', 'action'=> 'index'),
			),
			array(
				'label'=> 'Vereadores',

				'url'=> array('controller'=> 'vereadores', 'action'=> 'index'),
			),
			array(
				'label'=> 'Secretarias',
				'url'=> array('controller'=> 'secretarias', 'action'=> 'index'),
			),
			array(
				'label'=> 'Status de indicaçoes',
				'url'=> array('controller'=> 'statusIndicacoes', 'action'=> 'index'),
			),
			array(
				'label'=> 'Status de projetos',
				'url'=> array('controller'=> 'statusProjetos', 'action'=> 'index'),
			),
			array(
				'label'=> 'Usuarios',
				'url'=> array('controller'=> 'usuarios', 'action'=> 'index'),
			),
			array(
				'label'=> 'Bairros',
				'url'=> array('controller'=> 'bairros', 'action'=> 'index'),
			)
		);

		return $items_menu;
	}
}
