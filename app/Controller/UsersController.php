<?php
App::uses('AppController', 'Controller');
App::uses('CakeNumber', 'Utility');
class UsersController extends AppController {

	public $paginate = array(
        'limit' => 25,
        'conditions' => array('status' => '1'),
    	'order' => array('User.username' => 'asc' ) 
    );
	
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login','add','test'); 
    }
	

	public function login() {
		
		//if already logged-in, redirect
		if($this->Session->check('Auth.User')){
			$this->redirect(array('action' => 'index'));		
		}
		
		// if we get the post information, try to authenticate
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$user = $this->Auth->user();
				$this->Session->write('userdata', $user);
				$this->Session->setFlash(__('Welcome, '. $this->Auth->user('email')));
				$this->redirect($this->Auth->redirectUrl());
			} else {
				$this->Session->setFlash(__('Invalid username or password'));
			}
		} 
	}

	public function logout() {
		$this->redirect($this->Auth->logout());
	}

    public function index() {
    	$this->paginate = array(
			'limit' => 6,
			'order' => array('User.firstname' => 'asc' )
		);
		$users = $this->paginate('User');
		$states = $this->get_state();
//echo '<pre>';print_r($this->Session->read('userdata'));die;
    	$this->set('statelist',$states);
		$this->set(compact('users'));
    }


    public function add() {
    	if($this->Session->check('Auth.User')){
			$this->redirect(array('action' => 'index'));		
		}
        if ($this->request->is('post')) {
				
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The new user has been created'));
				$this->Auth->login();
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be created. Please, try again.'));
			}	
        }else{
        	$states = $this->get_state();
        	$this->set('statelist',$states);
        	//echo '<pre>';print_r($states);die;
        }
    }

    public function get_state()
    {
    	$this->loadModel('State');
    	$states = [];
    	$statelist = $this->State->find('all');
    	foreach($statelist as $k => $v)
    	{
    		$states[$v['State']['id']] = $v['State']['name'];
    	}
    	return $states;
    }

    public function edit($id = null) {

		    if (!$id) {
				$this->Session->setFlash('Please provide a user id');
				$this->redirect(array('action'=>'index'));
			}

			$user = $this->User->findById($id);
			if (!$user) {
				$this->Session->setFlash('Invalid User ID Provided');
				$this->redirect(array('action'=>'index'));
			}

			if ($this->request->is('post') || $this->request->is('put')) {
				$this->User->id = $id;
				if ($this->User->save($this->request->data)) {
					$this->Session->setFlash(__('The user has been updated'));
					$this->redirect(array('action' => 'index'));
				}else{
					$this->Session->setFlash(__('Unable to update your user.'));
				}
			}else
			{
				$states = $this->get_state();
    			$this->set('statelist',$states);
			}

			if (!$this->request->data) {
				$this->request->data = $user;
			}
    }

    public function delete($id = null) {
		
		if (!$id) {
			$this->Session->setFlash('Please provide a user id');
			$this->redirect(array('action'=>'index'));
		}
		
        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash('Invalid user id provided');
			$this->redirect(array('action'=>'index'));
        }
        if ($this->User->saveField('status', 0)) {
            $this->Session->setFlash(__('User deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('action' => 'index'));
    }
	
	/*public function activate($id = null) {
		
		if (!$id) {
			$this->Session->setFlash('Please provide a user id');
			$this->redirect(array('action'=>'index'));
		}
		
        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash('Invalid user id provided');
			$this->redirect(array('action'=>'index'));
        }
        if ($this->User->saveField('status', 1)) {
            $this->Session->setFlash(__('User re-activated'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not re-activated'));
        $this->redirect(array('action' => 'index'));
    }*/

    public function test(){
    	echo 'ajay solanki hello';die;
    }

}

?>