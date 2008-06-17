<div id="left" style="width:{if isset($smarty.session.username)}870px;{else}1100px;{/if}">
{if isset($smarty.session.username)}
<table border="0" cellpadding="5" cellspacing="0">
<tr>
	<td colspan="{if $arraysize > 0}7{else}6{/if}">Shopping Cart</td>
</tr>
<tr>
	<td><b>Event Name</b></td>
	<td><b>Event Date</b></td>
	<td><b>Ticket Type</b></td>
	<td><b>Qty</b></td>
	<td><b>Ticket Price</b></td>
	<td><b>Total Price</b></td>
	{if $arraysize > 0}<td></td>{/if}
</tr>
{foreach from=$data item=row}
	<form name="form{$row.id}" action="deleteCartEvent.php" method="post">
	<input type="hidden" name="event_id" value="{$row.event_id}" />
	<input type="hidden" name="basket_id" value="{$row.id}" />
	<tr style="background-color:{cycle values='#EDEADC,#F2F2F2'}">
		<td>{$row.name}</td>
		<td>{$row.date|date_format:"%Y-%m-%d %H:%M"}</td>
		<td><input type="hidden" name="ticket_type" value="{$row.ticket_type_id}" />{$row.type}</td>
		<td><input type="hidden" size="4" name="number_of_tickets" value="{$row.number_of_tickets}" />{$row.number_of_tickets}</td>
		<td>${$row.price}</td>
		<td>${$row.total}</td>
		<td><input type="submit" value="Remove" /></td>
	</tr>
	</form>
{/foreach}

<tr>
	<td colspan="{if $arraysize > 0}7{else}6{/if}" style="text-align:right; height:30px;">
	<div style="float:left;"><input type="button" value="Continue Shopping" onclick="javacript: document.location.href = '{$web_root}'"/>
{if count($data) > 0}<input type="button" value="Checkout" onclick="javacript: document.location.href = '{$web_root}?page=checkout'"/>{/if}</div>
	<b>Sub Total:&nbsp;&nbsp;${$subtotal}</b></td>
</tr>

</table>
{else}
<br />
Please log in to view this page.
<br />
{/if}
</div>

{if isset($smarty.session.username)}
<div id="right">
	<div class="box">
		<h3>Welcome to Project YATSS</h3>
		<p>We have the tickets you need.  Please feel free to browse around our tickets selection.</p>
	</div>
</div>
{/if}