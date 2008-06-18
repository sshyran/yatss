<?php
require_once('set_env.php');
require_once('util.php');

if ($a->checkAuth() && isset($_SESSION['is_admin']) && $_SESSION['is_admin'] ==1) {
	$vars=array();
	if (isset($_GET['event_id']) && is_numeric($event_id=$_GET['event_id'])) {
		$sql='select u.username, sum(t.number_of_tickets) as "quantity", firstname as "first name", lastname as "last name", email, a.address, a.city, a.state_id as "state"
			from orders as o, transactions as t, users as u, address as a
			where o.id=t.order_id and
			t.event_id=t.event_id and t.event_id=? and u.id=o.user_id and a.id=u.address_id
			group by u.username
			order by quantity desc';
			$vars[]=$event_id;
	}
	else {
		$sql='select username as "nickname", firstname as "first name", lastname as "last name", email from users';
	}
	$users_array=executeQuery($sql, $vars);
	$t->assign('empty_message','no one is attending to this event');
	$t->assign('display_first_row',1);
	$t->assign('data',$users_array);
}
?>