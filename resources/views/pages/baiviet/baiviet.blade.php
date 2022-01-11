@extends('layout')
@section('content')
        <div class="home-hello-info">
            <div class="container">
                <div class="breadcrumbs">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="container-inner">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb" style="font-size: 18px">
                                            <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
                                            @foreach($pro_name as $key =>$name)
                                            @foreach($cate_slug as $key => $ca_slug )
                                            <li class="breadcrumb-item"><a href="{{url('/danh-muc-bai-viet/'.$ca_slug->cate_post_slug)}}">{{$name->cate_post_name}}</a></li>
                                            @endforeach
                                            @endforeach
                                            <li class="breadcrumb-item active" aria-current="page">{{$meta_title}}</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach($post as $key =>$p)
                <div class="row">
                    <div class="col-md-12">
                        <div class="f-title text-center">
                            <h3 class="title text-uppercase">Bài viết</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <div class="about-page-cntent">
                            <h3>{{$meta_title}}</h3>
                            <p>  {!!$p->posts_content!!}</p>
                        </div>
                    </div>
                </div>
                <div class="fb-comments" data-href="{{$url_canonical}}" data-width="" data-numposts="20"></div>
                @endforeach
            </div>
        </div>

        <div class="our-product-area new-product">
        <div class="container">
            <div class="area-title">
                <h2>Bài Viết Liên Quan</h2>
            </div>
            <!-- our-product area start -->
            <div class="row">
                <div class="col-md-12">

                        <div class="features-curosel">
                            <!-- single-product start -->
                            @foreach($related as $key => $post_relate)
                            <div class="col-md-8">
                                <div class="single-product first-sale">
                                    <div class="product-img">
                                        <a href="{{URL::to('/bai-viet/'.$post_relate->posts_slug)}}">
                                            <img width="250px" height="250px" class="primary-image" src="{{URL::to('public/uploads/posts/'.$post_relate->posts_image)}}" alt="" />
                                        </a>
                                    </div>
                                    <div class="product-content" >
                                        <h2 class="product-name"><a href="{{URL::to('/bai-viet/'.$post_relate->posts_slug)}}">{{$post_relate->posts_title}}</a></h2>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                </div>
            </div>
            <!-- our-product area end -->
        </div>
    </div>
@endsection