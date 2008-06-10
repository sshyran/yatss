<?php
require_once('set_env.php');
require_once('handleQuery.php');


//$myarray=executeQuery('select * from view_event_info');
$values[]=1;
$myarray=executeQuery('select * from view_event_info where event_id = ?',$values);
$t->assign('data',$myarray);
$t->display("events.tpl");

?>