<?php /* Smarty version 2.6.19, created on 2008-06-09 14:45:45
         compiled from events.tpl */ ?>
<?php $this->assign('title', 'events'); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
   <?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['row']):
?>
		name: <?php echo $this->_tpl_vars['row']['name']; ?>
 date: <?php echo $this->_tpl_vars['row']['date']; ?>
 address: <?php echo $this->_tpl_vars['row']['address']; ?>
  descr : <?php echo $this->_tpl_vars['row']['description']; ?>
<br /><br />
   <?php endforeach; endif; unset($_from); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>