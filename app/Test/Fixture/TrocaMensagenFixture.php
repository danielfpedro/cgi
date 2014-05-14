<?php
/**
 * TrocaMensagenFixture
 *
 */
class TrocaMensagenFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'mensagem' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'usuario_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'destinatario' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'indicacao_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_troca_mensagens_usuarios1_idx' => array('column' => 'usuario_id', 'unique' => 0),
			'fk_troca_mensagens_usuarios2_idx' => array('column' => 'destinatario', 'unique' => 0),
			'fk_troca_mensagens_indicacoes1_idx' => array('column' => 'indicacao_id', 'unique' => 0)
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
			'mensagem' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'usuario_id' => 1,
			'destinatario' => 1,
			'indicacao_id' => 1,
			'created' => '2014-05-11 05:29:11',
			'modified' => '2014-05-11 05:29:11'
		),
	);

}
