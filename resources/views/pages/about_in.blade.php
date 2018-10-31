@extends('layouts._layouts')

@section('title')
    Zetin 公司动态
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
                    <h1 class="page-title">公司动态</h1>
                    <div class="separator-2"></div>
                    <!-- page-title end -->

                    <!-- masonry grid start -->
                    <div class="masonry-grid row">

                        <!-- masonry grid item start -->
                        @foreach( $abouts as $about)
                        <div class="masonry-grid-item col-sm-6 col-md-4">
                            <!-- blogpost start -->
                            <article class="clearfix blogpost">
                                @if($about->imgs->count() > 0)
                                    <div class="overlay-container">
                                        <img src="{{ $about->imgs[0]->url }}" alt="{{ $about->tag }}" style="max-width: 100%;">
                                        <div class="overlay">
                                            <div class="overlay-links">
                                                <a href="{{ route('about.show', [$about->id]) }}"><i class="fa fa-link"></i></a>
                                                <a href="{{ $about->imgs[0]->url }}" class="popup-img-single" title="{{ $about->tag }}"><i class="fa fa-search-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="blogpost-body">
                                    <div class="post-info">
                                        <span class="day">{{ $about->updated_at->day}}</span>
                                        <span class="month">{{ substr($about->updated_at->format('F'), 0, 4)}} {{ $about->updated_at->year}}</span>
                                    </div>
                                    <div class="blogpost-content">
                                        <header>
                                            <h2 class="title"><a href="{{ route('about.show', [$about->id]) }}">{{ $about->title }}</a></h2>
                                        </header>
                                        <p style="margin-top: 20px;">{{ mb_substr(strip_tags($about->content), 0, 150) }}...</p>
                                    </div>
                                </div>
                            </article>
                            <!-- blogpost end -->
                        </div>
                        @endforeach
                    <!-- masonry grid item end -->
                    </div>
                    <!-- masonry grid end -->

                </div>
                <!-- main end -->

            </div>
        </div>
    </section>
    <!-- main-container end -->
    @stop