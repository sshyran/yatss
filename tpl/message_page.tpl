{if isset($message)}
	<div class="infoMessage">{$message}
{elseif isset($error_message)}
	<div class="errorMessage">{$error_message}
{else}
<div class="errorMessage">error message not set
{/if}
</div>