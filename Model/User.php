<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');
/**
 * User Model
 *
 * @property Group $Group
 * @property Post $Post
 */
class User extends AppModel {
	public $actsAs = array(
		'Acl' => array('type' => 'requester', 'enabled' => false),
		'Captcha' => array(
			'field' => array('security_code'),
			'error' => 'Incorrect captcha code value'
		),				
	);
	public $location;
    public function parentNode() {
        if (!$this->id && empty($this->data)) {
            return null;
        }
        if (isset($this->data['User']['group_id'])) {
            $groupId = $this->data['User']['group_id'];
        } else {
            $groupId = $this->field('group_id');
        }
        if (!$groupId) {
            return null;
        } else {
            return array('Group' => array('id' => $groupId));
        }
    }

	public function bindNode($user) {
		return array('model' => 'Group', 'foreign_key' => $user['User']['group_id']);
	}

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'firstname' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'First name is mandatory',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			array(
				'rule' => '/^[a-z0-9]{3,}$/i',
				'message' => 'Only letters and digits'
			)
		),
		'email_address' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Email is mandatory',
				'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'email' => array(
				'rule' => array('email'),
				'message' => 'Enter valid email address'
            ),
			'isUnique' => array(
                'rule' => array('isUnique'),
                'message' => 'This email is already registered'
            )
		),
		'phone' => array(
		array(
			'rule' => array('phone'),
			'message' => 'Varify phone number'
			)
		),
		'password'=>array(
			array(
				'rule'=>array('minLength',6),
				'required'=>true,
				'allowEmpty'=>false,
				'message'=>'Please enter min 6 character Password',
				//'on' => 'create'
				),
			array(
				'rule' => array('identicalFieldValues', 'confirm_password' ),
				'message' => 'Passwords does not match',
				//'on' => 'create'
				)
		),
		'confirm_password'=>array(
			array(
				'rule'=>array('minLength',6),
				'required'=>true,
				'allowEmpty'=>false,
				'message'=>'Please retype your Password',
				//'on' => 'create'
				),
			array(
				'rule' => array('identicalFieldValues', 'password' ),
				'message' => 'Passwords does not match',
				//'on' => 'create'
				)
		),
		'group_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'User group is not confirmed',
			),
		),
		'country_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Country is not being specified',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'zipcode' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'You must provide zipcode',
				'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			array(
				'rule'=>array('checkzipcode','country_id'),
				'message' => 'Zipcode does not exists in the country',
			)
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		/*'Buynsale' => array(
			'className' => 'Buynsale',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Eventsnshow' => array(
			'className' => 'Eventsnshow',
			'foreignKey' => 'user_id',
			'dependent' => false
		),*/
		
	);
	/**
 * hasOne associations
 *
 * @var array
 */
	public $hasOne = array(
		'Userprofile' => array(
			'className' => 'Userprofile',
			'foreignKey' => 'user_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	public function beforeSave($options = Array()) {
		if (isset($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		return true;
	}
	
	function identicalFieldValues( $field=array(), $compare_field=null ){
		foreach( $field as $key => $value ){
		$v1 = $value;
		$v2 = $this->data[$this->name][ $compare_field ];

			if($v1 !== $v2) { 
				return FALSE;
			} else {
				continue;
			}
		}
        	return TRUE;
	}
	
	public function checkzipcode($zipcode,$country_id){
		if(!$zipcode){
			return false;
		}else{
			$zip = is_array($zipcode)?$zipcode['zipcode']:$zipcode;
			$zip = str_replace(' ','',$zip);
		}
		App::import('Model','Country');
  		$country = new Country();
		$countryshort = $country->getshortname($this->data[$this->name][$country_id]);
		if(strlen($countryshort['Country']['iso_2'])==2){
			$zip = $countryshort['Country']['iso_2'].','.$zip;
		}
		$output = json_decode( file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.$zip));

		foreach($output->results[0]->address_components as $key=>$value){
			if(($value->short_name==$countryshort['Country']['iso_2'])){
				if($output->status =='OK'){
					$location['lat'] = $output->results[0]->geometry->location->lat;
					$location['lng'] = $output->results[0]->geometry->location->lng;
					
					foreach($output->results[0]->address_components as $key=>$value){
						
						if(($value->types[0] =='administrative_area_level_1')|($value->types[0] =='postal_town')){
							$this->data['User']['regionshort']= $value->short_name;
							$this->data['User']['region'] = $value->long_name;
						}
						if($value->types[0] =='administrative_area_level_2'){
							$this->data['User']['district'] = $value->short_name;
						}
						if($value->types[0] =='country'){
							$this->data['User']['countryiso2'] = $value->short_name;
						}
						if($value->types[0] =='locality'){
							$this->data['User']['city'] = $value->short_name;
						}
						$location[$value->types[0]] = $value->short_name;
					}			
					$this->data['User']['formatedaddress']=$output->results[0]->formatted_address;
					$this->data['User']['placeid']=$output->results[0]->place_id;
				}
				return true;
			}
		}
		return false;
	}
	
	public function phone($check) {
		if(is_array($check)) {$value = array_shift($check);} else { $value = $check; }
		if(strlen($value) == 0) {return true;}
		return preg_match('/^[0-9-+()# ]{6,23}+$/', $value);
	}

}
