<?php /* Smarty version Smarty-3.1.21, created on 2015-03-16 17:09:10
         compiled from "E:\Mipow\download\template\default\common\searchbox.phtml" */ ?>
<?php /*%%SmartyHeaderCode:1850255070026469374-87630828%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c0980d44b12ec12cd6feba5e8df9571474fadd6f' => 
    array (
      0 => 'E:\\Mipow\\download\\template\\default\\common\\searchbox.phtml',
      1 => 1425630145,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1850255070026469374-87630828',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'this' => 0,
    'data' => 0,
    'key' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_55070026e03ff5_73274229',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55070026e03ff5_73274229')) {function content_55070026e03ff5_73274229($_smarty_tpl) {?><div class="searchbox">
    <form action="<?php echo $_smarty_tpl->tpl_vars['this']->value->url('search');?>
">
        <div class="scr_module">
            <div class="scr_txt">
                <input type="text" name="search_txt" class="search_txt" placeholder="search" value="">
            </div>
            <button class="sbtn" value="search"><span class="sbtn-icon"></span><span>search</span></button>
        </div>
           <?php if (isset($_smarty_tpl->tpl_vars['data']->value)&&!empty($_smarty_tpl->tpl_vars['data']->value)) {?>

            <div class="searchkey">
             <?php  $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['key']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['key']->key => $_smarty_tpl->tpl_vars['key']->value) {
$_smarty_tpl->tpl_vars['key']->_loop = true;
?>
                    <label class="hotkey">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['this']->value->url('search',array('id'=>$_smarty_tpl->tpl_vars['key']->value['p_id']));?>
"><?php echo $_smarty_tpl->tpl_vars['key']->value['keyword'];?>
</a>
                    </label>
                <?php } ?>
            </div>
       <?php }?>

    </form>
</div><?php }} ?>
