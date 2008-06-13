<?php
//require_once('set_env.php');


if ($a->checkAuth()) {
	$valid_checkout_pages=array('payment_info','confirmation', 'receipt');
	$t->assign('checkout_links',$valid_checkout_pages);
}
?>