<div id="left">
<h3>Admin Dashboard</h3>
<br />

<table border="0" width="100%">
	<tr>
		<td><img src="{$barsrc}" alt="Total Revenue by Month"/></td>
		<td><img src="{$piesrc}" alt="Total Ticket Distribution"/></td>
	</tr>	 
	<tr style="height:100px;">
		<td align="center"><b>Total Revenue Generated:</b> $ {$total_revenue}</td>
		<td align="center">
			<div style="text-align:left; margin-left:130px;">
			<b>Tickets Sold:</b> {$tickets_sold}<br />
			<b>Tickets Unsold:</b> {$tickets_unsold}
			</div>
		</td>
	</tr>
	</table>

	<br />

	<table border="0" width="100%">
	<tr>
		<td><img src="{$rev_by_state}" alt="Revenue By State" /></td>
		<td><!--<img src="{$tickets_url}" alt="30-Day Ticket Sales" />--></td>
	</tr>
</table>
<br />
</div>