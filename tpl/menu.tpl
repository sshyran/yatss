<div id="box">
<ul id="menu">
{foreach from=$links key=k item=v}
	<li><a href="{$v}" id="{$k}">{$k}</a></li>
{/foreach}
</ul>
</div>
<div class="clear"></div>