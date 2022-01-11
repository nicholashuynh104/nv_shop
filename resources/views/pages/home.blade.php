@extends('layout')
@section('content')
@if($layout==1)
    <!-- product section start -->
    <div class="our-product-area new-product">
        <div class="container">
            <div class="area-title">
                <h2>SẢN PHẨM NỔI BẬT NHẤT</h2>
            </div>
            <!-- our-product area start -->
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="features-curosel">
                            <!-- single-product start -->
                            @foreach($all_product as $key => $product)

                            <div class="col-lg-8 col-md-8" >
                                <div class="single-product first-sale" >
                                    <div class="product-img">
                                        <a href="{{URL::to('/chi-tiet/'.$product->product_slug)}}">
                                            <img class="primary-image" src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="" style="height: 170px" />
                                        </a>
                                        <!-- <form>
                                            @csrf
                                        <div class="action-zoom">
                                            <div class="add-to-cart">

                                                <input type="button" value="Xem nhanh" class="btn btn-default xemnhanh" data-id_product="{{$product->product_id}}" name="xemnhanh" data-toggle="modal" data-target="#xemnhanh">
                                            </div>
                                        </div>
                                        </form> -->
                                        <div class="actions">
                                            <div class="action-buttons">
                                                <div class="add-to-links">
                                                    <div class="compare-button" >
                                                        <form>
                                                            @csrf
                                                            <input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
                                                            <input type="hidden" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
                                                            <input type="hidden" value="{{$product->product_quantity}}" class="cart_product_quantity_{{$product->product_id}}">
                                                            <input type="hidden" value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">
                                                            <input type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">
                                                            <input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">
                                                            <input type="button" value="Thêm giỏ hàng"  class="btn btn-default add-to-cart" data-id_product="{{$product->product_id}}" name="add-to-cart" >
                                                            <input type="button" value="Xem nhanh" class="btn btn-default xemnhanh" data-id_product="{{$product->product_id}}" name="xemnhanh" data-toggle="modal" data-target="#xemnhanh">
                                                        </form>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    <!--  <div class="price-box">
                                        </div> -->
                                    </div>
                                    <div class="product-content">
                                        <span style="font-weight: bold;color: #b2002a">{{number_format($product->product_price,0,',','.').' '.'VNĐ'}}</span>
                                        <h2 class="product-name"><a href="{{URL::to('/chi-tiet/'.$product->product_slug)}}">{{$product->product_name}}</a></h2>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product end -->
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- our-product area end -->
        </div>
    </div>
    <!-- product section end -->
    <!-- latestpost area start -->
    <div class="latest-post-area">
        <div class="container">
                <h3 style="padding-top: 20px;">ĐIỆN THOẠI NỔI BẬT NHẤT</h3>
            <div class="row">
                <div class="all-singlepost">
                    <!-- single latestpost start -->
                    @foreach($all_product_mobile as $key1 => $mobile)
                    <div class="col-lg-4 col-md-8">
                        <div class="single-post">
                            <div class="col-md-6 col-sm-2 col-xs-12">
                                <div class="product-img">
                                    <a href="{{URL::to('/chi-tiet/'.$mobile->product_slug)}}">
                                        <img class="primary-image" src="{{URL::to('public/uploads/product/'.$mobile->product_image)}}" alt="" />
                                    </a>
                                </div>
                            </div>
                            <div class="post-thumb-info">
                                <div class="post-time">
                                    <a href="{{URL::to('/chi-tiet-san-pham/'.$mobile->product_slug)}}">
                                        {{$mobile->product_name}}
                                    </a>
                                </div>
                                <div class="post-time" style="color: #E7404D">{{number_format($mobile->product_price,0,',','.').' '.'VNĐ'}}</div>
                                <div class="postexcerpt">
                                    {{-- <p style="color: #000">{!!$mobile->product_desc!!}</p> --}}
                                    <a href="{{URL::to('/chi-tiet-san-pham/'.$mobile->product_slug)}}" class="read-more">Xem chi tiết</a>
                                </div>
                                <form>
                                    @csrf
                                    <input type="hidden" value="{{$mobile->product_id}}" class="cart_product_id_{{$mobile->product_id}}">
                                    <input type="hidden" value="{{$mobile->product_name}}" class="cart_product_name_{{$mobile->product_id}}">

                                    <input type="hidden" value="{{$mobile->product_quantity}}" class="cart_product_quantity_{{$mobile->product_id}}">

                                    <input type="hidden" value="{{$mobile->product_image}}" class="cart_product_image_{{$mobile->product_id}}">
                                    <input type="hidden" value="{{$mobile->product_price}}" class="cart_product_price_{{$mobile->product_id}}">
                                    <input type="hidden" value="1" class="cart_product_qty_{{$mobile->product_id}}">
                                    <input type="button" value="Thêm giỏ hàng" class="btn btn-danger add-to-cart" data-id_product="{{$mobile->product_id}}" name="add-to-cart">
                                </form>
                            </div>

                        </div>
                    </div>
                @endforeach
                    <!-- single latestpost end -->

                </div>
            </div>
        </div>
    </div>
    <!-- latestpost area end -->
    <!-- latestpost area start -->
    <div class="latest-post-area">
        <div class="container">

            <h3>LAPTOP NỔI BẬT NHẤT</h3>

            <div class="row">
                <div class="all-singlepost">
                    <!-- single latestpost start -->
                    @foreach($all_product_laptop as $key1 => $laptop)
                        <div class="col-lg-4 col-md-8">
                            <div class="single-post">
                                {{-- <div class="col-md-6 col-sm-2 col-xs-12">
                                </div> --}}
                                {{-- <div class="product-img"> --}}
                                    <a href="{{URL::to('/chi-tiet/'.$laptop->product_slug)}}">
                                        <img class="primary-image" src="{{URL::to('public/uploads/product/'.$laptop->product_image)}}" alt="" />
                                    </a>
                                {{-- </div> --}}
                                <div class="post-thumb-info">
                                    <div class="post-time">
                                        <a href="{{URL::to('/chi-tiet-san-pham/'.$laptop->product_slug)}}">
                                            {{$laptop->product_name}}
                                        </a>
                                    </div>
                                    <div style="color: #E7404D" class="post-time">{{number_format($laptop->product_price,0,',','.').' '.'VNĐ'}}</div>
                                    <div class="postexcerpt">
                                        <p style="color: #000">{!!$laptop->product_desc!!}</p>
                                        <a href="{{URL::to('/chi-tiet-san-pham/'.$laptop->product_slug)}}" class="read-more">Xem chi tiết</a>
                                    </div>
                                    <form>
                                        @csrf
                                        <input type="hidden" value="{{$laptop->product_id}}" class="cart_product_id_{{$laptop->product_id}}">
                                        <input type="hidden" value="{{$laptop->product_name}}" class="cart_product_name_{{$laptop->product_id}}">
                                        <input type="hidden" value="{{$laptop->product_quantity}}" class="cart_product_quantity_{{$laptop->product_id}}">
                                        <input type="hidden" value="{{$laptop->product_image}}" class="cart_product_image_{{$laptop->product_id}}">
                                        <input type="hidden" value="{{$laptop->product_price}}" class="cart_product_price_{{$laptop->product_id}}">
                                        <input type="hidden" value="1" class="cart_product_qty_{{$laptop->product_id}}">

                                        <input type="button" value="Thêm giỏ hàng" class="btn btn-danger add-to-cart" data-id_product="{{$laptop->product_id}}" name="add-to-cart">
                                    </form>
                                </div>

                            </div>
                        </div>
                @endforeach
                <!-- single latestpost end -->
                </div>
            </div>
        </div>
    </div>
    <!-- latestpost area end -->
    <!-- latestpost area start -->
    <div class="latest-post-area">
        <div class="container">

            <h3>TABLET NỔI BẬT NHẤT</h3>

            <div class="row">
                <div class="all-singlepost">
                    @foreach($all_product_tablet as $key1 => $tablet)
                    <div class="col-lg-4 col-md-8">
                        <div class="single-post">
                            <div class="col-md-6 col-sm-2 col-xs-12">
                                <div class="product-img">
                                    <a href="{{URL::to('/chi-tiet/'.$tablet->product_slug)}}">
                                        <img class="primary-image" src="{{URL::to('public/uploads/product/'.$tablet->product_image)}}" alt="" />
                                    </a>
                                </div>
                            </div>
                            <div class="post-thumb-info">
                                <div class="post-time">
                                    <a href="{{URL::to('/chi-tiet-san-pham/'.$tablet->product_slug)}}">
                                        {{$tablet->product_name}}
                                    </a>
                                </div>
                                <div style="color: #E7404D" class="post-time">{{number_format($tablet->product_price,0,',','.').' '.'VNĐ'}}</div>
                                <div class="postexcerpt">
                                    {{-- <p style="color: #000">{!!$tablet->product_desc!!}</p> --}}
                                    <a href="{{URL::to('/chi-tiet-san-pham/'.$tablet->product_slug)}}" class="read-more">Xem chi tiết</a>
                                </div>
                                <form>
                                    @csrf
                                    <input type="hidden" value="{{$tablet->product_id}}" class="cart_product_id_{{$tablet->product_id}}">
                                    <input type="hidden" value="{{$tablet->product_name}}" class="cart_product_name_{{$tablet->product_id}}">

                                    <input type="hidden" value="{{$tablet->product_quantity}}" class="cart_product_quantity_{{$tablet->product_id}}">

                                    <input type="hidden" value="{{$tablet->product_image}}" class="cart_product_image_{{$tablet->product_id}}">
                                    <input type="hidden" value="{{$tablet->product_price}}" class="cart_product_price_{{$tablet->product_id}}">
                                    <input type="hidden" value="1" class="cart_product_qty_{{$tablet->product_id}}">


                                    <input type="button" value="Thêm giỏ hàng" class="btn btn-danger add-to-cart" data-id_product="{{$tablet->product_id}}" name="add-to-cart">
                                </form>
                            </div>

                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <!-- latestpost area end -->
    <div class="latest-post-area">
        <div class="container">

            <h3>PHỤ KIỆN CHÍNH HÃNG</h3>

            <div class="row">
                <div class="all-singlepost">
                    <!-- single latestpost start -->
                    @foreach($all_product_phukien as $key1 => $phukien)
                        <div class="col-lg-4 col-md-8">
                            <div class="single-post">
                                {{-- <div class="col-md-6 col-sm-2 col-xs-12"> --}}
                                    {{-- <div class="product-img"> --}}
                                        <a href="{{URL::to('/chi-tiet/'.$phukien->product_slug)}}">
                                            <img class="primary-image" src="{{URL::to('public/uploads/product/'.$phukien->product_image)}}" alt="" />
                                        </a>
                                    {{-- </div> --}}
                                {{-- </div> --}}
                                <div class="post-thumb-info">
                                    <div class="post-time">
                                        <a href="{{URL::to('/chi-tiet-san-pham/'.$phukien->product_slug)}}">
                                            {{$phukien->product_name}}
                                        </a>
                                    </div>
                                    <div style="color: #E7404D" class="post-time">{{number_format($phukien->product_price,0,',','.').' '.'VNĐ'}}</div>
                                    <div class="postexcerpt">
                                        {{-- <p style="color: #000">{!!$phukien->product_desc!!}</p> --}}
                                        <a href="{{URL::to('/chi-tiet-san-pham/'.$phukien->product_slug)}}" class="read-more">Xem chi tiết</a>
                                    </div>
                                    <form>
                                        @csrf
                                        <input type="hidden" value="{{$phukien->product_id}}" class="cart_product_id_{{$phukien->product_id}}">
                                        <input type="hidden" value="{{$phukien->product_name}}" class="cart_product_name_{{$phukien->product_id}}">

                                        <input type="hidden" value="{{$phukien->product_quantity}}" class="cart_product_quantity_{{$phukien->product_id}}">

                                        <input type="hidden" value="{{$phukien->product_image}}" class="cart_product_image_{{$phukien->product_id}}">
                                        <input type="hidden" value="{{$phukien->product_price}}" class="cart_product_price_{{$phukien->product_id}}">
                                        <input type="hidden" value="1" class="cart_product_qty_{{$phukien->product_id}}">

                                        <input type="button" value="Thêm giỏ hàng" class="btn btn-danger add-to-cart" data-id_product="{{$phukien->product_id}}" name="add-to-cart">

                                    </form>
                                </div>

                            </div>
                        </div>
                @endforeach
                <!-- single latestpost end -->

                </div>
            </div>
        </div>
    </div>

  <div class="modal fade" id="xemnhanh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title product_quickview_title" id="" >
                            <span id="product_quickview_title"></span>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form>
                                @csrf
                                <div id="product_quickview_value"></div>
                            <div class="row">
                                <div class="col-md-5">
                                    <span id="product_quickview_image"></span>
