{include file="header.tpl" title="Shopping Cart"}
{include file="topbar.tpl"}

<div style="width:100%;">
<table style="border:0px solid black;" cellpadding="0" cellspacing="0">
<tr>
	<td colspan="9" style="vertical-align: middle; background-color:#6699cc; color:#FFFFFF; height:30px; padding-bottom:5px;"><img src="../html/img/cart.gif" />Your Shopping Cart</td>
</tr>
<tr style="font-size:15px; background-color:#E2EBF7;">
	<td style="padding-left:10px;"><b>Event Name</b></td>
	<td style="width:30px;"></td>
	<td style=""><b>Event Date</b></td>
	<td style="width:40px;"></td>
	<td style="width:100px; text-align:left;"><b>Qty</b></td>
	<td style="width:100px; text-align:left;"><b>Ticket Price</b></td>
	<td style="width:100px; text-align:left;"><b>Total Price</b></td>
	<td></td>
	<td></td>
</tr>
<!--#DADFBC,#DADFBC, #E2E2E2 -->
{foreach from=$data item=row}
	<tr style="height:30px; background-color:{cycle values="#DADFBC, #EEEEEE"}">
		<td style="padding-left: 10px; border-top:1px solid grey; border-left:1px solid grey;">{$row.name}</td>
		<td style="border-top:1px solid grey;"></td>
		<td style="border-top:1px solid grey;">{$row.date}</td>
		<td style="border-top:1px solid grey;"></td>
		<td style="border-top:1px solid grey; text-align:left;"><input type="text" size="4" value="{$row.number_of_tickets}" /></td>
		<td style="border-top:1px solid grey; text-align:left;">${$row.price}</td>
		<td style="border-top:1px solid grey; text-align:left;">${$row.total}</td>
		<td style="border-top:1px solid grey;"></td>
		<td style="border-top:1px solid grey; width: 100px; text-align:center; border-right:1px solid grey;"><a href="" style="font-size:13px;">Remove</a></td>
	</tr>
{/foreach}

<tr style="height:50px;">
	<td colspan="9" style="border-top:1px solid grey;">
	<input type="button" value="Update Cart" onmouseover="javascript: this.style.backgroundColor='#EEEEEE';" onmouseout="javascript: this.style.backgroundColor='#CCCCCC';" style="background-color:#CCCCCC; border:1px solid black;" />
	<input type="button" value="Continue Shopping" onmouseover="javascript: this.style.backgroundColor='#EEEEEE';" onmouseout="javascript: this.style.backgroundColor='#CCCCCC';" style="background-color:#CCCCCC; border:1px solid black;" />
	<input type="button" value="Checkout" onmouseover="javascript: this.style.backgroundColor='#EEEEEE';" onmouseout="javascript: this.style.backgroundColor='#CCCCCC';" style="background-color:#CCCCCC; border:1px solid black; float:right; margin-right:15px;" />
	</td>
</tr>
</table>
</div>
<br />

{include file="footer.tpl"}