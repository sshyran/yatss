{if !isset($smarty.session.username)}
	<div>
			<form method="post" action="{$smarty.config.web_root}?page=events" id="loginForm">
			<div>Login: <input type="text" name="username" size="15"/></div>
			<div>Password: <input type="password" name="password" size="15"/></div>
			<div><input type="submit" name="Submit" value="Submit"/></div>
			<!-- <input type="reset" name="Reset" value="Reset"/> -->
			</form>
	</div>
	<div>or <a href="{$smarty.config.web_root}?page=register">Register</a></div>
{else}
	<p>Welcome {$smarty.session.username|capitalize} <a href="{$web_root}?logout=1">logout</a></p>
{/if}
