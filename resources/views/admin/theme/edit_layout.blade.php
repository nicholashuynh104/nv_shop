@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thay đổi giao diện
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
                                <form role="form" action="{{URL::to('/edit-layout')}}" method="post">
                                    {{ csrf_field() }}
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Chọn giao diện
                                    </label>
                                      <select name="change_layout" class="form-control input-sm m-bot15">
                                        
                                            <option value="1">Giao diện 1</option>
                                            <option value="2">Giao diện 2</option>
                                    </select>
                                </div>
                              
                             <!--    <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                      <select name="brand_product_status" class="form-control input-sm m-bot15">
                                            <option value="0">Hiển thị</option>
                                            <option value="1">Ẩn</option>
                                            
                                    </select>
                                </div> -->
                               
                                <button type="submit" name="edit_layout" class="btn btn-info">Thay đổi</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection