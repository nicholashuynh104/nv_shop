@extends('layout')
@section('content')

	<section id="cart_items">
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
                                    <li class="category3"><span>Giỏ hàng của bạn</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			@if(session()->has('message'))
                    <div class="alert alert-success">
                        {!! session()->get('message') !!}
                    </div>
                @elseif(session()->has('error'))
                    <div class="alert alert-danger">
                        {!! session()->get('error') !!}
                    </div>
                @endif

			<div class="table-responsive cart_info" style="border: none !important;">
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
								<img src="{{asset('public/uploads/product/'.$cart['product_image'])}}" alt="{{$cart['product_name']}}" />
							</td>
							<td class="cart_description">
								<h4><a href=""></a></h4>
								<p>{{$cart['product_name']}}</p>
							</td>
							<td class="cart_price">
								<p style="color: #F95A5A">{{number_format($cart['product_price'],0,',','.')}}đ</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<input class="cart_quantity" type="number" min="1" name="cart_qty[{{$cart['session_id']}}]" value="{{$cart['product_qty']}}">
                                    <input type="submit" value="Cập nhật" name="update_qty" class="check_out btn btn-success btn-sm">
								</div>
							</td>
                            
                            <td>
                                <a class="cart_quantity_delete" href="{{url('/del-product/'.$cart['session_id'])}}"><i class="fa fa-times"></i>
                                </a>
                            </td>
						</tr>

						@endforeach
						<tr>
							{{-- <td><a class="btn btn-default check_out" href="{{url('/del-all-product')}}">Xóa tất cả</a></td> --}}
							
								@if(Session::get('coupon'))
	                            <a class="btn btn-default check_out" href="{{url('/unset-coupon')}}">Xóa mã khuyến mãi</a>
								@endif
                                @if(Session::get('coupon'))
									@foreach(Session::get('coupon') as $key => $cou)
										@if($cou['coupon_condition']==1)
											Mã giảm : {{$cou['coupon_number']}} %
											<p>
												@php
												$total_coupon = ($total*$cou['coupon_number'])/100;
												echo '<p><li>Tổng giảm:'.number_format($total_coupon,0,',','.').'đ</li></p>';
												@endphp
											</p>
											<p><li>Tổng đã giảm :{{number_format($total-$total_coupon,0,',','.')}}đ</li></p>
										@elseif($cou['coupon_condition']==2)
											Mã giảm : {{number_format($cou['coupon_number'],0,',','.')}} đ
											<p>
												@php
												$total_coupon = $total - $cou['coupon_number'];

												@endphp
											</p>
											<p><li>Tổng đã giảm :{{number_format($total_coupon,0,',','.')}}đ</li></p>
										@endif
									@endforeach
							@endif
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

				</form>
					{{-- @if(Session::get('cart'))
                        <div class="shipping coupon hidden-sm">
                            <div class=""><h5>Mã giảm giá</h5></div>
                            <p>Nhập mã giảm giá ( nếu có ).</p>
                            <form method="POST" action="{{url('/check-coupon')}}">
                                @csrf
                                <input type="text" class="coupon-input" name="coupon" placeholder="Nhập mã giảm giá">
                                <button class="pull-left" type="submit" name="check_coupon">ÁP dụng</button>
                            </form>
                        </div>
					@endif --}}
				</table>

                <div class="pull-right" style="margin-bottom: 5px">
						@if (isset($total))
						- Tổng tiền tạm tính: <span>
							{{number_format($total,0,',','.')}}đ
						
						</span><br/><br/>
						@if(Session::get('customer_id'))
							<a class="btn btn-danger check_out" href="{{url('/checkout')}}">Tiến Hành Đặt Hàng</a>
						@else
							<a class="btn btn-danger check_out" href="{{url('/dang-nhap')}}">Tiến Hành Đặt Hàng</a>
						@endif
					@endif
                </div>

			</div>

		</div>
	</section> <!--/#cart_items-->



@endsection
