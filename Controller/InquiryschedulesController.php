<?php
App::uses('AppController', 'Controller');
/**
 * Inquiryschedules Controller
 *
 * @property Inquiryschedule $Inquiryschedule
 * @property PaginatorComponent $Paginator
 */
class InquiryschedulesController extends AppController {

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
		$this->Inquiryschedule->recursive = 0;
		$this->set('inquiryschedules', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Inquiryschedule->exists($id)) {
			throw new NotFoundException(__('Invalid inquiryschedule'));
		}
		$options = array('conditions' => array('Inquiryschedule.' . $this->Inquiryschedule->primaryKey => $id));
		$this->set('inquiryschedule', $this->Inquiryschedule->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Inquiryschedule->create();
			if ($this->Inquiryschedule->save($this->request->data)) {
				$this->Flash->success(__('The inquiryschedule has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The inquiryschedule could not be saved. Please, try again.'));
			}
		}
		$inquiries = $this->Inquiryschedule->Inquiry->find('list');
		$workers = $this->Inquiryschedule->Worker->find('list');
		$this->set(compact('inquiries', 'workers'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Inquiryschedule->exists($id)) {
			throw new NotFoundException(__('Invalid inquiryschedule'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Inquiryschedule->save($this->request->data)) {
				$this->Flash->success(__('The inquiryschedule has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The inquiryschedule could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Inquiryschedule.' . $this->Inquiryschedule->primaryKey => $id));
			$this->request->data = $this->Inquiryschedule->find('first', $options);
		}
		$inquiries = $this->Inquiryschedule->Inquiry->find('list');
		$workers = $this->Inquiryschedule->Worker->find('list');
		$this->set(compact('inquiries', 'workers'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Inquiryschedule->id = $id;
		if (!$this->Inquiryschedule->exists()) {
			throw new NotFoundException(__('Invalid inquiryschedule'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Inquiryschedule->delete()) {
			$this->Flash->success(__('The inquiryschedule has been deleted.'));
		} else {
			$this->Flash->error(__('The inquiryschedule could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
