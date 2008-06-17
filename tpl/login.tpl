{if !isset($smarty.session.username)}
	<div id="options">
			<form method="post" action="{$smarty.config.web_root}?page=events" id="loginForm">
			<div>Login: <input type="text" name="username" size="15"/>&nbsp;&nbsp;Password: <input type="password" name="password" size="15"/>
			<input type="submit" name="Submit" value="Submit"/></div><div style="margin-top:5px;"><a href="{$web_root}?page=register">Register</a></div>
			</form></div>
{else}
	<div id="options"><p>Welcome {$smarty.session.username|capitalize} <a href="{$web_root}?logout=1">logout</a></p></div>
{/if}
