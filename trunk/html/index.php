<?php
require_once('set_env.php');
$t->assign('title', 'yatss');

$tplList=array('header','topbar', 'menu', 'login');

require_once('menu.php');
require_once('login.php');

if (isset($_REQUEST['page']) && in_array(($page=$_REQUEST['page']), $valid_pages) ){
	require_once("$page.php");
	$tplList[]=$page;
} else{
	require_once('events.php');
	$tplList[]='events';
}

$tplList[]='footer';
$t->assign('tplList',$tplList);
$t->display('index.tpl');
echo "<pre>";
print_r($_SESSION);
?>