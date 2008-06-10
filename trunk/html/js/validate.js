// JavaScript Document



function checkName(str)
{
	
	//document['username'].src = "../img/true.png";
	
	vId = str.id;
	vValue = str.value;
	
	if(vValue.length == 0)
	{	
		return;
	}
	
	
	
	// Separate the class attribute of each input field
	getValue = str.className;
	if(getValue.indexOf(",") == -1 ) 
	{
		vType = getValue;
		vRequired = "";
	} 
	else 
	{
		vRules = str.className.split(",");
		vRequired = vRules[0];
		vType = vRules[1];
	}
	
	// Check if the field is required or not
	/*if(vRequired == "required")
	{
		if(vValue == "")  {return;}
	}*/
	
	if(vRequired == "required")
	{
		if(vValue == "")  { alterPage('false'); return;}
	}
	else
	{
		if(vValue == "")  { alterPage('none'); return;}
	}
	
	switch (vType) 
	{
		case 'number':
			validateNumber(vValue);
			break;
		case 'alphanum':
			validateAlphanum(vValue);
			break;
		case 'alpha':
			validateAlpha(vValue);
			break;
		case 'date':
			validateDate(vValue);
			break;
		case 'email':
			validateEmail(vValue);
			break;
		case 'general':
			validateGeneral(vValue);
			break;
		case 'zip':
			validateZip(vValue);
			break;
		/*case 'url':
			validateUrl(vValue);
			break;*/
	}	
}

function alterPage(status)
{
	var id = vId + 'img';
	
	if(status == 'true')
	{
		document.getElementById(id).src = "../html/img/true.png";
		document.getElementById(vId).style.border = "1px solid #338800";
		document.getElementById(vId).style.background = "#c7f7be";
		//return;
	}
	
	if(status == 'false')
	{
		document.getElementById(id).src = "../html/img/false.png";
		document.getElementById(vId).style.border = "1px solid #d12f19";
		document.getElementById(vId).style.background = "#f7cbc2";
		//document[vId].src = "false.png";
		//return;
	}
	
	if(status == 'none')
	{
		document.getElementById(id).src = "../html/img/blank.gif";
		document.getElementById(vId).style.border = "1px solid #aaa";
		document.getElementById(vId).style.background = "#ffffff";
		//document[vId].src = "blank.gif";
		//return;
	}
}

// Validation of general address, etc.
function validateGeneral(value) {
	if(value.length != 0 && value != null)
	{
		alterPage("true");
	}
	else
	{
		alterPage("false");
	}
}

// Validation of an Email Address
function validateEmail(value) {
	if(value.match(/^([0-9a-zA-Z]+[-._+&])*[0-9a-zA-Z]+@([-0-9a-zA-Z]+[.])+[a-zA-Z]{2,6}$/))
	//if(ereg("^([0-9a-zA-Z]+[-._+&])*[0-9a-zA-Z]+@([-0-9a-zA-Z]+[.])+[a-zA-Z]{2,6}$", value, $regs)) 
	{
		alterPage("true");
	} else 
	{
		alterPage("false");
	}
}

// Validation of a date
function validateDate(value) {
	if(value.match(/^\d{1,2}\/\d{1,2}\/\d{4}$/))
	//if(ereg("^(([1-9])|(0[1-9])|(1[0-2]))\/(([0-9])|([0-2][0-9])|(3[0-1]))\/(([0-9][0-9])|([1-2][0,9][0-9][0-9]))$", $value, $regs)) 
	{
		alterPage("true");
	} else 
	{
		alterPage("false");
	}
}

// Validation of an URL
/*function validateUrl($value) {
	if(ereg("^(http|https|ftp)\://[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(:[a-zA-Z0-9]*)?/?([a-zA-Z0-9\-\._\?\,\'/\\\+&amp;%\$#\=~])*[^\.\,\)\(\s]$", $value, $regs)) 
	{
		alterPage("true");
	} else 
	{
		alterPage("false");
	}
}*/

// Validation of characters
function validateAlpha(value) 
{
	if(value.match(/^[a-zA-Z]+$/))
	//if(ereg("^[a-zA-Z]+$", $value, $regs)) 
	{
		alterPage("true");
	} else 
	{
		alterPage("false");
	}
}

// Validation of characters and numbers
function validateAlphanum(value) 
{
	if(value.match(/^[a-zA-Z0-9]+$/))
	//if(ereg("^[a-zA-Z0-9]+$", $value, $regs)) 
	{
		if(vId == 'password2') 
		{
			(document.getElementById('password1').value == document.getElementById('password2').value)?alterPage("true"):alterPage("false");
		}
		else
		{
			alterPage("true");
		}
	} else 
	{
		alterPage("false");
	}
}

// Validation of numbers
function validateNumber(value) 
{
	if(value.match(/^[0-9]+$/))
	//if(ereg("^[0-9]+$", $value, $regs)) 
	{
		alterPage("true");
	} else 
	{
		alterPage("false");
	}
}

// Validation of zip code
function validateZip(value) 
{
	if(value.match(/^[0-9]{5}$/))
	//if(ereg("^[0-9]+$", $value, $regs)) 
	{
		alterPage("true");
	} else 
	{
		alterPage("false");
	}
}

function showMessage()
{
	Effect.Fade('regform');
	Effect.Appear('confirmation');
}