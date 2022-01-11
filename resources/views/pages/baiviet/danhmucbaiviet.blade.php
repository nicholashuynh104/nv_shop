@extends('layout')
@section('content')
<div class="wishlist-concept">
    <div class="container">
        <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb" style="font-size: 18px">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
                                <li class="breadcrumb-item">{{$meta_title}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-sm-12">
        <aside class="widge-topbar">
            <div class="bar-title">
            <div class="bar-ping"><img src="img/bar-ping.png" alt=""></div>
            <h2>{{$meta_title}}</h2>
            </div>
        </aside>

        </div>
        <div class="col-sm-12 col-lg-9 col-md-9">
            <div class="table-responsive">
                @foreach($post as $key =>$p)
                <table class="cart-table">
                    {{-- <tbody> --}}
                    <tr>
                        <td>
                            <img src="{{asset('public/uploads/posts/'.$p->posts_image)}}" alt="$p->posts_slug" />
                        </td>
                        <td style="width: 75%">
                            <h4 style="text-align: start">{{$p->posts_title}}</h4>
                            <span style="text-align: left">{!!$p->posts_desc!!}</span>
                            <div class="cartPage-btn">
                                <ul>
                                    <li>
                                        <a href="{{url('/bai-viet/'.$p->posts_slug)}}" class="cbtn" style="color: white;">Xem bài viết</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    {{-- </tbody> --}}
                </table>

            @endforeach
            </div>
        </div>
        </div>
    </div>
    </div>
        <ul class="pagination pagination-sm m-t-none m-b-none" style="float: right;">
            {!!$post->links()!!}
        </ul>
@endsection