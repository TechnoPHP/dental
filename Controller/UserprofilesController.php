<?php
App::uses('AppController', 'Controller');
/**
 * Userprofiles Controller
 *
 * @property Userprofile $Userprofile
 * @property PaginatorComponent $Paginator
 */
class UserprofilesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','Flash');
	public function beforeFilter() { 
		parent::beforeFilter();
		$this->Auth->allow('uploadimage');
	}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Userprofile->recursive = 0;
		$this->set('userprofiles', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Userprofile->exists($id)) {
			throw new NotFoundException(__('Invalid userprofile'));
		}
		$options = array('conditions' => array('Userprofile.' . $this->Userprofile->primaryKey => $id));
		$this->set('userprofile', $this->Userprofile->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Userprofile->create();
			if ($this->Userprofile->save($this->request->data)) {
				$this->Flash->success(__('The userprofile has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The userprofile could not be saved. Please, try again.'));
			}
		}
		$users = $this->Userprofile->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Userprofile->exists($id)) {
			throw new NotFoundException(__('Invalid userprofile'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Userprofile->save($this->request->data)) {
				$this->Flash->success(__('The userprofile has been saved.'));
				return $this->redirect(array('plugin'=>false,'controller'=>'users','action'=>'dashboard',$this->request->data['Userprofile']['user_id']));
			} else {
				$this->Flash->error(__('The userprofile could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Userprofile.' . $this->Userprofile->primaryKey => $id));
			$this->request->data = $this->Userprofile->find('first', $options);
		}
		$users = $this->Userprofile->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Userprofile->id = $id;
		if (!$this->Userprofile->exists()) {
			throw new NotFoundException(__('Invalid userprofile'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Userprofile->delete()) {
			$this->Flash->success(__('The userprofile has been deleted.'));
		} else {
			$this->Flash->error(__('The userprofile could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function uploadimage() {
		$this->layout='ajax';
		if ($this->request->is(array('post','put'))) {
		//pr($this->request->data);exit;
			if ($this->Userprofile->save($this->request->data,true)) {				
				//$this->redirect(array('action' => 'uploadimage'));
			}
		}
		$fields = array("Userprofile.id","Userprofile.userimage");
		$conditions = array("Userprofile.user_id"=>$this->Session->read("Auth.User.id"));
		$user = $this->Userprofile->find('first',array('conditions'=>$conditions,'fields'=>$fields));
		//pr($user);exit;
		if(!empty($user)){
			$this->set('userimage',$user['Userprofile']['userimage']);
		}
	}
}