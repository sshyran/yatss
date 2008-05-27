<?php

// put full path to Smarty.class.php
require('/Users/roll/Sites/smarty_lib/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty_dir_prefix='../../smarty/';

$smarty->template_dir = $smarty_dir_prefix.'templates';
$smarty->compile_dir = $smarty_dir_prefix.'templates_c';
$smarty->cache_dir = $smarty_dir_prefix.'cache';
$smarty->config_dir = $smarty_dir_prefix.'configs';

$smarty->assign('name', 'yatss');
$smarty->assign('xxx','qqqq');
$smarty->display('index.tpl');

?>
