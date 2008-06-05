{include file="header.tpl"}
<script type="text/javascript" src="../html/js/validate.js"></script>

<form method="GET" action="insert.php" name="vform" id="vform">
<table border="0" cellpadding="0" cellspacing="0">
<tr align="center" height="30px">
	<td colspan="2">Registration</td>
</tr>
<tr>
	<td width="100px"><label for="username">Username:</label></td>
	<td><input type="text" name="username" id="username" class="required,alphanum" size="30"/>
	<img width="16" height="16" name="username" src="../html/img/blank.gif" alt="">
	</td>
	<td><span class="expl">only alphanumeric</span></td>
</tr>
<tr>
	<td><label for="password">Password:</label></td>
	<td><input type="password" name="password1" id="password1" class="required,alphanum" size="30" />
	<img width="16" height="16" name="password1" src="../html/img/blank.gif" alt="">
	</td>
	<td><span class="expl">only alphanumeric</span></td>
</tr>
<tr>
	<td><font style="font-size:12px;"><label for="password2">(Enter again)</label></font></td>
	<td><input type="password" name="password2" id="password2" class="required,alphanum" size="30" />
	<img width="16" height="16" name="password2" src="../html/img/blank.gif" alt="">
	</td>
	<td><span class="expl">must match above, alphanumeric</span></td>
</tr>
<tr>
	<td colspan="2" height="20px"></td>
</tr>
<tr>
	<td><label for="firstName">First Name:</label></td>
	<td><input type="text" name="firstName" id="firstName" class="required,alpha" size="30" />
	<img width="16" height="16" name="firstName" src="../html/img/blank.gif" alt="">
	</td>
	<td><span class="expl">only characters</span></td>
</tr>
<tr>
	<td><label for="middleName">Middle Name:</label></td>
	<td><input type="text" name="middleName" id="middleName" class="required,alpha" size="30" />
	<img width="16" height="16" name="middleName" src="../html/img/blank.gif" alt="">
	</td>
	<td><span class="expl">only characters</span></td>
</tr>
<tr>
	<td><font"><label for="lastName">Last Name:</label></font></td>
	<td><input type="text" name="lastName" id="lastName" class="required,alpha" size="30" />
	<img width="16" height="16" name="lastName" src="../html/img/blank.gif" alt="">
	</td>
	<td><span class="expl">only characters</span></td>
</tr>
<tr>
	<td><label for="email">Email:</label></td>
	<td><input type="text" name="email" id="email" class="required,email" size="30" />
	<img width="16" height="16" name="email" src="../html/img/blank.gif" alt="">
	</td>
	<td><span class="expl">email address, like user@domain.com</span></td>
</tr>
<tr>
	<td colspan="2" height="20px"></td>
</tr>
<tr>
	<td><label for="address">Address:</label></td>
	<td><input type="text" name="address" id="address" class="required"size="30" />
	<img width="16" height="16" name="address" src="../html/img/blank.gif" alt="">
	</td>
	<td><span class="expl">current address</span></td>
</tr>
<tr>
	<td><label for="city">City:</label></td>
	<td><input type="text" name="city" id="city" class="required,alpha" size="30" />
	<img width="16" height="16" name="username" src="../html/img/blank.gif" alt="">
	</td>
	<td><span class="expl">current city</span></td>
</tr>
<tr>
	<td><font"><label for="state">State:</label></font></td>
	<td>
	
	   {html_options name=state options=$stateOptions}

	  <!--<select name="state">
		//{foreach from=$data item=row}
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
		<option value="WY">Wyoming</option>
	</select> -->
	
	</td>
	<td></td>
</tr>
<tr>
	<td><label for="zip">Zip Code:</label></td>
	<td><input type="text" name="zip" id="zip" class="required,num" size="10" />
	<img width="16" height="16" name="username" src="../html/img/blank.gif" alt="">
	</td>
	<td><span class="expl">current zip code, numeric</span></td>
</tr>
<tr align="center" valign="bottom" height="40px">
	<td colspan="2"><input type="submit" name="register" value="Submit" />&nbsp;&nbsp;<input type="button" name="cancel" value="Cancel" /></td>
</tr>
</table>
</form>

{include file="footer.tpl"}
