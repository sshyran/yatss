{if !isset($smarty.session.username)}
not authorized!!!
{else}

{foreach from=$tplListCheckout item=i}
	{include file="$i.tpl"}
{/foreach}
{/if}