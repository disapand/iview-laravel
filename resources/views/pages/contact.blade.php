@extends('layouts._layouts')

@section('content')

    <!-- banner start -->
    <!-- ================ -->
    <div class="banner">
        <!-- google maps start -->
        <img src="{{ asset('images/contactbg.jpg') }}" alt="正点国际传媒点位图">
        <!-- google maps end -->
    </div>
    <!-- banner end -->

    <!-- main-container start -->
    <!-- ================ -->
    <section class="main-container">

        <div class="container">
            <div class="row">

                <!-- main start -->
                <!-- ================ -->
                <div class="main col-md-8">

                    <!-- page-title start -->
                    <!-- ================ -->
                    <h1 class="page-title">联系我们</h1>
                    <!-- page-title end -->
                    <div class="alert alert-success hidden" id="contactSuccess">
                        <strong>成功!</strong> 我们收到了您的信息，我们会尽快联系您！请保持电话畅通！
                    </div>
                    <div class="alert alert-error hidden" id="contactError">
                        <strong>错误!</strong> 您填写的信息有问题，请按照规范填写。
                    </div>
                    <div class="contact-form">
                        <form id="contact-form" role="form">
                            <div class="form-group has-feedback">
                                <label for="name">姓名*</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="">
                                <i class="fa fa-user form-control-feedback"></i>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="email">电子邮箱*</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="">
                                <i class="fa fa-envelope form-control-feedback"></i>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="phone">联系电话*</label>
                                <input type="number" class="form-control" id="phone" name="phone" placeholder="">
                                <i class="fa fa-phone form-control-feedback"></i>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="email">公司名称*</label>
                                <input type="text" class="form-control" id="company" name="company" placeholder="">
                                <i class="fa fa-building form-control-feedback"></i>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="subject">业务类型*</label>
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="">
                                <i class="fa fa-navicon form-control-feedback"></i>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="message">详细信息*</label>
                                <textarea class="form-control" rows="6" id="message" name="message" placeholder=""></textarea>
                                <i class="fa fa-pencil form-control-feedback"></i>
                            </div>
                            <input type="submit" value="确认发送" class="btn btn-default">
                        </form>
                    </div>
                </div>
                <!-- main end -->

                <!-- sidebar start -->
                <aside class="col-md-4">
                    <div class="sidebar">
                        <div class="side vertical-divider-left">
                            <h3 class="title">北京正点互动国际传媒广告有限公司</h3>
                            <ul class="list">
                                <li><strong></strong></li>
                                <li><i class="fa fa-home pr-10"></i>北京市朝阳区<br><span class="pl-20">锐创国际中心</span></li>
                                <li><i class="fa fa-phone pr-10"></i>+86 10 84177927</li>
                                <li><i class="fa fa-mobile pr-10 pl-5"></i>+86 176 1070 1177</li>
                                <li><i class="fa fa-envelope pr-10"></i><a href="mailto:info@zetin.cn">info@zetin.cn</a></li>
                            </ul>
                        </div>
                    </div>
                </aside>
                <!-- sidebar end -->

            </div>
        </div>
    </section>
@stop