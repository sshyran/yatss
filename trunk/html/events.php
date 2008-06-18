<?php
require_once('set_env.php');
require_once('util.php');

function events($limitfrom=0,$limitto=7)
{
	global $t,$web_root;
	$myarray=executeQuery('select event_id, name, date_format(date, "%Y-%m-%d %H:%i") as "event date", description from view_event_info where date > CURRENT_TIMESTAMP group by event_id order by date asc limit '.$limitfrom.', '.$limitto);

	foreach ($myarray as $key => &$value) {
		$value['link']="<a href=\"$web_root?page=tickets&amp;event_id=$value[event_id]\">details</a>";
		array_shift($value);
		unset($value['ticket_type_id']);
	}
	$t->assign('display_first_row',1);
	$t->assign('data',$myarray);	
}

if (isset($_GET['page_number']) && is_numeric($_GET['page_number'])) {
	$page_number=$_GET['page_number'];
	$pagestep=7;
	events($page_number*$pagestep,($page_number+1)*$pagestep);
}
else{
	events();
}



?>