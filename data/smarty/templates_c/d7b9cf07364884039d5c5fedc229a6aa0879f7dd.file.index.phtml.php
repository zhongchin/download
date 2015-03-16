<?php /* Smarty version Smarty-3.1.21, created on 2015-03-16 17:09:07
         compiled from "E:\Mipow\download\template\default\front\index\index.phtml" */ ?>
<?php /*%%SmartyHeaderCode:679255070023b602d7-36390029%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd7b9cf07364884039d5c5fedc229a6aa0879f7dd' => 
    array (
      0 => 'E:\\Mipow\\download\\template\\default\\front\\index\\index.phtml',
      1 => 1425625286,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '679255070023b602d7-36390029',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'this' => 0,
    'hotKeys' => 0,
    'category' => 0,
    'cat' => 0,
    'cImg' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_55070024b69c83_07011667',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55070024b69c83_07011667')) {function content_55070024b69c83_07011667($_smarty_tpl) {?><div class="navheader">
    <div class="container">
        <?php echo $_smarty_tpl->tpl_vars['this']->value->partial('category\nav');?>

    </div>
</div>
<div class="sch_from container">

    <?php echo $_smarty_tpl->tpl_vars['this']->value->partial('search\global',array('data'=>$_smarty_tpl->tpl_vars['hotKeys']->value));?>


</div>
<div class="container">
    <div class="catlist center">
        <?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['category']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->_loop = true;
?>
        <div class="category" accesskey="" data-url="<?php echo $_smarty_tpl->tpl_vars['this']->value->url("category",array("id"=>$_smarty_tpl->tpl_vars['cat']->value['c_id']));?>
">
        <div class="category_img">
            <?php $_smarty_tpl->tpl_vars['cImg'] = new Smarty_variable("images/".((string)$_smarty_tpl->tpl_vars['cat']->value['c_folder'])."/".((string)$_smarty_tpl->tpl_vars['cat']->value['c_folder']).".png", null, 0);?>
            <img src="<?php echo $_smarty_tpl->tpl_vars['this']->value->basepath($_smarty_tpl->tpl_vars['cImg']->value);?>
">
        </div>
        <div class="category_title">
            <span><?php echo $_smarty_tpl->tpl_vars['cat']->value['c_code'];?>
</span>
        </div>
    </div>
    <?php } ?>
</div>
</div><?php }} ?>
