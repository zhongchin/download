<?php /* Smarty version Smarty-3.1.21, created on 2015-03-16 17:23:21
         compiled from "E:\Mipow\download\template\default\admin\partial.phtml" */ ?>
<?php /*%%SmartyHeaderCode:106215507037927e3a1-86265832%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '55e635617fef837fb1598a46796e91341f73db3e' => 
    array (
      0 => 'E:\\Mipow\\download\\template\\default\\admin\\partial.phtml',
      1 => 1425825794,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '106215507037927e3a1-86265832',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'this' => 0,
    'page' => 0,
    'hasChildren' => 0,
    'p' => 0,
    'display' => 0,
    'count' => 0,
    'child' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5507037bec5dd7_69551533',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5507037bec5dd7_69551533')) {function content_5507037bec5dd7_69551533($_smarty_tpl) {?><ul class="page-sidebar-menu">
    <li>
        <div class="sidebar-toggler hidden-phone"></div>
    </li>
    <?php $_smarty_tpl->tpl_vars['count'] = new Smarty_variable(0, null, 0);?>
    <?php  $_smarty_tpl->tpl_vars['page'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['page']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['this']->value->container; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['page']->key => $_smarty_tpl->tpl_vars['page']->value) {
$_smarty_tpl->tpl_vars['page']->_loop = true;
?>
    <?php if (!$_smarty_tpl->tpl_vars['page']->value->isVisible()||!$_smarty_tpl->tpl_vars['this']->value->navigation()->accept($_smarty_tpl->tpl_vars['page']->value)) {?>
    <?php continue 1;?>
    <?php }?>
    <?php $_smarty_tpl->tpl_vars['hasChildren'] = new Smarty_variable($_smarty_tpl->tpl_vars['page']->value->hasPages(), null, 0);?>
    <?php if (!$_smarty_tpl->tpl_vars['hasChildren']->value) {?>
    <li <?php if ($_smarty_tpl->tpl_vars['page']->value->isActive()) {?>class="active"<?php }?>>
    <a href="<?php echo $_smarty_tpl->tpl_vars['page']->value->getHref();?>
">
        <i class="<?php echo $_smarty_tpl->tpl_vars['page']->value->getClass();?>
"></i>
        <span class="title"><?php echo $_smarty_tpl->tpl_vars['this']->value->translate($_smarty_tpl->tpl_vars['page']->value->getLabel());?>
</span>
    </a>
    </li>
    <?php } else { ?>
    <li>
        <?php $_smarty_tpl->tpl_vars['display'] = new Smarty_variable("none", null, 0);?>
        <?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['page']->value->getPages(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
        <?php if ($_smarty_tpl->tpl_vars['p']->value->isActive()) {?>
        <?php $_smarty_tpl->tpl_vars['display'] = new Smarty_variable("block", null, 0);?>
        <?php }?>
        <?php } ?>
        <a href="javascript:;">
            <i class="<?php echo $_smarty_tpl->tpl_vars['page']->value->getClass();?>
"></i>
            <span class="title"><?php echo $_smarty_tpl->tpl_vars['this']->value->translate($_smarty_tpl->tpl_vars['page']->value->getLabel());?>
</span>
            <span class="arrow <?php if ($_smarty_tpl->tpl_vars['display']->value=='block') {?>open<?php }?>"></span>
        </a>
        <ul class="sub-menu" id="page_<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
" style="display: <?php echo $_smarty_tpl->tpl_vars['display']->value;?>
">
            <?php  $_smarty_tpl->tpl_vars['child'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['child']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['page']->value->getPages(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['child']->key => $_smarty_tpl->tpl_vars['child']->value) {
$_smarty_tpl->tpl_vars['child']->_loop = true;
?>
            <?php if (!$_smarty_tpl->tpl_vars['child']->value->isVisible()||!$_smarty_tpl->tpl_vars['this']->value->navigation()->accept($_smarty_tpl->tpl_vars['child']->value)) {?>
            <?php continue 1;?>
            <?php }?>
            <li <?php if ($_smarty_tpl->tpl_vars['child']->value->isActive()) {
$_smarty_tpl->tpl_vars['display'] = new Smarty_variable(true, null, 0);?>class="active"<?php }?>>
            <a href="<?php echo $_smarty_tpl->tpl_vars['child']->value->getHref();?>
" >
                <i class="<?php echo $_smarty_tpl->tpl_vars['child']->value->getClass();?>
"></i>
                <span class="title"><?php echo $_smarty_tpl->tpl_vars['this']->value->translate($_smarty_tpl->tpl_vars['child']->value->getLabel());?>
</span>
            </a>
    </li>
    <?php } ?>
</ul>
</li>
<?php }?>
<?php $_smarty_tpl->tpl_vars['count'] = new Smarty_variable($_smarty_tpl->tpl_vars['count']->value+1, null, 0);?>
<?php } ?>

</ul><?php }} ?>
