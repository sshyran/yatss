<?php
require_once('set_env.php');
require_once('handleQuery.php');

function printEventStatistics()
{
	global $a, $t, $web_root;
	if ($a->checkAuth() && isset($_SESSION['is_admin']) && $_SESSION['is_admin'] ==1) {
		$sql='select e.id, e.name  as "event name", 
				sum(t.num_of_tickets-t.available_tickets) as "tickets sold", 
				sum(t.available_tickets) as "tickets unsold" , tr.transaction_total as "revenue"
			from events as e left join tickets as t on e.id=t.event_id
				left join transactions as tr using (event_id, ticket_type_id)
			group by e.id';
		$eventstatarray=executeQuery($sql);
			// array manipulation
		foreach ($eventstatarray as &$value) {
			$value['event name']="<a href=\"$web_root?page=admin&step=event_info&event_id=".$value['id']."\">".$value['event name'].'</a>';
			unset($value['id']);
		}
		$t->assign('display_first_row',1);
		$t->assign('data',$eventstatarray);
		unset($eventstatarray);

}

}
printEventStatistics();

?>