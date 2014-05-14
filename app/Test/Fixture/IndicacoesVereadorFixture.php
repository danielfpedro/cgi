<?php
/**
 * IndicacoesVereadorFixture
 *
 */
class IndicacoesVereadorFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'vereador_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'indicacao_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_vereadores_indicacoes_indicacoes1_idx' => array('column' => 'indicacao_id', 'unique' => 0),
			'fk_vereadores_indicacoes_vereadores1_idx' => array('column' => 'vereador_id', 'unique' => 0)
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
			'vereador_id' => 1,
			'indicacao_id' => 1
		),
	);

}
