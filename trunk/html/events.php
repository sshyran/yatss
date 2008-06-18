<?php
require_once('set_env.php');
require_once('util.php');

function events($page_number=0)
{
	$step=7;
	global $t,$web_root;
	$count_of_rows=executeQuery('select count(distinct event_id) as num from view_event_info where date > CURRENT_TIMESTAMP');
	$count_of_rows=$count_of_rows[0]['num'];
	$limitfrom=$page_number*$step;
	$limitto=$limitfrom+$step;
	if ($limitfrom>=$count_of_rows) {
		$limitfrom=0; $limitto=$step; $page_number=-1;
	}
	$myarray=executeQuery('select event_id, name, date_format(date, "%Y-%m-%d %H:%i") as "event date", description from view_event_info where date > CURRENT_TIMESTAMP group by event_id order by date asc limit '.$limitfrom .', '. $limitto);

	foreach ($myarray as $key => &$value) {
		$value['link']="<a href=\"$web_root?page=tickets&amp;event_id=$value[event_id]\">details</a>";
		array_shift($value);
		unset($value['ticket_type_id']);
	}
	$t->assign('display_first_row',1);
	$t->assign('data',$myarray);
	$t->assign('pagenum',$page_number+1);
}

if (isset($_GET['page_number']) && is_numeric($_GET['page_number'])) {
	events($_GET['page_number']);
}
else{
	events();
}

?>