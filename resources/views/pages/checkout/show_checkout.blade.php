@extends('layout')
@section('content')

<section id="cart_items">
    <!-- Shopping Table Container -->
    <div class="cart-area-start">
        <div class="container">
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
                                    <li class="category3"><span>Thanh toán</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Shopping Cart Table -->
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <form action="{{url('/update-cart')}}" method="POST">
                            @csrf
                        <table class="cart-table">
                            <tbody>
                            @if(Session::get('cart')==true)
                                @php
                                    $total = 0;
                                @endphp
                                @foreach(Session::get('cart') as $key => $cart)
                                    @php
                                        $subtotal = $cart['product_price']*$cart['product_qty'];
                                        $total+=$subtotal;
                                    @endphp
                                    <tr>
                                        <td class="cart_product" style="width: 200px;">
                                            <img src="{{asset('public/uploads/product/'.$cart['product_image'])}}" width="90" alt="{{$cart['product_name']}}" />
                                        </td>
                                        <td >
                                            <p>{{$cart['product_name']}}</p>
                                        </td>
                                        <td>
                                            <p style="color: #F95A5A">{{number_format($cart['product_price'],0,',','.')}}đ</p>
                                        </td>
                                        <td class="cart_quantity">
                                            <div class="cart_quantity_button">
                                                <input class="cart_quantity" type="number" min="1" name="cart_qty[{{$cart['session_id']}}]" value="{{$cart['product_qty']}}"  >
                                                <input type="submit" value="Cập nhật" name="update_qty" class="check_out btn btn-success btn-sm">
                                            </div>
                                        </td>
                                        <td class="cart_total">
                                            <p class="cart_total_price" style="color: #BB1F1F; font-weight: bold">
                                                {{number_format($subtotal,0,',','.')}}đ
                                            </p>
                                        </td>
                                        <td>
                                            <a class="cart_quantity_delete" href="{{url('/del-product/'.$cart['session_id'])}}"><i class="fa fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    {{-- <td><a class="btn btn-default check_out" onclick="return confirm('Bạn có muốn xóa tất cả sản phẩm?')" href="{{url('/del-all-product')}}">Xóa tất cả</a></td> --}}
                                    <td colspan="2">
                                        <li>Tổng tiền : <span style="color: #BB1F1F; font-weight: bold">{{number_format($total,0,',','.')}}đ</span></li>
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <td colspan="5"><center>
                                            @php
                                                echo 'Làm ơn thêm sản phẩm vào giỏ hàng';
                                            @endphp
                                        </center></td>
                                </tr>
                            @endif

                            </tbody>
                        </table>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Shopping Cart Table -->
            <!-- Shopping Coupon -->
            <div class="row">
                <div class="col-md-12 vendee-clue">
                    <!-- Shopping Estimate -->
                    <div class="shipping coupon cart-totals">
                        <h5>Thông tin vận chuyển</h5>
                        <p>Nhập địa chỉ nhận hàng.</p>
                        <form>
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputPassword1">Chọn thành phố</label>
                                <select name="city" id="city" class="form-control input-sm m-bot15 choose city">
                                    <option value="">Chọn tỉnh thành phố</option>
                                    @foreach($city as $key => $ci)
                                        <option value="{{$ci->matp}}">{{$ci->name_city}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Chọn quận huyện</label>
                                <select name="province" id="province" class="form-control input-sm m-bot15 province choose">
                                    <option value="">Chọn quận huyện</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Chọn xã phường</label>
                                <select name="wards" id="wards" class="form-control input-sm m-bot15 wards">
                                    <option value="">Chọn xã phường</option>
                                </select>
                            </div>
                            <input type="button" value="Tính phí vận chuyển" name="calculate_order" class="btn btn-danger btn-sm calculate_delivery">
                        </form>
                    </div>
                    
                    <!-- Shopping Estimate -->
                    <!-- Shopping Code -->
                    <div class="shipping coupon cart-totals">
                        <div class=""><h5>Mã giảm giá</h5></div>
                        <p>Nhập mã giảm giá (Nếu bạn có).</p>
                        @if(Session::get('cart'))
                            <tr>
                                <td>
                                    <form method="POST" action="{{url('/check-coupon')}}">
                                        @csrf
                                        <input type="text" class="form-control" name="coupon" placeholder="Nhập mã giảm giá"><br>
                                        <input type="submit" class="btn btn-danger check_coupon" name="check_coupon" value="Tính mã giảm giá">
                                        @if(Session::get('coupon'))
                                            <a class="btn btn-danger check_out" href="{{url('/unset-coupon')}}">Xóa mã khuyến mãi</a>
                                        @endif
                                    </form>

                                </td>
                            </tr>
                        @endif

                    </div>
                    <!-- Shopping Code -->
                    <!-- Shopping Totals -->
                    <div class="shipping coupon cart-totals">
                        <div class=""><h5>Thông tin người nhận</h5></div>
                        <form method="POST">
                            @csrf
                            <label>Địa chỉ Email</label>
                            <input type="text" name="shipping_email" class="form-control shipping_email" placeholder="Điền email">
                            <label>Họ tên người nhận</label>
                            <input type="text" name="shipping_name" class="form-control shipping_name" placeholder="Họ và tên người gửi">
                            <label>Địa chỉ</label>
                            <input type="text" name="shipping_address" class="form-control shipping_address" placeholder="Địa chỉ gửi hàng">
                            <label>Số điện thoại</label>
                            <input type="text" name="shipping_phone" class="form-control shipping_phone" placeholder="Số điện thoại">
                            <label>Ghi chú đơn hàng</label>
                            <textarea name="shipping_notes" class="form-control shipping_notes" placeholder="Ghi chú đơn hàng của bạn" rows="5"></textarea>
                            @if(Session::get('fee'))
                                <input type="hidden" name="order_fee" class="order_fee" value="{{Session::get('fee')}}">
                            @else
                                <input type="hidden" name="order_fee" class="order_fee" value="10000">
                            @endif

                            @if(Session::get('coupon'))
                                @foreach(Session::get('coupon') as $key => $cou)
                                    <input type="hidden" name="order_coupon" class="order_coupon" value="{{$cou['coupon_code']}}">
                                @endforeach
                            @else
                                <input type="hidden" name="order_coupon" class="order_coupon" value="no">
                            @endif
                            <div class="form-group">
                                <label for="exampleInputPassword1">Chọn hình thức thanh toán</label>
                                <select name="payment_select"  class="form-control input-sm m-bot15 payment_select">
                                    <option value="0">Qua chuyển khoản</option>
                                    <option value="1">Tiền mặt</option>
                                </select>
                            </div>
                            <input type="button" value="Xác nhận đơn hàng" name="send_order" class="btn btn-danger btn-sm send_order">
                        </form>
                        <ul>
                            @if(Session::get('cart')==true)
                            <li>Tổng tiền :<span>{{number_format($total,0,',','.')}}đ</span></li>
                            @endif
                            @if(Session::get('coupon'))
                                <li>

                                    @foreach(Session::get('coupon') as $key => $cou)
                                        @if($cou['coupon_condition']==1)
                                            Mã giảm : {{$cou['coupon_number']}} %
                                            <p>
                                                @php
                                                    $total_coupon = ($total*$cou['coupon_number'])/100;

                                                @endphp
                                            </p>
                                            <p>
                                                @php
                                                    $total_after_coupon = $total-$total_coupon;
                                                @endphp
                                            </p>
                                        @elseif($cou['coupon_condition']==2)
                                            Mã giảm : {{number_format($cou['coupon_number'],0,',','.')}} k
                                            <p>
                                                @php
                                                    $total_coupon = $total - $cou['coupon_number'];

                                                @endphp
                                            </p>
                                            @php
                                                $total_after_coupon = $total_coupon;
                                            @endphp
                                        @endif
                                    @endforeach
                                </li>
                            @endif
                            @if(Session::get('cart')==true)    
                            @if(Session::get('fee'))
                                <li>

                                    Phí vận chuyển : <span>{{number_format(Session::get('fee'),0,',','.')}}đ</span></li>
                                <?php $total_after_fee = $total + Session::get('fee'); ?>
                            @endif
                            @endif
                            @if(Session::get('cart')==true)
                            <li>Tổng còn :
                                @php
                                    if(Session::get('fee') && !Session::get('coupon')){
                                        $total_after = $total_after_fee;
                                        echo number_format($total_after,0,',','.').'đ';
                                    }elseif(!Session::get('fee') && Session::get('coupon')){
                                        $total_after = $total_after_coupon;
                                        echo number_format($total_after,0,',','.').'đ';
                                    }elseif(Session::get('fee') && Session::get('coupon')){
                                        $total_after = $total_after_coupon;
                                        $total_after = $total_after + Session::get('fee');
                                        echo number_format($total_after,0,',','.').'đ';
                                    }elseif(!Session::get('fee') && !Session::get('coupon')){
                                        $total_after = $total;
                                        echo number_format($total_after,0,',','.').'đ';
                                    }

                                @endphp
                            </li>
                            @endif


                        </ul>

                    </div>
                    <!-- Shopping Totals -->
                </div>
            </div>
            <!-- Shopping Coupon -->
        </div>
    </div>
    <!-- Shopping Table Container -->
</section>

@endsection
