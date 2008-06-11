<?php
require_once('set_env.php');
require_once('handleQuery.php');


$values[]= $db->quote(date($_date_format));
$myarray=executeQuery('select * from view_event_info where date > ? order by date asc',$values);

foreach ($myarray as $key => &$value) {
	if ($a->checkAuth()) {
		$value['link']="<a href=\"$web_root?page=cart&amp;event_id=$value[event_id]&amp;ticket_type=$value[ticket_type_id]&amp;number_of_tickets=1\">add to cart</a>";
	}
	array_shift($value);
	unset($value['ticket_type_id']);
}
$t->assign('data',$myarray);

	?>