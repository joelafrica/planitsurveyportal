<?php

if (!empty($tokeninfo)){
			echo "<div class='tokenheader'><span>".$tokeninfo->surveyname."</span></div>";
}


if ($this->Session->check('Message.processing_msg_err')) {
	
	echo $this->Session->flash('processing_msg_err');
	
} else {
	if (!empty($sucess_msg)) {
	
		echo "<div class='container'>".$sucess_msg."</div>";
	
	} else {
	
		echo $this->Form->create('Confirmation', array('onSubmit' => 'setFormSubmitting()'));
	
		switch ($action) {
			case "save":
						echo "<div class='container'>";
								echo "Thank you for taking part in this important survey.  
										Your survey data have been saved.   
										You have chosen not to complete the survey at this time.
										Resume the survey at your convenience, by following the link sent to your e-mail by Planit.";
						echo "</div>";
						break;
			case "submit":
						echo "<div class='container'>";
								echo "Thank you for taking part in this important survey.  
										Your survey data have been saved.
										Press Confirm to complete the survey.  
										Press Cancel if you choose not to submit the survey at this time.";
						echo "</div>";
						echo "<div class='commitbuttons'>";
							echo "<div>".$this->Form->submit('Cancel', array(
									'id' => 'cancel', 'name' => 'cancel'))."</div>";
							echo $this->Form->submit('Confirm', array(
									'id' => 'confirm', 'name' => 'confirm'));
						echo "</div>";
					
		}
	
		echo $this->Form->end();
	}
}

?>