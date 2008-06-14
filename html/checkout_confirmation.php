<?php
require_once('../pear/Validate/Finance/CreditCard.php');

if(isset($_POST['shipping_method']) && isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['cctype']) && isset($_POST['ccnumber']) && isset($_POST['ccmonth']) && isset($_POST['ccyear']))
{
	$t->assign('pageset', 'true');
	$t->assign('next_step_link',"$web_root?page=checkout&step=receipt");
	
	
	/* --------- Variables from POST data -------- */
	$shipping_method = $_POST['shipping_method'];
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$cctype = $_POST['cctype'];
	$ccnumber = $_POST['ccnumber'];
	$ccmonth = $_POST['ccmonth'];
	$ccyear = $_POST['ccyear'];
	/* -------------------------------------------- */
	
	if(ereg("(^[a-zA-Z0-9]+$)", $firstName) && ereg("(^[a-zA-Z0-9]+$)", $lastName) && Validate_Finance_CreditCard::number($ccnumber, $cctype) /* && ereg(ccnumber) && ereg(ccmonth) && ereg(ccyear)*/)
	{
	
	$basket = executeQuery('SELECT events.id as event_id, events.name, events.date, ticket_type.price, ticket_type.id as ticket_type_id, ticket_type.type, basket.number_of_tickets, basket.id, basket.number_of_tickets*ticket_type.price as total FROM events, ticket_type, basket WHERE basket.event_id = events.id AND ticket_type.id = basket.ticket_type_id AND basket.user_id = ? ORDER BY events.name ASC;', array($_SESSION['userid']));
	
	$t->assign('data', $basket);
	}
}
else
{
	$address = $_SERVER['HTTP_REFERER'] . "&e=1";
	header("Location: $address");
}
?>