<!--                                     <span id="product_quickview_gallery"></span>
 -->                                </div>
                                <div class="col-md-7">
                                    <style type="text/css">
                                        h5.modal-title.product_quickview_title{
                                            text-align: center;
                                            font-size: 25px;
                                            color: brown;
                                        }
                                        p.quickview{
                                            font-size: 14px;
                                            color: brown;
                                        }

                                        span#product_quickview_content img{
                                            width: 90%;
                                        }
                                        span#product_quickview_desc img{
                                            width: 90% ;
                                        }
                                        </style>
                                        <style>
                                            @media screen and (min-width: 768px){
                                                .modal-dialog{
                                                    width: 700px;
                                                }
                                                .modal-sm{
                                                    width: 350px;
                                                }
                                            }
                                            @media screen and (min-width: 992px){
                                                .modal-dialog{
                                                    width: 1000px;
                                                }

                                            }


                                        </style>
                                    <h2 class="quickview">
                                        <span id="product_quickview_title"></span>
                                    </h2>
                                    <p>Mã:ID<span id="product_quickview_id"></span></p>
                                    <span>
                                        <h2 style="color: #FE980F">Giá SP : <span id="product_quickview_price"></span></h2><br/>
                                        <label>Số lượng:</label>
<!--                                         <input type="number" name="qty" min="1" class="cart_product_qty_" value="1" />
 -->                                        <input type="hidden" name="productid_hidden" min="" />
                                        <div id="product_quickview_qty"></div>

                                    </span><br/>
                                      <h4 class="quickview">Mô tả sản phẩm</h4>
                                    <fieldset>
                                        <span style="width: 100%" id="product_quickview_desc"></span>
