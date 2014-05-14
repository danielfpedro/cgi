<?php
/**
 * PropostaProjetoFixture
 *
 */
class PropostaProjetoFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'proposta_projeto';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id_proposta' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'id_projeto' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('id_proposta', 'id_projeto'), 'unique' => 1),
			'fk_Proposta_has_Projeto_Projeto1_idx' => array('column' => 'id_projeto', 'unique' => 0),
			'fk_Proposta_has_Projeto_Proposta_idx' => array('column' => 'id_proposta', 'unique' => 0)
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
			'id_proposta' => 1,
			'id_projeto' => 1
		),
	);

}
