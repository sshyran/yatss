{* <h1>payment info</h1>
<div>a table</div> *}

<script src="../html/js/creditcard.js" type="text/javascript"></script>
<script src="../html/js/validate.js" type="text/javascript"></script>

<p>
<b>Payment</b><br />

Your mailing address that we have on file must be the same as your billing address.</p>
<form method="post" id="vform" action="{$next_step_link}">
<table>
	<hr size="1" width="100%" />
	<tr>
		<td colspan="3"><b>Billing Address</b> (Shipping Address)</td>
	</tr>
	{foreach from=$data item=i key=k} 
	<tr>
		<td>{$k|capitalize}</td>
		<td>{$i}</td>
		<td></td>
	</tr>
	{/foreach}
	
	
	{*<tr>
		<td>Last Name:</td>
		<td>{$lastName}</td>
		<td></td>
	</tr>
	<tr>
		<td>Address:</td>
		<td>{$address}</td>
		<td></td>
	</tr>
	<tr>
		<td>City:</td>
		<td>{$city}</td>
		<td></td>
	</tr>
	<tr>
		<td>State:</td>
		<td>{$state}</td>
		<td></td>
	</tr> *}
</table>

<br />
<hr size="1" width="100%" />
<b>Please select a delivery method:</b>
<table>
<tr><td><input type="radio" name="shipping_method" value="mail" /></td><td>Ship my tickets to my address above</td></tr>
<tr><td><input type="radio" name="shipping_method" value="electronic" /></td><td>Recieve my tickets electronically</td></tr>
</table>

<br />
<hr size="1" width="100%" />
<b>Credit Card</b>
<table border="0" cellpadding="0" cellspacing="0" class="center">
<tr align="center" class="row">
	<td colspan="3" style="height:20px;"><span id="emessage">{$errormessage}</span></td>
	<td></td>
</tr>
<tr>
	<td style="text-align:left;"><label for="firstName">First Name:</label></td>
	<td><input type="text" name="firstName" id="firstName" class="required,alpha" size="30" onkeyup="checkName(this)" />
	<img width="16" height="16" id="firstNameimg" src="../html/img/blank.gif" alt="" />
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
	<td style="text-align:left;">Type:</td>
	<td align="left">
		<select name="cctype">
			<option value="VISA">Visa</option>
			<option value="MSTR">Mastercard</option>
			<option value="AMEX">American Express</option>
			<option value="DISC">Discover</option>
		</select>
	</td>
	<td></td>
</tr>
<tr>
	<td style="text-align:left;"><label for="zip">Number:</label></td>
	<td align="left"><input type="text" name="zip" id="zip" class="required,creditcard" size="30" onkeyup="checkName(this)" />
	<img width="16" height="16" id="zipimg" src="../html/img/blank.gif" alt="" />
	</td>
	<td style="text-align:left;"><span class="expl">numeric (spaces or dashes optional)</span></td>
</tr>
<tr>
	<td style="text-align:left;">Expiration Date:</td>
	<td align="left">
	
		<select name="month">
			<option value="january">January</option>
			<option value="febrary">February</option>
			<option value="march">March</option>
			<option value="april">April</option>
			<option value="may">May</option>
			<option value="june">June</option>
			<option value="july">July</option>
			<option value="august">August</option>
			<option value="september">September</option>
			<option value="october">October</option>
			<option value="november">November</option>
			<option value="december">December</option>
		</select>
	    {html_options name=year options=$yearOptions}

	</td>
	<td></td>
</tr>
</table>
<br />
<input type="submit" name="register" value="Next Page" />&nbsp;&nbsp;<input type="button" name="cancel" value="Concel Transaction" />
</form>
</div>

<br /><a href="{$next_step_link}">next</a>