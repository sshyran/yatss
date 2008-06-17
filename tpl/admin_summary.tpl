<div id="left">
<h3>Admin Dashboard</h3>
<br />

<table border="0">
	<tr>
		<td width="445px"><img src="{$barsrc}" alt="Total Revenue by Month"/></td>
		<td><img src="{$piesrc}" alt="Total Ticket Distribution"/></td>
	</tr>	 
	<tr style="height:100px;">
		<td align="center" width="445px"><b>Total Revenue Generated:</b> $ {$total_revenue}</td>
		<td align="center">
			<div style="text-align:left; margin-left:130px;">
			<b>Tickets Sold:</b> {$tickets_sold}<br />
			<b>Tickets Unsold:</b> {$tickets_unsold}
			</div>
		</td>
	</tr>
	</table>
	<hr size="1" color="#999999" />
	<table border="0" width="100%">
	<tr>
		<td><img src="{$rev_by_state}" alt="Revenue By State" /></td>
		<td><img src="{$gom_url}" alt="Percentage Tickets Available" /></td>
	</tr>
</table>

<!--<table width="520px">
	<tr><td><img src="{$barsrc}" alt="Total Revenue by Month"/></td></tr><tr><td align="center"><b>Total Revenue Generated:</b> $ {$total_revenue}</td></tr>
</table>

<table width="400px">
	<tr><td><img src="{$piesrc}" alt="Total Ticket Distribution"/></td></tr>
	<tr>
	<td align="center">
			<div style="text-align:left; margin-left:130px;">
			<b>Tickets Sold:</b> {$tickets_sold}<br />
			<b>Tickets Unsold:</b> {$tickets_unsold}
			</div>
	</td></tr>
</table>

<table>
	<tr><td><img src="{$rev_by_state}" alt="Revenue By State" /></td></tr><tr><td></td></tr>
</table>-->
<br />
</div>