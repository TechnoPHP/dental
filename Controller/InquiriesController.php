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
	public $components = array('Paginator','Flash',
	'Captcha'=>array('model'=>'Inquiry','field'=>'security_code','mlabel'=>'Answer simple math:&nbsp;'),
	);
	
	public $helper = array('Js','Paginator','Captcha');
	private function _getRealIpAddr(){
		if (!empty($_SERVER['HTTP_CLIENT_IP'])){
			$ip=$_SERVER['HTTP_CLIENT_IP'];
		}elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
			$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
		}else{
			$ip=$_SERVER['REMOTE_ADDR'];
		}
		return $ip;
	}
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

	function captcha()	{
        $this->autoRender = false;
        $this->layout='ajax';
        if(!isset($this->Captcha))	{ //if you didn't load in the header
            $this->Captcha = $this->Components->load('Captcha'); //load it
        }
        $this->Captcha->create();
    }
	
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
	public function create($category=null) {
		
		if ($this->request->is(array('post','post'))) {			
			$this->request->data['User']['group_id'] = 2;
			$this->request->data['User']['confirm'] = CakeText::uuid();
			$this->request->data['User']['opsys'] = 'desktop';
			$this->request->data['User']['ipaddr'] = $this->_getRealIpAddr();
			$this->request->data['User']['realipaddr'] = $this->_getRealIpAddr();
			$this->request->data['User']['src'] = 'site';
			$this->Inquiry->setCaptcha('security_code', $this->Captcha->getCode('Inquiry.security_code'));
			if($this->MobileDetect->detect('isMobile')){
				if($this->MobileDetect->detect('isiOS')){
					$iv = $this->MobileDetect->detect('version','iPhone');
					$this->request->data['User']['opsys'] = 'Mobile.iOS'.$iv;
				}
				if($this->MobileDetect->detect('isAndroidOS')){
					$iv = $this->MobileDetect->detect('version','Android');
					$this->request->data['User']['opsys'] = 'Mobile.Android'.$iv;
				}
			}
			if($this->MobileDetect->detect('isTablet')){
				if($this->MobileDetect->isiOS()){
					$iv = $this->MobileDetect->detect('version','iPad');
					$this->request->data['User']['opsys'] = 'iPad'.$iv;
				}
				if($this->MobileDetect->isAndroidOS()){
					$iv = $this->MobileDetect->detect('version','Android');
					$this->request->data['User']['opsys'] = 'Tab.Android'.$iv;
				}
			}
			//$this->Inquiry->create();
			pr($this->request->data);
			if ($this->Inquiry->saveAll($this->request->data)) {
				$this->Flash->successNonLoggedin(__('The inquiry has been saved.'),array('key' => 'positive','params'=>array('name' => $this->request->data['User']['firstname'])));
				return $this->redirect(array('controller'=>'users','action' => 'login'));
			} else {
				$this->Flash->error(__('The inquiry could not be saved. Please, try again.'));
			}
			
		}
		$users = $this->Inquiry->User->find('list');
		$tasks = $this->Inquiry->Task->find('list',array('conditions'=>array('Task.category_id'=>$category)));
		$this->set(compact('users', 'tasks'));
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
		if (!$this->Inquiry->exists($id)) {
			throw new NotFoundException(__('Invalid inquiry'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Inquiry->save($this->request->data)) {
				$this->Flash->success(__('The inquiry has been saved.'));
				return $this->redirect(array('action' =>'login'));
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
