<!-- {assign var="title" value="events"}
{include file="header.tpl"} -->
   {foreach from=$data item=row}
		name: {$row.name} date: {$row.date} address: {$row.address}  descr : {$row.description} 
			{if isset($smarty.session.username)}
				link (probably some ajax.inline)
			{/if}
			<br /><br />
   {/foreach}
<!-- {include file="footer.tpl"} -->