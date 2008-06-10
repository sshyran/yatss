<?php
require_once('setenv.php');
if (isset($ticketType=$_REQUEST['ticketType']) && isset($numOfTickets=$_REQUEST['numOfTickets'])) {
	$ticketType=$db->escape($ticketType);
	$numOfTickets=$db->escape($numOfTickets);
	
}




?>