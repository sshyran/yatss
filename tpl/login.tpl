{include file="header.tpl"}
{if !isset($smarty.session.userrole)}

<form method="POST" action="login.php" name="loginForm">

<p>
Login: <input type="text" name="username" size="30"/> <br /> <br />
Password: <input type="password" name="password" size="30"/> <br /> <br />
<input type="submit" name="Submit" value="Submit"/>
<!-- <input type="reset" name="Reset" value="Reset"/> -->
</p>

</form>
{else}
Welcome {$smarty.session.username} <a href="index.php?logout=1">logout</a>
		<!-- your role is {$smarty.session.userrole} -->
{/if}

{include file="footer.tpl"}