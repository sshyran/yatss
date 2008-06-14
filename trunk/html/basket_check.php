<?php
require_once('set_env.php');
require_once('handleQuery.php');

function basketCheck()
{
	global $a;
	if($a->checkAuth()){
		if (!isset($_SESSION['userid'])) {
			header("location:$web_root?page=message_page&message_id=3");
			exit;
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
	return $rs[0]['basket_timer'];
}



function deleteInvalidTransactions($transactions)
{
	$x=array();
	$suffix='';
	$sql='delete from basket where id= ? ';
	foreach ($transactions as $key => $value) {
		$x[]=$value['id'];
		$suffix .= $key=0?'':' or id= ?';
	}
//	print_r($sql.$suffix);
	$rs=executeQuery($sql,$x);
}

/**
 * deletes the shopping cart for current user (called on "cancel order")
 * 
 */
function deleteBasket()
{
		global $a;
		if($a->checkAuth()){
			if (!isset($_SESSION['userid'])) {
				header("location:$web_root?page=message_page&message_id=3");
				exit;
			}
			$vars[]=$_SESSION['userid'];
			$sql='lock table basket write';
			$rs=executeQuery($sql, array());
			$sql='delete from basket where user_id=?';
			$rs=executeQuery($sql, $vars);
			$sql='unlock tables';
			$rs=executeQuery($sql, array());
		}
}


/**
 * 	moves transactions from the basket to the orders+ transactions
 */

function confirmOrder()
{
	// TODO implement it
	return 1;
}



//basketCheck();
?>