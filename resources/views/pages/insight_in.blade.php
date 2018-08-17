@extends('layouts._layouts')

@section('title')
    Zetin {{ $insight->title }}
    @stop
@section('content')
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
                    <h1 class="page-title margin-top-clear">{{ $insight->title }}</h1>
                    <!-- page-title end -->
                    <div class="row">
                        <div class="col-md-12">
                            <h3 style="color: #0E7FE7;">{{ $insight->category }}</h3>
                            <p style="color:rgba(200,200,200,1.00);">{{ $insight->updated_at->format('Y.m.d') }}</p>
                            <div class="separator-2"></div>
                            {!! str_replace('<p><br></p>', '<br />', $insight->content) !!}
                        </div>
                    </div>
                    <hr>
                </div>
                <!-- main end -->
            </div>
        </div>
    </section>
    <!-- main-container end -->

    <!-- section start -->
    <!-- ================ -->
    <div class="section clearfix">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>您可能想了解</h2>
                    <div class="separator-2"></div>
                    <div class="owl-carousel carousel">
                        <div class="image-box object-non-visible" data-animation-effect="fadeInLeft" data-effect-delay="300" style="padding:0 20px;">
                            <h3><a href="insight_xby1.html">西班牙TVC广告购买分析</a></h3>
                            <a href="#">媒体</a>
                            <p>西班牙的国有电视台TVE是不允许做广告的，能做广告的两个最大的电视集团是Atresmedia和Mediaset，这两个电视集团占了西班牙60%以上的收视份额。旗下的电视台和电视频道如图所示。...</p>
                            <p style="color:rgba(200,200,200,1.00);">2018.06.10</p>
                        </div>
                        <div class="image-box object-non-visible" data-animation-effect="fadeInLeft" data-effect-delay="200" style="padding:0 20px;">
                            <h3><a href="insight_xby2.html">西班牙电视广告投放分析</a></h3>
                            <a href="#">媒体</a>
                            <p>本期内容围绕西班牙电视广告的投放价值展开，以及如何做西班牙投放电视广告。...</p>
                            <p style="color:rgba(200,200,200,1.00);">2018.06.10</p>
                        </div>
                        <div class="image-box object-non-visible" data-animation-effect="fadeInLeft" data-effect-delay="100" style="padding:0 20px;">
                            <h3><a href="insight_ds.html">国内电商的海外推广现状和需求</a></h3>
                            <a href="#">电商</a>
                            <p>“电子商务”是指以信息网络技术为手段，以商品交换为中心的商务活动；也可理解为在互联网（Internet）、企业内部网（Intranet）和增值网（VAN，Value Added Network）上以电子交易方式进行交易活动和相关服务的活动，是传统商业活动各环节的电子化、网络化、信息化。...</p>
                            <p style="color:rgba(200,200,200,1.00);">2018.06.10</p>
                        </div>
                        <div class="image-box object-non-visible" data-animation-effect="fadeInLeft" data-effect-delay="0" style="padding:0 20px;">
                            <h3><a href="insight_ly.html">旅游推广的层次与媒介选择</a></h3>
                            <a href="#">旅游</a>
                            <p>品牌层次：一个品牌需要至少 2 个维度的塑造：内部的基因和外部的传播。内部主要依托于品牌方对产品的期望和把握， 用 F4 方程式（FACTS, FUNCTION, FEELING, FAITH）可以很好的解释和指导品牌内部层次的塑造。...</p>
                            <p style="color:rgba(200,200,200,1.00);">2018.06.10</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- section end -->
    @stop