<?php
App::uses('AppModel', 'Model');
/**
 * InquiryschedulesWorker Model
 *
 * @property Inquiryschedule $Inquiryschedule
 * @property Worker $Worker
 */
class InquiryschedulesWorker extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'inquiryschedule_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'worker_id' => array(
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

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Inquiryschedule' => array(
			'className' => 'Inquiryschedule',
			'foreignKey' => 'inquiryschedule_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Worker' => array(
			'className' => 'Worker',
			'foreignKey' => 'worker_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
