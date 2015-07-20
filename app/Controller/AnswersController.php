<?php
class AnswersController extends AppController {
	
	public $helpers = array('Html', 'Form');

    public function add() {
        App::uses('JWT', 'Vendor');
		
		$server_security_key = 'j1o9e2l5@it03chy05';
		$token = urldecode($this->request->query['token']);
		
		$token_info = JWT::decode($token, '$server_security_key');
		

			//if method = post, validate and load posted answers. save if validation successful 
			if ($this->request->is('post')){
				
				$actionButton = (isset($this->request->data['submit']) ? 'submit' : 'save');
				
				switch ($actionButton) {
					case "save":
								//perform save 
								$this->requestAction(
									array('controller' => 'Answers', 'action' => 'save'),
									array('postedAnswers' => $this->request->data)
								);	
								break;
					case "submit":
								$validatedPostResults = $this->validateAndLoadAnswers ($this->request->data, $token_info->userid, $token_info->surveyid);
				
								if (empty($validatedPostResults['Errors'])) {
									//perform save 
									$this->requestAction(
										array('controller' => 'Answers', 'action' => 'save'),
										array('postedAnswers' => $this->request->data)
									);
								} else {
									$this->set('questions', $validatedPostResults['PostedQuestionsAnswers']);
									//for validation
									$this->set('error_messages', $validatedPostResults['Errors']);
									$this->set('tokeninfo', $token_info);
								}
								break;
								}
				
			//else, load answers from database	
			} else {
		 		$dbAnswersWithQuestions = $this->loadAnswers($token_info->userid, $token_info->surveyid);
				$this->set('questions', $dbAnswersWithQuestions);						
				$this->set('tokeninfo', $token_info);
			}
		
			
    }

	public function save() {
    	App::uses('JWT', 'Vendor');
		
		$server_security_key = 'j1o9e2l5@it03chy05';
		$token = urldecode($this->request->query['token']);
		
		$token_info = JWT::decode($token, '$server_security_key');
		
		
			$postedAnswers = $this->params['postedAnswers'];
			$actionButton = (isset($postedAnswers['submit']) ? 'submit' : 'save');
			$answers = $this->formatPostedAnswers ($postedAnswers, $token_info->userid, $token_info->surveyid, 'forSave');
			$this->Answer->deleteAll(array('user_id' => $token_info->userid, 'survey_id' => $token_info->surveyid));
			$this->Answer->saveMany($answers);
			$this->redirect(
        		array('controller' => 'Answers', 'action' => 'confirmation',
        			'?' => array(
        			'token' => $this->request->query['token'],
        			'action' => $actionButton)
        		)
   			 ); 
		
	} 
	
	public function confirmation() {
		App::uses('JWT', 'Vendor');
		
		$server_security_key = 'j1o9e2l5@it03chy05';
		$token = urldecode($this->request->query['token']);
		
		$token_info = JWT::decode($token, '$server_security_key');
		
			if ($this->request->is('post')){
				$timestamp = date('Y-m-d G:i:s');
				$this->Answer->create();
				$this->Answer->updateAll(
						array('Answer.submission_date' => "'".$timestamp."'"), 
						array('Answer.user_id' => $token_info->userid, 'survey_id' => $token_info->surveyid));
				$this->set('sucess_msg', 'Your survey data have been sent to Planit.  Thank you for taking your time in completing the survey.');
				//$this->Session->setFlash('You have completed the survey.  Thank you.', 'default', array(), 'processing_msg_success');
				
			} else {			
				$action = $this->request->query['action'];
				switch ($action){
					case "save":
								$this->set('action', 'save');
								break;
					case "submit":
								$this->set('action', 'submit');
								break;
				}		
			}
		$this->set('tokeninfo', $token_info);
	}
	

	//HELPER METHODS
	
	private function loadAnswers ($user_id, $survey_id) {
		
		$this->loadModel('Question');
		$questions = $this->Question->find('all', array(
			'conditions' => array('Question.survey_id' => $survey_id)));

		$this->loadModel('Option');
		for ($x = 0; $x <= count($questions)-1; $x++) {
		
			$this->Option->bindModel(array(
				'hasMany' => array(
							'Answer' => array(
							'foreignKey' => 'option_id',
							'conditions' => array('Answer.user_id' => $user_id)
							))
			));
		
			$options = $this->Option->find('all', array(
				'conditions' => array('Option.question_id' => $questions[$x]['Question']['id'])
				));
		
			$questions[$x]['Question']['Options_Answers'] = $options;
		} 
		
		return $questions; 
	
	}
	
