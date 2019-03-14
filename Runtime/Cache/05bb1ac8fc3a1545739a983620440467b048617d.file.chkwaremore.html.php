<?php /* Smarty version Smarty-3.1.6, created on 2019-03-14 18:08:16
         compiled from "D:/amp/Apache24/htdocs/mjiang/Home/View\Manager\chkwaremore.html" */ ?>
<?php /*%%SmartyHeaderCode:152165c8a2810cc0270-30752636%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '05bb1ac8fc3a1545739a983620440467b048617d' => 
    array (
      0 => 'D:/amp/Apache24/htdocs/mjiang/Home/View\\Manager\\chkwaremore.html',
      1 => 1552558071,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '152165c8a2810cc0270-30752636',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'name' => 0,
    'shedid' => 0,
    'wares' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5c8a2810de3b1',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c8a2810de3b1')) {function content_5c8a2810de3b1($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>牧江科技</title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo @PUBLIC_ROOT_URL;?>
assets/images/favicon.ico">

        <!-- DataTables -->
        <link href="<?php echo @PUBLIC_ROOT_URL;?>
plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo @PUBLIC_ROOT_URL;?>
plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="<?php echo @PUBLIC_ROOT_URL;?>
plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="<?php echo @PUBLIC_ROOT_URL;?>
assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo @PUBLIC_ROOT_URL;?>
assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo @PUBLIC_ROOT_URL;?>
assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo @PUBLIC_ROOT_URL;?>
assets/css/style.css" rel="stylesheet" type="text/css" />

        <script src="<?php echo @PUBLIC_ROOT_URL;?>
assets/js/modernizr.min.js"></script>

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


                            <!--li>
                                <a href="#"><i class="fi-share"></i> <span> 开发中 </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level nav" aria-expanded="false">
                                    <li><a href="javascript: void(0);">开发中 1.1</a></li>
                                    <li><a href="javascript: void(0);" aria-expanded="false">开发中 1.2 <span class="menu-arrow"></span></a>
                                        <ul class="nav-third-level nav" aria-expanded="false">
                                            <li><a href="javascript: void(0);">开发中 2.1</a></li>
                                            <li><a href="javascript: void(0);">开发中 2.2</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li-->

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
                        <div class="col-md-12">
                            <div class="card-box">
                                <h4><?php echo $_smarty_tpl->tpl_vars['shedid']->value;?>
舍</h4>
                                        <div class="card-box table-responsive">
                                            <!--h4 class="m-t-0 header-title"><b>动物资料:</b></h4-->
                                            <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                <thead>
                                                <tr>
                                                    <td>编号</td>
                                                    <td>设备ID(温度查询)</td>
                                                    <td>区域</td>
                                                    <td>栏号</td>
                                                    <td>状态</td>
                                                    <th>操作</th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['wares']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                                                <tr>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['v']->value["sn"];?>
</td>
                                                    <td>
                                                    	<?php if ($_smarty_tpl->tpl_vars['v']->value["devid"]>0){?>
                                                    	<a href="<?php echo @__CONTROLLER__;?>
/todayValue?devid=<?php echo $_smarty_tpl->tpl_vars['v']->value["devid"];?>
&psnid=<?php echo $_smarty_tpl->tpl_vars['v']->value["psnid"];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value["devid"];?>
</a>
                                                    	<?php }else{ ?>
                                                    	空
                                                    	<?php }?>
                                                    </td>
                                                    <td>
                                                    	<?php if ($_smarty_tpl->tpl_vars['v']->value["area"]==1){?>
                                                    	A
                                                    	<?php }else{ ?>
                                                    	B
                                                    	<?php }?>
                                                    </td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['v']->value["fold"];?>
</td>
                                                    <td>
                                                    	<?php if ($_smarty_tpl->tpl_vars['v']->value["state"]==0){?>
                                                    	正常
                                                    	<?php }else{ ?>
                                                    	离场
                                                    	<?php }?>
                                                    </td>
                                                    <!--td><img src="<?php echo @PUBLIC_ROOT_URL;?>
uploads/<?php echo $_smarty_tpl->tpl_vars['v']->value['pic_url'];?>
" alt="" height="60"></td-->
                                                    <td>
                                                        <button type="button" id="changeup" onclick="chkwaremore(<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
)"
                                                                class="btn btn-primary mt-2">
                                                            <span>查看</span> </button>
                                                        <?php if ($_smarty_tpl->tpl_vars['v']->value["state"]==0){?>    	
                                                        <button type="button" id="changeup" onclick="exitwaremore(<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
,<?php echo $_smarty_tpl->tpl_vars['v']->value['psnid'];?>
)"
                                                                class="btn btn-primary mt-2">
                                                            <span>离场</span> </button>
                                                        <?php }?> 
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                                </tbody>
                                            </table>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->
                    </div>
                </div> <!-- content -->
                <footer class="footer text-right">
                    2017 - 2018 © Abstack. - Coderthemes.com
                </footer>
            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
        </div>
        <!-- END wrapper -->
    </body>

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

    <!-- Required datatable js -->
    <script src="<?php echo @PUBLIC_ROOT_URL;?>
plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo @PUBLIC_ROOT_URL;?>
plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="<?php echo @PUBLIC_ROOT_URL;?>
plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="<?php echo @PUBLIC_ROOT_URL;?>
plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo @PUBLIC_ROOT_URL;?>
plugins/datatables/jszip.min.js"></script>
    <script src="<?php echo @PUBLIC_ROOT_URL;?>
plugins/datatables/pdfmake.min.js"></script>
    <script src="<?php echo @PUBLIC_ROOT_URL;?>
plugins/datatables/vfs_fonts.js"></script>
    <script src="<?php echo @PUBLIC_ROOT_URL;?>
plugins/datatables/buttons.html5.min.js"></script>
    <script src="<?php echo @PUBLIC_ROOT_URL;?>
plugins/datatables/buttons.print.min.js"></script>
    <!-- Responsive examples -->
    <script src="<?php echo @PUBLIC_ROOT_URL;?>
plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="<?php echo @PUBLIC_ROOT_URL;?>
plugins/datatables/responsive.bootstrap4.min.js"></script>

    <!-- App js -->
    <script src="<?php echo @PUBLIC_ROOT_URL;?>
assets/js/jquery.core.js"></script>
    <script src="<?php echo @PUBLIC_ROOT_URL;?>
assets/js/jquery.app.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            //Buttons examples
            var table = $('#datatable-buttons').DataTable({
                lengthChange: true,
                info: true,
                buttons: ['excel'],
                language: {
                    "sProcessing": "处理中...",
                    "sLengthMenu": "显示 _MENU_ 项结果",
                    "sZeroRecords": "没有匹配结果",
                    "sInfo": "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
                    "sInfoEmpty": "显示第 0 至 0 项结果，共 0 项",
                    "sInfoFiltered": "(由 _MAX_ 项结果过滤)",
                    "sInfoPostFix": "",
                    "sSearch": "搜索:",
                    "sUrl": "",
                    "sEmptyTable": "表中数据为空",
                    "sLoadingRecords": "载入中...",
                    "sInfoThousands": ",",
                    "oPaginate": {
                        "sFirst": "首页",
                        "sPrevious": "上页",
                        "sNext": "下页",
                        "sLast": "末页"
                    },
                    "oAria": {
                        "sSortAscending": ": 以升序排列此列",
                        "sSortDescending": ": 以降序排列此列"
                    }
                }
            });

            table.buttons().container()
                .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
        } );

        function chkwaremore(ware_id){
            window.location.href="<?php echo @__APP__;?>
/manager/chkwareview?id="+ware_id;
        }

        function exitwaremore(devid){
            window.location.href="<?php echo @__APP__;?>
/manager/exitfieldview1?id="+devid;
        }

    </script>
</html><?php }} ?>