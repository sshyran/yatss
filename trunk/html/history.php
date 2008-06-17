<?php
require_once('set_env.php');
require_once('util.php');

if ($a->checkAuth()) {
	$values[]=$a->getUserName();
	$sql='select * from view_purchase_history where username= ?';
	$myarray=executeQuery($sql,$values);
	$t->assign('display_first_row',1);
	$t->assign('data',$myarray);
}
else {
	$t->assign('error',NOT_AUTHORIZED);
}
?>