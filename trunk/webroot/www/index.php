<?php
error_reporting(E_ALL);
// put full path to Smarty.class.php
require('/Users/roll/Sites/smarty_lib/libs/Smarty.class.php');

$smarty = new Smarty();
$smarty->debugging = true;
$smarty_dir_prefix='../../smarty/';

$smarty->template_dir = $smarty_dir_prefix.'templates';
$smarty->compile_dir = $smarty_dir_prefix.'templates_c';
$smarty->cache_dir = $smarty_dir_prefix.'cache';
$smarty->config_dir = $smarty_dir_prefix.'configs';
//include('login.php');


$smarty->display('index.tpl');

?>
