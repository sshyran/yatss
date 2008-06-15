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
	global $db;
	$userid=$_SESSION['userid'];
	$vars=array($userid);
	$sql='lock tables orders write';
	executeQuery($sql);
	$sql='insert into orders (user_id) values(?)';
	executeQuery($sql, $vars);
	$orderid=$db->lastInsertID('orders','id');
//	$sql='unlock tables';
//	executeQuery($sql);
	$vars=array($orderid);
	$sql='lock tables transactions write, orders read, basket read, ticket_price read';
	executeQuery($sql);
	$vars[]=$userid;
	$sql='insert into transactions (order_id, event_id, ticket_type_id, number_of_tickets, transaction_total) select orders.id, basket.event_id, basket.ticket_type_id, basket.number_of_tickets, ticket_price.price*basket.number_of_tickets from orders, basket, ticket_price where orders.id=? and basket.user_id=? and basket.event_id=ticket_price.event_id and ticket_price.ticket_type_id=basket.ticket_type_id';
	executeQuery($sql, $vars);
	$sql='lock tables basket write';
	executeQuery($sql);
	$vars=array($userid);
	$sql='delete from basket where user_id = ?';
	executeQuery($sql, $vars);
	return $orderid;
}



//basketCheck();
?>