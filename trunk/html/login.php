<?php
require_once('set_env.php');
$t->assign('showLogin',($a->getAuth()!=1)?1:0);
$t->assign('tpl_name_login','login');
if($a->getAuth()){
	if (!session_is_registered('username') && !session_is_registered('userid')) {
		session_register('username');
		$_SESSION['username']=$a->getUserName();
		session_register('userid');
		$_SESSION['userid']='1';
	}
}
else {
	session_unregister ('username');
	session_unregister ('userid');
}

//$t->display('index.tpl');
?>