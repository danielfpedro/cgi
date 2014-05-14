<?php
/**
 * IndicacoFixture
 *
 */
class IndicacoFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'indicacoes';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 80, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'uid' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 40, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'arquivo' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'parecer' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 4000, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'data_indicacao' => array('type' => 'date', 'null' => false, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'secretaria_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'status_indicacao_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_indicacoes_secretarias1_idx' => array('column' => 'secretaria_id', 'unique' => 0),
			'fk_indicacoes_status_indicacoes1_idx' => array('column' => 'status_indicacao_id', 'unique' => 0)
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
			'name' => 'Lorem ipsum dolor sit amet',
			'uid' => 'Lorem ipsum dolor sit amet',
			'arquivo' => 'Lorem ipsum dolor sit amet',
			'parecer' => 'Lorem ipsum dolor sit amet',
			'data_indicacao' => '2014-05-11',
			'created' => '2014-05-11 05:29:08',
			'modified' => '2014-05-11 05:29:08',
			'secretaria_id' => 1,
			'status_indicacao_id' => 1
		),
	);

}
