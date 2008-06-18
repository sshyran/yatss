<?php
//require_once('set_env.php');


if ($a->checkAuth()) {
	$valid_admin_pages=array('summary', 'statistics','users');
	$adminmenulinks=array();
	foreach ($valid_admin_pages as  $value) {
		$adminmenulinks[$value]="$web_root?page=admin&amp;step=$value";
	}
	$t->assign('with_links',1);
	$t->assign('submenu',$adminmenulinks);
}
?>