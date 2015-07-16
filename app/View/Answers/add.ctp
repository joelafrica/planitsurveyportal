

<?php 

if ($this->Session->check('Message.processing_msg_err')) {
	
	echo $this->Session->flash('processing_msg_err');
	
} else {
	
	if (!empty($questions)) {
		
		if (!empty($error_messages)){
			echo "<div class='onecolumn'><span class='mainerror'>"."There are validation errors.  Please review your answers"."</span></div>";
		}
		
		echo $this->Form->create('Answer', array('name' => 'Answer', 'onSubmit' => 'setFormSubmitting()'));
		
				//print questions
				for ($x = 0; $x <= count($questions)-1; $x++) {
					$q_number = $x + 1;
					$questionid = $questions[$x]['Question']['id'];
					$columnstyle = ($questions[$x]['Question']['column_style'] > 1 ? "twocolumn" : "onecolumn");
					echo "<div class='container'>";
					
					echo "<div class='question'>Question ".$q_number.".  ".$questions[$x]['Question']['description']."</div>"."<br>";
			
						//print options
						$options_answers = $questions[$x]['Question']['Options_Answers'];
						foreach ($options_answers as $key => $value) {
							$input_optionid = $value['Option']['id'];
							$control_type = $questions[$x]['Question']['control_type'];
							$user_answers = $value['Answer'];
							switch ($control_type){
								case "checkbox":
											$option_value = (!empty($user_answers) ? array ('checked' => true, 'hiddenField' => false) : array ('checked' => false, 'hiddenField' => false));
											$div_class = $columnstyle;
											$input_label = $value['Option']['description'];
											echo "<div class='".$div_class."' >";
											echo $this->Form->checkbox($questionid."-".$input_optionid, $option_value);
											echo $this->Form->label($input_optionid, $input_label);
											echo "</div>";
											break;
								case "radio":
											$attr_value = (!empty($user_answers) ? array ('value' => $input_optionid, 'hiddenField' => false) : array('hiddenField' => false));
											$div_class = $columnstyle;
											$input_label = $value['Option']['description'];
											echo "<div class='".$div_class."' >";
											//echo $this->Form->checkbox($questionid);
											echo $this->Form->radio($questionid, array($input_optionid =>''),$attr_value,array());
											echo $this->Form->label($questionid, $input_label);
											echo "</div>";
											break;
								case "text":
											$option_value =  (!empty($user_answers) ? array ('value' => $user_answers[0]['answer_text']) : array());
											$div_class = $columnstyle;
											$input_label = $value['Option']['description'];
											echo "<div class='".$div_class."' >";
											echo $this->Form->label($input_optionid, $input_label);
											echo $this->Form->text($questionid."-".$input_optionid, $option_value);
											echo "</div>";
											break;
							}
						}
					if (!empty($error_messages[$questions[$x]['Question']['id']])){
						echo "<div class='onecolumn'><span class='error'>".$error_messages[$questions[$x]['Question']['id']]."</span></div>";
					}
					echo "</div>";
				} 
				echo "<div class='commitbuttons'>";
					echo $this->Form->submit('Submit', array(
						'id' => 'submit', 'name' => 'submit'));
					echo $this->Form->submit('Save', array(
						'id' => 'save', 'name' => 'save'));
				echo "</div>";

		echo $this->Form->end();
		
	}
}

/*
//for debugging
function print_array($aArray) {
 //Print a nicely formatted array representation:
echo '<pre>';
  print_r($aArray);
  echo '</pre>';
}

print_array($error_messages);
print_array($questions);
*/
?>