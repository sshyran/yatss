<?php
require_once('set_env.php');
require_once('handleQuery.php');

function basketCheck()
{
	global $a;
	if($a->checkAuth()){
		if (!isset($_SESSION['userid'])) {
			die ("user_id has to be stored in session!!!");
		}
		$vars[]=$_SESSION['userid'];
		$vars[]=getBasketTimer();
		$sql='select id , start_of_transaction from basket where user_id = ? and start_of_transaction < date_sub(CURRENT_TIMESTAMP, interval ? second)';
		$rs=executeQuery($sql, $vars);
		if (count($rs)>0) {
//			echo "I will delete!!!<pre>";
//			print_r($rs);
			deleteInvalidTransactions($rs);
		}
	}
}



function getBasketTimer()
{
	$sql='select basket_timer from config where id=1';
	$rs=executeQuery($sql);
	return $rs[0];
}



function deleteInvalidTransactions($transactions)
{
	$sql='delete from basket where id = ?';
	foreach ($transactions as $key => $value) {
		$x[]=$value['id'];
		$rs=executeQuery($sql,$x);
		unset($x);
	}
}



basketCheck();
?>