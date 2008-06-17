<?php
error_reporting(E_ALL);
require_once('set_env.php');
require_once('util.php');

$user = $_GET['username'];
$pass1 = $_GET['password1'];
$pass2 = $_GET['password2'];
$firstName = $_GET['firstName'];
$middleName = $_GET['middleName'];
$lastName = $_GET['lastName'];
$email = $_GET['email'];
$address = $_GET['address'];
$city = $_GET['city'];
$state = $_GET['state'];
$zip = $_GET['zip'];

$result = executeQuery("SELECT * FROM users WHERE users.username = ?", array($user));
//print_r($result);

$row = count($result);

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
										//$db->query("LOCK TABLES address WRITE");
										//$db->query("INSERT INTO address (address, city, state_id, zip) VALUES ('$address', '$city', '$state', '$zip')");
										executeQuery("INSERT INTO address (address, city, state_id, zip) VALUES (?, ?, ?, ?)", array($address, $city, $state, $zip));
										//$db->query("UNLOCK TABLES");
										
										//$res = $db->query("SELECT id FROM address WHERE address = '$address'");
										$res = executeQuery("SELECT id FROM address WHERE address.address = ? AND address.city = ? AND address.state_id = ? AND address.zip = ?", array($address, $city, $state, $zip));
										//print_r($res);
										//$row = $res->fetchRow();
										$add_id = $res[0]['id'];
										//echo("Address Id = " . $add_id);
										
				
										//$db->query("LOCK TABLES users WRITE");
										//$db->query("INSERT INTO users (username, password, address_id, firstName, middleName, lastName, email) VALUES ('$user', '$passhash', '$add_id', '$firstName', '$middleName', '$lastName', '$email');");
										executeQuery("INSERT INTO users (username, password, address_id, firstName, middleName, lastName, email) VALUES (?, ?, ?, ?, ?, ?, ?)", array($user, $passhash, $add_id, $firstName, $middleName, $lastName, $email));
										//$db->query("UNLOCK TABLES");
										header("location:$web_root?page=message_page&message_id=50");
										//$t->display('login.tpl');
									}
									else
									{
										// Email is invalid
										header("Location: $web_root?page=register&e=9");
									}
								}
								else
								{
									// Name (first, middle, or last) is invalid
									header("Location: $web_root?page=register&e=8");
								}
							}
							else
							{
								// Zip code is invalid
								header("Location: $web_root?page=register&e=7");
							}
						}
						else
						{
							// State is invalid
							header("Location: $web_root?page=register&e=6");
						}
					}
					else
					{
						// City is invalid
						header("Location: $web_root?page=register&e=5");
					}
				}
				else
				{
					// Address invalid
					header("Location: $web_root?page=register&e=4");
				}
			}
			else
			{
				// Username is invalid
				header("Location: $web_root?page=register&e=3");
			}
	}
	else
	{
		// Passwords do not match
		header("Location: $web_root?page=register&e=2");
	}
}
else
{
	// Username is not unique in db
	header("Location: $web_root?page=register&e=1");
}


?>