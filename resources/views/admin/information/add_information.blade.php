@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Cập nhật thông tin Website
                        </header>
                         <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
                        <div class="panel-body">
                            @foreach($contact as $key => $cont)

                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-infor/'.$cont->info_id)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                         
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Thông tin Liên hệ</label>
                                    <textarea style="resize: none" data-validation="length" data-validation-length="min5" data-validation-error-msg="Làm ơn điền ít nhất 5 ký tự" rows="8" class="form-control" name="info_contact" id="ckeditor1" placeholder="Mô tả danh mục">{{$cont->info_contact}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Bản đồ</label>
                                    <textarea style="resize: none" data-validation="length" data-validation-length="min5" data-validation-error-msg="Làm ơn điền ít nhất 5 ký tự" rows="8" class="form-control" name="info_map" id="exampleInputPassword1" placeholder="Mô tả danh mục">{{$cont->info_map}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Fanpage</label>
                                    <textarea style="resize: none" data-validation="length" data-validation-length="min5" data-validation-error-msg="Làm ơn điền ít nhất 5 ký tự" rows="8" class="form-control" name="info_fanpage" id="exampleInputPassword1" placeholder="Mô tả danh mục">{{$cont->info_fanpage}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh Logo</label>
                                    <input type="file" name="info_logo" class="form-control" id="exampleInputEmail1">
                                    <img src="{{url('/public/uploads/contact/'.$cont->info_logo)}}">
                                </div>
                          
                               
                                <button type="submit" name="add_info" class="btn btn-info">Cập nhật</button>
                                </form>
                            </div>
                            @endforeach

                        </div>
                    </section>

            </div>
@endsection