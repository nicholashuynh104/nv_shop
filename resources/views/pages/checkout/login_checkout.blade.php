@extends('layout')
@section('content')

	<section id="form"><!--form-->
        <div class="col-md-12">
            <div class="customer-login-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <div class="customer-login my-account">
                                <form action="{{URL::to('/login-customer')}}" method="POST">
                                    {{csrf_field()}}
                                    <div class="form-fields">
                                        <h2>Đăng nhập</h2>

                                        <p class="form-row form-row-wide">
                                            <label for="username">Email address <span class="required">*</span></label>
                                            <input type="text" name="email_account" placeholder="Tài khoản">
                                        </p>
                                        <p class="form-row form-row-wide">
                                            <label for="password">Password <span class="required">*</span></label>
                                            <input type="password" class="input-text" name="password_account" placeholder="Password">
                                        </p>
                                    </div>
                                    <div class="form-action">
                                        <div class="actions-log">
                                            <input type="submit" class="button" value="Đăng nhập">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="customer-register my-account">
                                <form action="{{URL::to('/add-customer')}}" method="POST" id="registration-form">
                                    {{ csrf_field() }}
                                @foreach($errors->all() as $val)
                                <ul>
                                    <li style="color: red;">{{$val}}</li>
                                </ul>
                                @endforeach
                                <?php
                                    $message = Session::get('message');
                                    if($message){
                                        echo '<span class="text-alert" style="color:red;font-size:18px;">'.$message.'</span>';
                                        Session::put('message',null);
                                    }
                                ?>
                                    <div class="form-fields">
                                        <h2>Đăng ký tài khoản</h2>
                                        <p class="form-row form-row-wide">
                                            <label for="reg_email"> Họ tên <span class="required">*</span></label>
                                            <input type="text" name="customer_name" placeholder="Họ và tên" data-validation="length" data-validation-length="min5" data-validation-error-msg="Làm ơn điền ít nhất 5 ký tự">
                                        </p>

                                        <p class="form-row form-row-wide">
                                            <label for="reg_email">Số điện thoại <span class="required">*</span></label>
                                            <input type="text" name="customer_phone" placeholder="Phone"  data-validation="number" data-validation-error-msg="Làm ơn điền số điện thoại" class="form-control">
                                        </p>
                                        <p class="form-row form-row-wide">
                                            <label for="reg_email"> Địa chỉ Email <span class="required">*</span></label>
                                           <!--  <input type="email" name="customer_email" placeholder="Địa chỉ email" required=""> -->
                                           <input id="email" name="customer_email" data-validation="email" placeholder="Địa chỉ email" data-validation-error-msg="Làm ơn điền email" >
                                        </p>
                                        <p class="form-row form-row-wide">
                                            <label for="reg_password">Password <span class="required">*</span></label>
                                            <input type="password" class="input-text" name="customer_password" placeholder="Mật khẩu" data-validation="length" data-validation-length="min6" data-validation-error-msg="Làm ơn điền ít nhất 6 ký tự">
                                        </p>
                                        <p class="form-row form-row-wide">
                                        <label  for="pwd-confirm">Confirm Password <span class="required">*</span></label>
                                       
                                        <input type="password" class="form-control" name="password_confirmation" id="pwd-confirm" placeholder="Confirm password"data-validation="length" data-validation-length="min6" data-validation-error-msg="Làm ơn điền ít nhất 6 ký tự"required="">
                                        </p>
                                </div>

                                    </div>
                                    <div class="form-action">
                                        <div class="actions-log">
                                            <input type="submit" class="button" name="register" value="Đăng ký">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</section><!--/form-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.2.1/jquery.form-validator.min.js"></script>
<script>

  $.validate({
    modules : 'location, date, security, file',
    onModulesLoaded : function() {
      //$('#country').suggestCountry();

    }

  });

  // Restrict presentation length
  $('#presentation').restrictLength( $('#pres-max-length') );

</script>

@endsection
