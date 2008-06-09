<?php /* Smarty version 2.6.19, created on 2008-06-05 14:33:11
         compiled from menu.tpl */ ?>
<div id="box">
<h3><?php echo $this->_tpl_vars['title']; ?>
</h3>
<ul>
<?php $_from = $this->_tpl_vars['links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['l']):
?>
 <?php echo $this->_tpl_vars['k']; ?>
 <?php echo $this->_tpl_vars['l']; ?>

<?php endforeach; endif; unset($_from); ?>
</ul>
</div>