<?php /* Smarty version Smarty-3.1.6, created on 2019-03-14 18:09:24
         compiled from "D:/amp/Apache24/htdocs/mjiang/Home/View\Manager\todayValue.html" */ ?>
<?php /*%%SmartyHeaderCode:294445c8a22fee660f6-43656817%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bf5be38b3a9da2644adbf88e09008cd6c4bbbad4' => 
    array (
      0 => 'D:/amp/Apache24/htdocs/mjiang/Home/View\\Manager\\todayValue.html',
      1 => 1552558152,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '294445c8a22fee660f6-43656817',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5c8a22fef2a20',
  'variables' => 
  array (
    'name' => 0,
    'dateArr' => 0,
    'temp1Arr' => 0,
    'temp2Arr' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c8a22fef2a20')) {function content_5c8a22fef2a20($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

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
        
    <link rel="stylesheet" href="<?php echo @WEUI_URL;?>
/weui.min.css">
    <link rel="stylesheet" href="<?php echo @WEUI_URL;?>
/jquery-weui.css">
    <link rel="stylesheet" href="<?php echo @WEUI_URL;?>
/demos.css?v=01.01.01">
    <title>今日温度</title>
</head>
<body style="height: 100%; margin: 0">

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
			<div class="container-fluid">
				<div class="row mt-4">
					<div class="col-md-12">
						<div class="card-box mt-6">
							<div style="position: relative;margin-top: 30px;width: 100%" class="demos-title" id="title">
							</div>
							<div id="main" style="height:500px;"></div>
						</div>  
					</div>  
				</div>  
			</div>      
		</div>
</div>

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

    <!-- App js -->
    <script src="<?php echo @PUBLIC_ROOT_URL;?>
assets/js/jquery.core.js"></script>
    <script src="<?php echo @PUBLIC_ROOT_URL;?>
assets/js/jquery.app.js"></script>
    
<script src="<?php echo @AJS_URL;?>
echarts.min.js?v=01.01.02"></script>
<script src="<?php echo @AJS_URL;?>
macarons.js?"></script>
<script src="<?php echo @AJS_URL;?>
jquery-3.2.1.min.js"></script>
<script type="text/javascript">
    // 基于准备好的dom，初始化echarts实例
    var myChart = echarts.init(document.getElementById('main'),'macarons');
    $(document).ready(function() {
        var C1=window.location.href.split("?")[1];
        var time=C1.split("=")[2];
       // console.log(time);
        var uptime=  time.substring(5,10);
        document.getElementById("title").innerHTML=uptime;

       var date = JSON.parse('<?php echo $_smarty_tpl->tpl_vars['dateArr']->value;?>
');
       var temp1 = JSON.parse('<?php echo $_smarty_tpl->tpl_vars['temp1Arr']->value;?>
');
       var temp2 = JSON.parse('<?php echo $_smarty_tpl->tpl_vars['temp2Arr']->value;?>
');
       var min1 = Math.min.apply(null, temp1);
       var min2 = Math.min.apply(null, temp2);

       var min;
       if (min1<min2){
           min = min1;
       }else {
           min = min2;
       }

      //  console.log(date,temp1,temp2);
        var option = {
            tooltip: {
                trigger: 'axis',
        axisPointer: {
            type: 'cross',
            label: {
                backgroundColor: '#283b56'
            }
        }
            },
            legend: {
                data:['体温']
            },
    toolbox: {
        show: true,
        feature: {
            dataView: {readOnly: false},
            magicType: {type: ['line', 'bar']},
            restore: {},
        }
    },
            xAxis:  {
                type: 'category',
                boundaryGap: false,
                data:date,
            },
            dataZoom: [{
                type: 'inside',
                start: 0,
                end: 100
            }, {
                start:0,
                end: 100,
                handleIcon: 'M10.7,11.9v-1.3H9.3v1.3c-4.9,0.3-8.8,4.4-8.8,9.4c0,5,3.9,9.1,8.8,9.4v1.3h1.3v-1.3c4.9-0.3,8.8-4.4,8.8-9.4C19.5,16.3,15.6,12.2,10.7,11.9z M13.3,24.4H6.7V23h6.6V24.4z M13.3,19.6H6.7v-1.4h6.6V19.6z',
                handleSize: '80%',
                handleStyle: {
                    color: '#fff',
                    shadowBlur: 3,
                    shadowColor: 'rgba(0, 0, 0, 0.6)',
                    shadowOffsetX: 2,
                    shadowOffsetY: 2
                }
            }],
            yAxis: {
                type: 'value',
                axisLabel: {
                    formatter: '{value}°C'
                },
                min:36,
                max:42,
            },
            series: [
                {
                    name:'体温',
                    type:'line',
                    data:temp1,
                    markPoint: {
										data: [
											{type: 'max', name: '最大值'},
											{type: 'min', name: '最小值'}
											]
										},
										markLine: {
										data: [
											{type: 'average', name: '平均值'}
											]
										}

                }
            ]
        };
        myChart.setOption(option);
    });
    // 使用刚指定的配置项和数据显示图表。

</script>
</body>
</html><?php }} ?>