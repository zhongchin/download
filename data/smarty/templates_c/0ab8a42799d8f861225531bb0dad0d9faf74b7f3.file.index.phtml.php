<?php /* Smarty version Smarty-3.1.21, created on 2015-03-16 17:14:36
         compiled from "E:\Mipow\download\template\default\admin\product-manager\index.phtml" */ ?>
<?php /*%%SmartyHeaderCode:326755507016ce7b659-47807229%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0ab8a42799d8f861225531bb0dad0d9faf74b7f3' => 
    array (
      0 => 'E:\\Mipow\\download\\template\\default\\admin\\product-manager\\index.phtml',
      1 => 1426521879,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '326755507016ce7b659-47807229',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'this' => 0,
    'products' => 0,
    'product' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5507016de54300_54368634',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5507016de54300_54368634')) {function content_5507016de54300_54368634($_smarty_tpl) {?><table class="table table-striped">
    <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['this']->value->translate("sku");?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['this']->value->translate("product name");?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['this']->value->translate("category");?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['this']->value->translate("hot keys");?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['this']->value->translate("filecount");?>
</td>
     </tr>
    <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
    <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['product']->value["sku"];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['product']->value['p_name'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['product']->value['c_code'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['product']->value['keyword'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['product']->value['filecount'];?>
</td>
      </tr>
    <?php } ?>
</table><?php }} ?>
