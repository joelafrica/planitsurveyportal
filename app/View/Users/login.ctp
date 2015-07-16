<?php
if ($this->Session->check('Message.auth_login')) {
	echo $this->Session->flash('auth_login');
}
?>	