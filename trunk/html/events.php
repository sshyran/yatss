<?php
require_once('set_env.php');
require_once('util.php');

function events()
{
	global $t,$web_root;
	$myarray=executeQuery('select event_id, name, description from view_event_info where date > CURRENT_TIMESTAMP group by event_id order by date asc');

	foreach ($myarray as $key => &$value) {
		$value['link']="<a href=\"$web_root?page=tickets&amp;event_id=$value[event_id]\">details</a>";
		array_shift($value);
		unset($value['ticket_type_id']);
	}
	$t->assign('display_first_row',1);
	$t->assign('data',$myarray);	
}

events();

?>