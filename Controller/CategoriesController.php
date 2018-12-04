<?php
App::uses('AppController', 'Controller');
/**
 * Categories Controller
 *
 * @property Category $Postcategory
 * @property PaginatorComponent $Paginator
 */
class CategoriesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	public $helper = array('Paginator','Tree');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow();
		$this->set('masterclass','active');
		$this->set('masterclass','');
		$this->set('announceclass','');
		$this->set('aclclass','');
		$this->set('usersclass','');
	}
	
	public function _getlftrght($catid=null){
		if(!$catid){
			throw new NotFoundException(__('Invalid Category id'));
		}
		$this->Category->recursive = 0;
		$lftrght = array();
		$this->Category->unbindModel(array('hasMany'=>array("Post")));
		$fields = array("Category.id","Category.lft","Category.rght");
		$conditions = array("Category.id"=>$catid);
		$lftrght = $this->Category->find('first',array('fields'=>$fields,'conditions'=>$conditions));
		//pr($lftrght);exit;
		return $lftrght;
	}
	public function _getchildcategories($catid=null){
		if(!$catid){
			throw new NotFoundException(__('Invalid Category id'));
		}
		$catlftrghtt = $this->_getlftrght($catid);
		$postconditions = array(
			'Category.lft >=' => $catlftrghtt['Category']['lft'], 
			'Category.rght <=' => $catlftrghtt['Category']['rght']
		);
		$this->Category->recursive = 0;
		$fields = array("Category.id");		
		$catlist = $this->Category->find('all',array('fields'=>$fields,'conditions'=>$postconditions));
		foreach($catlist as $category){
			$catidlist[] = $category['Category']['id'];
		}
		unset($catlist);
		//pr($catidlist);exit;
		return $catidlist;
	}
	
	
	
/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Category->recursive = 0;
		$this->set('categories', $this->Paginator->paginate());
		$this->set('masterclass','active');
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Invalid Category'));
		}
		$options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
		$this->set('category', $this->Category->find('first', $options));
		$this->set('masterclass','active');
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_create() {
		if ($this->request->is('post')) {
			$this->Category->create();
			if ($this->Category->save($this->request->data)) {
				$this->Session->setFlash(__('The Category has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Category could not be saved. Please, try again.'));
			}
		}
		//$parentPostcategories = $this->Category->ParentPostcategory->find('list');
		$spacer="-";
		$parent = $this->Category->generateTreeList('', '', '', $spacer);
		$this->set(compact('parent'));
		$this->set('masterclass','active');
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Invalid Category'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Category->save($this->request->data)) {
				$this->Session->setFlash(__('The Category has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Category could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
			$this->request->data = $this->Category->find('first', $options);
		}
		//$parentPostcategories = $this->Category->ParentPostcategory->find('list');
		$spacer="-";
		$parent = $this->Category->generateTreeList('', '', '', $spacer);
		$this->set(compact('parent'));
		//$this->set(compact('parentPostcategories'));
		$this->set('masterclass','active');
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException(__('Invalid Category'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Category->delete()) {
			$this->Session->setFlash(__('The Category has been deleted.'));
		} else {
			$this->Session->setFlash(__('The Category could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}