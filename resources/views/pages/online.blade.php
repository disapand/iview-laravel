@extends('layouts._layouts')

@section('title')
    Zetin 线上媒体
@stop

@section('content')
    <!-- banner start -->
    <!-- ================ -->
    <div class="banner">
        <div class="fixed-image section dark-translucent-bg parallax-bg-3"
             style="background-image:url('{{ asset('images/resourcesbg6.jpg') }}');">
            <div class="container">
                <div class="space-top"></div>
                <h1>线上媒体</h1>
                <div class="separator-2"></div>
                <p class="lead" style="font-size: 16px;line-height: 32px;">
                    凭借与海外主流传统媒体、专业媒体的多年深度合作和良好关系，为客户提供多渠道、多媒介的全球传播服务，<br>
                    包括但不限于纸媒、户外媒体、电视媒体、网络媒体、网络红人等，为品牌扩大海外影响力和转化率。</p>
            </div>
        </div>
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

                    <div class="sorting-filters">
                        <form class="form-inline">
                            <div class="form-group">
                                <label>国家或地区</label>
                                <select class="form-control">
                                    <option selected="selected">美国</option>
                                    <option>加拿大</option>
                                    <option>英国</option>
                                    <option>法国</option>
                                    <option>德国</option>
                                    <option>意大利</option>
                                    <option>瑞士</option>
                                    <option>丹麦</option>
                                    <option>荷兰</option>
                                    <option>西班牙</option>
                                    <option>捷克</option>
                                    <option>波兰</option>
                                    <option>澳大利亚</option>
                                    <option>新西兰</option>
                                    <option>印尼</option>
                                    <option>新加坡</option>
                                    <option>马来西亚</option>
                                    <option>泰国</option>
                                    <option>菲律宾</option>
                                    <option>印度</option>
                                    <option>越南</option>
                                    <option>巴基斯坦</option>
                                    <option>老挝</option>
                                    <option>俄罗斯</option>
                                    <option>日本</option>
                                    <option>韩国</option>
                                    <option>巴西</option>
                                    <option>阿根廷</option>
                                    <option>墨西哥</option>
                                    <option>中东</option>
                                    <option>中国</option>
                                    <option>中国香港</option>
                                    <option>中国澳门</option>
                                    <option>中国台湾</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>类别</label>
                                <select class="form-control">
                                    <option selected="selected">网站</option>
                                    <option>APP</option>
                                    <option>社交媒体</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>形式</label>
                                <select class="form-control">
                                    <option selected="selected">横幅广告</option>
                                    <option>开屏广告</option>
                                    <option>弹出广告</option>
                                    <option>信息流广告</option>
                                    <option>图片广告</option>
                                    <option>视频广告</option>
                                    <option>轮播广告</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <a href="#" class="btn btn-default">开始搜索</a>
                            </div>
                        </form>
                    </div>

                    <!-- shop items start -->
                    <div class="masonry-grid-fitrows row grid-space-20">
                        @foreach( $onlines as $online )
                            <div class="col-md-4 col-sm-6 masonry-grid-item">
                                <div class="listing-item">
                                    <div class="overlay-container">
                                        @if($online->onlineResourceImgs->count() > 0)
                                            <img src="{{ $online->onlineResourceImgs[0]->url }}" alt="{{ $online->name }}">
                                        @else
                                            <img src="{{ asset('images/6.jpg') }}" alt="{{ $online->name }}">
                                        @endif
                                        <a href="{{ route('online.show', [$online->id]) }}" class="overlay small">
                                            <i class="fa fa-plus"></i>
                                            <span>了解详情</span>
                                        </a>
                                    </div>
                                    <div class="listing-item-body clearfix">
                                        <h3 class="title"><a href="{{ route('online.show', [$online->id]) }}">{{ $online->name }}</a></h3>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- shop items end -->

                    <div class="clearfix"></div>

                    <!-- pagination start -->
                {{ $onlines->links() }}
                <!-- pagination end -->

                </div>
                <!-- main end -->

            </div>
        </div>
    </section>
    <!-- main-container end -->
@stop