<?php
require_once('set_env.php');
require('basket_check.php');

cancelOrder();

// Return error that shopping cart has been deleted
header("Location:$web_root?page=message_page&message_id=51");
exit;

?>