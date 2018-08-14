<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="favicon.ico">
    <title>@yield('title', 'Zetin 正点国际传媒')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Font Awesome CSS -->
    <link href="{{ asset('fonts/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <!-- Fontello CSS -->
    <link href="{{ asset('fonts/fontello/css/fontello.css') }}" rel="stylesheet">

    <!-- Plugins -->
    <link href="{{ asset('plugins/rs-plugin/css/settings.css') }}" media="screen" rel="stylesheet">
    <link href="{{ asset('plugins/rs-plugin/css/extralayers.css') }}" media="screen" rel="stylesheet">
    <link href="{{ asset('plugins/magnific-popup/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animations.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet">

    <!-- iDea core CSS file -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Color Scheme (In order to change the color scheme, replace the red.css with the color scheme that you prefer)-->
    <link href="{{ asset('css/skins/red.css') }}" rel="stylesheet">

    <!-- Custom css -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>

<!-- scrollToTop -->
<!-- ================ -->
<div class="scrollToTop"><i class="icon-up-open-big"></i></div>

<!-- page wrapper start -->
<!-- ================ -->
<div class="page-wrapper">

    <!-- header start (remove fixed class from header in order to disable fixed navigation mode) -->
    <!-- ================ -->
    <header class="header fixed clearfix">
        <div class="container">
            <div class="row">
                <div class="col-md-3">

                    <!-- header-left start -->
                    <!-- ================ -->
                    <div class="header-left clearfix">

                        <!-- logo -->
                        <div class="logo">
                            <a href="{{ route('home') }}"><img id="logo" src="{{ asset('images/logo.png') }}" alt="Logo"></a>
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
                                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
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
                                                <a href="" class="dropdown-toggle" data-toggle="dropdown" style="cursor: default;">资源</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{ route('newspaper') }}"><i class="icon-right-open"></i>报刊杂志</a></li>
                                                    <li><a href="resources_television.html"><i class="icon-right-open"></i>电视媒体</a></li>
                                                    <li><a href="resources_outdoor.html"><i class="icon-right-open"></i>户外媒体</a></li>
                                                    <li><a href="resources_transform.html"><i class="icon-right-open"></i>交通媒体</a></li>
                                                    <li><a href="#"><i class="icon-right-open"></i>线上媒体</a></li>
                                                    <li><a href="resources_internetcelebrity.html"><i class="icon-right-open"></i>网络红人</a></li>
                                                </ul>
                                            </li>
                                            <!-- mega-menu end -->
                                            <li class="dropdown">
                                                <a href="insight.html" class="dropdown-toggle" data-toggle="dropdown">洞察</a>
                                            </li>
                                            <!-- mega-menu start -->
                                            <li class="dropdown">
                                                <a href="cases.html" class="dropdown-toggle" data-toggle="dropdown">案例</a>
                                                <ul class="dropdown-menu">
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
                                                <a href="services.html" class="dropdown-toggle" data-toggle="dropdown">服务</a>
                                            </li>
                                            <li class="dropdown">
                                                <a href="about.html" class="dropdown-toggle" data-toggle="dropdown">关于</a>
                                            </li>
                                            <li class="dropdown">
                                                <a href="" class="dropdown-toggle" data-toggle="dropdown" style="cursor:default;">联系</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{ route('contact') }}"><i class="icon-right-open"></i>联系我们</a></li>
                                                    <li><a href="{{ route('job') }}"><i class="icon-right-open"></i>加入我们</a></li>
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

@yield('content')

    <footer id="footer">
        <!-- .subfooter start -->
        <!-- ================ -->
        <div class="subfooter">
            <div class="container">
                <div class="row">
                    <nav class="navbar navbar-default" role="navigation">
                        <!-- Toggle get grouped for better mobile display -->
                        <div class="col-md-6" id="navbar-collapse-2">
                            <p>Copyright © 2010-2015 zenith100.com 正点国际传媒 版权所有 Power by 虫鸣科技 京ICP备17065992号-1</p>
                        </div>
                        <div class="collapse navbar-collapse " style="position: absolute;right: 0;bottom: -20px;">
                            <ul class="social-links circle">
                                <li class="twitter"><a target="_blank" href="#"><i class="fa fa-weixin"></i></a></li>
                                <li class="googleplus"><a target="_blank" href="#"><i class="fa fa-weibo"></i></a></li>
                                <li class="facebook"><a target="_blank" href="#"><i class="fa fa-facebook"></i></a></li>
                                <li class="linkedin"><a target="_blank" href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- .subfooter end -->
    </footer>
</div>
<script type="text/javascript" src="{{ asset('plugins/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>

<!-- Modernizr javascript -->
<script type="text/javascript" src="{{ asset('plugins/modernizr.js') }}"></script>

<!-- jQuery REVOLUTION Slider  -->
<script type="text/javascript" src="{{ asset('plugins/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>

<!-- Isotope javascript -->
<script type="text/javascript" src="{{ asset('plugins/isotope/isotope.pkgd.min.js') }}"></script>

<!-- Owl carousel javascript -->
<script type="text/javascript" src="{{ asset('plugins/owl-carousel/owl.carousel.js') }}"></script>

<!-- Magnific Popup javascript -->
<script type="text/javascript" src="{{ asset('plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>

<!-- Appear javascript -->
<script type="text/javascript" src="{{ asset('plugins/jquery.appear.js') }}"></script>

<!-- Count To javascript -->
<script type="text/javascript" src="{{ asset('plugins/jquery.countTo.js') }}"></script>

<!-- Parallax javascript -->
<script src="{{ asset('plugins/jquery.parallax-1.1.3.js') }}"></script>

<!-- Contact form -->
<script src="{{ asset('plugins/jquery.validate.js') }}"></script>

<!-- Initialization of Plugins -->
<script type="text/javascript" src="{{ asset('js/template.js') }}"></script>

<!-- Custom Scripts -->
<script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
</body>
</html>