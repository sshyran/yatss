<?php

require_once('set_env.php');

$t->assign('apicode', 'ABQIAAAAiPmrNOEsg_2WGQEptsQ74xRqe_YL2A_tCvv-cWUMY_6tKsmF6xSrW0kISt6-2WjeY0q-QswxK4_tbg');

$rs=$db->query('select * from view_event_info');

/*$myarray=array();
while ($row = $rs->fetchRow()) {
	$myarray[]=$row;
}*/

$t->assign('start', '600 W Kagy Blvd, Bozeman, MT');
$t->assign('destination', 'Denver, CO');

$t->display('directions.tpl');

?>