<?php

//	session_start();
	require('db.php');
	$db=new MySQLDBConnect();
	$db->checkUserLogin($_POST['username'],$_POST['password']);
	header("Location: index.php");

?>