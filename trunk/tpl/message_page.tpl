<center>
<div id="left" style="text-align:center; width:1100px;">
{if isset($message)}
	<center>
	<div class="infoMessage">{$message}
{elseif isset($error_message)}
	<center>
	<div class="errorMessage">{$error_message}
{else}
<center>
<div class="errorMessage">error message not set
{/if}
</center>
</div>
</div>
</div>