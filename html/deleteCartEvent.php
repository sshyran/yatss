<?php
require_once('set_env.php');
require_once('handleQuery.php');

if(isset($_GET['event_id']) && isset($_GET['ticket_type']) && isset($_GET['number_of_tickets']) && isset($_GET['basket_id']) && $a->getAuth())
{
	$eventid = $_GET['event_id'];
	$basketid = $_GET['basket_id'];
	$ticket_type_id = $_GET['ticket_type'];
	$number_of_tickets = $_GET['number_of_tickets'];
	$user_id = $_SESSION['userid'];
	
	/*echo("event_id : ".$eventid."<br/>");
	echo("ticket_type_id : ".$ticket_type_id."<br/>");
	echo("number_of_tickets : ".$number_of_tickets."<br/>");
	echo("userid : ".$user_id."<br/>");*/
	
	// Delete event from cart
	$tempA = array($basketid);
	//executeQuery("DELETE FROM basket WHERE basket.user_id = ? AND basket.event_id = ? AND basket.ticket_type_id = ?", $tempA);
	executeQuery("DELETE FROM basket WHERE basket.id = ?", $tempA);
	
	// // Update number of tickets available
	// $tempB = array($number_of_tickets, $eventid, $ticket_type_id);
	// executeQuery("UPDATE tickets SET tickets.available_tickets = tickets.available_tickets+? WHERE tickets.event_id = ? AND tickets.ticket_type_id = ?", $tempB);
	
	$address = $web_root."?page=cart";
	//echo $address;
	header("Location: $address");
}

?>