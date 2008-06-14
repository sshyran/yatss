<?php
require_once('set_env.php');
if (!$a->checkAuth()) {
	header("location:$web_root");
}

$_SESSION['checkout_step']='payment_info';
$t->assign('next_step_link',"$web_root?page=checkout&step=confirmation");


$result = executeQuery("SELECT users.firstName as 'First Name', users.lastName as 'last name', address.address, address.city, address.state_id as 'state', address.zip FROM users, address WHERE users.address_id = address.id AND users.id = ?", array($_SESSION['userid']));

$t->assign('data', $result[0]);

$current_year = date('Y');
$yearArray = array();
for($i=$current_year; $i<=$current_year+10; $i++)
{
	$yearArray[$i] = $i;
}
$t->assign('yearOptions', $yearArray);

//print_r($result);
?>