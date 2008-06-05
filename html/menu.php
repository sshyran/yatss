<?php
require_once('set_env.php');
//require_once('login.php');

$links = array('0' => 'zero', '1'=> 'one');
$t->assign('links',$links);
$t->display('menu.tpl');
?>