@extends('layouts._layouts')

@section('title')
    Zetin {{ $cases->title }}
    @stop
@section('content')
    <!-- banner start -->
    <!-- ================ -->
    <div class="banner">
        <div class="fixed-image" style="background-image:url('{{ $cases->Imgs[0]->url }}');"></div>
    </div>
    <!-- banner end -->

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
                    <h1 class="page-title margin-top-clear">{{ $cases->title }}</h1>
                    <!-- page-title end -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="separator-2"></div>
                            <p><b style="color: #0E7FE7;">客户需求</b>: {!! str_replace(PHP_EOL, '<br />', $cases->needs) !!}</p><br />
                            <p><b style="color: #0E7FE7;">推广策略</b>：{!! str_replace(PHP_EOL, '<br />', $cases->strategy) !!}</p><br />
                            <p><b style="color: #0E7FE7;">方案执行</b>：{!! str_replace(PHP_EOL, '<br />', $cases->execute) !!}</p><br />
                            <p><b style="color: #0E7FE7;">推广效果</b>：{!! str_replace(PHP_EOL, '<br />', $cases->effect) !!}</p>
                        </div>
                        <div class="col-md-6">
                            <!-- Nav tabs -->
                            <ul class="nav nav-pills white space-top" role="tablist">
                                <li class="active"><a href="#portfolio-images" role="tab" data-toggle="tab" title="照片"><i class="fa fa-camera pr-5"></i> 照片</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content clear-style">
                                <div class="tab-pane active" id="portfolio-images">
                                    <div class="owl-carousel content-slider-with-controls">
                                        @foreach($cases->Imgs as $img)
                                            @if(!$loop->first)
                                                <div class="overlay-container">
                                                    <img src="{{ $img->url }}" alt="{{ $cases->title }}">
                                                    <a href="{{ $img->url }}" class="popup-img overlay" title="{{ $cases->title }}"><i class="fa fa-search-plus"></i></a>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
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
                        @foreach($recommends as $recommend)
                        <div class="image-box object-non-visible" data-animation-effect="fadeInLeft" data-effect-delay="{{ $loop->remaining * 100 }}">
                            <div class="overlay-container">
                                @if($recommend->Imgs->count() > 0)
                                    <img src="{{ $recommend->Imgs[0]->url }}" alt="{{ $recommend->title }}">
                                @endif
                                <a href="{{ route('cases.show', [$recommend->id]) }}" class="overlay small">
                                    <i class="fa fa-link"></i>
                                    <span>3C电子产品</span>
                                </a>
                            </div>
                            <a href="{{ route('cases.show', [$recommend->id]) }}" class="btn btn-light-gray btn-lg btn-block">{{ $recommend->title }}</a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- section end -->
    @stop