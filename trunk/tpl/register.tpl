{include file="header.tpl" title="Registration"}
<script type="text/javascript" src="../html/js/prototype.js"></script>
<script type="text/javascript" src="../html/js/scriptaculous.js"></script>
<script type="text/javascript" src="../html/js/validate.js"></script>

{include file="topbar.tpl"}

<div id="regform" style="width: 100%;">
<form method="get" action="insert.php" id="vform">
<table border="0" cellpadding="0" cellspacing="0" class="center">
<tr align="center">
	<td colspan="3" style="height:20px;">Registration</td>
	<td></td>
</tr>
<tr align="center" class="row">
	<td colspan="3" style="height:20px;"><span id="emessage">{$errormessage}</span></td>
	<td></td>
</tr>

<tr>
	<td style="width:100px; text-align:left;"><label for="username">Username:</label></td>
	<td><input type="text" name="username" id="username" class="required,alphanum" size="30" onkeyup="checkName(this)"/>
	<img width="16" height="16" id="usernameimg" src="img/blank.gif" alt="" />
	</td>
	<td style="text-align:left;"><span class="expl">only alphanumeric</span></td>
</tr>
<tr>
	<td style="text-align:left;"><label for="password1">Password:</label></td>
	<td><input type="password" name="password1" id="password1" class="required,alphanum" size="30" onkeyup="checkName(this)" />
	<img width="16" height="16" id="password1img" src="img/blank.gif" alt="" />
	</td>
	<td style="text-align:left;"><span class="expl">only alphanumeric</span></td>
</tr>
<tr>
	<td style="text-align:left;"><span style="font-size:12px;"><label for="password2">(Enter again)</label></span></td>
	<td><input type="password" name="password2" id="password2" class="required,alphanum" size="30" onkeyup="checkName(this)" />
	<img width="16" height="16" id="password2img" src="img/blank.gif" alt="" />
	</td>
	<td style="text-align:left;"><span class="expl">must match above, alphanumeric</span></td>
</tr>
<tr>
	<td colspan="2" style="height:20px;"></td>
</tr>
<tr>
	<td style="text-align:left;"><label for="firstName">First Name:</label></td>
	<td><input type="text" name="firstName" id="firstName" class="required,alpha" size="30" onkeyup="checkName(this)" />
	<img width="16" height="16" id="firstNameimg" src="../html/img/blank.gif" alt="" />
	</td>
	<td style="text-align:left;"><span class="expl">only characters</span></td>
</tr>
<tr>
	<td style="text-align:left;"><label for="middleName">Middle Name:</label></td>
	<td><input type="text" name="middleName" id="middleName" class="required,alpha" size="30" onkeyup="checkName(this)" />
	<img width="16" height="16" id="middleNameimg" src="../html/img/blank.gif" alt="" />
	</td>
	<td style="text-align:left;"><span class="expl">only characters</span></td>
</tr>
<tr>
	<td style="text-align:left;"><label for="lastName">Last Name:</label></td>
	<td><input type="text" name="lastName" id="lastName" class="required,alpha" size="30" onkeyup="checkName(this)" />
	<img width="16" height="16" id="lastNameimg" src="../html/img/blank.gif" alt="" />
	</td>
	<td style="text-align:left;"><span class="expl">only characters</span></td>
</tr>
<tr>
	<td style="text-align:left;"><label for="email">Email:</label></td>
	<td><input type="text" name="email" id="email" class="required,email" size="30" onkeyup="checkName(this)" />
	<img width="16" height="16" id="emailimg" src="../html/img/blank.gif" alt="" />
	</td>
	<td style="text-align:left;"><span class="expl">email address, like user@domain.com</span></td>
</tr>
<tr>
	<td colspan="2" style="height:20px;"></td>
</tr>
<tr>
	<td style="text-align:left;"><label for="address">Address:</label></td>
	<td><input type="text" name="address" id="address" class="required,general" size="30" onkeyup="checkName(this)" />
	<img width="16" height="16" id="addressimg" src="../html/img/blank.gif" alt="" />
	</td>
	<td style="text-align:left;"><span class="expl">current address</span></td>
</tr>
<tr>
	<td style="text-align:left;"><label for="city">City:</label></td>
	<td><input type="text" name="city" id="city" class="required,alpha" size="30" onkeyup="checkName(this)" />
	<img width="16" height="16" id="cityimg" src="../html/img/blank.gif" alt="" />
	</td>
	<td style="text-align:left;"><span class="expl">current city</span></td>
</tr>
<tr>
	<td style="text-align:left;">State:</td>
	<td align="left">
	
	   {html_options name=state options=$stateOptions}

	</td>
	<td></td>
</tr>
<tr>
	<td style="text-align:left;"><label for="zip">Zip Code:</label></td>
	<td align="left"><input type="text" name="zip" id="zip" class="required,zip" size="10" onkeyup="checkName(this)" />
	<img width="16" height="16" id="zipimg" src="../html/img/blank.gif" alt="" />
	</td>
	<td style="text-align:left;"><span class="expl">current zip code, numeric</span></td>
</tr>
<tr align="center" valign="bottom" style="height:40px;">
	<td colspan="3"><input type="submit" name="register" value="Submit" />&nbsp;&nbsp;<input type="button" name="cancel" value="Cancel" /></td>
</tr>
</table>
</form>
</div>

{include file="footer.tpl"}
