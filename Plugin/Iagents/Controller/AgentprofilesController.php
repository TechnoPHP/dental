<?php
App::uses('IagentsAppController', 'Iagents.Controller');

/**
 * Profiles Controller
 *
 * @property Profile $Profile
 * @property PaginatorComponent $Paginator
 */
class AgentprofilesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow();
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Aagentprofile->recursive = 0;
		$this->set('profiles', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Aagentprofile->exists($id)) {
			throw new NotFoundException(__('Invalid profile'));
		}
		$conditions = array('Aagentprofile.' . $this->Aagentprofile->primaryKey => $id);
		//$profile = $this->Aagentprofile->find('first', $options);
		$fields = array("Aagentprofile.*","User.id","User.firstname","User.email_address");
		$profile = $this->Aagentprofile->User->find('first',array("fields"=>$fields,"conditions"=>$conditions));
		//pr($profile);exit;
		$this->set('profile', $profile);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
		
			$this->Aagentprofile->create();
			if ($this->Aagentprofile->save($this->request->data)) {
				$this->Session->setFlash(__('The profile has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The profile could not be saved. Please, try again.'));
			}
		}
		$agents = $this->Aagentprofile->Aagent->find('list');
		$this->set(compact('agents'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		
		if (!$this->Agentprofile->exists($id)) {
			throw new NotFoundException(__('Invalid profile'));
		}
			//pr($this->request->data);exit;
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Agentprofile->save($this->request->data)) {
				$this->Session->setFlash(__('Agentprofile has been saved.'));
				return $this->redirect(array('plugin'=>'iagents','controller'=>'aagents','action'=>'dashboard',$this->request->data['Agentprofile']['aagent_id']));
			} else {
				$this->Session->setFlash(__('The profile could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Agentprofile.' . $this->Agentprofile->primaryKey => $id));
			$this->request->data = $this->Agentprofile->find('first', $options);
		}
		$conditions = array("Agentprofile.id" => $id);
		$fields = array("Agentprofile.id","Agentprofile.birthdate","Agentprofile.userimage","Agentprofile.messanger","Agentprofile.quotes","Aagent.id","Aagent.firstname","Aagent.lastname","Aagent.email_address","Aagent.phone");
		$profile = $this->Agentprofile->find('first',array("fields"=>$fields,'conditions'=>$conditions));
		//pr($profile);exit;
		$this->set('currentuser',$profile);
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Aagentprofile->id = $id;
		if (!$this->Aagentprofile->exists()) {
			throw new NotFoundException(__('Invalid profile'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Aagentprofile->delete()) {
			$this->Session->setFlash(__('The profile has been deleted.'));
		} else {
			$this->Session->setFlash(__('The profile could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function uploadimage() {
		$this->layout='ajax';
		if ($this->request->is(array('post','put'))) {
		//pr($this->request->data);exit;
			if ($this->Agentprofile->save($this->request->data,true)) {				
				//$this->redirect(array('action' => 'uploadimage'));
			}
		}
		$fields = array("Agentprofile.id","Agentprofile.userimage");
		$conditions = array("Agentprofile.aagent_id"=>$this->Session->read("Auth.User.id"));
		$user = $this->Agentprofile->find('first',array('conditions'=>$conditions,'fields'=>$fields));
		//pr($user);exit;
		if(!empty($user)){
			$this->set('userimage',$user['Agentprofile']['userimage']);
		}
	}
}
