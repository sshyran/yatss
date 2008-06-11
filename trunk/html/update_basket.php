<?php
require_once('setenv.php');
if ($a->checkAuth()) {
	if (isset($_REQUEST['ticketType']) && isset($_REQUEST['addItem'])) {
		$ticketType=$db->escape($_REQUEST['ticketType']);
		$numOfTickets=$db->escape($_REQUEST['addItem']);
		//adding request to basket table
		$sql='';
	}
}




?>