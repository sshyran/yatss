{*
requires data array
*}

{if isset($error)}
	<div>Please login to view this page...</div>
{elseif count($data)==0}
	<div class="errorMessage">
	{if isset($empty_message)}
		{$empty_message}
	{else}
		empty table
	{/if}
	</div>
{else}
	<table>
	{foreach from=$data key=k2 item=row2 name=outerloop}
		<tr class="{if $smarty.foreach.outerloop.index is odd}even{else}odd{/if}">
		{if isset($display_first_row) && $smarty.foreach.outerloop.first}
			{foreach from=$row2 key=k3 item=i3}
				<th> {$k3} </th>
			{/foreach}
			</tr><tr class="{if $smarty.foreach.outerloop.index is odd}even{else}odd{/if}">
		{/if}
		{foreach from=$row2 key=k1 item=v1}
			<td>{$v1}</td>
		{/foreach}
		</tr>
	{/foreach}
	</table>
{/if}