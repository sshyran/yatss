<div>
{if isset($smarty.session.username)}
<table border="1" cellpadding="5">
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
	<input type="hidden" name="basket_id" value="{$row.id}" />
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

<tr>
	<td colspan="7" style="text-align:right; height:30px;">
	<div style="float:left;"><input type="button" value="Continue Shopping" onclick="javacript: document.location.href = '{$web_root}'"/>
<input type="button" value="Checkout"/></div>
	<b>Sub Total:&nbsp;&nbsp;${$subtotal}</b></td>
</tr>

<!--<tr>
	<td colspan="4"><b>Grand Total</b></td>
	<td colspan="2"></td>
	<td></td>
</tr>-->
	
<!--<tr style="height:50px;">
	<td colspan="7">
	<input type="button" value="Continue Shopping" onclick="javacript: document.location.href = '{$web_root}'"/>
	<input type="button" value="Checkout"/>
	</td>
</tr>-->
</table>\
{else}
<br />
Please log in to view this page.
<br />
{/if}
</div>