	private function validateAndLoadAnswers ($posted_data, $user_id, $survey_id){
				
				$validated_answers = array();
				$formatted_model = $this->formatPostedAnswers($posted_data, $user_id, $survey_id, 'forView');
				
				$this->loadModel('Question');
				$questions = $this->Question->find('all', array(
					'conditions' => array('Question.survey_id' => $survey_id)));
				
				//for validation
				$error_messages = array();
					
				$this->loadModel('Option');
				for ($x = 0; $x <= count($questions)-1; $x++) {
					
					//for validation
					$selection_error_required = ($questions[$x]['Question']['mandatory_flag'] == 'Y' ? true : false);
					$text_error_required = false;
					$text_error_numeric = false;
					
					
					$options = $this->Option->find('all', array(
						'conditions' => array('Option.question_id' => $questions[$x]['Question']['id'])
					));

					$options_with_answers = array();
					foreach ($options as $option_value) {
 						
					
 						$answer = array();
 						
 						foreach ($formatted_model as $answer_value) {
 							if ($option_value['Option']['id'] == $answer_value['Answer'][0]['option_id']){
 								$answer = array_merge ($option_value, $answer_value);
 								//for validation
 								switch ($questions[$x]['Question']['control_type']){
 									case "text": 
 												if (!strlen(trim($answer_value['Answer'][0]['answer_text'])) &&
 													$questions[$x]['Question']['mandatory_flag'] == 'Y') {
 													$text_error_required = true;
 												}
												if (!ctype_digit(trim($answer_value['Answer'][0]['answer_text'])) &&
													$option_value['Option']['type'] == 'numeric') {	
													$text_error_numeric = true;
												}
 												break;
 									case "radio" || "checkbox":
 												$selection_error_required = false;
 												break; 
 								} 

 								break;
 							} else {
 								$answer = array_merge ($option_value, array('Answer' => array()));
 							}
 						}
 						
 						array_push($options_with_answers, $answer);
 					}
					
					$questions[$x]['Question']['Options_Answers'] = $options_with_answers;
					
					
					//for validation
					switch ($questions[$x]['Question']['control_type']){
 						case "text": 
 							if ($text_error_required) {
 								$error_messages['Errors'][$questions[$x]['Question']['id']] = "Please enter a value.";
 								//array_merge($error_messages, array('Question'.$x+1 => 'Please enter a value.'.$x)); 								
 							} else {
 							if ($text_error_numeric) {
 								$error_messages['Errors'][$questions[$x]['Question']['id']] = "Please enter a numeric value.";
 								//array_merge($error_messages, array('Question'.$x+1 => 'Please enter a value.'.$x)); 								
 							}}
 							break;
 						case "radio" || "checkbox":
							if ($selection_error_required){
 								$error_messages['Errors'][$questions[$x]['Question']['id']] = "Please select atleast one option.";
 								//$error_messages = array_merge($error_messages, array('Question'.$x+1 => 'Please select atleast 1 option.'.$x));
 							}
 							break;
					}
				}	
				//return $validated_answers = $error_messages;
				$posted_answers['PostedQuestionsAnswers'] = $questions;
				return $validated_answers = array_merge($posted_answers, $error_messages);
	}
	
	
	private function formatPostedAnswers ($posted_data, $user_id, $survey_id, $purpose) {
		$formatted_model = array();
		foreach ($posted_data['Answer'] as $key => $value) {
			$got_question_id = (strpos($key,'-') === false) ? $key :  substr($key, 0, strpos($key,'-'));
			$got_option_id = (strpos($key,'-') === false) ? $value :  substr($key, strpos($key,'-')+1); 
			switch ($purpose) {
				case "forSave":
					$arr = array('Answer' => array (
							'user_id' => $user_id,
							'survey_id' => $survey_id,
							'question_id' => $got_question_id,
							'option_id' => $got_option_id,	
							'answer_text' => trim($value)
					));	
					break;			
				case "forView":		
					$arr = array('Answer' => array(array (
							'user_id' => $user_id,
							'survey_id' => $survey_id,
							'question_id' => $got_question_id,
							'option_id' => $got_option_id,	
							'answer_text' => trim($value)
					)));
					
			}
			
			array_push($formatted_model, $arr);    		   	
		}
		return $formatted_model;
	}


}