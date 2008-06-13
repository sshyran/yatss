<?php

require_once('set_env.php');
require_once('handleQuery.php');
require_once('basket_check.php');


// Only allow registered users to see the cart
if($a->checkAuth())
{
	basketCheck();
	
	if(isset($_REQUEST['event_id']) && isset($_REQUEST['ticket_type']) && isset($_REQUEST['number_of_tickets']))
	{
	
		$eventid = $_REQUEST['event_id'];
		$ticket_type = $_REQUEST['ticket_type'];
		$number_of_tickets = $_REQUEST['number_of_tickets'];
		
		// Make sure that the GET values are valid types
		if(!ereg("(^[0-9]+$)",$eventid) || (!ereg("(^[0-9]+$)",$ticket_type)) || (!ereg("(^[0-9]+$)",$number_of_tickets)))
		{
			header("Location:$web_root");
		}
		
		
		// Check if there are any tickets left
		$sentValues = array($_REQUEST['event_id'], $_REQUEST['ticket_type']);		
		if($result = executeQuery("SELECT view_event_info.event_id, view_event_info.available_tickets FROM view_event_info WHERE event_id = ? AND ticket_type_id = ? AND available_tickets > 0", $sentValues))
		{
			if(sizeof($result) == 1)
			{
				/*// Check to see if there are already tickets of the same type in the cart
				$tempA = array($_REQUEST['event_id'], $_REQUEST['ticket_type']);
				$result = executeQuery("SELECT basket.id FROM basket WHERE basket.event_id = ? AND basket.ticket_type_id = ?", $tempA);
				if(count($result) > 0)
				{
					//echo 'Here in the method';
					$tempB = array($_REQUEST['number_of_tickets'], $_REQUEST['event_id'], $_REQUEST['ticket_type']);
					executeQuery("UPDATE basket SET number_of_tickets = number_of_tickets+? WHERE event_id = ? AND ticket_type_id = ?", $tempB);
				}
				else
				{*/
				
				// Check to see if the user is buying an allowed amount of tickets
				if($number_of_tickets <= $result[0]['available_tickets'])
				{
				
					// Insert into Basket
					$insertArray = array($_REQUEST['event_id'], $_SESSION['userid'], $_REQUEST['ticket_type'], $_REQUEST['number_of_tickets']);
					executeQuery("INSERT INTO basket (event_id, user_id, ticket_type_id, number_of_tickets) VALUES (?, ?, ?, ?)", $insertArray);
				}
				else
				{
					echo("You can't buy that many tickets... there is not enough!");
				}
				//}
				
				/*// Update available_tickets in tickets
				$updateArray = array($_REQUEST['number_of_tickets'], $_REQUEST['event_id'], $_REQUEST['ticket_type']);
				executeQuery("UPDATE tickets SET available_tickets = available_tickets-? WHERE tickets.event_id = ? AND tickets.ticket_type_id = ?", $updateArray);*/
			}
		}
		else {echo 'There are no more tickets left!';}
		
	}
	
	$values[] = array();
	$values['id'] = $_SESSION['userid'];
	$myarray=executeQuery('SELECT events.id as event_id, events.name, events.date, ticket_type.price, ticket_type.id as ticket_type_id, ticket_type.type, basket.number_of_tickets, basket.id, basket.number_of_tickets*ticket_type.price as total FROM events, ticket_type, basket WHERE basket.event_id = events.id AND ticket_type.id = basket.ticket_type_id AND basket.user_id = ? ORDER BY events.name ASC;',$values['id']);
	
	
	$t->assign('data',$myarray);
	
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
