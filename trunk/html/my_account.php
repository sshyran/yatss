<?php
require_once('set_env.php');
require_once('handleQuery.php');

if ($a->checkAuth()) {
	$values[]=$_SESSION['userid'];
	$sql='select username as nickname, address, city, us_states.name as state, zip, firstname as "first name", middlename as "middle name", lastname as "last name", email from users, address, us_states where users.id= ? and address.id=users.address_id and address.state_id=us_states.id';
	$myarray=executeQuery($sql,$values);
	$t->assign('display_first_row',1);
	$t->assign('data',$myarray);
}
else {
	$t->assign('error',NOT_AUTHORIZED);
}
?>