

<?php 
function print_array($aArray) {
// Print a nicely formatted array representation:
  echo '<pre>';
  print_r($aArray);
  echo '</pre>';
}
//set referenced CSS 
echo $this->Html->css('main');


echo $this->Session->flash('validate_answers');

if ($this->Session->check('Message.auth_questions')) {
	echo $this->Session->flash('auth_questions');
	
} else {

	//create form
	echo $this->Form->create('Answer', array(
								'url' => array('controller' => 'questions', 'action' => 'save')
							));

		
			//print questions
			for ($x = 0; $x <= count($questions)-1; $x++) {
				$q_number = $x + 1;
				$questionid = $questions[$x]['Question']['id'];
				echo "<div class='container'>";
				echo "Question ".$q_number.".  ".$questions[$x]['Question']['description'];
			
					//print options
					$options_answers = $questions[$x]['Question']['Options_Answers'];
					foreach ($options_answers as $key => $value) {
						$input_optionid = $value['Option']['id'];
						$control_type = $value['Option']['control_type'];
						$user_answers = $value['Answer'];
						switch ($control_type){
							case "checkbox":
										$option_value = (!empty($user_answers) ? array ('checked' => true, 'hiddenField' => false) : array ('checked' => false, 'hiddenField' => false));
										$div_class = "onecolumn";
										$input_label = $value['Option']['description'];
										echo "<div class='".$div_class."' >";
										echo $this->Form->checkbox($questionid."-".$input_optionid, $option_value);
										echo $this->Form->label($input_optionid, $input_label);
										echo "</div>";
										break;
							case "radio":
										$attr_value = (!empty($user_answers) ? array ('value' => $input_optionid, 'hiddenField' => false) : array('hiddenField' => false));
										$div_class = "onecolumn";
										$input_label = $value['Option']['description'];
										echo "<div class='".$div_class."' >";
										//echo $this->Form->checkbox($questionid);
										echo $this->Form->radio($questionid, array($input_optionid =>''),$attr_value,array());
										echo $this->Form->label($questionid, $input_label);
										echo "</div>";
										break;
							case "text":
										$option_value =  (!empty($user_answers) ? array ('value' => $user_answers[0]['answer_text']) : array());
										$div_class = "onecolumn";
										$input_label = $value['Option']['description'];
										echo "<div class='".$div_class."' >";
										echo $this->Form->label($input_optionid, $input_label);
										echo $this->Form->text($questionid."-".$input_optionid, $option_value);
										echo "</div>";
										break;
						}
					}
			
				echo "</div>";
			} 
			echo "<div class='commitbuttons'>";
				echo $this->Form->submit('Save');
				echo $this->Form->submit('Submit');
			echo "</div>";

	echo $this->Form->end();

}

print_array($questions);

?>