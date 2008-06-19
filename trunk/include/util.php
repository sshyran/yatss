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
			deleteInvalidTransactions($rs);
			return true;
		}
	}
	return false;
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
	$rs=executeQuery($sql,$x);
}

/**
 * deletes the shopping cart for current user (called on "cancel order")
 * 
 */
function cancelOrder()
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

function resetTimer()
{
	global $a;
	if($a->checkAuth()){
		$user_id=$_SESSION['userid'];
		// this section can be used to distinguish between transactions, which have already been in checkout process
/*		$rs=executeQuery('select id from basket where user_id=?',array($user_id));
		foreach ($rs as $key => $value) {
			$rs[$key]=$value['id'];
		}
		if (isset($_SESSION['current_basket'])) {
			$diffarray=array_diff($rs,$_SESSION['current_basket']);
		}
		$_SESSION['current_basket']=$rs;
		$basket_ids=implode(',', $diffarray);
		$sqlappend=(count($diffarray))?"and id in ($basket_ids)":'';
		$sql='update basket set start_of_transaction = CURRENT_TIMESTAMP where user_id = ? ' .$sqlappend; */
		$sql='update basket set start_of_transaction = CURRENT_TIMESTAMP where user_id = ?';
		executeQuery('lock tables basket write');
		executeQuery($sql, array($user_id));
		executeQuery('unlock tables');
	}
}

function deleteFromBasket($basketId)
{
	global $a;
	if($a->checkAuth()){
		$user_id=$_SESSION['userid'];
		executeQuery('lock tables basket write');
		executeQuery('delete from basket where id=? and user_id=?', array($basketId,$user_id));
		executeQuery('unlock tables');
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


?>