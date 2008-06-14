<?php

/**
 * messages file. requires message_id as parameter name. messages <50 are error messages, else info messages
 */


require_once('set_env.php');

if(isset($_GET['message_id'])){
	switch ($message_id=$_GET['message_id']) {
		case 1:
			$message='Don\'t mess with the address bar!';
			break;

		case 2:
			$message='Provided parameters are not valid';
			break;
		case 3:
			$message='user_id has to be stored in session!!!';
			break;
			
		case 50:
			$message='Thank you for registration';
			break;
		case 51:
			$message='Shopping card deleted.. chris will write something here';
			break;
		case 51:
			$message='Session timed out. please log in';
			break;
		
		default:
			$message='info message';
			break;
	}
	if ($message_id<50) {
		$t->assign('error_message',$message);
	}
	else {
		$t->assign('message',$message);		
	}
}
?>