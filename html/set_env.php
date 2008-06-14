<?
//error_reporting(E_ALL - E_NOTICE);
error_reporting(E_ALL);

// set debug=0 to turn messages of
$DEBUG=0;
//$t->debugging=true;

$purchase_number = 10;

// db connect info
$dsn = 'mysqli://root:admin@localhost/yatss';
//$dsn = 'mysqli://root:admin@unix(/Applications/xampp/xamppfiles/var/mysql/mysql.sock)/yatss'

// Setup include path
//$web_root = 'http://project:8888/yatss/html/';
$web_root = 'http://localhost/~roll/paxton/yatss/html/';
//$app_root = '/Users/roll/Sites/paxton/yatss';
$app_root = '..';
$pear = $app_root . '/pear/'; 
$_date_format = "Y-m-d H:i:s";
//---------------------------------------

define('TEMPLATE_DIR', "$app_root/tpl/");
$delim = (PHP_OS == "WIN32" || PHP_OS == "WINNT") ? ';': ':';
ini_set('include_path', ".{$delim}$pear{$delim}$app_root/include{$delim}$app_root");

require_once 'MDB2.php';
require_once 'smarty/Smarty.class.php';

// Change error handling as necessary
// PEAR_ERROR_RETURN, PEAR_ERROR_PRINT, PEAR_ERROR_TRIGGER, PEAR_ERROR_DIE or PEAR_ERROR_CALLBACK
// PEAR::setErrorHandling(PEAR_ERROR_PRINT);
PEAR::setErrorHandling(PEAR_ERROR_CALLBACK, 'errhndl');
function errhndl ($err) {
    echo '<pre>' . $err->message;
    //die();
	//error_log($err."\n", 3, '../logs/error.log');
    print_r($err);  # print_r is very useful during development but will display the db uid/pwd on query failure.
    die();
} 
// Connect to the database
$db = MDB2::connect($dsn);

if (PEAR::isError($db)) {
    die($db->getMessage());
}

$db->setFetchMode(MDB2_FETCHMODE_ASSOC);  // Other modes possible; I find assoc best.
//$db->setOption('optimize', 'portability');  // This is useful for apps supporting multiple backends such as mysql & oracle
$db->loadModule('Function');

$t = new smarty;
$t->template_dir = TEMPLATE_DIR;
$t->compile_dir = $app_root . '/compile';
$t->cache_dir = $app_root . '/cache';
//$t->plugins_dir = array($app_root . '/include', $app_root . '/smarty/plugins');

// Change comment on these when you're done developing to improve performance
$t->force_compile = true;
//$t->caching = true;

## GLOBALS:  $db, $t
session_start();

/* BEGIN USER AUTH */

// if (isset($_GET['login']) && $_GET['login'] == 1) {
//      $optional = true;
// 	$_SESSION['showLogin']=1;
// } else {
// 		$_SESSION['showLogin']=0;
//      $optional = false;
// }



require_once 'Auth.php';
$a = new Auth('MDB2',
	array(
		'table' => 'users',
		'usernamecol' => 'username',
		'passwordcol' => 'password',
		'cryptType' => 'sha1',
		'dsn' => $dsn,
		'advancedsecurity'=>true,
		'regenerateSessionId'=>true
//		,
//		'db_fields' => array('id', 'email')
		),
	'loginFunction', # login function name
	//$optional #show login?
//	isset($require_login) && $require_login ==1
	true
);


setSessionVar($db, $a);


// Use case insensitive login
if (isset($_POST['username'])) $_POST['username'] = strtolower($_POST['username']);

// Check for logout
if (isset($_REQUEST['logout']) && $_REQUEST['logout'] && $a->getAuth()) {
	$a->start();
	$a->logout();
	session_destroy();
	header("Location: $web_root");
	exit();
}

// Auth the user
$a->start();
if (isset($require_login) && $require_login && !$a->getAuth()) {
	die('Auth Failed');
}
//$user_key = $_SESSION['_authsession']['data']['user_key'];
//$perms = $_SESSION['_authsession']['data']['perms'];

// function login($username, $status, $auth) {
// 	global $t;
// 	$t->assign('status', $status);
// 	$t->display('login.tpl');
// 	die();
// }
/* END USER AUTH */

// Assign any global smarty values here.
$t->assign('web_root', $web_root);



function loginFunction($username, $status, &$auth)
{
	global $a;
	if (isset($status)) {
		switch ($status) {
			case '-3':
				echo "Authentication failed for user $username";
				break;
		}
	}
	
	// //global $t;
	// if (isset($_GET['login']) && $_GET['login'] == 1) {
	//   //   $optional = true;
	// 	$_SESSION['showLogin']=1;
	// } else {
	// 		$_SESSION['showLogin']=0;
	//     // $optional = false;
	// }
	
//	require_once('login.php');
//	loginFunc();
//	$t->display('login.tpl');
}


function setSessionVar($db, $a)
{
	require_once('handleQuery.php');
	$id=array(1);
	$rs=executeQuery('select session_timeout from config where id=?',$id);
	$a->setIdle($rs[0]['session_timeout']);
}
define ("NOT_AUTHORIZED", 1);
?>