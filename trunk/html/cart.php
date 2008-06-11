	<?php

require_once('set_env.php');
require_once('handleQuery.php');
//require('basket_fns.php');

$values[] = array();
$values['id'] = '1';
$myarray=executeQuery('SELECT events.name, events.date, ticket_type.price, basket.number_of_tickets, basket.id FROM events, ticket_type, basket WHERE basket.event_id = events.id AND ticket_type.id = basket.ticket_type_id AND basket.user_id = ?;',$values['id']);

$t->assign('data',$myarray);

$t->display('cart.tpl');

?>
