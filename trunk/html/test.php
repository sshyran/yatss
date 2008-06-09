<?php
error_reporting(E_ALL);
require_once 'Auth.php';

$debug=0;

function loginFunction()
{
     echo "<form id=\"loginbox\" name=\"loginbox\" method=\"post\" action=\"test.php?login=1\" onSubmit=\"return checkFields();\">\n";
     echo "<input type=\"text\" name=\"username\">\n";
     echo "<input type=\"password\" name=\"password\">\n";
     echo "<input type=\"submit\">\n";
     echo "</form>\n";
}


if (isset($_GET['login']) && $_GET['login'] == 1) {
     $optional = true;
} else {
     $optional = false;
}

$options = array(
  'dsn' => "mysqli://root:admin@unix(/Applications/xampp/xamppfiles/var/mysql/mysql.sock)/yatss",
	'table' => 'users',
	'usernamecol' => 'nickname',
	'passwordcol' => 'password',
	'cryptType' => 'sha1',
	'db_fields' => '*' 
//	'enableLogging' => true
  );



if (!(isset($a) && $a->checkAuth())) {
	$a = new Auth("MDB2", $options, "loginFunction", $optional);
	$a->setAdvancedSecurity(true);
	$a->setIdle(600);
	$a->start();
}


if (isset($_GET['logout']) && $_GET['logout'] == 1 && $a->checkAuth()) {
    $a->logout();
    $a->start();
}
?>


<HTML>
<HEAD>
	<script src="js/prototype.js" type="text/javascript"></script>
		<script src="js/scriptaculous.js" type="text/javascript"></script>
	
	<script language="javascript" type="text/javascript">
		function checkFields()
		{
			var form = $('loginbox');
			var username = form['username'];
			var password = form['password'];
			
			if($F(username).length == 0)
			{
				Effect.Appear('error_email', { duration: 3.0 });
				Effect.Fade('error_email', { duration: 3.0 })
				return false;
			}
			if($F(password).length == 0)
			{
				Effect.Appear('error_password', { duration: 3.0 });
				Effect.Fade('error_password', { duration: 3.0 })
				return false;
			}
			return true;
		}
	</script>

	
	<style type="text/css">
		*
		{
			margin: 0;
			padding: 0;
		}
		body
		{
			font-family: Verdana;
			font-size: 11px;
			padding: 20px;
		}
		fieldset
		{
			display:block;
			padding: 3px;
			border: none;
		}
		label
		{
			display: block;
		}
		#error_email,#error_password
		{
			padding: 10px;
			background: #C8ECFF;
			border: 1px solid #1881B6;
			margin: 2px 0;
			width: 200;
		}
	</style>
</HEAD>

<BODY>
<div id="error_email" style="display:none">Please enter your username!</div>
<div id="error_password" style="display:none">You forgot to enter your password!</div>
	
	
<?php
if (!isset($_GET['login']) && !$a->getAuth()) {
     echo "<a href=\"test.php?login=1\">log in</a> or <a href=\"test.php?register=1\">register</a><br />\n";
}
if (isset($_GET['register']) && $_GET['register'] == 1 && !$a->checkAuth()) {
	echo 'register here<br />';
}



if (isset($a) && $a->getStatus()<0) {
	switch ($a->getStatus()) {
		case '-1':
			echo "idle time exceeded";
			break;
		case '-2':
			echo 'session expired';
			break;
		case '-3':
			echo 'username and password doesn\'t match';
			break;
		case '-5':
			echo 'Advanced security check detected a breach!!!';
			break;
		case '-6':
			echo 'session aborted';
			break;
		default:
			break;
	}
}


if ($a->getAuth()) {
	echo "hello, ".$a->getUsername()."<br />\n";
     echo "One can only see this if he is logged in!<br />";
	echo "<a href=\"test.php?logout=1\">Click here to log out</a>\n";
}
if ($debug) {
	print_r($_SESSION);
}

echo "<br />Everybody can see this text!<br />";


Å?>

	<BODY>

	</HTML>