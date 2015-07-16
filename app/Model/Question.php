<?php
class Question extends AppModel {
   
   public function beforeSave($options = array()) {
   		
   		$this->Session->setFlash('validation failed', 'default', array(), 'validate_answers');	
   		return false;
   }
   
}
?>