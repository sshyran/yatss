<?php /* Smarty version 2.6.19, created on 2008-06-17 17:11:01
         compiled from login.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'capitalize', 'login.tpl', 8, false),)), $this); ?>
<?php if (! isset ( $_SESSION['username'] )): ?>
	<div id="options">
			<form method="post" action="<?php echo $this->_config[0]['vars']['web_root']; ?>
?page=events" id="loginForm">
			<div>Login: <input type="text" name="username" size="15"/>&nbsp;&nbsp;Password: <input type="password" name="password" size="15"/></div>
			<div style="margin-top:5px;"><input type="submit" name="Submit" value="Submit"/> or <a href="<?php echo $this->_tpl_vars['web_root']; ?>
?page=register">Register</a></div>
			</form></div>
<?php else: ?>
	<div id="options"><p>Welcome <?php echo ((is_array($_tmp=$_SESSION['username'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
 <a href="<?php echo $this->_tpl_vars['web_root']; ?>
?logout=1">logout</a></p></div>
<?php endif; ?>