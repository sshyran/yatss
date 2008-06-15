{*
requires data array
*}

{if isset($error)}
	<div>Please login to view this page...</div>
{elseif count($data)==0}
	<div>empty table</div>
{else}
	<table border="1">
	{foreach from=$data key=k2 item=row2 name=outerloop}
		<tr>
		{if isset($display_first_row) && $smarty.foreach.outerloop.first}
			{foreach from=$row2 key=k3 item=i3}
				<th> {$k3} </th>
			{/foreach}
			</tr><tr>
		{/if}
		{foreach from=$row2 key=k1 item=v1}
			<td>{$v1}</td>
		{/foreach}
		</tr>
	{/foreach}
	</table>
{/if}