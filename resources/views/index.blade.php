@extends('layouts._layouts')

@section('content')
    <!-- banner start -->
    <!-- ================ -->
    <div class="banner">

        <!-- slideshow start -->
        <!-- ================ -->
        <div class="slideshow white-bg">

            <!-- slider revolution start -->
            <!-- ================ -->
            <div class="slider-banner-container">
                <div class="slider-banner-2 bullets-with-bg">
                    <ul>
                        <!-- slide 1 start -->
                        <li data-transition="fade" data-slotamount="7" data-masterspeed="1000" data-saveperformance="on"
                            data-title="Slide 1" class="dark-translucent-bg">

                            <!-- main image -->
                            <img src="images/bg1.jpg" alt="slidebg1" data-bgposition="center top" data-bgfit="cover"
                                 data-bgrepeat="no-repeat">

                            <!-- LAYER NR. 1 -->
                            <div class="tp-caption large_text sfl tp-resizeme"
                                 data-x="center"
                                 data-y="70"
                                 data-speed="600"
                                 data-start="0"
                                 data-end="10000"
                                 data-endspeed="600">中国品牌国际化服务商
                            </div>

                            <!-- LAYER NR. 2 -->
                            <div class="tp-caption small_thin_white sfr text-center tp-resizeme"
                                 data-x="center"
                                 data-y="170"
                                 data-speed="600"
                                 data-start="0"
                                 data-end="10000"
                                 data-endspeed="600">正点国际传媒（ZETIN Group）是中国首家全渠道品牌出海服务商，<br>专注于为旅游业、互联网行业、制造业等中国出海企业提供品牌全球化服务。<br>公司兼具国际化视野及本地化优势，拥有庞大的全球优质媒体资源、覆盖全球的媒体资源库，<br>为品牌产品的推广投放提供有力支持，致力于帮助众多客户制胜海外市场，<br>以全球化视野整合本地资源，用客制化服务满足用户需求。
                            </div>

                            <!-- LAYER NR. 3 -->
                            <div class="tp-caption tp-resizeme sfl"
                                 data-x="center"
                                 data-y="350"
                                 data-speed="600"
                                 data-start="0"
                                 data-end="10000"
                                 data-endspeed="600"><a href="{{ route('about') }}" class="btn btn-default btn-lg">了解更多<i
                                            class="fa fa-angle-double-right pl-10"></i></a>
                            </div>

                        </li>
                        <!-- slide 1 end -->

                        <!-- slide 2 start -->
                        <li data-transition="fade" data-slotamount="7" data-masterspeed="1000" data-saveperformance="on"
                            data-title="Slide 2" class="dark-translucent-bg">

                            <!-- main image -->
                            <img src="images/bg2.jpg" alt="slidebg1" data-bgposition="center top" data-bgfit="cover"
                                 data-bgrepeat="no-repeat">

                            <!-- LAYER NR. 1 -->
                            <div class="tp-caption large_text sfl tp-resizeme"
                                 data-x="center"
                                 data-y="70"
                                 data-speed="600"
                                 data-start="0"
                                 data-end="10000"
                                 data-endspeed="600">全球优势媒体资源
                            </div>

                            <!-- LAYER NR. 2 -->
                            <div class="tp-caption sfr small_thin_white text-center tp-resizeme"
                                 data-x="center"
                                 data-y="170"
                                 data-speed="600"
                                 data-start="0"
                                 data-end="10000"
                                 data-endspeed="600">凭借与海外主流传统媒体、专业媒体的多年深度合作和良好关系，为客户提供多渠道、多媒介的全球传播服务，<br>包括但不限于纸媒、户外媒体、电视媒体、网络媒体、网络红人等，为品牌扩大海外影响力和转化率。
                            </div>

                            <!-- LAYER NR. 3 -->
                            <div class="tp-caption sfl tp-resizeme"
                                 data-x="center"
                                 data-y="300"
                                 data-speed="600"
                                 data-start="0"
                                 data-end="10000"
                                 data-endspeed="600"><a href="#resources" class="btn btn-default btn-lg">了解更多 <i
                                            class="fa fa-angle-double-right pl-10"></i></a>
                            </div>

                        </li>
                        <!-- slide 2 end -->

                        <!-- slide 3 start -->
                        <li data-transition="fade" data-slotamount="7" data-masterspeed="1000" data-saveperformance="on"
                            data-title="Slide 2" class="dark-translucent-bg">

                            <!-- main image -->
                            <img src="images/bg3.jpg" alt="slidebg3" data-bgposition="center top" data-bgfit="cover"
                                 data-bgrepeat="no-repeat">

                            <!-- LAYER NR. 1 -->
                            <div class="tp-caption large_text sfl tp-resizeme"
                                 data-x="center"
                                 data-y="70"
                                 data-speed="600"
                                 data-start="0"
                                 data-end="10000"
                                 data-endspeed="600">本地化传播服务
                            </div>

                            <!-- LAYER NR. 2 -->
                            <div class="tp-caption sfr small_thin_white text-center tp-resizeme"
                                 data-x="center"
                                 data-y="170"
                                 data-speed="600"
                                 data-start="0"
                                 data-end="10000"
                                 data-endspeed="600">提供海外推广全案服务。破除海外市场的屏障，推进中国品牌走出去的进程。<br>以品牌为核心，为客户进行市场洞察、创意策划、线上线下整合营销和本地化运营。
                            </div>

                            <!-- LAYER NR. 3 -->
                            <div class="tp-caption sfl tp-resizeme"
                                 data-x="center"
                                 data-y="300"
                                 data-speed="600"
                                 data-start="0"
                                 data-end="10000"
                                 data-endspeed="600"><a href="{{ route('services') }}" class="btn btn-default btn-lg">了解更多 <i
                                            class="fa fa-angle-double-right pl-10"></i></a>
                            </div>

                        </li>
                        <!-- slide 3 end -->

                    </ul>
                </div>
            </div>
            <!-- slider revolution end -->

        </div>
        <!-- slideshow end -->

    </div>
    <!-- banner end -->

    <!-- page-top start-->
    <!-- ================ -->
    <div class="page-top object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="100">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center title">全球优势媒体资源</h1><a name="resources"></a>
                    <div class="separator"></div>
                    <p class="text-center">我们拥有庞大的精准分析数据库和全球优质媒体资源库，权威广告媒介，营销效果保证</p>
                    <div class="row grid-space-10">
                        <div class="col-sm-4">
                            <div class="box-style-2">
                                <div class="icon-container default-bg">
                                    <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                                </div>
                                <div class="body">
                                    <h2>报刊杂志</h2>
                                    <p>资源覆盖50000+家报纸，20000+本杂志</p>
                                    <a href="{{ route('newspaper') }}" class="link"><span>了解更多</span></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="box-style-2">
                                <div class="icon-container default-bg">
                                    <i class="fa fa-caret-square-o-right" aria-hidden="true"></i>
                                </div>
                                <div class="body">
                                    <h2>电视媒体</h2>
                                    <p>覆盖150+电视台，与欧美、东南亚、南亚、中东等媒体保持长期合作</p>
                                    <a href="{{ route('television') }}" class="link"><span>了解更多</span></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="box-style-2">
                                <div class="icon-container default-bg">
                                    <i class="fa fa-tree" aria-hidden="true"></i>
                                </div>
                                <div class="body">
                                    <h2>户外媒体</h2>
                                    <p>1000000+块优质户外大屏</p>
                                    <a href="{{ route('outdoor') }}" class="link"><span>了解更多</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row grid-space-10">
                        <div class="col-sm-4">
                            <div class="box-style-2">
                                <div class="icon-container default-bg">
                                    <i class="fa fa-bus" aria-hidden="true"></i>
                                </div>
                                <div class="body">
                                    <h2>交通媒体</h2>
                                    <p>7680条公共交通轨道，20000+条地铁覆盖</p>
                                    <a href="{{ route('transform') }}" class="link"><span>了解更多</span></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="box-style-2">
                                <div class="icon-container default-bg">
                                    <i class="fa fa-tablet" aria-hidden="true"></i>
                                </div>
                                <div class="body">
                                    <h2>线上媒体</h2>
                                    <p>Google、Adwords、 Yandex等专业数据跟踪技术，Facebook、VK等平台智能化自动投放体系</p>
                                    <a href="{{ route('online') }}" class="link"><span>了解更多</span></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="box-style-2">
                                <div class="icon-container default-bg">
                                    <i class="fa fa-microphone" aria-hidden="true"></i>
                                </div>
                                <div class="body">
                                    <h2>网络红人</h2>
                                    <p>与上万网红深度合作，精准投放到上亿粉丝团中</p>
                                    <a href="{{ route('internetCelebrity') }}" class="link"><span>了解更多</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page-top end -->

    <!-- main-container start -->
    <!-- ================ -->
    <section class="main-container parallax dark-translucent-bg parallax-bg-3">

        <!-- main start -->
        <!-- ================ -->
        <div class="main">
            <div class="container">
                <div class="call-to-action">
                    <div class="row">
                        <div class="col-md-8">
                            <h1 class="title text-left">全球视野&nbsp;&nbsp;深刻理解</h1>
                            <p style="text-align: left;width: 85%;">
                                基于对全球互联网的深刻洞察和海外媒体传播的成熟经验，服务于中国品牌的全球化需求。通过全球化、全媒体营销矩阵，为客户提供专业、高效的国际化传播服务。凭借全球化视角，本地化服务，提供行之有效的解决方案
                                。</p>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center">
                                <a href="{{ route('insight') }}" class="btn btn-default btn-lg">进入洞察</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main end -->

    </section>
    <!-- main-container end -->

    <!-- section start -->
    <!-- ================ -->
    <div class="section clearfix object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="300">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>部分案例</h2>
                    <div class="separator-2"></div>
                    <!-- portfolio items start -->
                    <div class="isotope-container row grid-space-20">
                        @foreach($cases as $case)
                            @if($case->Imgs->count() > 0)
                                <div class="col-sm-4 isotope-item web-design margin-bottom-clear">
                                    <div class="box-style-1 gray-bg">
                                        <div class="overlay-container">
                                            <img src="{{ $case->Imgs[0]->url }}" alt="{{ $case->title }}" style="width: 100%">
                                            <a href="{{ route('cases.show', [$case->id]) }}" class="overlay small">
                                                <i class="fa fa-plus"></i>
                                                <span>{{ $case->category }}</span>
                                            </a>
                                        </div>
                                        <h3>{{ $case->title }}</h3>
                                        <a href="{{ route('cases.show', [$case->id]) }}"
                                           class="btn btn-default">了解详情</a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <!-- portfolio items end -->
                    <a href="{{ route('cases') }}" class="link pull-right"><span>了解更多</span></a>
                </div>
            </div>
        </div>

    </div>
    <!-- section end -->
@stop

@section('footer')
    <footer id="footer">
        <!-- .subfooter start -->
        <!-- ================ -->
        <div class="subfooter">
            <div class="container">
                <div class="row">
                    <nav class="navbar navbar-default" role="navigation">
                        <!-- Toggle get grouped for better mobile display -->
                        <div class="col-md-6" id="navbar-collapse-2">
                            <br/>
                            <p>Copyright © 2010-2015 正点国际传媒 京ICP备17065992号-1</p>
                        </div>
                        <div class="collapse navbar-collapse " style="position: absolute;right: 0;bottom: -20px;">
                            <ul class="social-links circle">
                                <li class="twitter"><a target="_blank" href="{{ asset('images/CRcode.jpg') }}"><i
                                                class="fa fa-weixin"></i></a></li>
                                <li class="googleplus"><a target="_blank"
                                                          href="https://weibo.com/6343057097/profile?rightmod=1&wvr=6&mod=personinfo&is_all=1"><i
                                                class="fa fa-weibo"></i></a></li>
                                <li class="facebook"><a target="_blank"
                                                        href="https://www.facebook.com/zetinmediagroup/?modal=composer"><i
                                                class="fa fa-facebook"></i></a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- .subfooter end -->
    </footer>
@stop