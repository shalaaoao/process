    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->        
        <ul class="page-sidebar-menu">
            <li>
            <form class="search-form search-form-sidebar" role="form">
                <div class="input-icon right">
                    <i class="icon-search"></i>
                    <input type="text" class="form-control input-medium input-sm" placeholder="Search...">
                </div>
            </form>
            </li>
            <li>
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            <div class="sidebar-toggler"></div>
            <div class="clearfix"></div>
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            </li>
        @if(Auth::User()->role == 0)
            <li class="{{$menu['dashboard']?'active':''}}">
                <a href="{{action('admin.dashboard')}}">
                    <i class="icon-home"></i>
                    <span class="title">首页</span>
                    <span class="selected"></span>
                </a>
            </li>
            <li class="{{$menu['system_list']?'active':''}}">
                <a href="{{action('admin.system_list')}}">
                    <i class="icon-asterisk"></i>
                    <span class="title">系统</span>
                    <span class="selected"></span>
                </a>
            </li>
            <li class="{{$menu['operate_list']?'active':''}}">
                <a href="{{action('admin.operate_list')}}">
                    <i class="icon-arrow-down"></i>
                    <span class="title">操作</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="{{$menu['user']?'active':''}}">
                <a href="javascript:;">
                    <i class="icon-list-alt"></i>
                    <span class="title">用户</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="{{$menu['operate_user']?'active':''}}">
                        <a href="{{action('admin.operate_user')}}">操作员查询</a>
                    </li>
                    <li class="{{$menu['add_user']?'active':''}}">
                        <a href="{{action('admin.add_user')}}">操作员增加</a>
                    </li>
                </ul>
            </li>

            <li class="{{$menu['day_process']?'active':''}}">
                <a href="{{action('admin.day_process')}}">
                    <i class="icon-flag"></i>
                    <span class="title">今日操作</span>
                    <span class="selected"></span>
                </a>
            </li>
            @endif
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
