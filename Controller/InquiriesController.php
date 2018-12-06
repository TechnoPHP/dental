<?php
App::uses('AppController', 'Controller');
/**
 * Inquiries Controller
 *
 * @property Inquiry $Inquiry
 * @property PaginatorComponent $Paginator
 */
class InquiriesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Inquiry->recursive = 0;
		$this->set('inquiries', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Inquiry->exists($id)) {
			throw new NotFoundException(__('Invalid inquiry'));
		}
		$options = array('conditions' => array('Inquiry.' . $this->Inquiry->primaryKey => $id));
		$this->set('inquiry', $this->Inquiry->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Inquiry->create();
			if ($this->Inquiry->save($this->request->data)) {
				$this->Flash->success(__('The inquiry has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The inquiry could not be saved. Please, try again.'));
			}
		}
		$users = $this->Inquiry->User->find('list');
		$tasks = $this->Inquiry->Task->find('list');
		$this->set(compact('users', 'tasks'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Inquiry->exists($id)) {
			throw new NotFoundException(__('Invalid inquiry'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Inquiry->save($this->request->data)) {
				$this->Flash->success(__('The inquiry has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The inquiry could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Inquiry.' . $this->Inquiry->primaryKey => $id));
			$this->request->data = $this->Inquiry->find('first', $options);
		}
		$users = $this->Inquiry->User->find('list');
		$tasks = $this->Inquiry->Task->find('list');
		$this->set(compact('users', 'tasks'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Inquiry->id = $id;
		if (!$this->Inquiry->exists()) {
			throw new NotFoundException(__('Invalid inquiry'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Inquiry->delete()) {
			$this->Flash->success(__('The inquiry has been deleted.'));
		} else {
			$this->Flash->error(__('The inquiry could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
