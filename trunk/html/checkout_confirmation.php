<?php
require_once('../pear/Validate/Finance/CreditCard.php');

unset($_SESSION['shipping_e']);
unset($_SESSION['name_e']);
unset($_SESSION['cc_e']);

if(!isset($_POST['shipping_method']))
{
	$_SESSION['shipping_e'] = 1;
}
if(!isset($_POST['firstName']) || !isset($_POST['lastName']) || $_POST['lastName'] == NULL || $_POST['firstName'] == NULL)
{
	$_SESSION['name_e'] = 1;
}
if(!isset($_POST['cctype']) || !isset($_POST['ccnumber']) || !isset($_POST['ccmonth']) || !isset($_POST['ccyear']) || $_POST['ccnumber'] == NULL)
{
	$_SESSION['cc_e'] = 1;
}

if(!(isset($_SESSION['shipping_e']) ||isset($_SESSION['name_e']) || isset($_SESSION['cc_e'])))
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
		
		// Print shipping method to confirmation page
		if($shipping_method == "mail")
		{
			$t->assign('shipping_method', 'Mail tickets to physical address');
		}
		else
		{
			$t->assign('shipping_method', 'Electronic Delivery');
		}
		
		$result = executeQuery("SELECT users.firstName as 'First Name', users.lastName as 'last name', address.address, address.city, address.state_id as 'state', address.zip FROM users, address WHERE users.address_id = address.id AND users.id = ?", array($_SESSION['userid']));
		
		$t->assign('address', $result[0]['address']);
		$t->assign('firstName', $firstName);
		$t->assign('lastName', $lastName);
		$t->assign('cctype', $cctype);
		$t->assign('ccnumber', $ccnumber);
		$t->assign('ccmonth', $ccmonth);
		$t->assign('ccyear', $ccyear);
	}
}
else
{
	$address = $_SERVER['HTTP_REFERER'];
	$_SESSION['checkout_error'] = 1;	
	header("Location: $address");
	
	//header("Location: $web_root&page=checkout");
}
?>