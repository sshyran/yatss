<?php

require_once('set_env.php');
require_once('handleQuery.php');
require_once('basket_check.php');

basketCheck();

//$t->assign('webroot', $web_root.""); 

if(isset($_REQUEST['event_id']) && isset($_REQUEST['ticket_type']) && isset($_REQUEST['number_of_tickets']))
{
	$sentValues = array();
	$sentValues[0] = $_REQUEST['event_id'];
	$sentValues[1] = $_REQUEST['ticket_type'];
	
	// Check if there are any tickets left
	if($result = executeQuery("SELECT view_event_info.event_id FROM view_event_info WHERE event_id = ? AND ticket_type_id = ? AND available_tickets > 0", $sentValues))
	{
		if(sizeof($result) == 1)
		{
			// Check to see if there are already tickets of the same type in the cart
			$tempA = array($_REQUEST['event_id'], $_REQUEST['ticket_type']);
			$result = executeQuery("SELECT basket.id FROM basket WHERE basket.event_id = ? AND basket.ticket_type_id = ?", $tempA);
			if(count($result) > 0)
			{
				//echo 'Here in the method';
				$tempB = array($_REQUEST['number_of_tickets'], $_REQUEST['event_id'], $_REQUEST['ticket_type']);
				executeQuery("UPDATE basket SET number_of_tickets = number_of_tickets+? WHERE event_id = ? AND ticket_type_id = ?", $tempB);
			}
			else
			{
			// Insert into Basket
			$insertArray = array($_REQUEST['event_id'], $_SESSION['userid'], $_REQUEST['ticket_type'], $_REQUEST['number_of_tickets']);
			executeQuery("INSERT INTO basket (event_id, user_id, ticket_type_id, number_of_tickets) VALUES (?, ?, ?, ?)", $insertArray);
			}
			
			/*// Update available_tickets in tickets
			$updateArray = array($_REQUEST['number_of_tickets'], $_REQUEST['event_id'], $_REQUEST['ticket_type']);
			executeQuery("UPDATE tickets SET available_tickets = available_tickets-? WHERE tickets.event_id = ? AND tickets.ticket_type_id = ?", $updateArray);*/
		}
	}
	else {echo 'There are no more tickets left!';}
	
}

$values[] = array();
$values['id'] = '1';
$myarray=executeQuery('SELECT events.id as event_id, events.name, events.date, ticket_type.price, ticket_type.id as ticket_type_id, ticket_type.type, basket.number_of_tickets, basket.id, basket.number_of_tickets*ticket_type.price as total FROM events, ticket_type, basket WHERE basket.event_id = events.id AND ticket_type.id = basket.ticket_type_id AND basket.user_id = ? ORDER BY events.name ASC;',$values['id']);


$t->assign('data',$myarray);

//$t->display('cart.tpl');

?>
