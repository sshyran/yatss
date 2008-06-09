<?php
require_once('set_env.php');
if ($a->checkAuth()) {
$rs=$db->query('select * from view_event_info');

$myarray=array();
while ($row = $rs->fetchRow()) {
	$myarray[]=$row;
}

$t->assign('data',$myarray);
$t->display("events.tpl");
}
else {
	echo "hi chris";
}
?>