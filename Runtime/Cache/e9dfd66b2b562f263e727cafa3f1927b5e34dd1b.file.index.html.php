<?php /* Smarty version Smarty-3.1.6, created on 2019-03-14 18:08:05
         compiled from "D:/amp/Apache24/htdocs/mjiang/Home/View\Manager\index.html" */ ?>
<?php /*%%SmartyHeaderCode:270595c8a28058fd796-31736640%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e9dfd66b2b562f263e727cafa3f1927b5e34dd1b' => 
    array (
      0 => 'D:/amp/Apache24/htdocs/mjiang/Home/View\\Manager\\index.html',
      1 => 1552547694,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '270595c8a28058fd796-31736640',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'name' => 0,
    'field' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5c8a28059bfde',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c8a28059bfde')) {function content_5c8a28059bfde($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>爱加HOME</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo @PUBLIC_ROOT_URL;?>
assets/images/favicon.ico">
        <!-- App css -->
        <link href="<?php echo @PUBLIC_ROOT_URL;?>
assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo @PUBLIC_ROOT_URL;?>
assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo @PUBLIC_ROOT_URL;?>
assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo @PUBLIC_ROOT_URL;?>
assets/css/style.css?version=1.01.02" rel="stylesheet" type="text/css" />
        <script src="<?php echo @PUBLIC_ROOT_URL;?>
assets/js/modernizr.min.js"></script>

        <js file='__PUBLIC__/Uploadify/jquery-1.9.1.min.js'/>
        <js file='__PUBLIC__/Uploadify/jquery.uploadify.min.js'/>
        <!-- Bootstrap fileupload css -->
        <link href="<?php echo @PUBLIC_ROOT_URL;?>
plugins/bootstrap-fileupload/bootstrap-fileupload.css" rel="stylesheet" />

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="stylesheet" href="<?php echo @ACSS_URL;?>
main.css?version=1.01.02" id="color-switcher-link">
        <link rel="stylesheet" href="<?php echo @ACSS_URL;?>
animations.css">
        <link rel="stylesheet" href="<?php echo @ACSS_URL;?>
fonts.css">

    </head>
    <body>
        <!-- Begin page -->
        <div id="wrapper">
            <!-- Top Bar Start -->
            <div class="topbar">
                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="#" class="logo">
                        <span>
                        <?php echo $_smarty_tpl->tpl_vars['name']->value;?>

                        </span>
                        <i>

                        </i>
                    </a>
                </div>
                <nav class="navbar-custom">
                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left waves-light waves-effect">
                                <i class="dripicons-menu"></i>
                            </button>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- Top Bar End -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="slimscroll-menu" id="remove-scroll">
                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu" id="side-menu">
                            <li class="menu-title">牧江科技</li>
                            <li>
                                <a href="<?php echo @__CONTROLLER__;?>
/index">
                                    <i class="fa fa-desktop"></i> <span> 首页 </span>
                                </a>
                            </li>
                            
                            <li>
                                <a href="<?php echo @__CONTROLLER__;?>
/search">
                                    <i class="fa fa-search"></i> <span>搜索</span> </a></li>
                                </a>
                            </li>
                            <li>
                                <a href="javascript: void(0);"><i class="fa fa-paw"></i> <span> 牧场管理 </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                	<li><a href="<?php echo @__CONTROLLER__;?>
/chkshed">牛舍信息</a></li>
                                		<li><a href="<?php echo @__CONTROLLER__;?>
/addshed">添加牛舍</a></li>
                                    <li><a href="<?php echo @__CONTROLLER__;?>
/addanimal">添加牛只</a></li>
                                    <li><a href="<?php echo @__CONTROLLER__;?>
/chkexitview1">离场信息</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);"><i class="fa fa-group"></i> <span> 员工管理 </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="<?php echo @__CONTROLLER__;?>
/chkworker">员工信息</a></li>
                                    <li><a href="<?php echo @__CONTROLLER__;?>
/addworker">添加员工</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>
                </div>
                <!-- Sidebar -left -->
            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title float-left">牧场详情:</h4>

                                    <ol class="breadcrumb float-right">
                                    </ol>

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-xl-10 center-page">
                                <div class="text-center">
                                    <h4 class="mt-3">请选择要查看的舍.</h4>
                                    <p>
                                    点击详情,可查看舍内牛只的详细情况.
                                    </p>
                                </div>

                                <div class="row m-t-50">
																		<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['field']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                                    <!--Pricing Column-->
                                    <?php if ($_smarty_tpl->tpl_vars['v']->value["count"]>0){?>
                                    <article class="pricing-column col-md-4">
                                        <div class="inner-box card-box">
                                            <!--div class="ribbon-pricing"><span>POPULAR</span></div-->
                                            <div class="plan-header text-center">
                                                <h3 class="plan-title">舍号:</h3>
                                                <h2 class="plan-price"><?php echo $_smarty_tpl->tpl_vars['v']->value['shedid'];?>
</h2>
                                                <div class="plan-duration">牛只数量:<?php echo $_smarty_tpl->tpl_vars['v']->value['count'];?>
</div>
                                            </div>
                                            <ul class="plan-stats list-unstyled text-center">
                                                <li><b>饲养员:</b><?php echo $_smarty_tpl->tpl_vars['v']->value['workername1'];?>
</li>
                                                <li><b>兽医:</b><?php echo $_smarty_tpl->tpl_vars['v']->value['workername2'];?>
</li>
                                            </ul>

                                            <div class="text-center mb-2">
                                                <a href="<?php echo @__CONTROLLER__;?>
/chkwaremore?shedid=<?php echo $_smarty_tpl->tpl_vars['v']->value['shedid'];?>
" class="btn btn-success w-lg btn-md w-md btn-bordred btn-rounded waves-effect waves-light">详情</a>
                                            </div>
                                        </div>
                                    </article>
                                    <?php }?>
																		<?php } ?>
                                </div>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer text-right">
                    2017 - 2018 © 牧江科技. - MJiang.com
                </footer>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
        </div>
        <!-- END wrapper -->
    </body>

<script type="text/javascript">
    function searchsn(){
    	var sn=document.getElementById('search').value;
    	window.location.href="<?php echo @__CONTROLLER__;?>
/search?id="+sn;
    }
</script>
    <!-- jQuery  -->
    <script src="<?php echo @PUBLIC_ROOT_URL;?>
assets/js/jquery.min.js"></script>
    <script src="<?php echo @PUBLIC_ROOT_URL;?>
assets/js/popper.min.js"></script>
    <script src="<?php echo @PUBLIC_ROOT_URL;?>
assets/js/bootstrap.min.js"></script>
    <script src="<?php echo @PUBLIC_ROOT_URL;?>
assets/js/metisMenu.min.js"></script>
    <script src="<?php echo @PUBLIC_ROOT_URL;?>
assets/js/waves.js"></script>
    <script src="<?php echo @PUBLIC_ROOT_URL;?>
assets/js/jquery.slimscroll.js"></script>
    <script src="<?php echo @PUBLIC_ROOT_URL;?>
plugins/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="<?php echo @PUBLIC_ROOT_URL;?>
plugins/counterup/jquery.counterup.min.js"></script>

    <!-- Bootstrap fileupload js -->
    <script src="<?php echo @PUBLIC_ROOT_URL;?>
plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>

    <!-- Chart JS -->
    <script src="<?php echo @PUBLIC_ROOT_URL;?>
plugins/chart.js/chart.bundle.js"></script>

    <!-- init dashboard -->
    <script src="<?php echo @PUBLIC_ROOT_URL;?>
assets/pages/jquery.dashboard.init.js"></script>

    <!-- App js -->
    <script src="<?php echo @PUBLIC_ROOT_URL;?>
assets/js/jquery.core.js"></script>
    <script src="<?php echo @PUBLIC_ROOT_URL;?>
assets/js/jquery.app.js"></script>

    <script src="<?php echo @AJS_URL;?>
compressed.js"></script>
    <script src="<?php echo @AJS_URL;?>
main.js"></script>
</html><?php }} ?>