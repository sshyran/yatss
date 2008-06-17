<?php
require_once('set_env.php');
$t->assign('title', 'Admin area');

if (!($loggedin=$a->checkAuth()) || !isset($_SESSION['is_admin'])) {
	header("location:$web_root?page=message_page&amp;message_id=".($loggedin?4:52));
	exit;
}

require_once('admin_menu.php');
$tplListAdmin[]='admin_menu';

if (isset($_REQUEST['step']) && in_array(($admin_page=$_REQUEST['step']), $valid_admin_pages) ){
	require_once("admin_$admin_page.php");
	$tplListAdmin[]="admin_$admin_page";
} else{
	require_once('admin_summary.php');
	$tplListAdmin[]='admin_summary';
}

$t->assign('tplListAdmin',$tplListAdmin);
?>