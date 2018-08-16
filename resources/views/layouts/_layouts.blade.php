<!doctype html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="favicon.ico">

    <meta name="Keywords" content="正点,广告公司,广告,传媒，媒体资源">
    <meta name="description" content="正点国际传媒（ZETIN Group）是中国首家全渠道品牌出海服务商，专注于为旅游业、互联网行业、制造业等中国出海企业提供品牌全球化服务。公司兼具国际化视野及本地化优势，拥有庞大的全球优质媒体资源、覆盖全球的媒体资源库，为品牌产品的推广投放提供有力支持，致力于帮助众多客户制胜海外市场，以全球化视野整合本地资源，用客制化服务满足用户需求。">
    <meta name="author" content="ZETIN Group">

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

    @include('layouts._navbar')

    @yield('content')

    @include('layouts._footer')
</div>

<!-- JavaScript files placed at the end of the document so the pages load faster
		================================================== -->
<!-- Jquery and Bootstap core js files -->
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