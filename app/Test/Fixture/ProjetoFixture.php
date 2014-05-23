<?php
/**
 * ProjetoFixture
 *
 */
class ProjetoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'titulo' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 80, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'descricao' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'endereco' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 80, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'mapa_zoom' => array('type' => 'integer', 'null' => true, 'default' => null),
		'mapa_latlng' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 80, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'valor' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,3'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'status_projeto_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'bairro_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'indicacao_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_Projeto_status_projetos1_idxx' => array('column' => 'status_projeto_id', 'unique' => 0),
			'fk_Projeto_bairros1_idxx' => array('column' => 'bairro_id', 'unique' => 0),
			'fk_Projeto_indicacoes1_idxx' => array('column' => 'indicacao_id', 'unique' => 0)
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
			'titulo' => 'Lorem ipsum dolor sit amet',
			'descricao' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'endereco' => 'Lorem ipsum dolor sit amet',
			'mapa_zoom' => 1,
			'mapa_latlng' => 'Lorem ipsum dolor sit amet',
			'valor' => 1,
			'created' => '2014-05-23 04:26:42',
			'modified' => '2014-05-23 04:26:42',
			'status_projeto_id' => 1,
			'bairro_id' => 1,
			'indicacao_id' => 1
		),
	);

}
