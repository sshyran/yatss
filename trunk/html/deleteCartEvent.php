<?php
require_once('../include/set_env.php');
require_once('util.php');

if($a->getAuth() && isset($_REQUEST['basket_id']) && is_numeric($basketid = $_REQUEST['basket_id']))
{
	// Delete event from cart
	deleteFromBasket($basketid,array($basketid));
	
	$address = $web_root."?page=cart";
	header("Location: $address");
}

?>