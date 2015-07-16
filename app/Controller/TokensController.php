<?php
class TokensController extends AppController {


	public function beforeFilter() {
        parent::beforeFilter();
    }
    
	public function login() {
		if ($this->request->is('post')) {
			debug($this->data);
			if ($this->Auth->login()) {
				return $this->redirect($this->Auth->redirectUrl());
			} else {
				$this->Session->setFlash('Token is incorrect.', 'default', array(), 'auth');
			}
		}
	}	
	
	
	private function get_base_url(){
  		return sprintf(
    		"%s://%s%s",
    		isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
    		$_SERVER['SERVER_NAME'],
    		$_SERVER['REQUEST_URI']
	);
}
}
?>