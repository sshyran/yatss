<div id="left">
<p><b>Confirmation</b><br />
Please confirm that the following information is correct</p>


<div style="border:1px solid grey; width:50%;">
<b>Tickets:</b>
<br />
<table style="font-size:13px;" cellpadding="5" border="0">
<tr>
	<td><b>Event Name</b></td>
	<td><b>Event Date</b></td>
	<td><b>Ticket Type</b></td>
	<td><b>Qty</b></td>
	<td><b>Ticket Price</b></td>
	<td><b>Total Price</b></td>
</tr>
{foreach from=$data item=row}
<tr>
	<td>{$row.name}</td>
	<td>{$row.date}</td>
	<td>{$row.type}</td>
	<td>{$row.number_of_tickets}</td>
	<td>${$row.price}</td>
	<td>${$row.total}</td>
</tr>
{/foreach}
<tr>
	<td><b>Grand Total</b></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td><b>${$grand_total}</b></td>
</tr>
</table>
</div>
<br />

<div style="border:1px solid grey; width: 50%;">
<b>Shipping Method:</b><br />
<font style="font-size:13px;">{$shipping_method}</font><br />
</div>

<br />
<div style="border:1px solid grey; width: 50%;">
<b>Billing Information</b><br />
<font style="font-size:13px;">
<table>
<tr>
	<td>Name:</td><td>{$firstName}&nbsp;{$lastName}</td>
</tr>
<tr>
	<td>Address:</td><td>{$address}</td>
</tr>
<tr>
	<td></td><td>{$city},&nbsp;{$state}&nbsp;{$zip}
</tr>
<tr>
	<td><b>Credit Card:</b></td><td></td>
</tr>
<tr>
	<td>Type:</td><td>{$cctype}</td>
</tr>
<tr>
	<td>No:</td><td>{$ccnumber}</td>
</tr>
<tr>
	<td>Exp Date:</td><td>{$ccmonth|capitalize},&nbsp;{$ccyear}</td>
</tr>
</table>
<br />

</div>

<div style="width: 50%;">
<br />
If this information is correct, and you agree to be held fully responsible for this purchase, please confirm by clicking the confirm button.
You will be presented with a reciept and confirmation number on the following page.
</font>

<br /><span id="buttons"><a style="float:left;" href="cancelOrder.php">Cancel Order</a><a style="float:right;" href="{$next_step_link}">Confirm</a></span>
</div>
</div>