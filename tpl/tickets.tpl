<div><b>{$event}</b></div>
<div>{$descr}</div> 

<a href="">Map</a>

<br /><br />
<table border="0">
	<tr>
	<td>
		<table border="0">
			<tr>
				<td><b>Event:</b></td><td>{$event}</td>
			</tr>
			<tr>
				<td><b>Date:</b></td><td>{$date}</td>
			</tr>
			<tr>
				<td><b>Address:</b></td><td>{$address}</td>
			</tr>
			<tr>
				<td></td><td>{$city}, {$state} {$zip}</td>
			</tr>
		</table>
	</td>
	</tr>
</table>

<table border="1">
	<tr>
		<td>Ticket Type</td><td>Ticket Price</td>{if isset($smarty.session.username)}<td>Tickets Remaining</td>{/if}<td>{if !isset($smarty.session.username)}Tickets Remaining{else}Quantity{/if}</td>{if isset($smarty.session.username)}<td></td>{/if}
	</tr>
	{foreach from=$ticketdata item=row}
	<form method="get" name="{$row.type}Form" action="{$webroot}">
	<input type="hidden" name="page" value="cart" />
	<input type="hidden" name="event_id" value="{$row.event_id}" />
	<tr>
		<td><input type="hidden" name="ticket_type" value="{$row.ticket_type_id}" />{$row.type}</td>
		<td>${$row.price}</td>
		
		{if !isset($smarty.session.username) || $row.available_tickets == 0}
			<td>{$row.available_tickets}</td>
		
		{elseif isset($smarty.session.username)}
			<td>{$row.available_tickets}</td>
			<td>
			{html_options name=number_of_tickets options=$row.available_tickets_array}
			</td>
		{/if}
		
		{if isset($smarty.session.username)}<td><input type="submit" value="Add to Cart"/></td>{/if}
	</tr>
	</form>
	{/foreach}
</table>

{if isset($smarty.session.username)}<br /><b>**</b> You are only allowed to buy up to <b>{$number_allowed} tickets of one type</b> at a time <b>**</b>{/if}