<?php
require_once('set_env.php');
require('basket_check.php');

deleteBasket();

header("$web_root?page=message_page&message_id=51");
exit;

?>