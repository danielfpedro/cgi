<?php
App::uses('AppModel', 'Model');
/**
 * IndicacoesVereador Model
 *
 * @property Vereador $Vereador
 * @property Indicacao $Indicacao
 */
class IndicacoesVereador extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'vereador_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'indicacao_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Vereador' => array(
			'className' => 'Vereador',
			'foreignKey' => 'vereador_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Indicacao' => array(
			'className' => 'Indicacao',
			'foreignKey' => 'indicacao_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
