<?php
require_once('basket_check.php');

if(isset($_SESSION['shipping_method']) && isset($_SESSION['firstName']) && isset($_SESSION['lastName']) && isset($_SESSION['cctype']) && isset($_SESSION['ccnumber']) && isset($_SESSION['ccmonth']) && isset($_SESSION['ccyear']))
{
	$_SESSION['checkout_step']='checkout_receipt';
	$t->assign('next_step_link',"$web_root");

	// is returning "1" for testing
	$orderId = confirmOrder();
	
	
	
}
else
{
	header("$web_root?page=message_page&message_id=4");
	exit;
}

?>