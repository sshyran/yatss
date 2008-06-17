<?php
require_once('set_env.php');
require_once('handleQuery.php');

function printEventUsers()
{
	global $a, $t, $web_root;
	if ($a->checkAuth() && isset($_SESSION['is_admin']) && 
			$_SESSION['is_admin'] ==1 && isset($_GET['event_id']) && 
			is_numeric($_GET['event_id'])) {
		$sql='select u.username, sum(t.number_of_tickets) as "quantity"
		from orders as o, transactions as t, users as u
		where o.id=t.order_id and
		t.event_id=t.event_id and t.event_id=? and u.id=o.user_id
		group by u.username
		order by quantity desc';
		$eventstatarray=executeQuery($sql, array($_GET['event_id']));
		$t->assign('display_first_row',1);
		$t->assign('data',$eventstatarray);
		unset($eventstatarray);

}

}
printEventUsers();

?>