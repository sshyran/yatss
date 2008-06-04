{include file="header.tpl"}
<link type="text/javascript" href="verify.js" />

<form method="POST" action="insert.php" name="loginForm">
<table border="0" cellpadding="0" cellspacing="0">
<tr align="center" height="30px">
	<td colspan="2">Registration</td>
</tr>
<tr>
	<td width="100px">Username:</td>
	<td><input type="text" name="username" value="" size="30"/></td>
</tr>
<tr>
	<td>Password:</td>
	<td><input type="password" name="password1" value="" size="30" /></td>
</tr>
<tr>
	<td><font style="font-size:12px;">(Enter again)</font></td>
	<td><input type="password" name="password2" value="" size="30" /></td>
</tr>
<tr>
	<td colspan="2" height="20px"></td>
</tr>
<tr>
	<td><font">First Name:</font></td>
	<td><input type="text" name="firstName" value="" size="30" /></td>
</tr>
<tr>
	<td><font">Middle Name:</font></td>
	<td><input type="text" name="middleName" value="" size="30" /></td>
</tr>
<tr>
	<td><font">Last Name:</font></td>
	<td><input type="text" name="lastName" value="" size="30" /></td>
</tr>
<tr>
	<td><font">Email:</font></td>
	<td><input type="text" name="email" value="" size="30" /></td>
</tr>
<tr>
	<td colspan="2" height="20px"></td>
</tr>
<tr>
	<td><font">Address:</font></td>
	<td><input type="text" name="address" value="" size="30" /></td>
</tr>
<tr>
	<td><font">City:</font></td>
	<td><input type="text" name="city" value="" size="30" /></td>
</tr>
<tr>
	<td><font">State:</font></td>
	<td>
		{html_options name=state options=$data}
	</td>
</tr>
<tr>
	<td><font">Zip Code:</font></td>
	<td><input type="text" name="zip" value="" size="10" /></td>
</tr>
<tr align="center" valign="bottom" height="40px">
	<td colspan="2"><input type="submit" name="register" value="Submit" />&nbsp;&nbsp;<input type="button" name="cancel" value="Cancel" /></td>
</tr>
</table>
</form>



{include file="footer.tpl"}