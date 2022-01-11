@extends('layout')
@section('content')
<div class="features_items">
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <ul>
                            <li class="home">
                                <a href="{{URL::to('/trang-chu')}}">Trang chủ</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>Danh mục sản phẩm</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="shop-with-sidebar">
        <div class="container">
            <div class="row">
                <!-- right sidebar start -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <!-- shop toolbar start -->
                    <div class="shop-content-area">
                        <div class="shop-toolbar">
                            <div class="col-md-4 col-sm-4 col-xs-12 nopadding-left text-left">
                            </div>
                            <div class="col-md-4 col-sm-4 none-xs text-center">

                                    <h2 class="title text-center">Tags : {{$product_tag_}}</h2>

                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12 nopadding-right text-right">
                                <div class="view-mode">
                                    <label>View on</label>
                                    <ul>
                                        <li class=""><a href="#shop-grid-tab" data-toggle="tab"><i class="fa fa-th"></i></a></li>
                                        <li class="active"><a href="#shop-list-tab" data-toggle="tab" ><i class="fa fa-th-list"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- shop toolbar end -->
                    <!-- product-row start -->
                    <div class="tab-content">
                        <div class="tab-pane fade" id="shop-grid-tab">
                            <!-- product-row start -->
                            <div class="row">
                                <div class="shop-product-tab first-sale">
                                    <div class="col-md-12">
                                        @foreach($pro_tag as $key => $product)
                                            <div class="col-lg-2 col-md-1">
                                                <form>
                                                    @csrf
                                                    <input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
                                                    <input type="hidden" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
                                                    <input type="hidden" value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">
                                                    <input type="hidden" value="{{$product->product_quantity}}" class="cart_product_quantity_{{$product->product_id}}">
                                                    <input type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">
                                                    <input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">

                                                    <div class="single-product first-sale">
                                                        <div class="product-img">
                                                            <a href="#">
                                                                <img class="primary-image" src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="" />
                                                            </a>
                                                            <div class="action-zoom">
                                                                <div class="add-to-cart">
                                                                    <a href="#" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="actions">
                                                                <div class="action-buttons">
                                                                    <div class="quickviewbtn">
                                                                        <input type="button" value="Thêm giỏ hàng" class="btn btn-default add-to-cart" data-id_product="{{$product->product_id}}" name="add-to-cart">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="price-box">
                                                                <span class="new-price">{{number_format($product->product_price,0,',','.').' '.'VNĐ'}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="product-content">
                                                            <h2 class="product-name">
                                                                <a href="{{URL::to('/chi-tiet/'.$product->product_slug)}}">{{$product->product_name}}</a>
                                                            </h2>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- product-row end -->
                        </div>
                        <!-- list view -->
                        <div class="tab-pane fade in active" id="shop-list-tab">
                            <div class="list-view">
                                <!-- single-product start -->
                                <div class="product-list-wrapper">
                                    @foreach($pro_tag as $key => $product)
                                        <form>
                                            @csrf
                                            <input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
                                            <input type="hidden" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
                                            <input type="hidden" value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">
                                            <input type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">
                                            <input type="hidden" value="{{$product->product_quantity}}" class="cart_product_quantity_{{$product->product_id}}">
                                            <input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">

                                            <div class="single-product">
                                                <div class="col-md-2 col-sm-2 col-xs-12">
                                                    <div class="product-img">
                                                        <a href="{{URL::to('/chi-tiet/'.$product->product_slug)}}">
                                                            <img class="primary-image" src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="" />
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="product-content">
                                                        <h2 class="product-name">
                                                            <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_slug)}}">{{$product->product_name}}</a></h2>
                                                        <div class="rating-price">
                                                            <div class="price-boxes">
                                                                <span class="new-price">{{number_format($product->product_price,0,',','.').' '.'VNĐ'}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="product-desc">
                                                            {!!$product->product_desc!!}
                                                        </div>
                                                        <div class="actions-e">
                                                            <div class="action-buttons">
                                                                <div class="add-to-cart">
                                                                    <input type="button" value="Thêm giỏ hàng" class="btn btn-default add-to-cart" data-id_product="{{$product->product_id}}" name="add-to-cart">
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    @endforeach
                                </div>
                                <!-- single-product end -->

                            </div>
                        </div>
                        <!-- shop toolbar start -->
                        <ul class="pagination pagination-sm m-t-none m-b-none" style="float: right;">
                       {!!$pro_tag->links()!!}
                      </ul>
                 
                        <!-- shop toolbar end -->
                    </div>
                </div>

                <!-- right sidebar end -->
            </div>
        </div>
    </div>
</div>
                  
    <!-- shop-with-sidebar end -->
@endsection
