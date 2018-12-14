<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array(
		'Paginator',
		'Captcha'=>array('field'=>'security_code','mlabel'=>'Answer simple math:&nbsp;'),
		
	);
	public $helper = array('Js','Paginator','Captcha');
	public $paginate = array('limit' => 15,	'order' => array('User.created' => 'desc'));
	public $custom_notification_team = array('chirubhatt@yahoo.com');

	public function beforeFilter() {
		
		parent::beforeFilter();
		//$this->Auth->allow();
		$this->Auth->authenticate = array(
			'Form' => array(
				'fields' => array('username'=>'email_address','password'=>'password'),
				'userModel' => 'User'
			)
		);
		if($this->Session->check("Auth.Admin")){
			$this->Auth->authorize = array(
				AuthComponent::ALL => array('actionPath' => 'controllers/', 'userModel' => 'Admin'),
				'Actions',
				'Controller'
			);
		}
		$this->Auth->allow('dashboard','register','confirm','login','logout','captcha','forgotpassword','resetpassword','thankyou');
		$this->Auth->loginAction = array('plugin'=>null,'controller' => 'users','action' => 'login','admin'=>false);
        $this->Auth->loginRedirect = array('plugin'=>null,'controller' => 'users','action' => 'dashboard','admin'=>false );  
		$this->Auth->logoutRedirect = array('plugin'=>null,'controller' => 'pages','action' => 'display','admin'=>false );
		
		$this->set('masterclass','');
		$this->set('dashboardclass','');
		$this->set('aclclass','');
		$this->set('usersclass','active');
		
	}
	public function isAuthorized($user = null) {
        return parent::isAuthorized($user);
    }
	
	function captcha()	{
        $this->autoRender = false;
        $this->layout='ajax';
        if(!isset($this->Captcha))	{ //if you didn't load in the header
            $this->Captcha = $this->Components->load('Captcha'); //load it
        }
        $this->Captcha->create();
    }
