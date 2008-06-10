<?php
require_once('set_env.php');
require_once('handleQuery.php');


//$myarray=executeQuery('select * from view_event_info');
$values[]=1;
$values[]='2008-06-09';
$myarray=executeQuery('select * from view_event_info where event_id = ? and date > ? order by date asc',$values);
$t->assign('data',$myarray);
$t->display("events.tpl");

?>