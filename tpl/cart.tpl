<div>
<table border="1">
<tr>
	<td colspan="7">Shopping Cart</td>
</tr>
<tr>
	<td><b>Event Name</b></td>
	<td><b>Event Date</b></td>
	<td><b>Ticket Type</b></td>
	<td><b>Qty</b></td>
	<td><b>Ticket Price</b></td>
	<td><b>Total Price</b></td>
	<td></td>
</tr>
{foreach from=$data item=row}
	<form name="form{$row.id}" action="deleteCartEvent.php">
	<input type="hidden" name="event_id" value="{$row.event_id}" />
	<tr>
		<td>{$row.name}</td>
		<td>{$row.date}</td>
		<td><input type="hidden" name="ticket_type" value="{$row.ticket_type_id}" />{$row.type}</td>
		<td><input type="hidden" size="4" name="number_of_tickets" value="{$row.number_of_tickets}" />{$row.number_of_tickets}</td>
		<td>${$row.price}</td>
		<td>${$row.total}</td>
		<td><input type="submit" value="Remove" /></td>
	</tr>
	</form>
{/foreach}

<tr style="height:50px;">
	<td colspan="7">
	<input type="button" value="Continue Shopping" onclick="javacript: document.location.href = '{$web_root}'"/>
	<input type="button" value="Checkout"/>
	</td>
</tr>
</table>
</div>
