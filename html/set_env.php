<?
//error_reporting(E_ALL - E_NOTICE);
error_reporting(E_ALL);

// db connect info
$dsn = 'mysqli://root:admin@unix(/Applications/xampp/xamppfiles/var/mysql/mysql.sock)/yatss';

// Setup include path
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
	error_log($err."\n", 3, '../logs/error.log');
    print_r($err);  # print_r is very useful during development but will display the db uid/pwd on query failure.
    die();
} 
// Connect to the database
$db = MDB2::connect($dsn);
//$db->setFetchMode(DB_FETCHMODE_ASSOC);  // Other modes possible; I find assoc best.
//$db->setOption('optimize', 'portability');  // This is useful for apps supporting multiple backends such as mysql & oracle

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

// if (isset($_REQUEST['login']) && $_REQUEST['login'] == 1) {
//      $optional = true;
// } else {
//      $optional = false;
// }



require_once 'Auth.php';
$a = new Auth('MDB2',
	array(
		'table' => 'users',
		'usernamecol' => 'username',
		'passwordcol' => 'password',
		'cryptType' => 'sha1',
		'dsn' => $dsn
//		,
//		'db_fields' => array('user_key', 'perms')
		),
	'login', # login function name
//	$optional #show login?
	isset($require_login) && $require_login ==1
);

// change session parameters
$a->setAdvancedSecurity(true);
$a->setIdle(600);


// Use case insensitive login
if (isset($_POST['username'])) $_POST['username'] = strtoupper($_POST['username']);

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

function login($username, $status, $auth) {
	global $t;
	$t->assign('status', $status);
	$t->display('login.tpl');
	die();
}
/* END USER AUTH */

// Assign any global smarty values here.
$t->assign('web_root', $web_root);
?>