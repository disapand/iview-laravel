@extends('layouts._layouts')

@section('title')
    Zetin {{ $dynamic->title }}
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
                    <h1 class="page-title margin-top-clear">{{ $dynamic->title }}</h1>
                    <!-- page-title end -->
                    <div class="row">
                        <div class="col-md-12">
                            <p style="color:rgba(200,200,200,1.00);">{{ $dynamic->updated_at->format('Y.m.d') }}</p>
                            <div class="separator-2"></div>
                            {!! $dynamic->content !!}
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
                                <img src="{{ $recommend->Imgs[0]->url }}" alt="{{ $recommend->title }}">
                                <a href="{{ route('about.show', [$recommend->id]) }}" class="overlay small">
                                    <i class="fa fa-link"></i>
                                </a>
                            </div>
                            <a href="{{ route('about.show', [$recommend->id]) }}" class="btn btn-light-gray btn-lg btn-block">{{ $recommend->title }}</a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- section end -->
    @stop