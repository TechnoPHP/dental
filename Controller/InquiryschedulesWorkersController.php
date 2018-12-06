<?php
App::uses('AppController', 'Controller');
/**
 * InquiryschedulesWorkers Controller
 *
 * @property InquiryschedulesWorker $InquiryschedulesWorker
 * @property PaginatorComponent $Paginator
 */
class InquiryschedulesWorkersController extends AppController {

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
		$this->InquiryschedulesWorker->recursive = 0;
		$this->set('inquiryschedulesWorkers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->InquiryschedulesWorker->exists($id)) {
			throw new NotFoundException(__('Invalid inquiryschedules worker'));
		}
		$options = array('conditions' => array('InquiryschedulesWorker.' . $this->InquiryschedulesWorker->primaryKey => $id));
		$this->set('inquiryschedulesWorker', $this->InquiryschedulesWorker->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->InquiryschedulesWorker->create();
			if ($this->InquiryschedulesWorker->save($this->request->data)) {
				$this->Flash->success(__('The inquiryschedules worker has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The inquiryschedules worker could not be saved. Please, try again.'));
			}
		}
		$inquiryschedules = $this->InquiryschedulesWorker->Inquiryschedule->find('list');
		$workers = $this->InquiryschedulesWorker->Worker->find('list');
		$this->set(compact('inquiryschedules', 'workers'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->InquiryschedulesWorker->exists($id)) {
			throw new NotFoundException(__('Invalid inquiryschedules worker'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->InquiryschedulesWorker->save($this->request->data)) {
				$this->Flash->success(__('The inquiryschedules worker has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The inquiryschedules worker could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('InquiryschedulesWorker.' . $this->InquiryschedulesWorker->primaryKey => $id));
			$this->request->data = $this->InquiryschedulesWorker->find('first', $options);
		}
		$inquiryschedules = $this->InquiryschedulesWorker->Inquiryschedule->find('list');
		$workers = $this->InquiryschedulesWorker->Worker->find('list');
		$this->set(compact('inquiryschedules', 'workers'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->InquiryschedulesWorker->id = $id;
		if (!$this->InquiryschedulesWorker->exists()) {
			throw new NotFoundException(__('Invalid inquiryschedules worker'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->InquiryschedulesWorker->delete()) {
			$this->Flash->success(__('The inquiryschedules worker has been deleted.'));
		} else {
			$this->Flash->error(__('The inquiryschedules worker could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
