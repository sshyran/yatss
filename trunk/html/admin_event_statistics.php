<?php
require_once('set_env.php');
require_once('handleQuery.php');

if ($a->checkAuth() && isset($_SESSION['is_admin']) && $_SESSION['is_admin'] ==1) {
	$myarray=executeQuery('select e.name as "event name" from events as e, transactions as t');
}
$t->assign('display_first_row',1);
$t->assign('data',$myarray);
?>