<!--                                         <span style="width: 100%" id="product_quickview_content"></span>
 -->
                                    </fieldset>
                                    <!-- <input type="button" value="Mua ngay" class="btn btn-primary btn-sm add-to-cart" data-id_product="" name="add-to-cart"> -->

                                    <div id="product_quickview_button"></div>
                                    <div id="product_quickview_value"></div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                          <h4 class="quickview">Chi tiết sản phẩm</h4>
                                    <fieldset>
<!--                                         <span style="width: 100%" id="product_quickview_desc"></span>
 -->                                        <span style="width: 100%" id="product_quickview_content"></span>

                                    </fieldset>
                                </div>
                            </div>


                                </form>

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-default redirect-cart" >Đi đến giỏ hàng</button>
                          </div>
                        </div>
                      </div>
                    </div>


        <!--/recommended_items-->

@else

    <div class="main-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <!-- block category area start -->
                        <div class="block-category side-area">
                            <!-- featured block start -->
                            <!-- block title start -->
                            <div class="bar-title">
                                <div class="bar-ping"><img src="img/bar-ping.png" alt="" /></div>
                                <h2>Sản Phẩm Đã Xem</h2>
                            </div>
                            <!-- block title end -->
                            <!-- block carousel start -->
                            <div class="block-carousel">
                                <div class="block-content">
                                    <!-- single block start -->
                                    <div class="single-block">
                                        <div class="block-image pull-left">
                                            <a href="product-details.html"><img src="img/block-cat/block-1.jpg" alt="" /></a>
                                        </div>
                                        <div class="category-info">
                                            <h3><a href="product-details.html">Donec ac tempus</a></h3>
                                            <div class="cat-price">$235.00 <span class="old-price">$333.00</span></div>
                                            <div class="cat-rating">
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single block end -->
                                    <!-- single block start -->
                                    <div class="single-block">
                                        <div class="block-image pull-left">
                                            <a href="product-details.html"><img src="img/block-cat/block-2.jpg" alt="" /></a>
                                        </div>
                                        <div class="category-info">
                                            <h3><a href="product-details.html">Primis in faucibus</a></h3>
                                            <div class="cat-price">$205.00</div>
                                            <div class="cat-rating">
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single block end -->
                                    <!-- single block start -->
                                    <div class="single-block">
                                        <div class="block-image pull-left">
                                            <a href="product-details.html"><img src="img/block-cat/block-9.jpg" alt="" /></a>
                                        </div>
                                        <div class="category-info">
                                            <h3><a href="product-details.html">Voluptas nulla</a></h3>
                                            <div class="cat-price">$99.00 <span class="old-price">$111.00</span></div>
                                            <div class="cat-rating">
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single block end -->
                                    <!-- single block start -->
                                    <div class="single-block">
                                        <div class="block-image pull-left">
                                            <a href="product-details.html"><img src="img/block-cat/block-10.jpg" alt="" /></a>
                                        </div>
                                        <div class="category-info">
                                            <h3><a href="product-details.html">Cras neque metus</a></h3>
                                            <div class="cat-price">$235.00</div>
                                            <div class="cat-rating">
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single block end -->
                                    <!-- single block start -->
                                    <!-- <div class="single-block">
                                        <div class="block-image pull-left">
                                            <a href="product-details.html"><img src="img/block-cat/block-7.jpg" alt="" /></a>
                                        </div>
                                        <div class="category-info">
                                            <h3><a href="product-details.html">Donec ac tempus</a></h3>
                                            <div class="cat-price">$235.00 <span class="old-price">$333.00</span></div>
                                            <div class="cat-rating">
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- single block end -->
                                </div>
                                <div class="block-content">
                                    <!-- single block start -->
                                    <div class="single-block">
                                        <div class="block-image pull-left">
                                            <a href="product-details.html"><img src="img/block-cat/block-3.jpg" alt="" /></a>
                                        </div>
                                        <div class="category-info">
                                            <h3><a href="product-details.html">Voluptas nulla</a></h3>
                                            <div class="cat-price">$99.00 <span class="old-price">$111.00</span></div>
                                            <div class="cat-rating">
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single block end -->
                                    <!-- single block start -->
                                    <div class="single-block">
                                        <div class="block-image pull-left">
                                            <a href="product-details.html"><img src="img/block-cat/block-4.jpg" alt="" /></a>
                                        </div>
                                        <div class="category-info">
                                            <h3><a href="product-details.html">Cras neque metus</a></h3>
                                            <div class="cat-price">$235.00</div>
                                            <div class="cat-rating">
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single block end -->
                                    <!-- single block start -->
                                    <div class="single-block">
                                        <div class="block-image pull-left">
                                            <a href="product-details.html"><img src="img/block-cat/block-8.jpg" alt="" /></a>
                                        </div>
                                        <div class="category-info">
                                            <h3><a href="product-details.html">Primis in faucibus</a></h3>
                                            <div class="cat-price">$205.00</div>
                                            <div class="cat-rating">
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single block end -->
                                    <!-- single block start -->
                                    <div class="single-block">
                                        <div class="block-image pull-left">
                                            <a href="product-details.html"><img src="img/block-cat/block-11.jpg" alt="" /></a>
                                        </div>
                                        <div class="category-info">
                                            <h3><a href="product-details.html">Occaecati cupiditate</a></h3>
                                            <div class="cat-price">$105.00 <span class="old-price">$111.00</span></div>
                                            <div class="cat-rating">
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single block end -->
                                    <!-- single block start -->
                                    <!-- <div class="single-block">
                                        <div class="block-image pull-left">
                                            <a href="product-details.html"><img src="img/block-cat/block-12.jpg" alt="" /></a>
                                        </div>
                                        <div class="category-info">
                                            <h3><a href="product-details.html">Accumsan elit</a></h3>
                                            <div class="cat-price">$165.00</div>
                                            <div class="cat-rating">
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- single block end -->
                                </div>
                                <div class="block-content">
                                    <!-- single block start -->
                                    <div class="single-block">
                                        <div class="block-image pull-left">
                                            <a href="product-details.html"><img src="img/block-cat/block-5.jpg" alt="" /></a>
                                        </div>
                                        <div class="category-info">
                                            <h3><a href="product-details.html">Occaecati cupiditate</a></h3>
                                            <div class="cat-price">$105.00 <span class="old-price">$111.00</span></div>
                                            <div class="cat-rating">
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single block end -->
                                    <!-- single block start -->
                                    <div class="single-block">
                                        <div class="block-image pull-left">
                                            <a href="product-details.html"><img src="img/block-cat/block-6.jpg" alt="" /></a>
                                        </div>
                                        <div class="category-info">
                                            <h3><a href="product-details.html">Accumsan elit</a></h3>
                                            <div class="cat-price">$165.00</div>
                                            <div class="cat-rating">
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single block end -->
                                    <!-- single block start -->
                                    <div class="single-block">
                                        <div class="block-image pull-left">
                                            <a href="product-details.html"><img src="img/block-cat/block-13.jpg" alt="" /></a>
                                        </div>
                                        <div class="category-info">
                                            <h3><a href="product-details.html">Pellentesque habitant</a></h3>
                                            <div class="cat-price">$80.00 <span class="old-price">$110.00</span></div>
                                            <div class="cat-rating">
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single block end -->
                                    <!-- single block start -->
                                    <div class="single-block">
                                        <div class="block-image pull-left">
                                            <a href="product-details.html"><img src="img/block-cat/block-14.jpg" alt="" /></a>
                                        </div>
                                        <div class="category-info">
                                            <h3><a href="product-details.html">Donec non est</a></h3>
                                            <div class="cat-price">$560.00</div>
                                            <div class="cat-rating">
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single block end -->
                                    <!-- single block start -->
                                    <!-- <div class="single-block">
                                        <div class="block-image pull-left">
                                            <a href="product-details.html"><img src="img/block-cat/block-13.jpg" alt="" /></a>
                                        </div>
                                        <div class="category-info">
                                            <h3><a href="product-details.html">Voluptas nulla</a></h3>
                                            <div class="cat-price">$99.00 <span class="old-price">$111.00</span></div>
                                            <div class="cat-rating">
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- single block end -->
                                </div>
                            </div>
                            <!-- block carousel end -->
                        </div>
                        <!-- block category area end -->

                    </div>
                    <div class="col-md-9">
                        <!-- product section start -->
                        <div class="our-product-area topo-product">
                            <div class="area-title">
                                <h2>Sản Phẩm Nổi Bật Nhất</h2>
                            </div>
                            <!-- our-product area start -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="featuresthree-curosel">
                                            <!-- single-product start -->
                                            @foreach($all_product as $key => $product)

                                            <div class="col-lg-12 col-md-12">
                                                <div class="single-product ex-pro">
                                                    <div class="product-img">
                                                        <a href="{{URL::to('/chi-tiet/'.$product->product_slug)}}">
                                                            <img class="primary-image" src="{{URL::to('public/uploads/product/'.$product->product_image)}}"  alt="" />
                                                        </a>
                                                        <div class="action-zoom">
                                                            <div class="add-to-cart">
                                                                <a href="#" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="actions">
                                                            <div class="action-buttons">
                                                                <div class="add-to-links">

                                                                    <div class="compare-button">

                                                        <form>
                                                            @csrf
                                                            <input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
                                                            <input type="hidden" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">

                                                            <input type="hidden" value="{{$product->product_quantity}}" class="cart_product_quantity_{{$product->product_id}}">

                                                            <input type="hidden" value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">
                                                            <input type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">
                                                            <input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">


                                                            <input type="button" value="Thêm giỏ hàng"  class="btn btn-default add-to-cart" data-id_product="{{$product->product_id}}" name="add-to-cart">

                                                        </form>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="product-content">
                                                        <span style="font-weight: bold;color: #b2002a">{{number_format($product->product_price,0,',','.').' '.'VNĐ'}}</span>
                                                        <h2 class="product-name"><a href="{{URL::to('/chi-tiet/'.$product->product_slug)}}">{{$product->product_name}}</a></h2>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- our-product area end -->
                        </div>
                        <!-- product section end -->
                        <!-- unit banner area start -->

                        <!-- unit banner area end -->
                        <!-- product section start -->
                      
                </div>
            </div>
    </div>
@endif
@endsection





