<?php /* Smarty version 2.6.19, created on 2008-06-04 11:29:51
         compiled from login.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
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
		your role is <?php echo $_SESSION['userrole']; ?>

<?php endif; ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>