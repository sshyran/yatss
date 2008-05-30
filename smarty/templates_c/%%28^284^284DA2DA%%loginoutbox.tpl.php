<?php /* Smarty version 2.6.19, created on 2008-05-29 19:26:17
         compiled from loginoutbox.tpl */ ?>
<?php if (! isset ( $_SESSION['userrole'] )): ?>
<form method="POST" action="login.php" name="loginForm">

<p>
Login: <input type="text" name="username" size="30"/> <br /> <br />
Password: <input type="password" name="password" size="30"/> <br /> <br />
<input type="submit" name="Submit" value="Submit"/>
<!-- <input type="reset" name="Reset" value="Reset"/> -->
</p>

</form>
<?php else: ?>
Welcome <?php echo $_SESSION['username']; ?>
 <a href="logout.php">logout</a>
		<!-- your role is <?php echo $_SESSION['userrole']; ?>
 -->
<?php endif; ?>