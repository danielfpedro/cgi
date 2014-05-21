<?php
/**
 * BairroFixture
 *
 */
class BairroFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 80, 'key' => 'unique', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'ativo' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 4),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'name_UNIQUE' => array('column' => 'name', 'unique' => 1)
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
			'ativo' => 1,
			'created' => '2014-05-21 00:38:53',
			'modified' => '2014-05-21 00:38:53'
		),
	);

}
