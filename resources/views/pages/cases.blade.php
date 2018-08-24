@extends('layouts._layouts')

@section('title')
    Zetin 案例
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
                    <h1 class="page-title">成功案例</h1>
                    <div class="separator-2"></div>
                    <!-- page-title end -->

                    <!-- isotope filters start -->
                    <div class="filters">
                        <ul class="nav nav-pills">
                            <li class="active"><a href="#" data-filter="*">全部</a></li>
                            <li><a href="#" data-filter=".yx">游戏</a></li>
                            <li><a href="#" data-filter=".yy">应用</a></li>
                            <li><a href="#" data-filter=".ds">电商</a></li>
                            <li><a href="#" data-filter=".ly">旅游</a></li>
                            <li><a href="#" data-filter=".qc">汽车</a></li>
                            <li><a href="#" data-filter=".3c">3C电子产品</a></li>
                            <li><a href="#" data-filter=".kx">快销品</a></li>
                            <li><a href="#" data-filter=".qt">其他</a></li>
                        </ul>
                    </div>
                    <!-- isotope filters end -->

                    <!-- portfolio items start -->
                    <div class="isotope-container row grid-space-20">
                        @foreach($cases as $case)
                            @if($case->category === '3C电子产品')
                                <div class="col-sm-6 col-md-4 isotope-item 3c }}">
                            @else
                                <div class="col-sm-6 col-md-4 isotope-item {{ \App\Handlers\Tools::pinyin1($case->category) }}">
                            @endif
                                <div class="image-box">
                                    <div class="overlay-container">
                                        @if($case->Imgs->count() > 0)
                                            <img src="{{ $case->Imgs[0]->url }}" alt="{{ $case->title }}">
                                        @endif
                                        <a href="{{ route('cases.show', [$case->id]) }}" class="overlay small">
                                            <i class="fa fa-link"></i>
                                            <span>{{ $case->category }}</span>
                                        </a>
                                    </div>
                                    <a href="{{ route('cases.show', [$case->id]) }}" class="btn btn-light-gray btn-lg btn-block">{{ $case->title }}</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- portfolio items end -->

                    <!-- pagination start -->
                    {{ $cases->links() }}
                    <!-- pagination end -->

                </div>
                <!-- main end -->

            </div>
        </div>
    </section>
    <!-- main-container end -->
    @stop