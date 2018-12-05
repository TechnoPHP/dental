<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		https://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $components = array(
      'Session',  'Acl',
        'Auth' => array(
            'authorize' => array('Controller',
                'Actions' => array('actionPath' => 'controllers/')
            ),
			'authError'=>'Authorization restricted. ',
			//'flash' => ['class' => 'alert alert-danger'],
        ),
		'MobileDetect.MobileDetect', 'Session','RequestHandler'
    ); //'DebugKit.Toolbar',
	
    public $helpers = array('Html', 'Form', 'Session','Time');
    public function beforeFilter() {
		if($this->Session->check("Auth.Admin")){
			//echo "its admin session";
		}
		if($this->Session->check("Auth.User")){
			//echo "its user session";
		}
		$this->Auth->flash['params']['class'] = 'alert alert-danger';
		//$this->Auth->allow();
        //Configure AuthComponent
		$this->Auth->authenticate = array(
			'Form' => array(
				'fields' => array('username'=>'email_address','password'=>'password')
			)
		);
		//pr($this->Auth->allowedActions);	
		if(isset($this->params['prefix']) && ($this->params['prefix']=='admin')){
			$this->layout = 'admin';
			AuthComponent::$sessionKey = 'Auth.Admin';
        }
		
		$this->_list_countries();
		$this->_list_categories();
	}
	
	public function isAuthorized($user = null) {
        return false;	
	}
	
	protected function _list_countries(){
	/*update countries set active=0;update countries set active=1 where iso_2 in ('in','au');*/
		App::import('Model','Country');
  		$country = new Country();
		//$country->unBindModel(array("hasMany" => array("Region")));
		$countries = $country->find("all",array('fields'=>array('Country.name','Country.id'),'conditions'=>array("Country.active"=>1)));
		$appcountries = Set::combine($countries, '{n}.Country.id','{n}.Country.name');
		//pr($appcountries);exit;
		$this->set('appcountries', $appcountries);
	}
	protected function _featured_categories(){
	/**/
		App::import('Model','Category');
  		$category = new Category();
		//$country->unBindModel(array("hasMany" => array("Region")));
		$appfcategories = $category->find("list",array('fields'=>array('Category.name','Category.id'),'conditions'=>array("Category.active"=>1,"Category.featured"=>1)));
		
		//pr($appfcategories);exit;
		$this->set('appfcategories', $appfcategories);
	}
	protected function _list_categories(){
	/*used in header menu to show services list 3-4 others in the More tab*/
		App::import('Model','Category');
  		$category = new Category();
		//$country->unBindModel(array("hasMany" => array("Region")));
		$appcategories = $category->find("list",
			array(
				//'fields'=>array('Category.name','Category.id'),
				'conditions'=>array("Category.active"=>1),
				'order'=>array('Category.featured'=>'desc','Category.name'),//featured =1 and alphabetic sort
				//'limit'=>2
			)
		);
		$appcountries = Set::combine($appcategories, '{n}.Category.id','{n}.Category.name');
		//pr($appcategories);exit;
		$this->set('appcategories', $appcategories);
	}
}