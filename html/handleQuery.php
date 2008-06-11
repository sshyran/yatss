<?php
require_once('set_env.php');
/**
 * Handle all the DB queries using prepared statements or sql string (without parameters)
 */
function executeQuery($sql, $values=array())
{
	global $db;
	$result=array();
	if(sizeof($values)>0){
		$statement=$db->prepare($sql, MDB2_PREPARE_RESULT);
		$rs=$statement->execute($values);
		$statement->free();
	}
	else {
		$rs=$db->query($sql);
	}

	if(PEAR::isError($rs)) {
	    die('failed... ' . $rs->getMessage());
	}

	while ($row = $rs->fetchRow()) {
		$result[]=$row;
	}
	return $result;
}

?>