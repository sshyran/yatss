<?php
$require_login=0;
require_once('set_env.php');

$res =& $db->query('SELECT id, name FROM us_states');

// Always check that result is not an error
if (PEAR::isError($res)) {
    die($res->getMessage());
}

$row_array=array();

while (($row = $res->fetchRow())) {
//	print_r($row);
	$row_array[]=$row;
	$t->assign('data',$row_array);
}

$t->display('register.tpl');

?>