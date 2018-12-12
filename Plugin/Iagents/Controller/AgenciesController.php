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

	public $components = array('Paginator','Flash','RequestHandler');
/**
 * This controller does not use a model
 *
 * @var array
 */
	
	public function beforeFilter() { 
		parent::beforeFilter();
		$this->Auth->allow();
		$this->set('masterclass','active');
		$this->set('masterclass','');
		$this->set('announceclass','');
		$this->set('aclclass','');
		$this->set('usersclass','');
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
		
		$conditions = array();//',(Agency.name LIKE \'%'.$this->request->data['query'].'%\' or Agency.name LIKE \''.$this->request->data['query'].'%\')');
		$this->Paginator->settings = array(
			'Agency'=>array(
				'contain'=>array(
					'Aagent'=>array('fields'=>array('id','firstname','lastname'),
						'Agentprofile'=>array('fields'=>array('id','imagesmall')),
					),
					//'Bscoverimage'=>array('imagesmall','imagebig'),
					//'Bscategory'=>array('id','name'),
					//'Rating'=>array()
				),
			'fields'=>array('Agency.id','Agency.name','Agency.city','Agency.phone','Agency.modified'),
			'conditions' => array($conditions),
			'limit' => 20,
			'order'=>array('Agency.active','Agency.name'=>'asc'),
			)
		);
		$agencies = $this->Paginator->paginate();
		//pr($agencies);exit;
		$this->set('agencies', $agencies);
		//echo json_encode($agencies);
		//exit;
	}
	
	public function admin_index(){
		$this->index();
	}
	
	public function create($admin=false) {
		if ($this->request->is(array('post','put'))) {
			$this->Agency->create();
			if ($this->Agency->save($this->request->data)) {
				$this->Flash->success(__('The Agency has been saved'),array('params'=>array('name'=>$this->request->data['Agency']['name'])));
				return $this->redirect(array('plugin'=>'iagents','controller'=>'agnencies','action'=>'index','admin'=>$admin));
			} else {
				$this->Session->setFlash(__('The Agency could not be saved. Please, try again.'));
			}
		}
		$agencies = $this->Agency->find('list');
		$this->set(compact('agencies'));
	}
	
	public function admin_create($admin=true) {
		$this->create($admin);
	}
	
	public function edit($id = null,$admin=false) {
		if (!$this->Agency->exists($id)) {
			throw new NotFoundException(__('Invalid Agency'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Agency->save($this->request->data)) {
				$this->Flash->success(__('The Agency has been saved'),array('params'=>array('name'=>$this->request->data['Agency']['name'])));
				return $this->redirect(array('plugin'=>'iagents','controller'=>'agencies','action'=>'index','admin'=>$admin));
			} else {
				$this->Flash->error(__('The Agency could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Agency.' . $this->Agency->primaryKey=>$id));
			$this->request->data = $this->Agency->find('first', $options);
		}
	}
	
	public function admin_edit($id = null,$admin=true) {
		$this->edit($id,$admin);
	}
	
	public function view($id = null,$admin=false) {
		if (!$this->Agency->exists($id)) {
			throw new NotFoundException(__('Invalid Aagency'));
		}
		$conditions = array('Agency.' . $this->Agency->primaryKey => $id);

		$fields = array("Agency.*");
		$agency = $this->Agency->find('first',array("fields"=>$fields,"conditions"=>$conditions));
		//pr($agency);exit;
		$this->set('agency', $agency);
	}
	
	public function admin_view($id = null,$admin=true) {
		$this->view($id,$admin);
	}
}