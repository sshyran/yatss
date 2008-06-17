<?php

require_once('set_env.php');
require_once('util.php');


// Only allow registered users to see the cart
if($a->checkAuth())
{
	if (basketCheck()) {
		header("location:$web_root?page=message_page&message_id=6");
		exit;
	}
	if(isset($_REQUEST['event_id']) && isset($_REQUEST['ticket_type']) && isset($_REQUEST['number_of_tickets']))
	{
	
		$eventid = $_REQUEST['event_id'];
		$ticket_type = $_REQUEST['ticket_type'];
		$number_of_tickets = $_REQUEST['number_of_tickets'];
		
		// Make sure that the GET values are valid types
		if(!ereg("(^[0-9]+$)",$eventid) || (!ereg("(^[0-9]+$)",$ticket_type)) || (!ereg("(^[0-9]+$)",$number_of_tickets)) || ($number_of_tickets <= 0))
		{
			header("location:$web_root?page=message_page&message_id=2");
			exit;
		}
		
		
		// Check if there are any tickets left
		$sentValues = array($_REQUEST['event_id'], $_REQUEST['ticket_type']);		
		if($result = executeQuery("SELECT view_event_info.event_id, view_event_info.available_tickets FROM view_event_info WHERE event_id = ? AND ticket_type_id = ? AND available_tickets > 0", $sentValues))
		{
			if(sizeof($result) == 1)
			{				
				// Check to see if the user is buying an allowed amount of tickets
				if($number_of_tickets <= $result[0]['available_tickets'])
				{	
					// Insert into Basket
					$insertArray = array($_REQUEST['event_id'], $_SESSION['userid'], $_REQUEST['ticket_type'], $_REQUEST['number_of_tickets']);
					$rs= executeQuery("INSERT INTO basket (event_id, user_id, ticket_type_id, number_of_tickets) VALUES (?, ?, ?, ?)", $insertArray);
				}
				else
				{
					header("location:$web_root?page=message_page&message_id=53");
					exit;
					
					// TODO @ chris move this message to message_page.php
//					echo("You can't buy that many tickets... there is not enough!");
				}
			}
		}
//		else {header("$web_root?page=message_page&message_id=530");}
		
	}
	
	$values[] = array();
	$values['id'] = $_SESSION['userid'];
	$myarray=executeQuery('SELECT events.id as event_id, events.name, events.date, ticket_price.price, ticket_type.id as ticket_type_id, ticket_type.type, basket.number_of_tickets, basket.id, basket.number_of_tickets*ticket_price.price as total FROM events, ticket_type, basket, ticket_price WHERE basket.event_id = events.id AND basket.ticket_type_id = ticket_type.id AND ticket_price.ticket_type_id = ticket_type.id AND ticket_price.event_id = events.id AND basket.user_id = ? ORDER BY events.name ASC;',$values['id']);
	
	$t->assign('data',$myarray);
	$t->assign('arraysize', count($myarray));
	
	$subtotal = 0;
	for($i=0; $i<count($myarray); $i++)
	{
		$subtotal += $myarray[$i]['total'];
	}
	$t->assign('subtotal',$subtotal);


}
else
{
	$t->assign('error',NOT_AUTHORIZED);
}

//$t->display('cart.tpl');

?>
