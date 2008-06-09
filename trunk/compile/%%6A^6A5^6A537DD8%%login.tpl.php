<?php /* Smarty version 2.6.19, created on 2008-06-09 14:45:40
         compiled from login.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'capitalize', 'login.tpl', 11, false),)), $this); ?>
<?php if ($this->_tpl_vars['showLogin'] == 1 && ! isset ( $_SESSION['username'] )): ?>
	<div>
			<form method="post" action="<?php echo $this->_config[0]['vars']['web_root']; ?>
" id="loginForm">
			<div>Login: <input type="text" name="username" size="15"/></div>
			<div>Password: <input type="password" name="password" size="15"/></div>
			<div><input type="submit" name="Submit" value="Submit"/></div>
			<!-- <input type="reset" name="Reset" value="Reset"/> -->
			</form>
	</div>
<?php else: ?>
	<p>Welcome <?php echo ((is_array($_tmp=$_SESSION['username'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
 <a href=<?php echo $this->_tpl_vars['web_root']; ?>
?logout=1>logout</a></p>
<?php endif; ?>