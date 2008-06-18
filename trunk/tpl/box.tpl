<div id="right" style="text-align:center;">
	<div class="box" style="text-align:left;">
		{if isset($submenu)}
			{foreach from=$submenu key=k item=v}
				{if !isset($with_links)}
					<li>{$v}</li>
				{else}
					<li><a href="{$v}">{$k}</a></li>
				{/if}
				{/foreach}
		{else}
		<h3>Welcome to Project Yat&szlig;</h3>
		<p>We have the tickets you need.  Please feel free to browse around our tickets selection.</p>
		{/if}
	</div>
</div>