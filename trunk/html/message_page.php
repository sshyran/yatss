<?php

/**
 * messages file. requires message_id as parameter name. messages <50 are error messages, else info messages
 */


require_once('set_env.php');
require_once('basket_check.php');

if(isset($_GET['message_id'])){
	switch ($message_id=$_GET['message_id']) {
		case 1:
			$message='Don\'t mess with the address bar! (aka. http referrer missing)';
			break;

		case 2:
			$message='Provided parameters are not valid';
			break;
		case 3:
			$message='user_id has to be stored in session!!!';
			break;
		case 4:
			$message='only administrator can see this page';
			break;
		case 5:
			$message='Transaction failed.  Please re-try your transaction';
			break;
		case 6:
			$message='Ticket timer expired!!! you have only ' . getBasketTimer() . ' seconds to buy your tickets';
			break;
		case 7:
			$message='Authentication failed!';
			break;

			
		case 50:
			$message='Thank you for registration, you can now log in.';
			break;
		case 51:
			$message='Your order has been cancelled.  Your shopping cart was emptied.';
			break;
		case 52:
			$message='Session timed out. please log in';
			break;
		case 53:
			$message='There are no tickets left for this event';
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