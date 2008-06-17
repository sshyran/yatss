<?php
require_once('set_env.php');
require_once('util.php');

// Set status variable depending on user status (logged in / not)
/*if($a->getAuth()) { $status = 'true'; }
else{ $status = 'false';}

$t->assign('loggedin',$status);*/

// If the event id has been sent as a parameter
if(isset($_GET['event_id']))
{
	$eventid = $_GET['event_id'];
	$t->assign('eid', $eventid);
	$t->assign('number_allowed', $purchase_number);
	$t->assign('webroot', $web_root);
	$eventArray = array($eventid);
	$result = executeQuery("SELECT events.date, events.name, events.description, address.address, address.city, address.state_id, address.zip FROM events, address WHERE events.id = ? AND events.address_id = address.id", $eventArray);
	
	// Send event variables in template
	$ass_array = array();
	$ass_array = $result[0];
	
	$t->assign('event',$ass_array['name']);
	$t->assign('descr', $ass_array['description']);
	
	$t->assign('date', $ass_array['date']);
	
	$t->assign('address', $ass_array['address']);
	$t->assign('city', $ass_array['city']);
	$t->assign('state', $ass_array['state_id']);
	$t->assign('zip', $ass_array['zip']);
	
	// Get ticket type information from database
	$tarray = array($eventid);
	$ttype = executeQuery("SELECT ticket_type.type, ticket_type.id as ticket_type_id, tp.price, tickets.available_tickets, tickets.event_id FROM ticket_type, tickets, ticket_price as tp WHERE tickets.ticket_type_id = ticket_type.id AND tickets.event_id = ? and tp.event_id = tickets.event_id and tp.ticket_type_id=ticket_type.id", $tarray);
	
	$t->assign('ticket_array_size', count($ttype));
	
	for($j=0; $j<count($ttype); $j++)
	{
		$row = $ttype[$j];
		$at = $row['available_tickets'];
		$availableArray = array();
		// Generate array for ticket drop down list
		if($ttype[$j]['available_tickets'] < $purchase_number)
		{
			for($m=1; $m<=$at; $m++)
			{
				$availableArray[$m] = $m;
			}
		}
		else
		{
			for($k=1; $k<=$purchase_number; $k++)
			{
				$availableArray[$k] = $k;
			}
		}
		$ttype[$j]['available_tickets_array'] = $availableArray;
		//print_r($ttype);
	}
	
	$t->assign('ticketdata', $ttype);
	
	$location = urlencode($ass_array['address'].", ".$ass_array['city'].", ".$ass_array['state_id']);
	$t->assign('location', $location);
	$t->assign('apicode', 'ABQIAAAAiPmrNOEsg_2WGQEptsQ74xRqe_YL2A_tCvv-cWUMY_6tKsmF6xSrW0kISt6-2WjeY0q-QswxK4_tbg');
	
	//print_r($ttype);
}
else
{
	$t->assign('error', WRONG_PARAMETER);
}

//print_r($result[0]);

//$t->display('tickets.tpl');
?>
