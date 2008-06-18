<div id="left">
{include file='showGrid.tpl'}
</div>
{*
<span id="buttons" style="float:right;position:relative;clear:both;bottom: 30px;right:90px">
	{if $pagenum >1}
		<a href="{$web_root}?page=events&page_number={$pagenum-2}">previous page</a>
		</span>
	{/if}
*}
<span id="buttons" style="float: right;position: relative;clear: both;bottom: 30px;">
<a href="{$web_root}?page=events&page_number={$pagenum|default:'0'}">next page</a>
</span>