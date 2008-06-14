<?php
require_once('set_env.php');
require_once('handleQuery.php');

if ($a->checkAuth() && isset($_SESSION['is_admin']) && $_SESSION['is_admin'] ==1) {
	$myarray=executeQuery('select username as "nickname", firstname as "first name", lastname as "last name", email from users');
}
$t->assign('display_first_row',1);
$t->assign('data',$myarray);
?>