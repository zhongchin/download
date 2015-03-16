<?php /* Smarty version Smarty-3.1.21, created on 2015-03-16 17:30:19
         compiled from "E:\Mipow\download\template\default\error\index.phtml" */ ?>
<?php /*%%SmartyHeaderCode:167175507051bd15fc0-74505901%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '50b0029799f876a01c15a4824554c480c26993e8' => 
    array (
      0 => 'E:\\Mipow\\download\\template\\default\\error\\index.phtml',
      1 => 1425616441,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '167175507051bd15fc0-74505901',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'this' => 0,
    'e' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5507051ea53021_79395085',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5507051ea53021_79395085')) {function content_5507051ea53021_79395085($_smarty_tpl) {?><h1><?php echo $_smarty_tpl->tpl_vars['this']->value->translate('An error occurred');?>
</h1>
<h2><?php echo $_smarty_tpl->tpl_vars['this']->value->message;?>
</h2>

<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['this']->value->display_exceptions;?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['this']->value->display_exceptions;?>
<?php $_tmp2=ob_get_clean();?><?php if (isset($_tmp1)&&$_tmp2) {?>

<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['this']->value->exception;?>
<?php $_tmp3=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['this']->value->exception;?>
<?php $_tmp4=ob_get_clean();?><?php if (isset($_tmp3)&&$_tmp4 instanceof Exception) {?>
<hr/>
<h2><?php echo $_smarty_tpl->tpl_vars['this']->value->translate('Additional information');?>
:</h2>
<h3><?php echo get_class($_smarty_tpl->tpl_vars['this']->value->exception);?>
</h3>
<dl>
    <dt><?php echo $_smarty_tpl->tpl_vars['this']->value->translate('File');?>
</dt>
    <dd>
        <pre class="prettyprint linenums"><?php echo $_smarty_tpl->tpl_vars['this']->value->exception->getFile();
echo $_smarty_tpl->tpl_vars['this']->value->exception->getLine();?>
</pre>
    </dd>
    <dt><?php echo $_smarty_tpl->tpl_vars['this']->value->translate('Message');?>
:</dt>
    <dd>
        <pre class="prettyprint linenums"><?php echo $_smarty_tpl->tpl_vars['this']->value->escapeHtml($_smarty_tpl->tpl_vars['this']->value->exception->getMessage());?>
</pre>
    </dd>
    <dt><?php echo $_smarty_tpl->tpl_vars['this']->value->translate('Stack trace');?>
:</dt>
    <dd>
        <pre class="prettyprint linenums"><?php echo $_smarty_tpl->tpl_vars['this']->value->escapeHtml($_smarty_tpl->tpl_vars['this']->value->exception->getTraceAsString());?>
</pre>
    </dd>
</dl><?php $_smarty_tpl->tpl_vars['e'] = new Smarty_variable($_smarty_tpl->tpl_vars['this']->value->exception->getPrevious(), null, 0);?>
    <?php if ($_smarty_tpl->tpl_vars['e']->value) {?>
<hr/>
<h2><?php echo $_smarty_tpl->tpl_vars['this']->value->translate('Previous exceptions');?>
:</h2>
<ul class="unstyled">
    <?php while ($_smarty_tpl->tpl_vars['e']->value) {?>
    <li>
        <h3><?php echo get_class($_smarty_tpl->tpl_vars['e']->value);?>
</h3>
        <dl>
            <dt><?php echo $_smarty_tpl->tpl_vars['this']->value->translate('File');?>
:</dt>
            <dd>
                <pre class="prettyprint linenums"><?php echo $_smarty_tpl->tpl_vars['e']->value->getFile();?>
:<?php echo $_smarty_tpl->tpl_vars['e']->value->getLine();?>
</pre>
            </dd>
            <dt><?php echo $_smarty_tpl->tpl_vars['this']->value->translate('Message');?>
:</dt>
            <dd>
                <pre class="prettyprint linenums"><?php echo $_smarty_tpl->tpl_vars['this']->value->escapeHtml($_smarty_tpl->tpl_vars['e']->value->getMessage());?>
</pre>
            </dd>
            <dt><?php echo $_smarty_tpl->tpl_vars['this']->value->translate('Stack trace');?>
:</dt>
            <dd>
                <pre class="prettyprint linenums"><?php echo $_smarty_tpl->tpl_vars['this']->value->escapeHtml($_smarty_tpl->tpl_vars['e']->value->getTraceAsString());?>
</pre>
            </dd>
        </dl>
    </li><?php $_smarty_tpl->tpl_vars['e'] = new Smarty_variable($_smarty_tpl->tpl_vars['e']->value->getPrevious(), null, 0);?>

    <?php }?>
</ul>
<?php }?>

<?php } else { ?>

<h3><?php echo $_smarty_tpl->tpl_vars['this']->value->translate('No Exception available');?>
</h3>

<?php }?>

<?php }?>
<?php }} ?>
