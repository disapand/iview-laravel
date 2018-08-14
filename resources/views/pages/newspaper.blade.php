@extends('layouts._header')

@section('title')
    纸媒
@stop

@section('content')
    <div class="banner">
        <div class="fixed-image section dark-translucent-bg parallax-bg-3"
             style="background-image:url('{{ asset('images/resourcesbg2.jpg') }}');">
            <div class="container">
                <div class="space-top"></div>
                <h1>报纸杂志</h1>
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
                                    <option selected="selected">综合新闻</option>
                                    <option>财经</option>
                                    <option>体育</option>
                                    <option>时尚</option>
                                    <option>科技</option>
                                    <option>生活</option>
                                    <option>旅游</option>
                                    <option>八卦</option>
                                    <option>音乐</option>
                                    <option>影视</option>
                                    <option>艺术</option>
                                    <option>汽车</option>
                                    <option>健康</option>
                                    <option>漫画</option>
                                    <option>航空</option>
                                    <option>其他</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>形式</label>
                                <select class="form-control">
                                    <option selected="selected">硬广</option>
                                    <option>软文</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <a href="#" class="btn btn-default">开始搜索</a>
                            </div>
                        </form>
                    </div>

                    <!-- shop items start -->
                    <div class="masonry-grid-fitrows row grid-space-20">
                        <div class="col-md-4 col-sm-6 masonry-grid-item">
                            <div class="listing-item">
                                <div class="overlay-container">
                                    <img src="{{ asset('images/newspaper/1.jpg') }}" alt="4x4汽车杂志">
                                    <a href="resources_newspaper_4.html" class="overlay small">
                                        <i class="fa fa-plus"></i>
                                        <span>了解详情</span>
                                    </a>
                                </div>
                                <div class="listing-item-body clearfix">
                                    <h3 class="title"><a href="resources_newspaper_4.html">4x4汽车杂志</a></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 masonry-grid-item">
                            <div class="listing-item">
                                <div class="overlay-container">
                                    <img src="images/newspaper/2.jpg" alt="Forbes财经杂志">
                                    <a href="resources_newspaper_Forbes.html" class="overlay small">
                                        <i class="fa fa-plus"></i>
                                        <span>了解详情</span>
                                    </a>
                                </div>
                                <div class="listing-item-body clearfix">
                                    <h3 class="title"><a href="resources_newspaper_Forbes.html">Forbes财经杂志</a></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 masonry-grid-item">
                            <div class="listing-item">
                                <div class="overlay-container">
                                    <img src="images/newspaper/3.jpg" alt="Men's Health男性杂志">
                                    <a href="resources_newspaper_Health.html" class="overlay small">
                                        <i class="fa fa-plus"></i>
                                        <span>了解详情</span>
                                    </a>
                                </div>
                                <div class="listing-item-body clearfix">
                                    <h3 class="title"><a href="resources_newspaper_Health.html">Men's Health男性杂志</a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 masonry-grid-item">
                            <div class="listing-item">
                                <div class="overlay-container">
                                    <img src="images/newspaper/4.jpg" alt="Kompas 报纸">
                                    <a href="resources_newspaper_Kompas.html" class="overlay small">
                                        <i class="fa fa-plus"></i>
                                        <span>了解详情</span>
                                    </a>
                                </div>
                                <div class="listing-item-body clearfix">
                                    <h3 class="title"><a href="resources_newspaper_Kompas.html">Kompas 报纸</a></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 masonry-grid-item">
                            <div class="listing-item">
                                <div class="overlay-container">
                                    <img src="images/newspaper/5.jpg" alt="大都会日报">
                                    <a href="resources_newspaper_ddh.html" class="overlay small">
                                        <i class="fa fa-plus"></i>
                                        <span>了解详情</span>
                                    </a>
                                </div>
                                <div class="listing-item-body clearfix">
                                    <h3 class="title"><a href="resources_newspaper_ddh.html">大都会日报</a></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 masonry-grid-item">
                            <div class="listing-item">
                                <div class="overlay-container">
                                    <img src="images/newspaper/6.jpg" alt="独立报">
                                    <a href="resources_newspaper_dl.html" class="overlay small">
                                        <i class="fa fa-plus"></i>
                                        <span>了解详情</span>
                                    </a>
                                </div>
                                <div class="listing-item-body clearfix">
                                    <h3 class="title"><a href="resources_newspaper_dl.html">独立报</a></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 masonry-grid-item">
                            <div class="listing-item">
                                <div class="overlay-container">
                                    <img src="images/newspaper/7.jpg" alt="俄罗斯报">
                                    <a href="resources_newspaper_els.html" class="overlay small">
                                        <i class="fa fa-plus"></i>
                                        <span>了解详情</span>
                                    </a>
                                </div>
                                <div class="listing-item-body clearfix">
                                    <h3 class="title"><a href="resources_newspaper_els.html">俄罗斯报</a></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 masonry-grid-item">
                            <div class="listing-item">
                                <div class="overlay-container">
                                    <img src="images/newspaper/8.jpg" alt="华尔街日报">
                                    <a href="resources_newspaper_hej.html" class="overlay small">
                                        <i class="fa fa-plus"></i>
                                        <span>了解详情</span>
                                    </a>
                                </div>
                                <div class="listing-item-body clearfix">
                                    <h3 class="title"><a href="resources_newspaper_hej.html">华尔街日报</a></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 masonry-grid-item">
                            <div class="listing-item">
                                <div class="overlay-container">
                                    <img src="images/newspaper/9.jpg" alt="国际日报">
                                    <a href="resources_newspaper_gj.html" class="overlay small">
                                        <i class="fa fa-plus"></i>
                                        <span>了解详情</span>
                                    </a>
                                </div>
                                <div class="listing-item-body clearfix">
                                    <h3 class="title"><a href="resources_newspaper_gj.html">国际日报</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- shop items end -->

                    <div class="clearfix"></div>

                    <!-- pagination start -->
                    <ul class="pagination">
                        <li><a href="#"><<</a></li>
                        <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">>></a></li>
                    </ul>
                    <!-- pagination end -->

                </div>
                <!-- main end -->

            </div>
        </div>
    </section>
@stop