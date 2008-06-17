
<h1>Thank You!</h1>
<div style="width: 60%; font-size:14px;">
<p>
You have successfully purchased your tickets.  Below you can find a link to a printable version of your reciept.  
<br /><br />
We have also provided a link which will show you driving directions from your address to the event you have purchased tickets for.  Please feel free to contact us if you have any questions about your order.  We look forward to helping you with tickets in the future!
</p>
</div>

<div>
<table style="font-size:13px;" cellpadding="5" cellspacing="0" border="0">
<tr>
	<td><b>Event Name</b></td>
	<td><b>Event Date</b></td>
	<td><b>Ticket Type</b></td>
	<td><b>Qty</b></td>
	<td><b>Ticket Price</b></td>
	<td><b>Total Price</b></td>
	{if $smarty.session.shipping_method == 'electronic'}
	<td>Download Ticket</td>
	{/if}
	<td></td>
	<td>Driving Directions</td>
</tr>
{foreach from=$data item=row}
<tr>
	<td>{$row.name}</td>
	<td>{$row.date}</td>
	<td>{$row.type}</td>
	<td>{$row.number_of_tickets}</td>
	<td>${$row.price}</td>
	<td>${$row.total}</td>
	{if $smarty.session.shipping_method == 'electronic'}
	<td><a href="">Download</a></td>
	{/if}
	<td></td>
	<td><a href="{$web_root}/directions.php?start={$start}&destination={$row.destination}" title="Google" rel="gb_page_fs[]">Map</a></td>
</tr>
{/foreach}
<tr>
	<td><b>Grand Total</b></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td><b>${$grand_total}</b></td>
	{if $smarty.session.shipping_method == 'electronic'}
	<td></td>
	{/if}
	<td></td>
	<td></td>
</tr>
</table>
</div>


<br />
<form method="post" name="receiptForm" action="generateReceipt.php" target="_blank">
<input type="hidden" name="orderId" value="{$orderId}" />
<table cellpadding="5" border="0">
<tr>
<td><input type="submit" value="Printable Receipt" /></td><td><a href="{$next_step_link}">Homepage</a></td>
</tr>
</table>
</form>