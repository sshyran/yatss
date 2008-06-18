<?php

require_once('set_env.php');

// Assign google api code to template so maps work
$t->assign('apicode', 'ABQIAAAAiPmrNOEsg_2WGQEptsQ74xRqe_YL2A_tCvv-cWUMY_6tKsmF6xSrW0kISt6-2WjeY0q-QswxK4_tbg');

// Get start and destination from receipt page

if(isset($_GET['destination']) && isset($_GET['start']))
{
$t->assign('type', 2);
$destination = $_GET['destination'];
$start = $_GET['start'];

// Assign start and destination to template
$t->assign('start', $_GET['start']);
$t->assign('destination', $_GET['destination']);
}
else
{
	$t->assign('type',1);
	if(true)
	{
		//$t->assign('start',$_GET['start']);
		$t->assign('start','600 W Kagy Blvd, Bozeman, MT');
	}
}

$t->display('directions.tpl');

?>