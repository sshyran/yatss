<?php
require_once('set_env.php');
require_once('util.php');

function printEventStatistics()
{
	global $a, $t, $web_root;
	if ($a->checkAuth() && isset($_SESSION['is_admin']) && $_SESSION['is_admin'] ==1) {
		$sql='select * from view_statistics';
		$eventstatarray=executeQuery($sql);
			// array manipulation
		foreach ($eventstatarray as &$value) {
			$value['event_name']="<a href=\"$web_root?page=admin&amp;step=users&amp;event_id=".$value['id']."\">".$value['event_name'].'</a>';
			unset($value['id']);
		}
		$t->assign('display_first_row',1);
		$t->assign('data',$eventstatarray);
		unset($eventstatarray);

}

}
printEventStatistics();

?>