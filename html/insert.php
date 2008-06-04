<?php
$require_login=0;
require_once('set_env.php');

$user = $_POST['username'];
$pass1 = $_POST['password1'];
$pass2 = $_POST['password2'];
$firstName = $_POST['firstName'];
$middleName = $_POST['middleName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];

$result =& $db->query("SELECT * FROM users WHERE users.username = '$user'");

// Always check that result is not an error
if (PEAR::isError($result)) 
{
    die($result->getMessage());
}

$row = $result->numRows();

if(!($row == 1 || $row > 1))	// If the username is unique
{
	if($pass1 == $pass2)
	{
			$passhash =  sha1($pass1);
				
			$db->query("LOCK TABLES address WRITE");
			$db->query("INSERT INTO address (address, city, state_id, zip) VALUES ('$address', '$city', '$state', '$zip')");
			$db->query("UNLOCK TABLES");
			
			$db->query("LOCK TABLES users WRITE");
			$db->query("INSERT INTO users (username, password, address_id, firstName, middleName, lastName, email) VALUES ('$user', '$passhash', 1, '$firstName', '$middleName', '$lastName', '$email');");
			$db->query("UNLOCK TABLES");
			header("Location: login.php");
			//$t->display('login.tpl');
	}
}

































/*if($result =& $db->query("SELECT * FROM users WHERE users.username = '$user'"))
{
	// Always check that result is not an error
	if (PEAR::isError($result)) 
	{
    	die($result->getMessage());
	}
	
	$row = $result->numRows();
	
	if(!($row == 1 || $row > 1))
	{
		if($pass1 == $pass2)
		{
			if(ereg("(^[a-zA-Z0-9]+$)", $user) && ereg("(^[a-zA-Z0-9]+$)", $pass1))
			{
				$passhash =  sha1($pass1);
				
				$db->query("LOCK TABLES users WRITE");
				$db->query("INSERT INTO users (username, password) VALUES ('{$user}', '{$passhash}');");
				$db->query("UNLOCK TABLES");
				$t->display('login.tpl');
				//header("Location: login.php?e=3");
			}
			else
			{
				//trigger_error("Invalid username / password during registration.", E_USER_ERROR);
				//mysqli_close($connection);
				//header("Location: register.php?e=3");
			}
		}
		else
		{
			//mysqli_close($connection);
			//header("Location: register.php?e=2");
		}
	}
	else
	{
		//mysqli_close($connection);
		//header("Location: register.php?e=1&name=".$user);
	}
}
*/




?>