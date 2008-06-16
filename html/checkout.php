<?php
require_once('set_env.php');
//require_once('util.php');
require_once('basket_check.php');
$t->assign('title', 'checkout');

if (!($loggedin=$a->checkAuth()) || !isset($_SERVER['HTTP_REFERER'])) {
	header("location:$web_root?page=message_page&message_id=".($loggedin?1:52));
	exit;
}

require_once('checkout_menu.php');
$tplListCheckout[]='checkout_menu';

if (isset($_REQUEST['step']) && in_array(($step_page=$_REQUEST['step']), $valid_checkout_pages) ){
	require_once("checkout_$step_page.php");
	$tplListCheckout[]="checkout_$step_page";
} else{
	require_once('checkout_payment_info.php');
	$tplListCheckout[]='checkout_payment_info';
}

$t->assign('tplListCheckout',$tplListCheckout);
?>