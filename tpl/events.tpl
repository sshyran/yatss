
<div id="left" style="width:{if isset($smarty.session.username)}870px;{else}1100px;{/if}">
{include file='showGrid.tpl'}
</div>

{if isset($smarty.session.username)}
<div id="right">
	<div class="box">
		<h3>Welcome to Project YATSS</h3>
		<p>We have the tickets you need.  Please feel free to browse around our tickets selection.</p>
	</div>
</div>
{/if}