/***********************Private Functions*************************************/	
	private function _findOrCreateUser($user_profile = array(), $provider=null) {
		if (!empty($user_profile)) {//echo $provider; pr($user_profile);
			//unbind here users related model, not required for users authentication
			if ($provider=='twitter'){
			$user = $this->User->find("first", 
			array("conditions" => array( "OR"=>array("User.firstname" => $user_profile->identifier, "User.email_address"=>$user_profile->displayName.'@twitter.com'))));
			}else{
			$user = $this->User->find("first", 
			array("conditions" => array( "OR"=>array("User.firstname" => $user_profile['identifier'], "User.email_address"=>$user_profile['email']))));
			}
			//pr($user); exit;
			if (!$user) {
				$newpassword = $this->_generateRandomString(8);
				$this->User->create();
				if ($provider!='twitter'){
					$this->User->set(
						array( 
						"group_id" => 2, 
						"firstname" => $user_profile['firstName'],
						"lastname" => $user_profile['lastName'],
						"email_address" => $user_profile['email'],
						"username" => $user_profile['identifier'],
						"country" => $user_profile['country'], 
						"city" => $user_profile['city'], 
						"address" => $user_profile['address'], 
						//added another fields as we need in user table
						"password" => AuthComponent::password($newpassword),
						"confirm_password" => AuthComponent::password($newpassword),
						//we generate new password to database for this user and send by mail in welcome email.
						"phone" => '0000000000',
						"confirm" => CakeText::uuid(),
						"active" => 1,
						"src" => $provider,					
						)
					); 
				}else{
					//if provider is twitter
					$this->User->set(
						array( 
						"group_id" => 2, 
						"firstname" => $user_profile['displayName'],
						"lastname" => $user_profile['lastName'],
						"email_address" => $user_profile['displayName'].'@twitter.com',
						"username" => $user_profile['displayName'],
						"country" => $user_profile['country'], 
						"city" => $user_profile['city'], 
						"address" => $user_profile['address'],
						//added another fields as we need in user table
						"password" => AuthComponent::password($newpassword),
						"confirm_password" => AuthComponent::password($newpassword),
						//we generate new password to database for this user and send by mail in welcome email.
						"phone" => '0000000000',
						"confirm" => CakeText::uuid(),
						"active" => 1,
						"src" => $provider,					
						)
					); 
				}
				if ($this->User->save()) {
				/*create profile entry for new user */
						App::import('Model','Userprofile');
						$profile = new Userprofile();
						$profile->saveField('user_id',$this->User->getLastInsertId());
				
					$this->User->recursive = -1;
					$user = $this->User->read(null, $this->User->getLastInsertId()); 
					return $user["User"]; 
				}else{
					//pr($this->User->validationErrors);exit;
				}
			} else { 
				return $user["User"];
			} 
		}
	}
	private function _aeskey($key){
		$new_key = str_repeat(chr(0), 16);
		for($i=0,$len=strlen($key);$i<$len;$i++){
			$new_key[$i%16] = $new_key[$i%16] ^ $key[$i];
		}
		return $new_key;
	}
	private function _aes_encrypt($val){
		$key = $this->_aeskey('15061974');
		$pad_value = 16-(strlen($val) % 16);
		$val = str_pad($val, (16*(floor(strlen($val) / 16)+1)), chr($pad_value));
		return mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $val, MCRYPT_MODE_ECB, mcrypt_create_iv( mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_ECB), MCRYPT_RAND));
	}
	private function _aes_decrypt($val){	
		$key = $this->_aeskey('15061974');
		$val = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, $val, MCRYPT_MODE_ECB, mcrypt_create_iv( mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_ECB), MCRYPT_RAND));
		return rtrim($val, "\0..\16");		
	}	
	private function _base64url_encode($data) {
		return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
	}
	private function _base64url_decode($data) {
		return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
	}
	
	private function _usergroups($id=null){
		App::import('Model','Group');
  		$group = new Group();
		$group->unbindModel(array('hasMany'=>array('User')));
		if($id){
			$conditions = array('Group.active'=>1,'Group.id'=>$id);
		}else{
			$conditions = array('Group.active'=>1,'Group.id<>1');
		}
		$fields = array('Group.id','Group.name');
		$usergroups = $group->find("list",array("conditions"=>$conditions));
		return $usergroups;
	}
	private function _generateRandomString($length = 8) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
	private function _confurl() { //this function is used in sendtofriend method
		$pageURL = 'http';
		if (isset($_SERVER["HTTPS"]) == "on") {$pageURL .= "s";}
		$pageURL .= "://";
		if ($_SERVER["SERVER_PORT"] != "80") {
			$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		} else {
			$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		}
		return $pageURL;
	}
	private function _send_custom_notification($objemail,$group){
		$notification_team = $this->custom_notification_team;
		foreach($group as $key=>$value) {$groupname = $value;}
		;
		$objemail->subject('Registration request received');
		$objemail->emailFormat('html');
		$objemail->template('notifyregistration','notification')->viewVars(
				array(
				'contenttitle'=>'Registration request received',
				'firstname'=>$this->request->data['User']['firstname'],
				'email'=>$this->request->data['User']['email_address'],
				'groupname'=> $groupname,
				'sender'=>'Dental site webmaster'
				)
		);
		foreach($notification_team as $notification){
			$objemail->to ($notification);
			$objemail->from (array('no-reply@dental.site'=>'no-reply dental site'));
			$objemail->send();
		}
	}
	
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
	private function _profile($userid=null){
		$conditions = array("User.id"=>$userid);
		$fields = array("User.id","User.firstname","User.lastname","User.confirm","User.phone","User.email_address","User.city","Userprofile.user_id","Userprofile.id","Userprofile.messanger","Userprofile.msgtype","Userprofile.aboutme","Userprofile.userimage","Userprofile.quotes","Userprofile.birthdate");
		return $currentuser = $this->User->find('first',
			array(
				'conditions'=>$conditions,
				'fields'=>$fields,
				'contain' => array(
					/*'Buynsale'=>array(
						'fields'=>array('id','title','description','region','city','sell','videolink','videosrc','countryiso2','modified','created'),
						'Bscoverimage'=>array('fields'=>array('id','imagesmall')),
						'Rating'=>array(),
						'order'=>'Buynsale.created DESC',
						'limit'=>5
					),
					'Eventsnshow'=>array(
						'fields'=>array('id','title','description','city','region','videolink','videosrc','countryiso2','modified','created','event'),
						'Escoverimage'=>array('fields'=>array('id','imagesmall')),
						'order'=>'Eventsnshow.created DESC',
						'limit'=>5
					),
					'Jobsvacancy'=>array(
						'fields'=>array('title','description','id','region','city','videolink','videosrc','countryiso2','modified','created','talent'),
						'Jvcoverimage'=>array('fields'=>array('id','imagesmall')),'order'=>'Jobsvacancy.created DESC',
						'limit'=>5
					),
					'Hcservice'=>array(
						'fields'=>array('title','description','id','provider','region','city','videolink','videosrc','countryiso2','modified','created','provider'),
						'Hccoverimage'=>array('fields'=>array('id','imagesmall')),'order'=>'Hcservice.created DESC',
						'limit'=>5
					),
					'Scintech'=>array(
						'fields'=>array('id','title','description','modified','videolink','videosrc','created'),
						'Stcoverimage'=>array('fields'=>array('id','imagesmall')),
					'order'=>'Scintech.created DESC'
					),
					'Foodnrecipe'=>array(
						'fields'=>array('id','title','description','modified','videolink','videosrc','created'),
						'Frcoverimage'=>array('fields'=>array('id','imagesmall')),
						'order'=>'Foodnrecipe.created DESC'
					),*/
					'Userprofile')
				)
			);
	}
