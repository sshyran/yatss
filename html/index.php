<?php
require_once('set_env.php');
//require_once('login.php');
$t->assign('title', 'yatss');
$t->display('header.tpl');
$t->assign('tpl_name','topbar');

require_once('login.php');
//$t->assign('tpl_name_menu','menu');
//require_once('menu.php');
//$t->display('menu.php')
$t->display('index.tpl');

//print_r($_SESSION); xxx

$t->display('footer.tpl');
?>