@extends('layouts._layouts')

@section('title')
    Zetin 洞察
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
                    <h1 class="page-title">全球视野洞察</h1>
                    <!-- page-title end -->

                    <!-- isotope filters start -->
                    <div class="filters">
                        <ul class="nav nav-pills">
                            <li class="active"><a href="#" data-filter="*">全部</a></li>
                            <li><a href="#" data-filter=".cw">财务</a></li>
                            <li><a href="#" data-filter=".cy">创意</a></li>
                            <li><a href="#" data-filter=".ds">电商</a></li>
                            <li><a href="#" data-filter=".ly">旅游</a></li>
                            <li><a href="#" data-filter=".mt">媒体</a></li>
                            <li><a href="#" data-filter=".pp">品牌</a></li>
                            <li><a href="#" data-filter=".sc">市场</a></li>
                            <li><a href="#" data-filter=".sz">数字</a></li>
                            <li><a href="#" data-filter=".xfz">消费者</a></li>
                            <li><a href="#" data-filter=".yx">游戏</a></li>
                        </ul>
                    </div>
                    <!-- isotope filters end -->

                </div>
                <!-- main end -->
            </div>
        </div>

        <!-- section start -->
        <!-- ================ -->
        <div class="gray-bg section">
            <div class="container">
                <!-- portfolio items start -->
                <div class="isotope-container row grid-space-10">
                    @foreach($insights as $insight)
                        <div class="col-sm-4 isotope-item {{\App\Handlers\Tools::pinyin1( $insight->category ) }}">
                            <div class="box-style-2 white-bg" style="padding: 20px;">
                                <h3><a href="{{ route('insight.show', [$insight->id]) }}">{{ $insight->title }}</a></h3>
                                <a href="#">{{ $insight->category }}</a>
                                <p>{{ mb_substr(strip_tags($insight->content), 0, random_int(150, 210), 'utf-8') }}...</p>
                                <p style="color:rgba(200,200,200,1.00);">{{ $insight->updated_at->format('Y.m.d') }}</p>
                            </div>
                        </div>
                    @endforeach
                <!-- portfolio items end -->
            </div>
        </div>
        <!-- section end -->
    </section>
    <!-- main-container end -->
    @stop