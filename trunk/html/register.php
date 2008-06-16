<?php
require_once('set_env.php');
require_once('handleQuery.php');

if(!$a->checkAuth())
{
	// TODO use handleQuery!!
	$res =& $db->query('SELECT id, name FROM us_states');
	
	// Always check that result is not an error
	if (PEAR::isError($res)) {
		die($res->getMessage());
	}
	
	$row_array=array();
			
	while (($row = $res->fetchRow())) {
			$row_array[$row['id']]=$row['name'];
	}
	
	//print_r($row_array);
	
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
		}
	}
	
	//print_r($row_array);
	//$t->display('register.tpl');
	
	}
?>
