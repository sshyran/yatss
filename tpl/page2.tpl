{assign var="title" value="Page 2 Title"}
{include file="header.tpl"}
   {foreach from=$data item=row}
		First name: {$row.0} Last name: {$row.1} <br />
   {/foreach}
{include file="footer.tpl"}