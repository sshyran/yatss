<center>
<div id="left" style="text-align:center; width:1100px;">
{if isset($message)}
	<center>
	<div class="infoMessage"><img src="./img/alert.png" style="padding-right:20px;" />{$message}
{elseif isset($error_message)}
	<center>
	<div class="errorMessage"><img src="./img/cancel.png" style="padding-right:20px;" />{$error_message}
{else}
<center>
<div class="errorMessage">error message not set
{/if}
</center>
</div>
</div>
</div>