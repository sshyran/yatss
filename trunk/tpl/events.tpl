<div id="left">
{include file='showGrid.tpl'}
</div>
<span id="buttons" style="float: right;position: relative;clear: both;bottom: 30px;">
	{if isset($prev_page)}
		<a href="{$web_root}?page=events&amp;page_number={$prev_page}">previous page</a>
	{/if}
	{if isset($next_page)}
		<a href="{$web_root}?page=events&amp;page_number={$next_page}">next page</a>
	{/if}
</span>