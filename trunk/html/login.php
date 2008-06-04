<?php
require_once('set_env.php');
if($a->checkAuth()){
	echo "logged in";
}
else {
	$t->display('login.tpl');
}
?>