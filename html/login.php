<?php
require_once('set_env.php');
$t->assign('showLogin',($a->getAuth()!=1)?1:0);
$t->assign('tpl_name_login','login');
if($a->getAuth()){
	session_register('username');
	$_SESSION['username']=$a->getUserName();
}
else {
	session_unregister ('username');
}

//$t->display('index.tpl');
?>