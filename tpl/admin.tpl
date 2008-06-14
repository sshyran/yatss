{if !isset($smarty.session.username)}
not authorized!!!
{else}

{foreach from=$tplListAdmin item=i}
	{include file="$i.tpl"}
{/foreach}
{/if}