/*********************Private functions ends here **************************************/
/**
 * index method
 *
 * @return void
 */
	public function index() {	
		$this->User->recursive = 0;
		$conditions = array();
		if(!empty($this->request->data)){
			if(array_key_exists('group_id',$this->request->data['User']) && !empty($this->request->data['User']['group_id'])){
				$conditions["User.group_id ="]= $this->request->data['User']['group_id'];
			}			
		}
		$this->Paginator->settings = array(
			'conditions' => $conditions,
			'order' => array('User.group_id' => 'asc','User.created'=>'asc'),
			'group'=>array(),
			'limit' => 20
		);
		$this->set('users', $this->Paginator->paginate('User'));
		App::import('Model','Group');
		$Group = new Group();
		$groups = $Group->find("list",array('fields'=>array('Group.name','Group.id')));
		$groups = Set::combine($groups, '{n}.Group.id','{n}.Group.name');
		$this->set('groups', $groups);
	}
	
	public function profile($id = null){
		if($this->Session->check("Auth.User")){
			if($id == $this->Session->read("Auth.User.id")){
				$id = $this->Session->read("Auth.User.id");
			}else{
				
			}
		}		
		if(!$id){
			$this->Session->setFlash('Member identity is not confirmed');
			$this->redirect(array('controller'=>'/'));exit;
		}
		$conditions = array("User.id"=>$id);
		$fields = array("Userprofile.id");
		$userdata = $this->User->find('first',array('conditions'=>$conditions,'fields'=>$fields));
		//pr($userdata);exit;
		$this->redirect(array('controller'=>'userprofiles','action'=>'view',$userdata['Userprofile']['id']));exit;
	}
	
	public function login() {
		if ($this->request->is(array('post','put'))) {
			if ($this->Auth->login()) {
				$this->User->id = $this->Session->read("Auth.User.id");
				$this->User->saveField('lastlogin', date('Y-m-d H:i:s') );
				return $this->redirect($this->Auth->loginRedirect);
			}
			$this->Session->setFlash(__('Your username or password is incorrect.'));
		}
		if ($this->Session->read('Auth.User')) {
			$this->Session->setFlash('You are logged in!');
			return $this->redirect('/dashboard');
		}
		$login = 'active';
		$this->set('login',$login);
	}
	
	function dashboard($userid=null){
		if(!$userid){
			if(!$this->Session->check('Auth.User.id')){
				throw new NotFoundException(__('Your identity does not match with the system'));
			}else{
				$userid = $this->Session->read('Auth.User.id');
			}			
		}else{
			if(!$this->User->exists($userid)){
				throw new NotFoundException(__('No such profile exists with the system'));
			}
		}
		$this->User->Behaviors->load('Containable');			
		$currentuser = $this->_profile($userid);
		//pr($currentuser);exit;
		$this->set('currentuser', $currentuser);
	}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}
	
