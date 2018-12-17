@extends('layouts._layouts')

@section('title')
    Zetin 关于我们
@stop
@section('content')
    <!-- banner start -->
    <!-- ================ -->
    <div class="banner">
        <div class="fixed-image section" style="background-image:url('{{ asset('images/aboutbg.jpg') }}');">

        </div>
    </div>
    <!-- banner end -->


    <!-- page-intro end -->

    <!-- main-container start -->
    <!-- ================ -->
    <section class="main-container">

        <div class="container">
            <div class="row">

                <!-- main start -->
                <!-- ================ -->
                <div class="main col-md-12">

                    <!-- page-title start -->
                    <!-- ================ -->
                    <h1 class="page-title" style="text-align: center;">公司介绍</h1>
                    <div class="separator-2" style="margin: 0 auto;"></div>
                    <!-- page-title end -->
                    <p class="lead"
                       style="text-align: center;font-size: 14px;margin-top: 20px;margin-bottom: 40px; line-height: 32px;">
                        正点国际传媒（Zetin Group）是中国第一家专注品牌海外传播的传媒机构，是为中国品牌实现国际化品效合一的互动广告营销服务商。<br>
                        公司专业服务于全球的移动应用、手机游戏、电商平台、旅游等客户，为其提供全球营销推广服务。<br>
                        公司兼具国际化视野及本地化优势，致力于帮助众多客户制胜海外市场。<br>
                        拥有庞大的全球优质媒体资源，覆盖全球的媒体资源库，为品牌产品的推广投放提供有力支持。<br>
                        通过社会化营销、活动推广、媒体投放等多渠道推广策略， 对产品进行立体化内容整合，更加精准有效地提升产品的市场地位，满足客户目标需求。<br>
                        正点国际传媒立足全球视野，深刻理解，以客制化服务进行商业运作与价值实现。</p>
                    <hr>
                    <h1 class="page-title" style="text-align: center;margin-top: 40px;">团队介绍</h1>
                    <div class="separator-2" style="margin: 0 auto;"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="list-icons" style="text-align: center;margin-top: 20px;margin-bottom: 40px;">
                                <li class="object-non-visible" data-animation-effect="fadeInUpSmall"><i
                                            class="icon-check"></i> 团队：来自世界各国的45位高素质的员工。
                                </li>
                                <li class="object-non-visible" data-animation-effect="fadeInUpSmall"
                                    data-effect-delay="100"><i class="icon-check"></i> 全球化：在香港、雅加达、新德里、莫斯科、洛杉矶、伦敦设有办公机构。
                                </li>
                                <li class="object-non-visible" data-animation-effect="fadeInUpSmall"
                                    data-effect-delay="300"><i class="icon-check"></i>
                                    专业：专注于出海品牌推广，专家型员工，在互联网、旅游、传媒广告等领域有十年以上行业经验。
                                </li>
                                <li class="object-non-visible" data-animation-effect="fadeInUpSmall"
                                    data-effect-delay="500"><i class="icon-check"></i>
                                    资源：本地化优质资源，正点国际传媒与全球一百多个国家头部媒体资源紧密合作。
                                </li>
                            </ul>
                        </div>
                    </div>
                    <hr>
                    <div class="section clearfix">
                        <div class="container">
                            <h1 class="page-title" style="text-align: center;">公司动态</h1>
                            <div class="separator-2" style="margin: 0 auto;"></div>
                            <div class="row grid-space-20" style="margin-top: 20px;">
                                @foreach($dynamics as $dynamic)
                                    <div class="col-md-3 col-sm-6">
                                        <div class="box-style-1 gray-bg team-member" style="text-align: left;">
                                            <div class="overlay-container">
                                                <img src="{{ $dynamic->Imgs[0]->url }}" alt="{{ $dynamic->title }}" style="width:100%">
                                            </div>
                                            <a href="{{ route('about.show', [$dynamic->id]) }}"><h3 style="font-size: 16px;">{{ $dynamic->title }}</h3></a>
                                            {{ $dynamic->updated_at->format('Y.m.d') }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="tp-caption sfl tp-resizeme">
                                <a href="{{ route('aboutIn') }}"><p style="text-align: center;color: #0e7fe7;">了解更多动态 >></p></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- main end -->
            </div>
        </div>
    </section>
    <!-- main-container end -->

    <!-- section start -->
    <!-- ================ -->
    <div class="section gray-bg text-muted footer-top clearfix">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>服务客户</h3>
                    <div class="owl-carousel clients">
                        <div class="client">
                            <img src="{{ asset('images/8.png') }}" alt="一汽">
                            <img src="{{ asset('images/2.png') }}" alt="闪传">
                        </div>
                        <div class="client">
                            <img src="{{ asset('images/3.png') }}" alt="大连旅游局">
                            <img src="{{ asset('images/4.png') }}" alt="baca">
                        </div>
                        <div class="client">
                            <img src="{{ asset('images/5.png') }}" alt="KINGS">
                            <img src="{{ asset('images/6.png') }}" alt="elex">
                        </div>
                        <div class="client">
                            <img src="{{ asset('images/9.png') }}" alt="GUNS">
                            <img src="{{ asset('images/10.png') }}" alt="metisu">
                        </div>
                        <div class="client">
                            <img src="{{ asset('images/11.png') }}" alt="一加">
                            <img src="{{ asset('images/12.png') }}" alt="茄子快传">
                        </div>
                        <div class="client">
                            <img src="{{ asset('images/13.png') }}" alt="tripadvisor">
                            <img src="{{ asset('images/14.png') }}" alt="UC News">
                        </div>
                        <div class="client">
                            <img src="{{ asset('images/15.png') }}" alt="UMASS">
                            <img src="{{ asset('images/16.png') }}" alt="海南旅游局">
                        </div>
                        <div class="client">
                            <img src="{{ asset('images/17.png') }}" alt="国家旅游局">
                            <img src="{{ asset('images/18.png') }}" alt="四川旅游局">
                        </div>
                        <div class="client">
                            <img src="{{ asset('images/19.png') }}" alt="北京旅游局">
                            <img src="{{ asset('images/20.png') }}" alt="海口市旅游发展委员会">
                        </div>
                        <div class="client">
                            <img src="{{ asset('images/21.png') }}" alt="山东旅游局">
                            <img src="{{ asset('images/22.png') }}" alt="肯尼亚旅游局">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- section end -->
@stop