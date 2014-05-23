<?php
/**
 * NotificacaoFixture
 *
 */
class NotificacaoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'notificacao' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 400, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'tipo' => array('type' => 'integer', 'null' => false, 'default' => null),
		'usuario_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'lido' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4),
		'identificador' => array('type' => 'integer', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_notificacoes_usuarios1_idx' => array('column' => 'usuario_id', 'unique' => 0)
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
			'notificacao' => 'Lorem ipsum dolor sit amet',
			'tipo' => 1,
			'usuario_id' => 1,
			'created' => '2014-05-23 03:23:03',
			'lido' => 1,
			'identificador' => 1
		),
	);

}