/**
 * add method
 *
 * @return void
 */
	public function register($type=null) {
		$register = '';
		if ($this->request->is(array('post','put'))) {
			$this->request->data['User']['confirm'] = CakeText::uuid();
			$this->request->data['User']['opsys'] = 'desktop';
			$this->request->data['User']['ipaddr'] = $this->_getRealIpAddr();
			$this->request->data['User']['realipaddr'] = $this->_getRealIpAddr();
			$this->request->data['User']['src'] = 'site';
			$this->request->data['User']['group_id'] = '2';
			$this->User->setCaptcha('security_code', $this->Captcha->getCode('User.security_code'));
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
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$link = str_replace('register','confirm',$this->_confurl());
				$encryptconfirm = $this->_base64url_encode($this->_aes_encrypt($this->request->data['User']['confirm']));
				//here the code for sending email is written
				$Email = new CakeEmail('gmail');
				$Email->from(array('no-reply@dental.site'=>'no-reply dental.site'));
				$Email->to($this->request->data['User']['email_address']);
				$Email->subject('Welcome to dental.site');
				$Email->emailFormat('html');
				$Email->template('sendconfirmkey','default')->viewVars(
						array(
							'firstname' => $this->request->data['User']['firstname'],
							'confirmationkey' => $link.'/'.$encryptconfirm,
							'sender' => 'Dental Site Team',
							)
						);
				if($Email->send()){
					$group = $this->_usergroups($this->request->data['User']['group_id']);
					$this->_send_custom_notification($Email,$group);//send registration message to custom ids
					$this->Session->setFlash(__('Your registration reuest is received. Please confirm your registration from the link sent to your Email address'));		
					return $this->redirect(array('controller'=>'users','action' => 'thankyou/registration'));
				}else{
					$this->Session->setFlash(__('Your account information is saved. Due to some reson we are not able to send you the varification link in your email. Please contact the support team.'));
					return $this->redirect(array('controller'=>'users','action'=>'login','admin'=>false));
				}
			} 
		}
	}
	
	public function confirm($encryptconfirm = null) {
		if (!$this->request->is(array('post','put'))) {
			if($encryptconfirm){
				$code = $this->_aes_decrypt($this->_base64url_decode($encryptconfirm));
				$fields = array("User.id","User.confirm","User.active");
				$user = $this->User->findByConfirm($code,$fields);
				//pr($user);exit;
				if(($user)){
					if($user['User']['active'] =='0'){
						$this->User->id = $user['User']['id'];
						$this->User->saveField('active','1');
						App::import('Model','Userprofile');
						$profile = new Userprofile();
						$profile->saveField('user_id',$user['User']['id']); //create a profile id after user confirms
						$this->Session->setFlash('Your account is now activated. You can login with your credentials.');
						return $this->redirect(array('controller'=>'users','action' => 'thankyou/confirmation'));
					}
					if($user['User']['active'] =='1'){
						$this->Session->setFlash('Your account is already activated. You can login with your credentials.');
						return $this->redirect(array('controller'=>'users','action' => 'thankyou/confirmation'));
					}
					if($user['User']['active'] =='2'){
						$this->Session->setFlash('Your account is bend for some resons. Please contact site administrator.');
						return $this->redirect(array('controller'=>'users','action' => 'thankyou/confirmation'));
					}
				}else{
					$this->Session->setFlash('This is not a valid user account');
					return $this->redirect('/');exit;
				}
			}
		}
	}
	public function resetpassword($confcode=null) {		
		if ($this->request->is(array('post','put'))){
			//pr($this->request->data);exit;
			if (!$confirm = $this->request->data['User']['confirm']) {
				throw new NotFoundException(__('Your identity doesn`t clear with the system'));
			}
			$fields = array("User.id","User.confirm","User.active");
			$this->User->unbindModel(array('hasMany'=>array('Buynsale','Eventsnshow','Hcservice','Jobsvacancy','Foodnrecipe','Scintech')));
			$this->User->recursive = -1;			
			$user = $this->User->findByConfirm($this->request->data['User']['confirm'],$fields);
			//pr($user);exit;
			if($user){
				$this->User->id=$user['User']['id'];
				if($this->User->save($this->request->data,true,array('password'))){
					$this->Session->setFlash('Your new password is set with the system.');
					$this->redirect(array('controller'=>'users','action'=>'thankyou/changepassword','admin'=>false));
					exit;
				}
				//$this->User->invalidFields();
				$this->set('confirm',$this->request->data['User']['confirm']);
			}
		}else{
			if (!$confcode) {
				throw new NotFoundException(__('No account with the system'));
			}
			$confcode = $this->_aes_decrypt($this->_base64url_decode($confcode));
			$this->set('confirm',$confcode);
		}
	}
	public function forgotpassword($code=null) {
		if ($this->request->is(array('post','put'))){
			if (!$email_address = $this->request->data['User']['email_address']) {
				throw new NotFoundException(__('Enter your registered email address with the site'));
			}
			$this->User->unbindModel(array('hasMany'=>array('Buynsale','Eventsnshow','Hcservice','Jobsvacancy','Foodnrecipe','Scintech')));
			$this->User->recursive = -1;
			$fields = array("User.id","User.firstname","User.password","User.confirm");//fields are been fatched while finding dataset
			
			if (!$user= $this->User->findByEmailAddress($email_address,$fields)) {
				/*$this->render('/Errors/excaption');
				throw new NotFoundException(__('Password reset request is invalid'));*/
				$this->Session->setFlash('The Email Id doesn`t have an associated user account');
			}else{
				$userconfirm = $this->_base64url_encode($this->_aes_encrypt($user['User']['confirm']));
				$link = str_replace('forgotpassword','resetpassword',$this->_confurl());
				$Email = new CakeEmail('gmail');
				$Email->to($email_address);
				$Email->subject('Your password reset request');
				$Email->from (array('no-reply@dental.site'=>'no-reply dental.site'));
				$Email->emailFormat('html');
				$Email->template('forgotpassword','default')->viewVars(
					array(
						'firstname' => $user['User']['firstname'],
						'newpassword' => $link.'/'.$userconfirm,
						'sender' => 'Dental site Team',
						)
					);
					
				if($Email->send()){
					$this->Session->setFlash('Your change password link is sent to your registered emaill address.');
					$this->redirect(array('controller'=>'users','action'=>'thankyou/forgotpassword','admin'=>false));
					exit;
				}else{
					$this->Session->setFlash('We are not able to forward your reset password request this time.');
					$this->redirect(array('controller'=>'users','action'=>'registration','admin'=>false));
					exit;
				}
			}		
		}else{
			
		}
	}
	
	public function changepassword() {		
		if ($this->request->is(array('post','put'))) {
			if (!$current_password = $this->request->data['User']['current_password']) {
				throw new NotFoundException(__('Enter your current password with the site'));
			}else{
				if(!empty($this->request->data['User']['confirm'])){
					$currentuserid = $this->_aes_decrypt($this->_base64url_decode($this->request->data['User']['confirm']));
					if((string)($this->Session->read('Auth.User.confirm')) != (string)$currentuserid){
						throw new NotFoundException(__('Your identity does not match with the system'));
					}
				}
			}			
			$current_password = AuthComponent::password($this->request->data['User']['current_password']);
			$this->User->unbindModel(array('hasMany'=>array('Buynsale','Eventsnshow','Hcservice','Jobsvacancy','Foodnrecipe','Scintech')));
			$this->User->recursive = -1;
			$fields = array("User.password");			
			if (!$user= $this->User->findByConfirm($currentuserid,$fields)) {
				throw new NotFoundException(__('Password reset request is invalid'));
			}else{
				if($current_password == $user['User']['password']){
					$this->User->id = $this->Session->read("Auth.User.id");
					if($this->User->save($this->request->data,true,array('password'))){
						$this->Session->setFlash('Your new password is set with the system.');
						$this->redirect(array('controller'=>'users','action'=>'thankyou/changepassword','admin'=>false));
						exit;
					}$this->set('confirm',$this->_base64url_encode($this->_aes_encrypt($currentuserid)));
				}else{
					throw new NotFoundException(__('Recheck with your new password input.'));
				}
			}
		}else{
			if(!$this->Session->check("Auth.User.id")){
				$this->Session->setFlash('Session seems expired!! Please login and reset your password');
				$this->redirect(array('controller'=>'users','action'=>'login','admin'=>false));
				exit;
			}
			$this->set('confirm',$this->_base64url_encode($this->_aes_encrypt($this->Session->read("Auth.User.confirm"))));
		}
	}
	public function thankyou($req=null) {
		switch($req){
			case 'registration':
				$h3 = "Thank you for sending registration reqest";
				$message3 = "We have send you a confirmation link in email provided by you. If you do not get within some time, please contact our support team at support@announceit.today. Our team would like to help you for site usage queries.";
				$this->set('h3',$h3);
				$this->set('message3',$message3);
				$this->set('class','glyphicon glyphicon-thumbs-up');
			break;
			case 'confirmation':
				$h3 = "Welcome to announce it today";
				$message3 = "Your email address is verified in the system. Please use this email address and your provided password to login in the system. If you need any assistance, send a mail to support@announceit.today";
				$this->set('h3',$h3);
				$this->set('message3',$message3);
				$this->set('class','glyphicon glyphicon-thumbs-up');
			break;
			case 'changepassword':
				$h3 = "Change password request is proccessed";
				$message3 = "Your password is reset with the system. Now you can use the new password from your next login. If you need any assistance, send a mail to support@announceit.today";
				$this->set('h3',$h3);
				$this->set('message3',$message3);
				$this->set('class','glyphicon glyphicon-thumbs-up');
			break;
			case 'forgotpassword':
				$h3 = "Forgot password request is proccessed";
				$message3 = "Your reset password link is sent to your registered email address. You can click on the link or copy and past directly in your brower. Set a new password when you get update password form. If you need any assistance, send a mail to support@announceit.today";
				$this->set('h3',$h3);
				$this->set('message3',$message3);
				$this->set('class','glyphicon glyphicon-thumbs-up');
			break;
			default:
				$h3 = "Your operation request is not verified";
				$message3 = "Your operation request is not verified. If you need any assistance, send a mail to support@announceit.today";
				$this->set('h3',$h3);
				$this->set('message3',$message3);
				$this->set('class','glyphicon glyphicon-thumbs-down');
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
			//pr($this->request->data);exit;
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}
	
	public function admin_index(){
	
		$this->index();
	}
	
	public function admin_edit($id = null){
		$this->edit($id);
	}
	
	function admin_create(){
	
		if(!empty($this->request->data)){//pr($this->request->data);exit;
		
			$this->request->data['User']['confirm'] = CakeText::uuid();
			//pr($this->request->data);exit;
			if($this->User->save($this->request->data)){
				$encryptconfirm = $this->_base64url_encode($this->_aes_encrypt($this->request->data['User']['confirm']));
				$userID = $this->User->getLastInsertID();
				$link = str_replace('admin/','',$this->_confurl());
				$link = str_replace('create','confirm',$link);
				$domain = Router::url('/', true);				
				$adminmail = 'contact@announceit.today';
				//here the code for sending email is written
				$Email = new CakeEmail('gmail');
				$Email->from(array($adminmail=> 'Announce it today Team'));
				$Email->to($this->request->data['User']['email_address']);
				$Email->subject('Welcome to Announce it today');
				$Email->emailFormat('html');
				$Email->template('default','notification')->viewVars(
								array(
									'username' => $this->request->data['User']['firstname'],
									'sender' => 'Announce it today Team',
									'confirmationkey' => $link.'/'.$encryptconfirm
									)
								);			
				
				if($Email->send()){
					$this->Session->setFlash('Your membership is registered and activation mail sent to your email address');
					$this->redirect(array('controller'=>'users','action'=>'index','admin'=>true));
					exit;
				}else{
					$this->Session->setFlash('We have registered your membership request but not able to forward you confirmation link this time.');
					$this->redirect(array('controller'=>'users','action'=>'index','admin'=>true));
					exit;
				}
			}else{
				$this->Session->setFlash('Sorry! We are not able to forward your registration request this time.');
				$this->redirect(array('controller'=>'users','action'=>'index','admin'=>true));
				exit;
			}
		}
		$groups = $this->User->Group->find("list");
		Set::combine($groups, '{n}.Group.name','{n}.Group.id');
		
		$this->set(compact('groups'));
		$this->set('masterclass','');
	}

	public function admin_view($id = null){
		$this->view($id);
		$this->set('masterclass','');
	}
/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function admin_login() {
		if ($this->request->is(array('post', 'put'))) {
			
			if ($this->Auth->login()) {
				if($this->Session->read("Auth.User.Group.id") ==='1'){
					$this->User->id = $this->Session->read("Auth.User.id");
					$this->User->saveField('lastlogin', date('Y-m-d H:i:s') );
					return $this->redirect(array('controller'=>'users','action'=>'dashboard','admin'=>true));
					exit;
				}else{
					$this->Session->delete("Auth.User");
				}
			}
			$this->Session->setFlash(__('You are not authorized administrator'));
		}
	}
	
	public function admin_changepassword() {
		if ($this->request->is(array('post', 'put'))) {
			if (!$current_password = $this->request->data['User']['currentpassword']) {
				throw new NotFoundException(__('Enter your current password with the site'));
			}
			//pr($this->request->data);exit;
			if(!$this->Session->check("Auth.User.id")){
				$this->Session->setFlash('Session seems expired!! Please login and reset your password');
				$this->redirect(array('controller'=>'users','action'=>'login','admin'=>true));
				exit;
			}else{
				$this->User->id = $this->Session->read("Auth.User.id");
				if (!$this->User->exists()) {
					throw new NotFoundException(__('Password reset request is invalid'));
				}
				$this->User->unbindModel(array("hasOne"=>array("Profile"),"hasMany"=>array("Buynsale","Bscomment")));
				$user = $this->User->find('first',array("conditions"=>array("User.id"=>$this->User->id)));
				$current_password = AuthComponent::password($this->request->data['User']['currentpassword']);
			//pr($user);exit;
								
				if($current_password == $user['User']['password']){			
					if($this->User->save($this->request->data,true,array('password'))){
						$this->Session->setFlash('Your new password is set with the system.');
						$this->redirect(array('controller'=>'users','action'=>'changepassword','admin'=>true));
						exit;
					}else{
					//pr($this->request->data);exit;
					}
				}else{
					throw new AdminNotFoundException(array('error'=>'Your old password field is not matching with system`s password '));
				}
			}
		} //end of if post,put
	}
	public function admin_logout() {
		$this->redirect($this->Auth->logout());
	}
	/*function fblogin(){
    		Configure::load('facebook');
    		$appId=Configure::read('Facebook.appId');
    		$app_secret=Configure::read('Facebook.secret');
    		$facebook = new Facebook(array(
    				'appId'		=>  $appId,
    				'secret'	=> $app_secret,
    				));
    		$loginUrl = $facebook->getLoginUrl(array(
    			'scope'			=> 'email,publish_actions, user_birthday, user_location, user_work_history, user_hometown, user_photos',
    			'redirect_uri'	=> Router::url('/', true).'users/facebook_connect',
    			'display'=>''
    			));
    		$this->redirect($loginUrl);
	}
	function facebook_connect(){
    	    Configure::load('facebook');
    	    $appId=Configure::read('Facebook.appId');
    	    $app_secret=Configure::read('Facebook.secret');
    	   	$facebook = new Facebook(array(
    		'appId'		=>  $appId,
    		'secret'	=> $app_secret,
    		));
    	    $fbuser = $facebook->getUser();
    		if($fbuser){
    			try{
    				$fbuser_profile = $facebook->api('/me');
					$provider = 'faceb';
					$socuser = $this->_findOrCreateUser($fbuser_profile, $provider);
    				$params=array('next' => Router::url('/', true).'users/facebook_logout');
    				$logout =$facebook->getLogoutUrl($params);
					$this->Session->write('fbUser',$fbuser_profile);
    				$this->Session->write('fblogout',$logout);
					$this->request->data['User'] = $socuser; 
					$this->Auth->login($this->request->data['User']);
					$this->User->id = $socuser['id'];
					$this->User->saveField('lastlogin', date('Y-m-d H:i:s') );
    			}
    			catch(FacebookApiException $e){
    				error_log($e);
    				$user = NULL;
    			}
    		}else{
    		    $this->Session->setFlash('Sorry.Please try again','default',array('class'=>'msg_req'));
    		    $this->redirect(array('action'=>'login'));
    	   }
       }
       function facebook_logout(){
			$this->Session->delete('Auth.User');
    		$this->Session->delete('fbUser');
    		$this->Session->delete('fblogout');
		
    		$this->redirect($this->Auth->logoutRedirect);
       }*/
	   function logout(){
    		$this->Session->delete('Auth.User');
    		//$this->Session->delete('fbUser');
    		//$this->Session->delete('fblogout');
    		$this->redirect($this->Auth->logoutRedirect);
       }
}