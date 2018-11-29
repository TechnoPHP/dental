<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

App::uses('IagentsAppController', 'Iagents.Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link https://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class AgenciesController extends IagentsAppController {

	public $components = array('Paginator','RequestHandler');
/**
 * This controller does not use a model
 *
 * @var array
 */
	
	public function beforeFilter() { 
		parent::beforeFilter();
		$this->Auth->allow();
	}
/**
 * Displays a view
 *
 * @return CakeResponse|null
 * @throws ForbiddenException When a directory traversal attempt.
 * @throws NotFoundException When the view file could not be found
 *   or MissingViewException in debug mode.
 */
	public function home() {
		
	}
	
	public function agencylist() {
		
		$this->index();
	}
	
	public function index() {
		$this->Agency->recursive = 0; 
		$conditions = array('Agency.active'=>1,'(Agency.name LIKE \'%'.$this->request->data['query'].'%\' or Agency.name LIKE \''.$this->request->data['query'].'%\')');
		$this->Paginator->settings = array(
			'Agency'=>array(
				'contain'=>array(
					'Agent'=>array('fields'=>array('id','firstname','lastname'),
						'Agentprofile'=>array('fields'=>array('id','imagesmall')),
					),
					//'Bscoverimage'=>array('imagesmall','imagebig'),
					//'Bscategory'=>array('id','name'),
					//'Rating'=>array()
				),
			'fields'=>array('Agency.id','Agency.name'),
			'conditions' => array($conditions),
			'limit' => 20,
			'order'=>array('Agency.name'=>'asc'),
			)
		);
		$agencies = $this->Paginator->paginate();
		$this->set('agencies', $agencies);
		echo json_encode($agencies);
		exit;
	}
	
	public function create() {
		if ($this->request->is(array('post','put'))) {
			$this->Agency->create();
			if ($this->Agency->save($this->request->data)) {
				$this->Session->setFlash(__('The Agency has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Agency could not be saved. Please, try again.'));
			}
		}
		$agents = $this->Agency->find('list');
		$this->set(compact('agents'));
	}
	
	public function view($id = null) {
		if (!$this->Agency->exists($id)) {
			throw new NotFoundException(__('Invalid Aagency'));
		}
		$conditions = array('Agency.' . $this->Agency->primaryKey => $id);
		//$agency = $this->Agency->find('first', $options);
		$fields = array("Aagency.*");
		$agency = $this->Agency->find('first',array("fields"=>$fields,"conditions"=>$conditions));
		//pr($agency);exit;
		$this->set('agency', $agency);
	}
}