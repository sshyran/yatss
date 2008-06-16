<h3>Admin Dashboard</h3>
<br />

<div>

<!--<table>
<tr>
<td>
<div style="height:400px; border:1px solid grey;">
<table border="0" style="height:400px;">
	<tr style="height:250px;"><td><img src="{$barsrc}" alt="Total Revenue by Month"/></td></tr>
	<tr style="height:150px;"><td><b>Total Revenue Generated:</b> $ {$total_revenue}</td></tr>
</table>
</div>
</td>

<td>
<div style="height:400px; border:1px solid grey;">
<table border="0" style="height:400px;">
	<tr style="height:250px;"><td><img src="{$piesrc}" alt="Total Ticket Distribution"/></td></tr>
	<tr style="height:150px;">
		<td>
			<b>Tickets Sold:</b> {$tickets_sold}<br />
			<b>Tickets Unsold:</b> {$tickets_unsold}
		</td>
	</tr>
</table>
</div>
</td>
</tr>
</table>-->


<table border="0">
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
</div>