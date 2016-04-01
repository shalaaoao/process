<!-- vim:set filetype=phtml: -->
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8" />
<title> 发财树-基金api </title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="" name="description" />
<meta content="xiang" name="author" />
<!-- BEGIN GLOBAL MANDATORY STYLES -->          
<link rel="stylesheet" type="text/css" href="/assets/plugins/font-awesome/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="/assets/plugins/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="/assets/plugins/uniform/css/uniform.default.css" />
<script src="/assets/js/common/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="/assets/js/common/admin.js" type="text/javascript"></script>

    <!-- END GLOBAL MANDATORY STYLES -->

<!-- BEGIN PAGE LEVEL PLUGIN STYLES --> 
@yield('css')
<!-- END PAGE LEVEL PLUGIN STYLES -->

<!-- BEGIN THEME STYLES --> 
<link href="/assets/css/style-conquer.css" rel="stylesheet" type="text/css"/>
<link href="/assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="/assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
<link href="/assets/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="/assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="/assets/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->

<link rel="shortcut icon" href="favicon.ico" />
<link href="/assets/css/admin.css" rel="stylesheet" type="text/css"/>

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body style="min-width:1100px">
<!-- BEGIN HEADER -->   
<div class="header navbar navbar-inverse" style="height:45px;">
    <!-- BEGIN TOP NAVIGATION BAR -->
    <div class="header-inner">
        <!-- BEGIN LOGO -->  
        <a class="navbar-brand" href="">
            <div style="height:50px;line-height:50px;float:left;padding-left:20px;margin-top:-20px;">后台管理</div>
        </a>
        <!-- END LOGO -->

        <!-- BEGIN TOP NAVIGATION MENU -->
        <ul class="nav navbar-nav pull-right">
            <!-- message -->
            <li id="header_inbox_bar" class="dropdown">
               <a data-close-others="true" data-hover="dropdown" data-toggle="dropdown" class="dropdown-toggle" href="#">
               <i class="icon-envelope"></i>
               <span class="badge badge-info"></span>
               </a>
            </li>
            <!-- end-message -->
            <!-- BEGIN USER LOGIN DROPDOWN -->
            <li class="dropdown user">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                <span class="username">  </span> <!-- 登录用户 -->
                <i class="icon-angle-down"></i>
            </a>
            <ul class="dropdown-menu">
                <li><a href="{{action('admin.logout')}}"><i class="icon-key"></i> 登出 </a>
                </li>
            </ul>
            </li>
            <!-- END USER LOGIN DROPDOWN -->
        </ul>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END TOP NAVIGATION BAR -->
</div>
<!-- END HEADER -->
<!-- BEGIN CONTAINER -->
<div class="page-container">
    @include('admin.sidebar')
    <!-- BEGIN PAGE -->
    <div class="page-content">       
        @yield('content')
    </div>
    <!-- END PAGE -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="footer">
    <div class="footer-inner">
        2015 &copy; <font style="color:#69c">#</font> Power By Mushroom Shalaaoao
    </div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->   
<!--[if lt IE 9]>
<script src="/assets/plugins/respond.min.js"></script>
<script src="/assets/plugins/excanvas.min.js"></script>
<![endif]-->   
<script src="/assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="/assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>
<script src="/assets/plugins/jquery-slimscroll/jquery.slimscroll.js" type="text/javascript"></script>
<script src="/assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>  
<script src="/assets/plugins/jquery.cookie.min.js" type="text/javascript"></script>
<script src="/assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
<!-- END CORE PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="/assets/scripts/app.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->

<script>
    $(function(){
        App.init();
    })
</script>
@yield("javascript")
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>



