<?php

require_once('set_env.php');
require_once('handleQuery.php');
require "../pdf/class.ezpdf.php";

//$db = mysqli_connect("localhost", "root", "admin", "yatss");

$doc =& new Cezpdf();							// Create new instance of Cezpdf
$doc->selectFont("../pdf/fonts/Helvetica.afm");		// Set font for use in PDF
$orderId = 2;//$_POST['transactionId'];

$result = executeQuery("SELECT transactions.id as 'Transaction Id', events.name, events.date, ticket_type.type, transactions.number_of_tickets as quantity, ticket_price.price, transactions.number_of_tickets*ticket_price.price as total FROM events, ticket_type, transactions, ticket_price, orders WHERE transactions.order_id = orders.id AND transactions.event_id = events.id AND transactions.ticket_type_id = ticket_type.id AND ticket_price.ticket_type_id = ticket_type.id AND ticket_price.event_id = events.id AND orders.id = $orderId");


$now = getDate();
$formatdate = "$now[mon]-$now[mday]-$now[year] , $now[hours]:$now[minutes]:$now[seconds]"; 

$grandTotal = 0;
for($i=0; $i<count($result); $i++)
{
	$grandTotal += $result[$i]['total'];
}

$doc->ezText("<b>Sales Receipt</b>", 22, array("justification" => "right"));
$doc->ezSetDy(-3);
$doc->ezText($formatdate, 9, array("justification" => "right"));
$doc->ezSetDy(-10);
$doc->ezText("<b>Project YATß</b>", 16, array("justification" => "left"));
$doc->ezSetDy(-5);
$doc->ezText("4434 Leipzigstrasse", 10, array("justification" => "left"));
$doc->ezSetDy(-3);
$doc->ezText("Bozeman, MT 59715", 10, array("justification" => "left"));
$doc->ezSetDy(-3);
$doc->ezText("(406) 473-8834", 10, array("justification" => "left"));

$doc->ezSetDy(-25);
$doc->ezText("<b>Your Order Id:</b>      ".$orderId, 10, array("justification" => "left"));
$doc->ezSetDy(-12);
$doc->ezText("<b>Your Tickets:</b>", 10, array("justification" => "left"));
$doc->ezSetDy(-15);
$doc->ezTable($result);
$doc->ezSetDy(-10);

$doc->ezSetDy(-10);
$doc->ezText("<b>Grand Total:                                         																																								      														 													          																	    		      $".$grandTotal."</b>", 10, array("justification" => "left"));



$doc->ezStream();


?>