<?php /* Smarty version Smarty-3.1.21, created on 2015-03-16 17:09:08
         compiled from "E:\Mipow\download\template\default\common\categorynav.phtml" */ ?>
<?php /*%%SmartyHeaderCode:2768155070024cc2630-62731361%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd903dfcedffd4a50c997d090d7a7c53a55af989b' => 
    array (
      0 => 'E:\\Mipow\\download\\template\\default\\common\\categorynav.phtml',
      1 => 1425625111,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2768155070024cc2630-62731361',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'this' => 0,
    'cid' => 0,
    'categorynav' => 0,
    'nav' => 0,
    'icon' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_55070026210c83_26486152',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55070026210c83_26486152')) {function content_55070026210c83_26486152($_smarty_tpl) {?><ul class="navbar header-catnav">
    <?php $_smarty_tpl->tpl_vars['categorynav'] = new Smarty_variable($_smarty_tpl->tpl_vars['this']->value->categorynav(), null, 0);?>
    <?php if (isset($_smarty_tpl->tpl_vars['cid']->value)) {?>
          <?php $_smarty_tpl->tpl_vars['cid'] = new Smarty_variable($_smarty_tpl->tpl_vars['cid']->value, null, 0);?>
    <?php } else { ?>
          <?php $_smarty_tpl->tpl_vars['cid'] = new Smarty_variable($_smarty_tpl->tpl_vars['categorynav']->value->getCurCategoryId(), null, 0);?>
    <?php }?>

    <?php  $_smarty_tpl->tpl_vars['nav'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['nav']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categorynav']->value->getAllCategory(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['nav']->key => $_smarty_tpl->tpl_vars['nav']->value) {
$_smarty_tpl->tpl_vars['nav']->_loop = true;
?>
    <li class="<?php if ($_smarty_tpl->tpl_vars['cid']->value&&$_smarty_tpl->tpl_vars['cid']->value==$_smarty_tpl->tpl_vars['nav']->value['c_id']) {?> active<?php }?>">
        <a href="<?php echo $_smarty_tpl->tpl_vars['this']->value->url('category',array('id'=>$_smarty_tpl->tpl_vars['nav']->value['c_id']));?>
" >
            <?php $_smarty_tpl->tpl_vars['icon'] = new Smarty_variable("/images/".((string)$_smarty_tpl->tpl_vars['nav']->value['c_folder'])."/".((string)$_smarty_tpl->tpl_vars['nav']->value['c_folder'])."_small.png", null, 0);?>
            <img src="<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['icon']->value;?>
<?php $_tmp1=ob_get_clean();?><?php echo $_smarty_tpl->tpl_vars['this']->value->basePath($_tmp1);?>
" class="sicon"/>
            <span class="name"><?php echo $_smarty_tpl->tpl_vars['nav']->value['c_code'];?>
</span>
        </a>
    </li>
    <?php } ?>
</ul><?php }} ?>
