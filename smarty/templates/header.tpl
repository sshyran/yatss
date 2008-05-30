<!-- {php} $contentType = strpos($_SERVER['HTTP_ACCEPT'], 'application/xhtml+xml') === false ? 'text/html' : 'application/xhtml+xml'; session_start();
header("Content-Type: $contentType; charset=utf-8"); {/php}
<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<title>{$title}</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
{$smarty.capture.header} -->
<html>
</head>
<body>