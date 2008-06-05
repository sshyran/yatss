<?php
$require_login=0;
error_reporting(E_ALL);
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
			
			if(ereg("(^[a-zA-Z0-9]+$)", $user))
			{
				if($address != "" || $address != NULL)
				{
					if(ereg("(^[a-zA-Z]+( ?[a-zA-Z]+)*$)", $city))
					{
						if(ereg("(^[a-zA-Z]+( ?[a-zA-Z]+)*$)", $state))
						{
							if(ereg("(^[0-9]{5}$)", $zip))
							{
								if(ereg("(^[a-zA-Z]+( ?[a-zA-Z]+)*$)", $firstName) || ereg("(^[a-zA-Z]+( ?[a-zA-Z]+)*$)", $middleName) || ereg("(^[a-zA-Z]+( ?[a-zA-Z]+)*$)", $lastName))
								{
									if(ereg("^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$", $email))
									{
										$db->query("LOCK TABLES address WRITE");
										$db->query("INSERT INTO address (address, city, state_id, zip) VALUES ('$address', '$city', '$state', '$zip')");
										$db->query("UNLOCK TABLES");
										
										$res = $db->query("SELECT id FROM address WHERE address = '$address'");
										$row = $res->fetchRow();
										$add_id = $row[0];
										
				
										$db->query("LOCK TABLES users WRITE");
										$db->query("INSERT INTO users (username, password, address_id, firstName, middleName, lastName, email) VALUES ('$user', '$passhash', '$add_id', '$firstName', '$middleName', '$lastName', '$email');");
										$db->query("UNLOCK TABLES");
										header("Location: login.php");
										//$t->display('login.tpl');
									}
									else
									{
										// Email is invalid
										header("Location: register.php?e=9");
									}
								}
								else
								{
									// Name (first, middle, or last) is invalid
									header("Location: register.php?e=8");
								}
							}
							else
							{
								// Zip code is invalid
								header("Location: register.php?e=7");
							}
						}
						else
						{
							// State is invalid
							header("Location: register.php?e=6");
						}
					}
					else
					{
						// City is invalid
						header("Location: register.php?e=5");
					}
				}
				else
				{
					// Address invalid
					header("Location: register.php?e=4");
				}
			}
			else
			{
				// Username is invalid
				header("Location: register.php?e=3");
			}
	}
	else
	{
		// Passwords do not match
		header("Location: register.php?e=2");
	}
}
else
{
	// Username is not unique in db
	header("Location: register.php?e=1");
}


?>