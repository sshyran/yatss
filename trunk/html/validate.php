<?

/*
 * This is the PHP script to validate the form over AJAX
 * Validations types possible:
 *
 * - alpha
 * - alphanum
 * - date
 * - email
 * - number
 * - url
 *
 */


// Start the main function
StartValidate();

function StartValidate() {
	
	// Assign some var's for the requests
	$required = $_GET["required"];
	$type = $_GET["type"];
	$value = $_GET["value"];

	// This is the function to check if a field is even required or not
	// So it's useful if you only want to check if it isn't empty
	validateRequired($required, $value, $type);

	switch ($type) 
	{
		case 'number':
			validateNumber($value);
			break;
		case 'alphanum':
			validateAlphanum($value);
			break;
		case 'alpha':
			validateAlpha($value);
			break;
		case 'date':
			validateDate($value);
			break;
		case 'email':
			validateEmail($value);
			break;
		case 'url':
			validateUrl($value);
			break;
	}
}

// The function to check if a field is required or not
function validateRequired($required, $value, $type) {
	if($required == "required") {

		// Check if we got an empty value
		if($value == "") {
			echo "false";
			exit();
		}
	} else {
		if($value == "") {
			echo "none";
			exit();
		}
	}
}

// I use regular expressions in order to check a field's input, you can
// get most of them at the Regex Library at http://www.regexlib.com
// There you can check your own regular expressions, too

// Validation of an Email Address
function validateEmail($value) {
	if(ereg("^([0-9a-zA-Z]+[-._+&])*[0-9a-zA-Z]+@([-0-9a-zA-Z]+[.])+[a-zA-Z]{2,6}$", $value, $regs)) {
		echo "true";
	} else {
		echo "false";
	}
}

// Validation of a date
function validateDate($value) {
	if(ereg("^(([1-9])|(0[1-9])|(1[0-2]))\/(([0-9])|([0-2][0-9])|(3[0-1]))\/(([0-9][0-9])|([1-2][0,9][0-9][0-9]))$", $value, $regs)) {
		echo "true";
	} else {
		echo "false";
	}
}

// Validation of an URL
function validateUrl($value) {
	if(ereg("^(http|https|ftp)\://[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(:[a-zA-Z0-9]*)?/?([a-zA-Z0-9\-\._\?\,\'/\\\+&amp;%\$#\=~])*[^\.\,\)\(\s]$", $value, $regs)) {
		echo "true";
	} else {
		echo "false";
	}
}

// Validation of characters
function validateAlpha($value) {
	if(ereg("^[a-zA-Z]+$", $value, $regs)) {
		echo "true";
	} else {
		echo "false";
	}
}

// Validation of characters and numbers
function validateAlphanum($value) {
	if(ereg("^[a-zA-Z0-9]+$", $value, $regs)) {
		echo "true";
	} else {
		echo "false";
	}
}

// Validation of numbers
function validateNumber($value) {
	if(ereg("^[0-9]+$", $value, $regs)) {
		echo "true";
	} else {
		echo "false";
	}
}

?>
