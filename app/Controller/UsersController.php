<?php
class UsersController extends AppController {

	public function login() {
		
		App::uses('JWT', 'Vendor');
		
		$server_security_key = Configure::read('Security.key');
		$token = urldecode($this->request->query['token']);
		
		$token_info = JWT::decode($token, '$server_security_key');
		$user_details = $this->User->find('first', array(
				'conditions' => array('User.id' => $token_info->userid)));
		
		if (!empty($user_details)) {
			$this->redirect(array(
						'controller' => 'Answers',
						'action' => 'add',
						'?' => array('token' => $this->request->query['token']),
						));
		} else {
			$this->Session->setFlash('Access denied.  Token is either expired or invalid. Please contact Planit to get a valid token.', 'default', array(), 'auth_login');
		}
	
		$this->set('tokeninfo', $token_arr);
	}	
	

	public function getTokens() {
		App::uses('JWT', 'Vendor');
		
		$server_security_key = Configure::read('Security.key');
		$users = $this->User->find('all');
		$this->set('usersdata', $users);
		
		
		$user_tokens = array();
		 
		foreach ($users as $key => $value){
			$token_arr = array();
			$token_arr ['userid'] = $value['User']['id'];
			$token_arr ['username'] = $value['User']['user_name'];
			$token_arr ['longnam'] = $value['User']['long_name'];
			$token_arr ['surveyid'] = 1;
			$token_arr ['surveyname'] = "Planit Technology Survey";			
			
			$token = urlencode(JWT::encode($token_arr, '$server_security_key'));
			
			$user_url = Configure::read('App.fullBaseUrl')."/planitsurveyportal/Users/login?token=".$token;
			
			array_push($user_tokens, array('userid' => $value['User']['id'],
											'username' => $value['User']['user_name'],
											'surveyname' => 'Planit Technology Survey',
											'surveyurl' => $user_url));
		}
		
		$this->set('usertokens', $user_tokens);
	}
	
}
?>