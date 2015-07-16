
<?php

if ($this->Session->check('Message.processing_msg_err')) {
	echo $this->Session->flash('processing_msg_err');
}

?>