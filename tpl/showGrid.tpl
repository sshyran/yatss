{*
requires data array
*}

{if isset($error)}
	<div>Please login to view this page...</div>
{elseif count($data)==0}
	<div>empty table</div>
{else}
	<table border="1">
	{foreach from=$data key=k item=row name=outerloop}
		<tr>
		{if isset($display_first_row) && $smarty.foreach.outerloop.first}
			{foreach from=$row key=k item=i}
				<th> {$k} </th>
			{/foreach}
			</tr><tr>
		{/if}
		{foreach from=$row key=k item=v}
			<td>{$v}</td>
		{/foreach}
		</tr>
	{/foreach}
	</table>
{/if}
{*
{literal}
<script type="text/javascript">
 new Ajax.InPlaceEditor('description', '/xxx.html', {rows:2,cols:40});
</script>
{/literal}

*}