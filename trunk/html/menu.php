<?php
require_once('set_env.php');

$links=array();

if ($a->checkAuth()) {
	$links = array_merge($links, populateArray($web_root,$valid_pages_registered));
	if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']==1) {
		$links = array_merge($links, populateArray($web_root,$valid_pages_admin));
	}
}
else {
	$links = array_merge($links, populateArray($web_root,$valid_pages_browser));
}
$t->assign('links',$links);

function populateArray($prefix, $array)
{
	
	foreach ($array as  $value) {
		$links[$value]="$prefix?page=$value";
	}
	return $links;
}


?>