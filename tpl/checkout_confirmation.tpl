<p><b>Confirmation</b><br />
Please confirm that the following information is correct</p>

<div>
<b>Tickets:</b>
<br />
<table style="font-size:13px;" cellpadding="5">
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
<tr>
	<td>{$row.name}</td>
	<td>{$row.date}</td>
	<td>{$row.type}</td>
	<td>{$row.number_of_tickets}</td>
	<td>${$row.price}</td>
	<td>${$row.total}</td>
	<td></td>
</tr>
{/foreach}
</table>


<br /><a href="{$next_step_link}">next</a>