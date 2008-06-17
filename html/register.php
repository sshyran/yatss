<?php
require_once('set_env.php');
require_once('util.php');

if(!$a->checkAuth())
{
	$res =executeQuery('SELECT id, name FROM us_states');
	$row_array=array();
	foreach ($res as $key => $value) {
		$row_array[$value['id']]=$value['name'];
	}
	$t->assign('stateOptions', $row_array);
	
	if(isset($_GET['e']))
	{
		$errorcode = $_GET['e'];
		
		switch($errorcode)
		{
			case 1:
				$t->assign('errormessage', 'Your username is not unique in the database');
				break;
			case 2:
				$t->assign('errormessage', 'Passwords must match!');
				break;
			case 3:
				$t->assign('errormessage', 'Username is invalid');
				break;
			case 4:
				$t->assign('errormessage', 'Invalid address, please enter a correct Address');
				break;
			case 5:
				$t->assign('errormessage', 'Invalid city, please enter a correct city');
				break;
			case 6:
				$t->assign('errormessage', 'Invalid state, please enter a correct state');
				break;
			case 7:
				$t->assign('errormessage', 'Please enter a valid zip code');
				break;
			case 8:
				$t->assign('errormessage', 'Incorrect Name - only alphabetic characters allowed');
				break;
			case 9:
				$t->assign('errormessage', 'Please enter a valid email address');
				break;
			default:
				$t->assign('errormessage', 'Unknown error. Please try again');
				break;
		}
	}	
}
?>
