<?php
require_once('set_env.php');
$t->assign('tpl_name_login','login');
if($a->getAuth()){
	if (!session_is_registered('username') && !session_is_registered('userid')) {
		setSessionVars();
	}
}
else {
	session_unregister ('username');
	session_unregister ('userid');
	session_unregister ('is_admin');
}

/**
 * sets the session variables needed for login
 *
 */

function setSessionVars()
{
	global $a;
	session_register('username');
	$_SESSION['username']=$a->getUserName();
	session_register('userid');
	$uid=getUID();
	if (isAdmin($uid)) {
		session_register('is_admin');
		$_SESSION['is_admin']=1;
	}
	$_SESSION['userid']=$uid;
	
}

function isAdmin($uid)
{
	require_once('util.php');
	$var[]=$uid;
	$rs=executeQuery('select id from users, admin_table where users.id = ? and users.id = admin_table.user_id',$var);
	return count($rs)>0;
	
}

function getUID()
{
	global $a;
	require_once('util.php');
	$var[]=$a->getUserName();
	$rs=executeQuery('select id from users where username = ?',$var);
	return $rs[0]['id'];
}

$gom_url = "http://chart.apis.google.com/chart?chs=150x100&cht=gom&chd=t:50&chl=Tickets%20Available&chco=eeeeee,607955";
$t->assign('gom_url',$gom_url);

//$t->display('index.tpl');
?>