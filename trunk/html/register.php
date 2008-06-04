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
	$row_array[$row[0]]=$row[1];
}
$t->assign('data',$row_array);
//print_r($row_array);
$t->display('register.tpl');
?>