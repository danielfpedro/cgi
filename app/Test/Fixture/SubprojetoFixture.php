<?php
/**
 * SubprojetoFixture
 *
 */
class SubprojetoFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'subprojeto';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'id_secretaria' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'id_projeto' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_Secretária_has_Projeto_Projeto1_idx' => array('column' => 'id_projeto', 'unique' => 0),
			'fk_Secretária_has_Projeto_Secretária1_idx' => array('column' => 'id_secretaria', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'id_secretaria' => 1,
			'id_projeto' => 1
		),
	);

}
