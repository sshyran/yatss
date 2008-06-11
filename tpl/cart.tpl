<div>
<table border="1">
<tr>
	<td colspan="6">Shopping Cart</td>
</tr>
<tr>
	<td><b>Event Name</b></td>
	<td><b>Event Date</b></td>
	<td><b>Qty</b></td>
	<td><b>Ticket Price</b></td>
	<td><b>Total Price</b></td>
	<td></td>
</tr>
{foreach from=$data item=row}
	<tr>
		<td>{$row.name}</td>
		<td>{$row.date}</td>
		<td><input type="text" size="4" value="{$row.number_of_tickets}" /></td>
		<td>${$row.price}</td>
		<td>${$row.total}</td>
		<td><a href="" style="font-size:13px;">Remove</a></td>
	</tr>
{/foreach}

<tr style="height:50px;">
	<td colspan="6">
	<input type="button" value="Update Cart"/>
	<input type="button" value="Continue Shopping"/>
	<input type="button" value="Checkout" style="float:right;"/>
	</td>
</tr>
</table>
</div>
