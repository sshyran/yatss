<?php
//require_once('set_env.php');

$valid_pages=array('events', 'history','cart');
$valid_pages_browser=array('events');
$links=array();

if ($a->checkAuth()) {
	foreach ($valid_pages as  $value) {
		$links[$value]="$web_root?page=$value";
	}
}
else {
	foreach ($valid_pages_browser as  $value) {
		$links[$value]="$web_root?page=$value";
	}	
}
$t->assign('links',$links);
?>