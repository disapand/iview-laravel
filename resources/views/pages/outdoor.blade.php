@extends('layouts._header')

@section('title')
    Zetin 户外媒体
    @stop

@section('content')
    <!-- banner start -->
    <!-- ================ -->
    <div class="banner">
        <div class="fixed-image section dark-translucent-bg parallax-bg-3" style="background-image:url('{{ asset('images/resourcesbg1.jpg') }}');">
            <div class="container">
                <div class="space-top"></div>
                <h1>户外媒体</h1>
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
                                    <option selected="selected">机场</option>
                                    <option>楼宇</option>
                                    <option>街道</option>
                                    <option>楼宇</option>
                                    <option>地铁站</option>
                                    <option>巴士站</option>
                                    <option>轻轨站</option>
                                    <option>体育场</option>
                                    <option>电影院</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>形式</label>
                                <select class="form-control">
                                    <option selected="selected">静态</option>
                                    <option>灯箱</option>
                                    <option>数码</option>
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
                                    <img src="images/resources/1.jpg" alt="美国-纽约-时报广场-路透社大屏">
                                    <a href="resources_outdoor_lts.html" class="overlay small">
                                        <i class="fa fa-plus"></i>
                                        <span>了解详情</span>
                                    </a>
                                </div>
                                <div class="listing-item-body clearfix">
                                    <h3 class="title"><a href="resources_outdoor_lts.html">美国-纽约-时报广场-路透社大屏</a></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 masonry-grid-item">
                            <div class="listing-item">
                                <div class="overlay-container">
                                    <img src="images/resources/2.jpg" alt="美国-纽约时报广场-纳斯达克大屏">
                                    <a href="resources_outdoor_nsdk.html" class="overlay small">
                                        <i class="fa fa-plus"></i>
                                        <span>了解详情</span>
                                    </a>
                                </div>
                                <div class="listing-item-body clearfix">
                                    <h3 class="title"><a href="resources_outdoor_nsdk.html">美国-纽约时报广场-纳斯达克大屏</a></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 masonry-grid-item">
                            <div class="listing-item">
                                <div class="overlay-container">
                                    <img src="images/resources/3.jpg" alt="法国-巴黎环城路-户外广告组屏">
                                    <a href="resources_outdoor_bl.html" class="overlay small">
                                        <i class="fa fa-plus"></i>
                                        <span>了解详情</span>
                                    </a>
                                </div>
                                <div class="listing-item-body clearfix">
                                    <h3 class="title"><a href="resources_outdoor_bl.html">法国-巴黎环城路-户外广告组屏</a></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 masonry-grid-item">
                            <div class="listing-item">
                                <div class="overlay-container">
                                    <img src="images/resources/4.jpg" alt="英国-伦敦-皮卡迪利广场大屏 ">
                                    <a href="resources_outdoor_pkdl.html" class="overlay small">
                                        <i class="fa fa-plus"></i>
                                        <span>了解详情</span>
                                    </a>
                                </div>
                                <div class="listing-item-body clearfix">
                                    <h3 class="title"><a href="resources_outdoor_pkdl.html">英国-伦敦-皮卡迪利广场大屏 </a></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 masonry-grid-item">
                            <div class="listing-item">
                                <div class="overlay-container">
                                    <img src="images/resources/5.jpg" alt="英国-伦敦韦斯特菲尔德商业街出入口-户外大屏">
                                    <a href="resources_outdoor_wstfedcrk.html" class="overlay small">
                                        <i class="fa fa-plus"></i>
                                        <span>了解详情</span>
                                    </a>
                                </div>
                                <div class="listing-item-body clearfix">
                                    <h3 class="title"><a href="resources_outdoor_wstfedcrk.html">英国-伦敦韦斯特菲尔德商业街出入口-户外大屏</a></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 masonry-grid-item">
                            <div class="listing-item">
                                <div class="overlay-container">
                                    <img src="images/resources/6.jpg" alt="英国-伦敦韦斯特菲尔德商业街外墙-户外大屏">
                                    <a href="resources_outdoor_wstfedwq.html" class="overlay small">
                                        <i class="fa fa-plus"></i>
                                        <span>了解详情</span>
                                    </a>
                                </div>
                                <div class="listing-item-body clearfix">
                                    <h3 class="title"><a href="resources_outdoor_wstfedwq.html">英国-伦敦韦斯特菲尔德商业街外墙-户外大屏</a></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 masonry-grid-item">
                            <div class="listing-item">
                                <div class="overlay-container">
                                    <img src="images/resources/7.jpg" alt="新西兰-奥克兰城市之门-户外LED广告屏">
                                    <a href="resources_outdoor_akl.html" class="overlay small">
                                        <i class="fa fa-plus"></i>
                                        <span>了解详情</span>
                                    </a>
                                </div>
                                <div class="listing-item-body clearfix">
                                    <h3 class="title"><a href="resources_outdoor_akl.html">新西兰-奥克兰城市之门-户外LED广告屏</a></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 masonry-grid-item">
                            <div class="listing-item">
                                <div class="overlay-container">
                                    <img src="images/resources/8.jpg" alt="西班牙-马德里-Callao广场户外广告屏组">
                                    <a href="resources_outdoor_mdl.html" class="overlay small">
                                        <i class="fa fa-plus"></i>
                                        <span>了解详情</span>
                                    </a>
                                </div>
                                <div class="listing-item-body clearfix">
                                    <h3 class="title"><a href="resources_outdoor_mdl.html">西班牙-马德里-Callao广场户外广告屏组</a></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 masonry-grid-item">
                            <div class="listing-item">
                                <div class="overlay-container">
                                    <img src="images/resources/9.jpg" alt="澳大利亚-悉尼威廉街citybound-户外广告牌">
                                    <a href="resources_outdoor_xn.html" class="overlay small">
                                        <i class="fa fa-plus"></i>
                                        <span>了解详情</span>
                                    </a>
                                </div>
                                <div class="listing-item-body clearfix">
                                    <h3 class="title"><a href="resources_outdoor_xn.html">澳大利亚-悉尼威廉街citybound-户外广告牌</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- shop items end -->

                    <div class="clearfix"></div>

                    <!-- pagination start -->
                    {{ $outdoors->links() }}
                    <!-- pagination end -->

                </div>
                <!-- main end -->

            </div>
        </div>
    </section>
    <!-- main-container end -->
    @stop