<?php /* Smarty version 2.6.19, created on 2008-06-09 10:55:28
         compiled from register.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'register.tpl', 96, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array('title' => 'Registration')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="../html/js/prototype.js"></script>
<script type="text/javascript" src="../html/js/scriptaculous.js"></script>
<script type="text/javascript" src="../html/js/validate.js"></script>

<center>
<div id="confirmation" style="position:relative; background-color:#CCCC99; height:90px; width:200px; padding-top:50px; margin-top:100px; display:none;">
Thank you for registering.<br />
<a href="../html/login.php">Login Page</a>
</div>
<div id="regform" style="position:relative;">
<form method="GET" action="insert.php" name="vform" id="vform">
<table border="0" cellpadding="0" cellspacing="0">
<tr align="center" height="20px">
	<td colspan="2">Registration</td>
	<td></td>
</tr>
<tr align="center" height="20px">
	<td colspan="2"><span id="emessage"><?php echo $this->_tpl_vars['errormessage']; ?>
</span></td>
	<td></td>
</tr>

<tr>
	<td width="100px"><label for="username">Username:</label></td>
	<td><input type="text" name="username" id="username" class="required,alphanum" size="30" onkeyup="checkName(this)"/>
	<img width="16" height="16" id="usernameimg" src="../html/img/blank.gif" alt="">
	</td>
	<td><span class="expl">only alphanumeric</span></td>
</tr>
<tr>
	<td><label for="password">Password:</label></td>
	<td><input type="password" name="password1" id="password1" class="required,alphanum" size="30" onkeyup="checkName(this)" />
	<img width="16" height="16" id="password1img" src="../html/img/blank.gif" alt="">
	</td>
	<td><span class="expl">only alphanumeric</span></td>
</tr>
<tr>
	<td><font style="font-size:12px;"><label for="password2">(Enter again)</label></font></td>
	<td><input type="password" name="password2" id="password2" class="required,alphanum" size="30" onkeyup="checkName(this)" />
	<img width="16" height="16" id="password2img" src="../html/img/blank.gif" alt="">
	</td>
	<td><span class="expl">must match above, alphanumeric</span></td>
</tr>
<tr>
	<td colspan="2" height="20px"></td>
</tr>
<tr>
	<td><label for="firstName">First Name:</label></td>
	<td><input type="text" name="firstName" id="firstName" class="required,alpha" size="30" onkeyup="checkName(this)" />
	<img width="16" height="16" id="firstNameimg" src="../html/img/blank.gif" alt="">
	</td>
	<td><span class="expl">only characters</span></td>
</tr>
<tr>
	<td><label for="middleName">Middle Name:</label></td>
	<td><input type="text" name="middleName" id="middleName" class="required,alpha" size="30" onkeyup="checkName(this)" />
	<img width="16" height="16" id="middleNameimg" src="../html/img/blank.gif" alt="">
	</td>
	<td><span class="expl">only characters</span></td>
</tr>
<tr>
	<td><font"><label for="lastName">Last Name:</label></font></td>
	<td><input type="text" name="lastName" id="lastName" class="required,alpha" size="30" onkeyup="checkName(this)" />
	<img width="16" height="16" id="lastNameimg" src="../html/img/blank.gif" alt="">
	</td>
	<td><span class="expl">only characters</span></td>
</tr>
<tr>
	<td><label for="email">Email:</label></td>
	<td><input type="text" name="email" id="email" class="required,email" size="30" onkeyup="checkName(this)" />
	<img width="16" height="16" id="emailimg" src="../html/img/blank.gif" alt="">
	</td>
	<td><span class="expl">email address, like user@domain.com</span></td>
</tr>
<tr>
	<td colspan="2" height="20px"></td>
</tr>
<tr>
	<td><label for="address">Address:</label></td>
	<td><input type="text" name="address" id="address" class="required,general" size="30" onkeyup="checkName(this)" />
	<img width="16" height="16" id="addressimg" src="../html/img/blank.gif" alt="">
	</td>
	<td><span class="expl">current address</span></td>
</tr>
<tr>
	<td><label for="city">City:</label></td>
	<td><input type="text" name="city" id="city" class="required,alpha" size="30" onkeyup="checkName(this)" />
	<img width="16" height="16" id="cityimg" src="../html/img/blank.gif" alt="">
	</td>
	<td><span class="expl">current city</span></td>
</tr>
<tr>
	<td><label for="state">State:</label></font></td>
	<td>
	
	   <?php echo smarty_function_html_options(array('name' => 'state','options' => $this->_tpl_vars['stateOptions']), $this);?>


	</td>
	<td></td>
</tr>
<tr>
	<td><label for="zip">Zip Code:</label></td>
	<td><input type="text" name="zip" id="zip" class="required,zip" size="10" onkeyup="checkName(this)" />
	<img width="16" height="16" id="zipimg" src="../html/img/blank.gif" alt="">
	</td>
	<td><span class="expl">current zip code, numeric</span></td>
</tr>
<tr align="center" valign="bottom" height="40px">
	<td colspan="3"><input type="submit" name="register" value="Submit" />&nbsp;&nbsp;<input type="button" name="cancel" value="Cancel" /><input type="button" value="Poof" onclick="showMessage()" /></td>
</tr>
</table>
</form>
</div>
</center>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>