<?php /* Smarty version Smarty-3.1.21, created on 2015-03-16 17:30:22
         compiled from "E:\Mipow\download\template\default\layout\layout.phtml" */ ?>
<?php /*%%SmartyHeaderCode:296985507051edb7ca3-67425547%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '564486b48d0342793105e4b3fd8ae493d4a8eb9f' => 
    array (
      0 => 'E:\\Mipow\\download\\template\\default\\layout\\layout.phtml',
      1 => 1425622541,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '296985507051edb7ca3-67425547',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'this' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_55070521443c99_35766982',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55070521443c99_35766982')) {function content_55070521443c99_35766982($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['this']->value->doctype();?>

<html lang="en">
<head>
    <meta charset="utf-8">

    <?php echo $_smarty_tpl->tpl_vars['this']->value->headTitle("mipow得到")->setSeparator(" - ")->setAutoEscape(false);?>

    <?php echo $_smarty_tpl->tpl_vars['this']->value->headMeta()->appendName("viewport","width=device-width,
    initial-scale=1.0")->appendHttpEquiv("X-UA-Compatible","IE=edge");?>



    
    <?php echo $_smarty_tpl->tpl_vars['this']->value->headLink(array('rel'=>'shortcut icon','type'=>'image/vnd.microsoft.icon','href'=>((string)$_smarty_tpl->tpl_vars['this']->value->basePath())."
    /img/mipow.ico"))->prependStylesheet(((string)$_smarty_tpl->tpl_vars['this']->value->basePath())."/css/style.css")->prependStylesheet(((string)$_smarty_tpl->tpl_vars['this']->value->basePath())."/css/bootstrap-theme.min.css")->prependStylesheet(((string)$_smarty_tpl->tpl_vars['this']->value->basePath())."/css/bootstrap.min.css")->prependStylesheet(((string)$_smarty_tpl->tpl_vars['this']->value->basePath())."/css/front.css");?>


    <!-- Scripts -->
    <?php echo $_smarty_tpl->tpl_vars['this']->value->headScript()->prependFile(((string)$_smarty_tpl->tpl_vars['this']->value->basepath())."/js/down.js")->prependFile(((string)$_smarty_tpl->tpl_vars['this']->value->basePath())."/js/bootstrap.min.js")->prependFile(((string)$_smarty_tpl->tpl_vars['this']->value->basePath())."/js/jquery.min.js")->prependFile(((string)$_smarty_tpl->tpl_vars['this']->value->basePath())."/js/respond.min.js",'text/javascript',array('conditional'=>'lt IE 9'))->prependFile(((string)$_smarty_tpl->tpl_vars['this']->value->basePath())."/js/html5shiv.js",'text/javascript',array('conditional'=>'lt IE 9'));?>


</head>
<body>
<div class="nav-container">
    <div class="container">
        <a href="<?php echo $_smarty_tpl->tpl_vars['this']->value->url('home');?>
" class="navbar-brand"><img
                src="<?php echo $_smarty_tpl->tpl_vars['this']->value->basepath('img/logo.png');?>
"></a>

        <div class="languages">
            <?php echo $_smarty_tpl->tpl_vars['this']->value->checklang();?>

        </div>
    </div>
</div>
<div class="" id="main">

<?php echo $_smarty_tpl->tpl_vars['this']->value->content;?>

    <hr>
    <footer>
        <p>&copy; 2005 - <?php echo date('Y');?>
 by Zend Technologies
            Ltd. <?php echo $_smarty_tpl->tpl_vars['this']->value->translate('All rights reserved.');?>
</p>
    </footer>
</div>
<!-- /container -->
<?php echo $_smarty_tpl->tpl_vars['this']->value->inlineScript();?>

</body>
</html>
<?php }} ?>
