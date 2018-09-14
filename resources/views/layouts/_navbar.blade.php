@section('navbar')
    <!-- header start (remove fixed class from header in order to disable fixed navigation mode) -->
    <!-- ================ -->
    <header class="header fixed clearfix" style="background-color: #0E7FE7">
        <div class="container">
            <div class="row">
                <div class="col-md-3">

                    <!-- header-left start -->
                    <!-- ================ -->
                    <div class="header-left clearfix">

                        <!-- logo -->
                        <div class="logo" style="display: inline-block;">
                            <a href="{{ route('home') }}"><img id="logo" src="{{ asset('images/logo.png') }}"
                                                               alt="Logo"></a>
                        </div>
                        <div style="display: inline-block;margin-left: 20px;">
                            <a href="javascript:void(0);"
                               style="color: #ccc;text-decoration: none;cursor: default;">中文版</a>&nbsp;|
                            <a href="/english.html" style="color: #fff;text-decoration: none;">ENGLISH</a>
                        </div>
                    </div>
                    <!-- header-left end -->

                </div>
                <div class="col-md-9">

                    <!-- header-right start -->
                    <!-- ================ -->
                    <div class="header-right clearfix">

                        <!-- main-navigation start -->
                        <!-- ================ -->
                        <div class="main-navigation animated">

                            <!-- navbar start -->
                            <!-- ================ -->
                            <nav class="navbar navbar-default" role="navigation">
                                <div class="container-fluid">
                                    <!-- Toggle get grouped for better mobile display -->
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                                data-target="#navbar-collapse-1">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                    </div>
                                    <!-- Collect the nav links, forms, and other content for toggling -->
                                    <div class="collapse navbar-collapse" id="navbar-collapse-1">
                                        <ul class="nav navbar-nav navbar-right">
                                            <!-- mega-menu start -->
                                            <li class="dropdown">
                                                <a href="" class="dropdown-toggle" data-toggle="dropdown"
                                                   style="cursor: default;">资源</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{ route('newspaper') }}"><i
                                                                    class="icon-right-open"></i>报刊杂志</a></li>
                                                    <li><a href="{{ route('television') }}"><i
                                                                    class="icon-right-open"></i>电视媒体</a></li>
                                                    <li><a href="{{ route('outdoor') }}"><i class="icon-right-open"></i>户外媒体</a>
                                                    </li>
                                                    <li><a href="{{ route('transform') }}"><i
                                                                    class="icon-right-open"></i>交通媒体</a></li>
                                                    <li><a href="{{ route('online') }}"><i class="icon-right-open"></i>线上媒体</a>
                                                    </li>
                                                    <li><a href="{{ route('internetCelebrity') }}"><i
                                                                    class="icon-right-open"></i>网络红人</a></li>
                                                </ul>
                                            </li>
                                            <!-- mega-menu end -->
                                            <li class="dropdown">
                                                <a href="{{ route('insight') }}" class="dropdown-toggle"
                                                   data-toggle="dropdown">洞察</a>
                                            </li>
                                            <!-- mega-menu start -->
                                            <li class="dropdown">
                                                <a href="" class="dropdown-toggle" data-toggle="dropdown"
                                                   style="cursor: default;">案例</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{ route('cases') }}"><i class="icon-right-open"></i>全部</a>
                                                    </li>
                                                    <li><a href="#"><i class="icon-right-open"></i>游戏</a></li>
                                                    <li><a href="#"><i class="icon-right-open"></i>应用</a></li>
                                                    <li><a href="#"><i class="icon-right-open"></i>电商</a></li>
                                                    <li><a href="#"><i class="icon-right-open"></i>旅游</a></li>
                                                    <li><a href="#"><i class="icon-right-open"></i>汽车</a></li>
                                                    <li><a href="#"><i class="icon-right-open"></i>3C电子产品</a></li>
                                                    <li><a href="#"><i class="icon-right-open"></i>快销品</a></li>
                                                    <li><a href="#"><i class="icon-right-open"></i>其他</a></li>
                                                </ul>
                                            </li>
                                            <!-- mega-menu end -->
                                            <li class="dropdown">
                                                <a href="{{ route('services') }}" class="dropdown-toggle"
                                                   data-toggle="dropdown">服务</a>
                                            </li>
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                                   style="cursor:default;">关于</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{ route('about') }}"><i class="icon-right-open"></i>关于我们</a>
                                                    </li>
                                                    <li><a href="{{ route('aboutIn') }}"><i class="icon-right-open"></i>公司动态</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                                   style="cursor:default;">联系</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{ route('contact') }}"><i class="icon-right-open"></i>联系我们</a>
                                                    </li>
                                                    <li><a href="{{ route('job') }}"><i class="icon-right-open"></i>加入我们</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                            <!-- navbar end -->
                        </div>
                        <!-- main-navigation end -->
                    </div>
                    <!-- header-right end -->
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->
@show