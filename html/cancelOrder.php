<?php
require_once('../include/set_env.php');
//require('util.php');

cancelOrder();

// Return error that shopping cart has been deleted
header("Location:$web_root?page=message_page&message_id=51");
exit;

?>