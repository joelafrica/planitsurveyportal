<?php

if ($this->Session->check('Message.processing_msg_err')) {
	
	echo $this->Session->flash('processing_msg_err');
	
} else {
	if ($this->Session->check('Message.processing_msg_success')) {
	
		echo $this->Session->flash('processing_msg_success');
	
	} else {
	
		echo $this->Form->create('Confirmation', array('onSubmit' => 'setFormSubmitting()'));
	
		switch ($action) {
			case "save":
						echo "<div>";
								echo "Thank you for taking part in this important survey.  
										Your survey data have been saved.   
										You have chosen not to submit the survey at this time.
										You can resume the survey by going to the link below:";
						echo "</div>";
						break;
			case "submit":
						echo "<div>";
								echo "Thank you for taking part in this important survey.  
										Your survey data have been saved.
										Press Confirm to complete the survey.  
										If you choose not to submit the survey at this time,
										you can resume the survey by going to the link below:";
						echo "</div>";
						echo "<div class='commitbuttons'>";
							echo $this->Form->submit('Confirm', array(
									'id' => 'confirm', 'name' => 'confirm'));
						echo "</div>";
					
		}
	
		echo $this->Form->end();
	}
}

?>