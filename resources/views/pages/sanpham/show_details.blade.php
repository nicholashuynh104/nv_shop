@extends('layout')
@section('content')
@foreach($product_details as $key => $value)
<div class="col-md-12">
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb" style="font-size: 18px;">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
                                <li class="breadcrumb-item">Chi tiết</a></li>
                                <li class="breadcrumb-item active" aria-current="page" style="">{{$meta_title}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-details-area">
        <div class="container">
            <div class="row">
                @if (!($gallery[0]) )
                <div class="product-img col-md-4">
                    <img class="primary-image" src="{{URL::to('public/uploads/product/'.$value->product_image)}}" alt="" />
                </div>
                @else
                <div class="col-md-4" >
                    <ul id="imageGallery" >
                        @foreach($gallery as $key => $ga)
                        <li data-thumb="{{asset('public/uploads/gallery/'.$ga->gallery_image)}}" data-src="{{asset('public/uploads/gallery/'.$ga->gallery_image)}}">
                            <img alt="{{$ga->gallery_name}}" src="{{asset('public/uploads/gallery/'.$ga->gallery_image)}}" />
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="col-md-7 col-sm-7 col-xs-12" style="margin-left: 20px">
                    <div class="product-list-wrapper">
                        <div class="single-product">
                            <div class="product-content">
                                <h2 class="product-name"><a href="#" style="font-weight: bold; font-size: 20px">{{$value->product_name}}</a></h2>
                                <div class="rating-price">
                                    <div class="price-boxes">
                                        <span class="new-price" style="color:#AA2F3F">{{number_format($value->product_price,0,',','.').'VNĐ'}}</span>
                                    </div>
                                </div>
                                <div class="product-desc product-info">
                                    <p style="font-weight: bold; color: #000">THÔNG TIN MÁY</p><br/>
                                    <p>
                                        <i class="fas fa-mobile-alt" style="font-size: 18px;"></i>
                                        <span style="color: #000;"> Mới, đầy đủ phụ kiện từ nhà sản xuất</span>
                                    </p>
                                    <p>
                                        <i class="fas fa-info-circle" style="font-size: 18px;"></i>
                                        <span style="color: #000;">Id Sản Phẩm: {{$value->product_id}}</span> -
                                        <span style="color: #000;">Số lượng có sẵn: {{$value->product_quantity}}</span> -
                                        <span style="color: #000;">Danh mục: {{$value->category_name}}</span> -
                                        <span style="color: #000;">Thương hiệu: {{$value->brand_name}}</span>
                                        {{-- <p><span style="color: #000;">Mã Id Sản Phẩm: {{$value->product_id}}</span> --}}
                                    </p>
                                </div><br/>

                                <div class="product-desc product-info">
                                    <p style="font-weight: bold; color: #000">ƯU ĐÃI THÊM</p><br/>
                                    <p>
                                        <i class="far fa-check-circle" style="font-size: 18px; color: #3FD84F"></i>
                                        <span style="color: #000;"> Giảm thêm tới 1% cho thành viên NV-Customer</span>
                                    </p><br/>
                                    <p>
                                        <i class="far fa-check-circle" style="font-size: 18px; color: #3FD84F"></i>
                                        <span style="color: #000;">Giảm 5% tối đa 500k khi thanh toán bằng ví Moca trên ứng dụng Grab (áp dụng đơn hàng từ 500k)</span>
                                    </p><br/>
                                    <p>
                                        <i class="far fa-check-circle" style="font-size: 18px; color: #3FD84F"></i>
                                        <span style="color: #000;">Giảm 500.000đ khi thanh toán hoặc trả góp từ 5 triệu trở lên bằng thẻ tín dụng FE Credit</span>
                                    </p>
                                </div><br/>
                                <style type="text/css">
                                    .product-info {
                                        border: 1px solid #D2D2D2;
                                        border-radius: 20px;
                                        padding-left: 10px;
                                        width: 85%;
                                    }
                                    a.tags_style{
                                        margin: 3px 2px;
                                        border: 1px dashed;
                                        height: auto;
                                        background: coral;
                                        color: #ffff;
                                        padding: 5px 5px;
                                    }
                                    a.tags_style:hover{
                                        background: green;
                                    }
                                </style>

                                @if (!empty($tags))
                                <fieldset>
                                    <legend>Tags</legend>
                                    <p><i class="fa fa-tag"></i>
                                        @php
                                            $tags = $value->product_tags;
                                            $tags = explode(",",$tags);
                                        @endphp
                                        @foreach($tags as $tag)
                                            <a href="{{url('/tag/'.str_slug($tag))}}" class="tags_style">{{$tag}}</a>
                                        @endforeach
                                    </p>
                                </fieldset>
                                @endif
                                {{-- <p class="availability in-stock">Mã id: <span>{{$value->product_id}}</span></p> --}}

                                <h4>Đánh giá sao:</h4>
                                    <ul class="list-inline rating" title="Đánh giá sao">
                                        @for($count=1;$count<=5;$count++)
                                            @php
                                                if($count<=$rating){
                                                    $color2='color:#ffcc00;';
                                                }
                                                else{
                                                    $color2='color:#ccc;';
                                                }
                                            @endphp
                                        <li title="star_rating"
                                        id="{{$value->product_id}}-{{$count}}"
                                        data-index="{{$count}}"
                                        data-product_id="{{$value->product_id}}"
                                        data-rating="{{$rating}}"
                                        class="rating"
                                        style="cursor: pointer;{{$color2}} font-size: 30px;">&#9733;
                                        </li>
                                        @endfor

                                    </ul>
                                {{-- <div class="actions-e"> --}}
                                    {{-- <div class="action-buttons-single"> --}}
                                        <div class="inputx-content">
                                            <label for="qty" >Số Lượng:</label>
                                            <input name="qty" type="number" min="1" class="cart_product_qty_{{$value->product_id}}"  value="1">
                                        </div><br/><br/>
                                        {{-- <div class="add-to-cart"> --}}
                                            <form action="{{URL::to('/save-cart')}}" method="POST">
                                                @csrf
                                                <input type="hidden" value="{{$value->product_id}}" class="cart_product_id_{{$value->product_id}}">

                                                <input type="hidden" value="{{$value->product_name}}" class="cart_product_name_{{$value->product_id}}">

                                                <input type="hidden" value="{{$value->product_image}}" class="cart_product_image_{{$value->product_id}}">

                                                <input type="hidden" value="{{$value->product_quantity}}" class="cart_product_quantity_{{$value->product_id}}">

                                                <input type="hidden" value="{{$value->product_price}}" class="cart_product_price_{{$value->product_id}}">

                                                <input name="productid_hidden" type="hidden" value="{{$value->product_id}}">
                                                
                                                <input type="button" value="Thêm giỏ hàng" class="btn btn-danger add-to-cart" data-id_product="{{$value->product_id}}" name="add-to-cart">
                                            </form>
                                        {{-- </div> --}}
                                    {{-- </div> --}}
                                {{-- </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="single-product-tab">
                    <!-- Nav tabs -->
                    <ul class="details-tab">
                        <li class="active"><a href="#home" data-toggle="tab">Mô tả</a></li>
                        <li class=""><a href="#messages" data-toggle="tab"> Đánh giá</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                            <div class="product-tab-content">
                                <div class="col-md-10">
                                    <p>{!!$value->product_content!!}</p>
                                </div>
                            </div>
                            <div class="fb-comments" data-href="{{$url_canonical}}" data-width="" data-numposts="20"></div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="messages">
                            <div class="single-post-comments col-md-6 col-md-offset-3">
                                <div class="comments-area">
                                    chỗ này để đánh giá(bình luận)
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- product section start -->
    <div class="our-product-area new-product">
        <div class="container">
            <div class="area-title">
                <h2>Sản phẩm liên quan</h2>
            </div>
            <!-- our-product area start -->
            <div class="row">
                <div class="col-md-12">
                        <div class="features-curosel">
                            <!-- single-product start -->
                            @foreach($relate as $key => $lienquan)
                            <div class="col-md-8">
                                <div class="single-product first-sale">
                                    <div class="product-img">
                                        <a href="{{URL::to('/chi-tiet/'.$lienquan->product_slug)}}">
                                            <img class="primary-image" src="{{URL::to('public/uploads/product/'.$lienquan->product_image)}}" alt="" />
                                        </a>
                                    </div>
                                    <div class="product-content" >
                                        <h2 class="product-name"><a href="{{URL::to('/chi-tiet/'.$lienquan->product_slug)}}">{{$lienquan->product_name}}</a></h2>
                                        <span style="color:#C31B3E" class="new-price">{{number_format($lienquan->product_price,0,',','.').' '.'VNĐ'}}</span>
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
    <!-- product section end -->

</div>

    <!-- product-details Area end -->
@endforeach
@endsection
