{* <h1>payment info</h1>
<div>a table</div> *}

<script src="../html/js/creditcard.js" type="text/javascript"></script>
<script src="../html/js/validate.js" type="text/javascript"></script>

<p>
<b>Payment</b><br />

<font style="font-size:13px;">Your mailing address that we have on file must be the same as your billing address.</font></p>
<form method="post" id="vform" action="{$next_step_link}">

	<hr size="1" width="100%" />
	
		<b>Billing Address</b> (Shipping Address)
<font style="font-size:13px;"
<table>	
	{foreach from=$data item=i key=k} 
	<tr>
		<td>{$k|capitalize}:</td>
		<td>{$i}</td>
		<td></td>
	</tr>
	{/foreach}
</table>
</font>

<br />
<hr size="1" width="100%" />
<b>Please select a delivery method:</b>
{if $smarty.session.shipping_e == 1}<br /><font style="color:#FF0000; font-size:13px;">** A shipping method must be selected **</font>{/if}
<font style="font-size:13px;">
<table>
<tr><td><input type="radio" name="shipping_method" value="mail" /></td><td>Ship my tickets to my address above</td></tr>
<tr><td><input type="radio" name="shipping_method" value="electronic" /></td><td>Recieve my tickets electronically</td></tr>
</table>
</font>

<br />
<hr size="1" width="100%" />
<b>Credit Card</b>
<font style="font-size:13px;">
<table border="0" cellpadding="0" cellspacing="0" class="center">
{if $smarty.session.name_e == 1}
<tr>
	<td colspan="3"><font style="color:#FF0000; font-size:13px;">** Enter a correct name **</font></td>
</tr>
{/if}
{if $smarty.session.cc_e == 1}
<tr>
	<td colspan="3"><font style="color:#FF0000; font-size:13px;">** Please enter correct credit card information **</font></td>
</tr>
{/if}
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
			<option value="MasterCard" selected="selected">Mastercard</option>
			<option value="AMEX">American Express</option>
			<option value="DISCOVER">Discover</option>
		</select>
	</td>
	<td></td>
</tr>
<tr>
	<td style="text-align:left;"><label for="ccnumber">Number:</label></td>
	<td align="left"><input type="text" autocomplete="off" name="ccnumber" value="5555555555554444" id="ccnumber" class="required,creditcard" size="30" onkeyup="checkName(this)" />
	<img width="16" height="16" id="zipimg" src="../html/img/blank.gif" alt="" />
	</td>
	<td style="text-align:left;"><span class="expl">numeric (spaces or dashes optional)</span></td>
</tr>
<tr>
	<td style="text-align:left;">Expiration Date:</td>
	<td align="left">
	
		<select name="ccmonth">
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
	    {html_options name=ccyear options=$yearOptions}

	</td>
	<td></td>
</tr>
</table>
</font>
<br />
<input type="submit" name="register" value="Next Page" />&nbsp;&nbsp;<a href="cancelTransaction.php"/>Cancel Transaction</a>
</form>
</div>

<br /><a href="{$next_step_link}">next</a>