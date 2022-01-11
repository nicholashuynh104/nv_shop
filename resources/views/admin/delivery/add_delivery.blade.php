@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm vận chuyển
                </header>
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
                ?>
                <div class="panel-body">

                    <div class="position-center">
                        <form>
                            @csrf

                            <div class="form-group">
                                <label for="exampleInputPassword1">Chọn thành phố</label>
                                <select name="city" id="city" class="form-control input-sm m-bot15 choose city">

                                    <option value="">--Chọn tỉnh thành phố--</option>
                                    @foreach($city as $key => $ci)
                                        <option value="{{$ci->matp}}">{{$ci->name_city}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Chọn quận huyện</label>
                                <select name="province" id="province" class="form-control input-sm m-bot15 province choose">
                                    <option value="">--Chọn quận huyện--</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Chọn xã phường</label>
                                <select name="wards" id="wards" class="form-control input-sm m-bot15 wards">
                                    <option value="">--Chọn xã phường--</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phí vận chuyển</label>
                                <input type="text" name="fee_ship" class="form-control fee_ship" id="exampleInputEmail1" placeholder="Tên danh mục">
                            </div>

                            <button type="button" name="add_delivery" class="btn btn-info add_delivery">Thêm phí vận chuyển</button>
                        </form>
                    </div>

                    <div id="load_delivery">

                    </div>
                    <div>
                        <table class="table table-striped b-t b-light">
                            <thead>
                            <tr>

                                <th>Tên tỉnh/thành phố</th>
                                <th>Quận/huyện</th>
                                <th>Xã/phường</th>
                                <th>Phí giao hàng</th>
                                <th>Xóa</th>
                                <th style="width:30px;"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($all as $key =>$all_fee)
                                <tr>
                                  @foreach($tinh as $key => $tinhtp)
                                    @if( $all_fee->fee_matp == $tinhtp->matp)
                                            <td>{{$tinhtp->name_city}}</td>
                                        @endif
                                     @endforeach
                                      @foreach($quan as $key => $quanhuyen)
                                          @if( $all_fee->fee_maqh == $quanhuyen->maqh)
                                              <td>{{$quanhuyen->name_quanhuyen}}</td>
                                          @endif
                                      @endforeach
                                      @foreach($xa as $key => $xaphuong)
                                          @if( $all_fee->fee_xaid == $xaphuong->xaid)
                                              <td>{{$xaphuong->name_xaphuong}}</td>
                                          @endif
                                      @endforeach
                                      <td>{{$all_fee->fee_feeship}}</td>
                                      <td>
                                          <a onclick="return confirm('Bạn có chắc là muốn xóa không?')" href="{{URL::to('/delete-feeship/'.$all_fee->fee_id)}}" class="active styling-edit" ui-toggle-class="">
                                              <i class="fa fa-times text-danger text"></i>
                                          </a>
                                      </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </section>

        </div>
@endsection
