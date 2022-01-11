@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                   Thống kê doanh thu ngày
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
                        <form role="form" action="{{URL::to('/manage-sales-day')}}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Xem doanh thu ngày :</label>
                                <input type="date" name="date"   placeholder="Tên danh mục">
                            </div>

                            <button type="submit"  class="btn btn-info">Xem doanh thu</button>
                        </form>
                       <br/>
                        @if(isset($data))
                        <table class="table table-striped b-t b-light">
                            <thead>
                            <tr>
                                <th>Ngày</th>
                                <th>Tổng doanh thu trong ngày</th>
                                <th style="width:30px;"></th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$date}}</td>
                                    <td>{{number_format($data,0,',','.').' '.'VNĐ'}}</td>
                                </tr>
                            </tbody>
                        </table>
                        @endif
                    </div>

                </div>
            </section>

        </div>
@endsection
