<?php
require_once('set_env.php');
require_once('util.php');

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
	
	
	// Generate data to populate map and driving directions
	if(isset($_SESSION['userid']))
	{
		$user_address = executeQuery("SELECT address.address, address.state_id, address.city, address.zip FROM address, users WHERE users.id = ? AND users.address_id = address.id", array($_SESSION['userid']));
		
		$destination = urlencode($user_address[0]['address'].", ".$user_address[0]['city'].", ".$user_address[0]['state_id']);
		$t->assign('start', $destination);
	}
	$start = urlencode($ass_array['address'].", ".$ass_array['city'].", ".$ass_array['state_id']);
	
	$t->assign('destination', $start);
	$t->assign('apicode', 'ABQIAAAAiPmrNOEsg_2WGQEptsQ74xRqe_YL2A_tCvv-cWUMY_6tKsmF6xSrW0kISt6-2WjeY0q-QswxK4_tbg');
	
	//print_r($ttype);
	
	// Generate the percent-available-ticket meter (Google Chart)
	$cdata = executeQuery("SELECT sum(view_event_info.available_tickets) as available, sum(tickets.num_of_tickets) as total FROM view_event_info, tickets, ticket_type WHERE view_event_info.event_id = ? AND view_event_info.event_id = tickets.event_id AND ticket_type.id = tickets.ticket_type_id AND view_event_info.ticket_type = ticket_type.type",array($eventid));
	
	$percentageRemaining = ($cdata[0]['available'] / (($cdata[0]['total'])?($cdata[0]['total']):1))*100;
	
	$gom_url = "http://chart.apis.google.com/chart?chs=150x100&amp;cht=gom&amp;chd=t:".$percentageRemaining."&amp;chco=eeeeee,607955";
	$t->assign('gom_url',$gom_url);
	
}
else
{
	$t->assign('error', WRONG_PARAMETER);
}

//$t->display('tickets.tpl');
?>
