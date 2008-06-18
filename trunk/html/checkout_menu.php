<?php
//require_once('set_env.php');


if ($a->checkAuth()) {
	$valid_checkout_pages=array('payment_info','confirmation', 'receipt');
	$t->assign('submenu',$valid_checkout_pages);
}
?>