<div id="right">
<div class="box">
admin menu bar:
<ul>
{foreach from=$admin_links key=k item=v}
	<li><a href="{$v}">{$k}</a></li>
{/foreach}
</ul>
</div>
</div>