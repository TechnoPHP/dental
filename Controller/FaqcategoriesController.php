<?php
App::uses('AppController', 'Controller');
/**
 * Faqcategories Controller
 *
 * @property Faqcategory $Faqcategory
 * @property PaginatorComponent $Paginator
 */
class FaqcategoriesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','Flash');
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow();
		$this->Auth->authorize = array(
			AuthComponent::ALL => array('actionPath' => 'controllers/', 'userModel' => 'Admin'),
			'Actions',
			'Controller'
		);
		$this->set('masterclass','');
		$this->set('announceclass','');
		$this->set('aclclass','');
		$this->set('usersclass','active');
	}
/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Faqcategory->recursive = 0;
		$this->set('faqcategories', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Faqcategory->exists($id)) {
			throw new NotFoundException(__('Invalid faqcategory'));
		}
		$options = array('conditions' => array('Faqcategory.' . $this->Faqcategory->primaryKey => $id));
		$this->set('faqcategory', $this->Faqcategory->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_create() {
		if ($this->request->is('post')) {
			$this->Faqcategory->create();
			if ($this->Faqcategory->save($this->request->data)) {
				$this->Flash->success(__('The faqcategory has been saved'),
				array(
						'params' => array(
							'name' => $this->request->data['Faqcategory']['name']
						)
					)	
				);
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The faqcategory could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Faqcategory->exists($id)) {
			throw new NotFoundException(__('Invalid faqcategory'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Faqcategory->save($this->request->data)) {
				$this->Flash->success(__('The faqcategory has been saved'),
					array(
						
						'params' => array(
							'name' => $this->request->data['Faqcategory']['name']
						)
					)
				);
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The faqcategory could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Faqcategory.' . $this->Faqcategory->primaryKey => $id));
			$this->request->data = $this->Faqcategory->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Faqcategory->id = $id;
		if (!$this->Faqcategory->exists()) {
			throw new NotFoundException(__('Invalid faqcategory'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Faqcategory->delete()) {
			$this->Flash->success(__('The faqcategory has been deleted.'));
		} else {
			$this->Flash->error(__('The faqcategory could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
