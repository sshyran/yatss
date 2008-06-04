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
	<select name="state">
		{foreach from=$data item=row}
		<option value="{$row.0}">{$row.1}</option>
	   {/foreach}
	  
		<!--<option value="AL">Alabama</option>
		<option value="AK">Alaska</option>
		<option value="AZ">Arizona</option>
		<option value="AR">Arkansas</option>
		<option value="CA">California</option>
		<option value="CO">Colorado</option>
		<option value="CT">Connecticut</option>
		<option value="DE">Delaware</option>
		<option value="DC">District of Columbia</option>
		<option value="FL">Florida</option>
		<option value="GA">Georgia</option>
		<option value="HI">Hawaii</option>
		<option value="ID">Idaho</option>
		<option value="IL">Illinois</option>
		<option value="IN">Indiana</option>
		<option value="IA">Iowa</option>
		<option value="KS">Kansas</option>
		<option value="KY">Kentucky</option>
		<option value="LA">Louisiana</option>
		<option value="ME">Maine</option>
		<option value="MD">Maryland</option>
		<option value="MA">Massachusetts</option>
		<option value="MI">Michigan</option>
		<option value="MN">Minnesota</option>
		<option value="MS">Mississippi</option>
		<option value="MO">Missouri</option>
		<option value="MT">Montana</option>
		<option value="NE">Nebraska</option>
		<option value="NV">Nevada</option>
		<option value="NH">New Hampshire</option>
		<option value="NJ">New Jersey</option>
		<option value="NM">New Mexico</option>
		<option value="NY">New York</option>
		<option value="NC">North Carolina</option>
		<option value="ND">North Dakota</option>
		<option value="OH">Ohio</option>
		<option value="OK">Oklahoma</option>
		<option value="OR">Oregon</option>
		<option value="PA">Pennsylvania</option>
		<option value="RI">Rhode Island</option>
		<option value="SC">South Carolina</option>
		<option value="SD">South Dakota</option>
		<option value="TN">Tennessee</option>
		<option value="TX">Texas</option>
		<option value="UT">Utah</option>
		<option value="VT">Vermont</option>
		<option value="VA">Virginia</option>
		<option value="WA">Washington</option>
		<option value="WV">West Virginia</option>
		<option value="WI">Wisconsin</option>
		<option value="WY">Wyoming</option>-->
	</select>
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