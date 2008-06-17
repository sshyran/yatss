<?php /* Smarty version 2.6.19, created on 2008-06-17 16:59:48
         compiled from events.tpl */ ?>

<div id="left" style="width:<?php if (isset ( $_SESSION['username'] )): ?>870px;<?php else: ?>1100px;<?php endif; ?>">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'showGrid.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>

<?php if (isset ( $_SESSION['username'] )): ?>
<div id="right">
	<div class="box">
		<h3>Welcome to Project YATSS</h3>
		<p>We have the tickets you need.  Please feel free to browse around our tickets selection.</p>
	</div>
</div>
<?php endif; ?>
