/* ---------------------------
   John Paxton
   May 29, 2008
   verify.js
   ----------------------------
   A collection of functions to perform
   some simple, client-side data checks.
   ----------------------------
*/

// ----------------------------

function isBlank (word)
{
  if (word == null || word == "")
  {
    return true;
  } 
  for (var i = 0; i < word.length; i++)
  {
    var c = word.charAt(i);
    if ((c != ' ') && (c != '\n') && (c != '\t'))
    {
      return false;
    }
  }
  return true;
}
  
// ----------------------------

function checkBlank (element)
{
  if (isBlank(element.value))
  {
    alert(element.description + " can not be blank ");
    return true;
  }
  return false;
}

// ----------------------------

function isAlpha (word)
{
  for (var i = 0; i < word.length; i++)
  {
    var c = word.charAt(i);
    if (!((c >= 'a' && c <= 'z') ||
	  (c >= 'A') && (c <= 'Z')))
    {
      return false;
    }
  }
  return true;
}

// ----------------------------

function checkAlpha (element)
{
  if (!isAlpha(element.value))
  {
    alert(element.description + " must consist of a-z,A-Z only");
    return false;
  }
  return true;
}

// ----------------------------

function isNumeric (word)
{
  for (var i = 0; i < word.length; i++)
  {
    var c = word.charAt(i);
    if (!(c >= '0' && c <= '9'))
    {
      return false;
    }
  }
  return true;
}

// ----------------------------

function checkNumeric (element)
{
  if (!isNumeric(element.value))
  {
    alert(element.description + " must consist of 0-9 only");
    return false;
  }

  var number = parseInt(element.value);

  if ((element.minimum != null) && (number < element.minimum))
  {
    alert(element.description + " must be >= than " 
	  + element.minimum);
    return false;
  }

  if ((element.maximum != null) && (number > element.maximum))
  {
    alert(element.description + " must be <= than " 
	  + element.maximum);
    return false;
  }

  return true;
}

// ----------------------------

function verify (form)
{
  for (var i = 0; i < form.length; i++)
  {
    element = form.elements[i];
    if (element.type == "text")
    {
      if (element.isMandatory && checkBlank(element))
      {
        return false;
      }
      if (element.isAlpha && !checkAlpha(element))
      {
	return false;
      }
      if (element.isNumeric)
      {
	if (!checkNumeric(element))
	{
	  return false;
        }
      }
    }
  }
  return true;
}
