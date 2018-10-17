@extends('layouts._layouts')

@section('title')
    Zetin {{ $television->channel }}
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
                    <h1 class="page-title margin-top-clear">{{ $television->channel }}</h1>
                    <!-- page-title end -->

                    <div class="row">
                        <div class="col-md-4">
                            <!-- Nav tabs -->
                            <ul class="nav nav-pills white space-top" role="tablist">
                                <li class="active"><a href="#product-images" role="tab" data-toggle="tab"
                                                      title="images"><i class="fa fa-camera pr-5"></i> 图片</a></li>
                            </ul>

                            <!-- Tab panes start-->
                            <div class="tab-content clear-style">
                                <div class="tab-pane active" id="product-images">
                                    <div class="owl-carousel content-slider-with-controls-bottom">
                                        @foreach($television->televisionResourcesImgs as $img)
                                            <div class="overlay-container">
                                                <img src="{{ $img->url }}" alt="{{ $television->channel }}" style="max-height: 240px; margin: 0 auto;">
                                                <a href="{{ $img->url }}" class="popup-img overlay"
                                                   title="{{ $television->channel }}"><i class="fa fa-search-plus"></i></a>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="col-md-12" style="padding: 0;">
                                        <a class="btn btn-default" href="{{ route('contact') }}">联系我们</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Tab panes end-->
                        </div>

                        <!-- product side start -->
                        <aside class="col-md-8">
                            <div class="sidebar">
                                <div class="side product-item vertical-divider-left">
                                    <div class="tabs-style-2">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="active"><a href="#h2tab1" role="tab" data-toggle="tab"><i
                                                            class="fa fa-file-text-o pr-5"></i>详细描述</a></li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content padding-top-clear padding-bottom-clear">
                                            <div class="tab-pane fade in active" id="h2tab1">
                                                <p style="line-height: 32px;margin-top: 32px;">
                                                    电视频道：{{ $television->channel }} <br />
                                                    频道介绍：{!! str_replace(PHP_EOL, '<br />', $television->detail) !!} <br />
                                                    展现形式：{{ $television->form }} <br />
                                                    覆盖地区：{{ $television->area }} <br />
                                                    语言：{{ $television->language }} <br />
                                                    类别：{{ $television->category }} <br />
                                                    所属电视台：{{ $television->station }} <br />
                                                    广告时长：{{ $television->time }}秒 <br />
                                                    国家或地区：{{ $television->country }} <br />
                                                    热门节目：{{ $television->program }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </aside>
                        <!-- product side end -->
                    </div>

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
                    <div class="row grid-space-20">
                        @foreach($recommends as $recommend)
                            <div class="col-md-3 col-sm-6">
                                <div class="listing-item">
                                    <div class="overlay-container">
                                        @if($recommend->televisionResourcesImgs->count() > 0)
                                            <img src="{{ $recommend->televisionResourcesImgs[0]->url }}"
                                                 alt="{{ $recommend->channel }}">
                                        @endif
                                        <a href="{{ route('television.show', [$recommend->id]) }}"
                                           class="overlay small">
                                            <i class="fa fa-plus"></i>
                                            <span>了解详情</span>
                                        </a>
                                    </div>
                                    <div class="listing-item-body clearfix">
                                        <h3 class="title"><a
                                                    href="{{ route('television.show', [$recommend->id]) }}">{{ $recommend->channel }}</a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- section end -->
@stop