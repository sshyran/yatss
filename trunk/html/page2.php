<?
$require_login=0;
require_once 'set_env.php';

//$t->assign('data', $db->query('Select nickname, password from users'));
// Proceed with a query...
$res =& $db->query('SELECT firstname, lastname FROM users');

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

$t->display('page2.tpl');
?>