<?php
require_once('util.php');

if(isset($_SESSION['shipping_method']) && isset($_SESSION['firstName']) && isset($_SESSION['lastName']) && isset($_SESSION['cctype']) && isset($_SESSION['ccnumber']) && isset($_SESSION['ccmonth']) && isset($_SESSION['ccyear']))
{
	$_SESSION['checkout_step']='checkout_receipt';
	$t->assign('next_step_link',"$web_root");
	
	unset($_SESSION['shipping_method']);
	unset($_SESSION['firstName']);
	unset($_SESSION['lastName']);
	unset($_SESSION['cctype']);
	unset($_SESSION['ccnumber']);
	unset($_SESSION['ccmonth']);
	unset($_SESSION['ccyear']);

	// is returning "1" for testing
	$orderId = confirmOrder();
	$t->assign('orderId', $orderId);
	
	executeQuery("LOCK TABLES events READ, ticket_type READ, transactions READ, ticket_price READ, orders READ");
	
	$transactions = executeQuery("SELECT events.name, events.date, ticket_type.type, transactions.number_of_tickets, ticket_price.price, transactions.number_of_tickets*ticket_price.price as total FROM events, ticket_type, transactions, ticket_price, orders WHERE transactions.order_id = orders.id AND transactions.event_id = events.id AND transactions.ticket_type_id = ticket_type.id AND ticket_price.ticket_type_id = ticket_type.id AND ticket_price.event_id = events.id AND orders.id = ?", array($orderId));
	executeQuery("UNLOCK TABLES");
	
	$t->assign('data', $transactions);
	
	// Calculate the Grand Total
	$grand_total = 0;
	for($i=0; $i<count($transactions); $i++)
	{
		$grand_total += $transactions[$i]['total'];
	}
	$t->assign('grand_total', $grand_total);
	
}
else
{
	header("location:$web_root?page=message_page&message_id=5");
	exit;
}

?>