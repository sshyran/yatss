<?php
require_once('set_env.php');
if (!$a->checkAuth()) {
	header("location:$web_root");
}

$_SESSION['checkout_step']='payment_info';
$t->assign('next_step_link',"$web_root?page=checkout&step=confirmation");
?>