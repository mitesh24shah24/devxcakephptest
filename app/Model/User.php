<?php
App::uses('AuthComponent', 'Controller/Component');

class User extends AppModel {
	
	public $avatarUploadDir = 'img/avatars';
    
	public $validate = array(
        /*'username' => array(
            'nonEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'A username is required',
				'allowEmpty' => false
            ),
			'between' => array( 
				'rule' => array('between', 5, 15), 
				'required' => true, 
				'message' => 'Usernames must be between 5 to 15 characters'
			),
			 'unique' => array(
				'rule'    => array('isUniqueUsername'),
				'message' => 'This username is already in use'
			),
			'alphaNumericDashUnderscore' => array(
				'rule'    => array('alphaNumericDashUnderscore'),
				'message' => 'Username can only be letters, numbers and underscores'
			),
        ),*/
        'password' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'A password is required'
            ),
			'min_length' => array(
				'rule' => array('minLength', '6'),  
				'message' => 'Password must have a mimimum of 6 characters'
			)
        ),
		
		'password_confirm' => array(
            'notEmpty' => array(
                'rule' => array('notBlank'),
                'message' => 'Please confirm your password'
            ),
			 'equaltofield' => array(
				'rule' => array('equaltofield','password'),
				'message' => 'Both passwords must match.'
			)
        ),
		
		'email' => array(
			'notEmpty' => array(
                'rule' => 'notBlank',
                'required' => true,
                'message' => 'Please enter email.'
            ),
			 'unique' => array(
				'rule'    => array('isUniqueEmail'),
				'message' => 'This email is already in use',
			),
			'between' => array( 
				'rule' => array('between', 6, 30), 
				'message' => 'Usernames must be between 6 to 30 characters'
			)
		),
        /*'role' => array(
            'valid' => array(
                'rule' => array('inList', array('0', '1')),
                'message' => 'Please enter a valid role',
                'allowEmpty' => false
            )
        ),*/
		
		
		'password_update' => array(
			'min_length' => array(
				'rule' => array('minLength', '6'),   
				'message' => 'Password must have a mimimum of 6 characters',
				'allowEmpty' => true,
				'required' => false
			)
        ),
		'password_confirm_update' => array(
			 'equaltofield' => array(
				'rule' => array('equaltofield','password_update'),
				'message' => 'Both passwords must match.',
				'required' => false,
			)
        ),
        'phone' => array(
			'min_length' => array(
				'rule' => array('minLength', '10'),   
				'message' => 'Phone number should not less than 10 digit',
				'allowEmpty' => false,
				'required' => true
			),
			'notEmpty' => array(
                'rule' => 'notBlank',
                'required' => true,
                'message' => 'Please enter phone number.'
            ),
			'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Please enter a valid number.',
                'allowEmpty' => false
            ),
            'notStartingWithZero' => array(
                'rule' => array('notStartingWithZero'),
                'message' => 'First digit cannot be zero.'
            )
        ),
        'firstname' => array(
            'notEmpty' => array(
                'rule' => 'notBlank',
                'required' => true,
                'message' => 'Please enter your first name.'
            ),
            'validFormat' => array(
                'rule' => '/^[a-zA-Z]+$/',
                'message' => 'First name must contain only letters.'
            )
        ),
        'lastname' => array(
            'notEmpty' => array(
                'rule' => 'notBlank',
                'required' => true,
                'message' => 'Please enter your last name.'
            ),
            'validFormat' => array(
                'rule' => '/^[a-zA-Z]+$/',
                'message' => 'last name must contain only letters.'
            )
        ),
        'address' => array(
            'notEmpty' => array(
                'rule' => 'notBlank',
                'required' => true,
                'message' => 'Please enter your address.'
            )
        )		
    );
	
		/**
	 * Before isUniqueUsername
	 * @param array $options
	 * @return boolean
	 */
	/*function isUniqueUsername($check) {

		$username = $this->find(
			'first',
			array(
				'fields' => array(
					'User.id',
					'User.email'
				),
				'conditions' => array(
					'User.email' => $check['email']
				)
			)
		);

		if(!empty($username)){
			if($this->data[$this->alias]['id'] == $username['User']['id']){
				return true; 
			}else{
				return false; 
			}
		}else{
			return true; 
		}
    }*/

	/**
	 * Before isUniqueEmail
	 * @param array $options
	 * @return boolean
	 */
	function isUniqueEmail($check) {

		$email = $this->find(
			'first',
			array(
				'fields' => array(
					'User.id'
				),
				'conditions' => array(
					'User.email' => $check['email']
				)
			)
		);

		if(!empty($email)){
			if($this->data[$this->alias]['id'] == $email['User']['id']){
				return true; 
			}else{
				return false; 
			}
		}else{
			return true; 
		}
    }
	
	public function alphaNumericDashUnderscore($check) {
        // $data array is passed using the form field name as the key
        // have to extract the value to make the function generic
        $value = array_values($check);
        $value = $value[0];

        return preg_match('/^[a-zA-Z0-9_ \-]*$/', $value);
    }
	
	public function equaltofield($check,$otherfield) 
    { 
        //get name of field 
        $fname = ''; 
        foreach ($check as $key => $value){ 
            $fname = $key; 
            break; 
        } 
        return $this->data[$this->name][$otherfield] === $this->data[$this->name][$fname]; 
    } 

	/**
	 * Before Save
	 * @param array $options
	 * @return boolean
	 */
	 public function beforeSave($options = array()) {
		// hash our password
		if (isset($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		
		// if we get a new password, hash it
		if (isset($this->data[$this->alias]['password_update'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password_update']);
		}
	
		// fallback to our parent
		return parent::beforeSave($options);
	}

	public function notStartingWithZero($check) {
        $value = array_values($check)[0];
        return ($value == 0 || $value[0] === '0') ? false : true;
    }

}

?>