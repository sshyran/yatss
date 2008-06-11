{*
requires data array
*}

{if isset($error)}
	<div>Please login to view this page...</div>
{else}

<table border="1">
{foreach from=$data key=k item=row name=outerloop}
	<tr>
	{if $smarty.foreach.outerloop.first}
		{foreach from=$row key=k item=i}
			<td> {$k} </td>
		{/foreach}
		</tr><tr>
	{/if}
		{foreach from=$row key=k item=v}
			<td> {$v} </td>
		{/foreach}
	</tr>

{/foreach}
</table>

{/if}