{if !isset($smarty.session.username)}
not authorized!!!
{else}

{if isset($smarty.session.username)}
{foreach from=$tplListAdmin item=i}
	{include file="$i.tpl"}
{/foreach}
{/if}
{/if}