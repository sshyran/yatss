<?php
require_once('set_env.php');
$t->assign('title', 'yatss');

// populate the template list
$tplList=array('header','topbar', 'login', 'menu');
$tplList[]=(isset($_REQUEST['page'])&&in_array(($page=$_REQUEST['page']),$valid_pages))?$page:'events';
$tplList[]='footer';

// include needed files
foreach ($tplList as $value) {file_exists($file="$value.php")?require_once($file):'';}

// generate template
$t->assign('tplList',$tplList);
$t->display('index.tpl');

// debug section
if ($DEBUG) {
	echo "<pre>";
	echo "tplList=";
	print_r($tplList);
	echo "session=";
	print_r($_SESSION);
	print_r($_SERVER);
}
?>