<?php /* Smarty version Smarty-3.1.21, created on 2015-03-16 17:23:16
         compiled from "E:\Mipow\download\template\default\admin\layout.phtml" */ ?>
<?php /*%%SmartyHeaderCode:1736455070374a22311-18924632%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '989958e8ed9a513ae0df1abdc5848ac4027a2325' => 
    array (
      0 => 'E:\\Mipow\\download\\template\\default\\admin\\layout.phtml',
      1 => 1425885623,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1736455070374a22311-18924632',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'this' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5507037818f786_91314370',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5507037818f786_91314370')) {function content_5507037818f786_91314370($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['this']->value->doctype();?>

<html lang="en">
<head>
    <?php echo $_smarty_tpl->tpl_vars['this']->value->headMeta()->setCharset('UTF-8')->appendHttpEquiv('Cache-Control','no-cache')->appendName('viewport','width=device-width, initial-scale=1.0')->appendName("description",'')->appendName("author",'');?>

    <?php echo $_smarty_tpl->tpl_vars['this']->value->headTitle("AdminPage")->setSeparator("|")->setAutoEscape(false);?>

    <?php echo $_smarty_tpl->tpl_vars['this']->value->headLink(array('rel'=>'shortcut icon','href'=>'$this->basePath()/img/mipow.ico'),'PREPEND')->appendStylesheet($_smarty_tpl->tpl_vars['this']->value->basePath("media/css/bootstrap.min.css"))->appendStylesheet($_smarty_tpl->tpl_vars['this']->value->basePath('media/css/style.css'))->appendStylesheet($_smarty_tpl->tpl_vars['this']->value->basePath('media/css/bootstrap-responsive.min.css'))->appendStylesheet($_smarty_tpl->tpl_vars['this']->value->basePath('css/admin.css'))->appendStylesheet($_smarty_tpl->tpl_vars['this']->value->basePath('media/css/default.css'))->appendStylesheet($_smarty_tpl->tpl_vars['this']->value->basePath('media/css/font-awesome.min.css'))->appendStylesheet($_smarty_tpl->tpl_vars['this']->value->basePath('media/css/style-responsive.css'));?>



    <?php echo $_smarty_tpl->tpl_vars['this']->value->headScript()->appendFile($_smarty_tpl->tpl_vars['this']->value->basePath('js/bootstrap.min.js'))->prependFile($_smarty_tpl->tpl_vars['this']->value->basePath('js/jquery.min.js'))->appendFile($_smarty_tpl->tpl_vars['this']->value->basePath("media/js/jquery-ui-1.10.1.custom.min.js"))->appendFile($_smarty_tpl->tpl_vars['this']->value->basePath('media/js/respond.min.js'),'text/javascript',array('conditional'=>'lt IE9'));?>

    <?php echo '<script'; ?>
 src="/media/js/app.js" type="text/javascript"><?php echo '</script'; ?>
>
    <?php echo $_smarty_tpl->tpl_vars['this']->value->headStyle()->captureStart();?>


    <?php echo $_smarty_tpl->tpl_vars['this']->value->headStyle()->captureEnd();?>

</head>


<body class="page-header-fixed" style="">
<div class="header navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="brand" href="<?php echo $_smarty_tpl->tpl_vars['this']->value->url('admin-index');?>
">
                <img src="<?php echo $_smarty_tpl->tpl_vars['this']->value->basePath('img/logo.png');?>
" alt="logo">
            </a>
            <a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
                <img src="<?php echo $_smarty_tpl->tpl_vars['this']->value->basePath('media/image/menu-toggler.png');?>
" alt="">
            </a>
            <ul class="nav pull-right">
                <li class="dropdown user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img alt="" src="<?php echo $_smarty_tpl->tpl_vars['this']->value->basePath('media/image/avatar1_small.jpg');?>
">
                        <span class="username">Bob Nilson</span>
                        <i class="icon-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="icon-key"></i> Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar nav-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <?php echo $_smarty_tpl->tpl_vars['this']->value->navigation('navigation')->menu()->setPartial('admin\layout\partial');?>


        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
    <!-- BEGIN PAGE -->
    <div class="page-content">
        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <div id="portlet-config" class="modal hide">
            <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button"></button>
                <h3>Widget Settings</h3>
            </div>
            <div class="modal-body">
                Widget settings form goes here
            </div>
        </div>
        <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <!-- BEGIN PAGE CONTAINER-->

        <?php echo $_smarty_tpl->tpl_vars['this']->value->content;?>


        <!-- END PAGE CONTAINER-->
    </div>
    <!-- END PAGE -->
</div>

<!-- END PAGE LEVEL SCRIPTS -->
<?php echo '<script'; ?>
>
    jQuery(document).ready(function () {
        App.init(); // initlayout and core plugins

    });
<?php echo '</script'; ?>
>
<!-- END BODY -->
</div>
</body>
</html><?php }} ?>
