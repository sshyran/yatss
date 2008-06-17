<?php
//require_once('set_env.php');


if ($a->checkAuth()) {
	$valid_admin_pages=array('summary', 'event_statistics','users');
	$links=array();
	foreach ($valid_admin_pages as  $value) {
		$links[$value]="$web_root?page=admin&amp;step=$value";
	}
	$t->assign('admin_links',$links);
}
?>