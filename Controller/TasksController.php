<?php
App::uses('AppController', 'Controller');
/**
 * Tasks Controller
 *
 * @property Task $Task
 * @property PaginatorComponent $Paginator
 */
class TasksController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','Flash');
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow();
		$this->set('masterclass','');
		$this->set('dashboardclass','');
		$this->set('groupsclass','');
		$this->set('aclclass','');
		$this->set('usersclass','');
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Task->recursive = 0;
		$this->set('tasks', $this->Paginator->paginate());
	}
	public function admin_index() {
		$this->index();
	}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Task->exists($id)) {
			throw new NotFoundException(__('Invalid task'));
		}
		$options = array('conditions' => array('Task.' . $this->Task->primaryKey => $id));
		$this->set('task', $this->Task->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function create() {
		if ($this->request->is(array('put','post'))) {
			$this->Task->create();
			if ($this->Task->save($this->request->data)) {
				$this->Flash->success(__('The task has been saved.'));
				return $this->redirect(array('controller'=>'tasks','action' => 'index'));
			} else {
				$this->Flash->error(__('The task could not be saved. Please, try again.'));
			}
		}
		$categories = $this->Task->Category->find('list');
		$this->set(compact('categories'));
	}

	public function admin_create() {
		$this->create();
	}
/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Task->exists($id)) {
			throw new NotFoundException(__('Invalid task'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Task->save($this->request->data)) {
				$this->Flash->success(__('The task has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The task could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Task.' . $this->Task->primaryKey => $id));
			$this->request->data = $this->Task->find('first', $options);
		}
		$categories = $this->Task->Category->find('list');
		$this->set(compact('categories'));
	}
	
	public function admin_edit($id = null) {
		$this->edit($id);
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Task->id = $id;
		if (!$this->Task->exists()) {
			throw new NotFoundException(__('Invalid task'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Task->delete()) {
			$this->Flash->success(__('The task has been deleted.'));
		} else {
			$this->Flash->error(__('The task could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
