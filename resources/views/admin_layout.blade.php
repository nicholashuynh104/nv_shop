<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{asset('public/backend/css/bootstrap.min.css')}}" >

<!-- //bootstrap-css -->
<meta name="csrf-token" content="{{csrf_token()}}">
<!-- Custom CSS -->
<link href="{{asset('public/backend/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('public/backend/css/style-responsive.css')}}" rel="stylesheet"/>
<link href="{{asset('public/backend/css/jquery.dataTables.min.css')}}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('public/backend/css/font.css')}}" type="text/css"/>
<link href="{{asset('public/backend/css/font-awesome.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('public/backend/css/morris.css')}}" type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="{{asset('public/backend/css/monthly.css')}}">
<!-- //calendar -->
<!-- Tags -->
<link rel="stylesheet" href="{{asset('public/backend/css/bootstrap-tagsinput.css')}}" type="text/css"/>
<!-- //font-awesome icons -->
<script src="{{asset('public/backend/js/jquery2.0.3.min.js')}}"></script>
<script src="{{asset('public/backend/js/raphael-min.js')}}"></script>
<script src="{{asset('public/backend/js/morris.js')}}"></script>
<script src="https://kit.fontawesome.com/f5e2d6be8f.js" crossorigin="anonymous"></script>

<!-- //pickerdate -->

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<!-- //moris chart -->

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">


    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a target="_blank" href="{{url('/')}}"  class="logo">
        <i class="fas fa-home"></i>
        Ghé shop
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->

<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">

        {{-- <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li> --}}
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="{{('public/backend/images/2.png')}}">
                <span class="username">
                	<?php
					$name = Auth::user()->admin_name;
					if($name){
						echo $name;

					}
					?>

                </span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                <li><a href="{{URL::to('/logout-auth')}}"><i class="fa fa-key"></i>Đăng xuất</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->

    </ul>
       <ul class="nav pull-right top-menu">
        

        <!-- user login dropdown start-->
        {{-- <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="{{('public/backend/images/2.png')}}">
                <span class="username">
                  Ngôn ngữ

                </span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="{{route('language.language',['vi'])}}"><i class=" fa fa-suitcase"></i>Việt Nam</a></li>
                <li><a href="{{route('language.language',['en'])}}"><i class="fa fa-cog"></i> English</a></li>
            </ul>
        </li> --}}
        <!-- user login dropdown end -->

    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="{{URL::to('/dashboard')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Tổng quan</span>
                    </a>
                </li>
                {{-- <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fas fa-sliders-h"></i>
                        <span>Thông tin Website</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/information')}}">Thêm Thông tin Website</a></li>
                    </ul>
                </li> --}}
                @hasrole(['admin','user'])
                {{-- <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fas fa-sliders-h"></i>
                        <span>Đổi giao diện</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/change-layout')}}">Thay đổi giao diện</a></li>
                    </ul>
                </li> --}}

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fas fa-sliders-h"></i>
                        <span>Slider</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/manage-slider')}}">Liệt kê slider</a></li>
                        <li><a href="{{URL::to('/add-slider')}}">Thêm slider</a></li>
                    </ul>
                </li>
                
                 <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fas fa-money-bill-alt"></i>
                        <span>Đơn hàng</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/manage-order')}}">Quản lý đơn hàng</a></li>
                    </ul>
                </li>
                {{-- <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fas fa-money-bill-alt"></i>
                        <span>Doanh thu</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/manage-sales')}}">Quản lý doanh thu ngày</a></li>
                        <li><a href="{{URL::to('/manage-sales-month')}}">Thống kê doanh thu tháng</a></li>
                        <li><a href="{{URL::to('/manage-sales-years')}}">Thống kê doanh thu năm</a></li>
                    </ul>
                </li> --}}

                 <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fas fa-tags"></i>
                        <span>Mã giảm giá</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/insert-coupon')}}">Quản lý mã giảm giá</a></li>
                        <li><a href="{{URL::to('/list-coupon')}}">Liệt kê mã giảm giá</a></li>
                    </ul>
                </li>
                 <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fas fa-shipping-fast"></i>
                        <span>Vận chuyển</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/delivery')}}">Quản lý vận chuyển</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Danh mục sản phẩm</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-category-product')}}">Thêm danh mục sản phẩm</a></li>
						<li><a href="{{URL::to('/all-category-product')}}">Liệt kê danh mục sản phẩm</a></li>

                    </ul>
                </li>
                 <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="far fa-copyright"></i>
                        <span>Thương hiệu sản phẩm</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-brand-product')}}">Thêm hiệu sản phẩm</a></li>
						<li><a href="{{URL::to('/all-brand-product')}}">Liệt kê thương hiệu sản phẩm</a></li>

                    </ul>
                </li>
                  <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fab fa-product-hunt"></i>
                        <span>Sản phẩm</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-product')}}">Thêm sản phẩm</a></li>
						<li><a href="{{URL::to('/all-product')}}">Liệt kê sản phẩm</a></li>

                    </ul>
                </li>
                @endhasrole
                 @hasrole(['admin','author'])
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Danh mục bài viết</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/add-cate-post')}}">Thêm danh mục bài viết</a></li>
                        <li><a href="{{URL::to('/all-cate-post')}}">Liệt kê danh mục bài viết</a></li>

                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="far fa-newspaper"></i>
                        <span>Bài viết</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/add-post')}}">Thêm bài viết</a></li>
                        <li><a href="{{URL::to('/all-post')}}">Liệt kê bài viết</a></li>

                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-youtube-play">  Video</i>
                        <!-- <span>Users</span> -->
                    </a>
                    <ul class="sub">
                         <li><a href="{{URL::to('/video')}}">Thêm video</a></li>
                      
                    </ul>
                </li>
                @endhasrole
                @impersonate
                <li class="sub-menu">

                        <span ><a style="color: #ff9900" href="{{URL::to('/impersonate-destroy')}}">
                                <i class="fas fa-user-times"></i>Dừng chuyển quyền</a></span>
                    </li>
                @endimpersonate


                @hasrole(['admin'])
                 <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fas fa-users"></i>
                        <span>Users</span>
                    </a>
                    <ul class="sub">
                         <li><a href="{{URL::to('/add-users')}}">Thêm user</a></li>
                        <li><a href="{{URL::to('/users')}}">Liệt kê user</a></li>

                    </ul>
                </li>
                @endhasrole

            </ul>            </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
        @yield('admin_content')
    </section>
 <!-- footer -->
		  <div class="footer">
			<div class="wthree-copyright">
			  <p>Các bạn xem hướng dẫn : <a target="_blank" href="https://www.facebook.com/vietnhat.huynh.7">
                      <i class="fas fa-hand-sparkles"></i>tại đây nhé</a></p>
			</div>
		  </div>
  <!-- / footer -->
</section>
<!--main content end-->
</section>
<script src="{{asset('public/backend/js/bootstrap.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('public/backend/js/scripts.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('public/backend/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.form-validator.min.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/backend/js/bootstrap-tagsinput.min.js')}}"></script>
<!--datepicker-->
<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
 --><script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!--datepicker-->

<!--Moris chart-->
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script> -->

<script type="text/javascript">

    function ChangeToSlug()
        {
            var slug;

            //Lấy text từ thẻ input title
            slug = document.getElementById("slug").value;
            slug = slug.toLowerCase();
            //Đổi ký tự có dấu thành không dấu
                slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
                slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
                slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
                slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
                slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
                slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
                slug = slug.replace(/đ/gi, 'd');
                //Xóa các ký tự đặt biệt
                slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                //Đổi khoảng trắng thành ký tự gạch ngang
                slug = slug.replace(/ /gi, "-");
                //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
                //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
                slug = slug.replace(/\-\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-/gi, '-');
                slug = slug.replace(/\-\-/gi, '-');
                //Xóa các ký tự gạch ngang ở đầu và cuối
                slug = '@' + slug + '@';
                slug = slug.replace(/\@\-|\-\@|\@/gi, '');
                //In slug ra textbox có id “slug”
            document.getElementById('convert_slug').value = slug;
        }

</script>

<script type="text/javascript"> //search DB
    $(document).ready( function () {
    $('#myTable').DataTable();

    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        chart30daysorder();
        var chart = new Morris.Bar({
            element: 'myfirstchart',
            lineColors: ['#819C79','#fc8710','#FF6541','#A4ADD3','#766B%^'], // 5 giá trị 5 màu tương ứng
            pointFillColors:['#ffffff'], // điểm màu trằng
            pointStrokeColors:['black'], // viền ngoài màu đen
            fillOpacity:0.6, //màu 
            hideHover:'auto',
            parseTime:false,//ngày giờ ko lỗi
            xkey:'period', //ngày
            ykeys:['order','sales','profit','quantity'], //đơn hàng , doanh số , lợi nhuận, số lượng,
            behaveLikeLine:true,
            labels:['đơn hàng','doanh số','lợi nhuận','số lượng']
        });

    function chart30daysorder(){
        var _token = $('input[name="_token"]').val();
         $.ajax({
            url:"{{url('/days-order')}}", // gửi tới url này
            method:"POST",                     // phương thức post 
            dataType:"JSON",
            data:{_token:_token},               // với data là pro id
            success:function(data)
            {          // khi thành công thì sẽ trả về #gallery_load với html(data)
                    
                chart.setData(data);

            }

        });

    }

    $('.dashboard-filter').change(function(){
        var dashboard_value =$(this).val();
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url:"{{url('/dashboard-filter')}}", // gửi tới url này
            method:"POST",                     // phương thức post 
            dataType:"JSON",
            data:{dashboard_value:dashboard_value,_token:_token},               // với data là pro id
            success:function(data)
            {          // khi thành công thì sẽ trả về #gallery_load với html(data)
                    
                chart.setData(data);

            }

        });

    });

    $('#btn-dashboard-filter').click(function(){
        var _token = $('input[name="_token"]').val();
        var from_date = $('#datepicker').val();
        var to_date = $('#datepicker2').val();
        $.ajax({
            url:"{{url('/filter-by-date')}}", // gửi tới url này
            method:"POST",                     // phương thức post 
            dataType:"JSON",
            data:{from_date:from_date,to_date:to_date,_token:_token},               // với data là pro id
            success:function(data)
            {          // khi thành công thì sẽ trả về #gallery_load với html(data)
                    
                chart.setData(data);

            }

        });
    });
});
</script>
<script> // lich datepicker
  $( function() {
    $( "#datepicker" ).datepicker({
        prevText:"Tháng trước",
        nextText:"Tháng sau",
        dateFormat:"yy-mm-dd",
        dayNamesMin:["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", " Chủ nhật"],
        duration: "slow"

    });
    $( "#datepicker2" ).datepicker({
        prevText:"Tháng trước",
        nextText:"Tháng sau",
        dateFormat:"yy-mm-dd",
        dayNamesMin:["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", " Chủ nhật"],
        duration: "slow"

        
    });
  } );
</script>
<script type="text/javascript"> //GALLARY
    $(document).ready(function(){

        load_gallery();

        function load_gallery(){
            var pro_id = $('.pro_id').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"{{url('/select-gallery')}}", // gửi tới url này
                method:"POST",                     // phương thức post 
                data:{pro_id:pro_id,_token:_token},               // với data là pro id
                success:function(data){          // khi thành công thì sẽ trả về #gallery_load với html(data)
                    $('#gallery_load').html(data);
                }
            });

        }
            $('#file').change(function(){ //kiểm tra ảnh

                var error = '';
                var files = $('#file')[0].files; //bằng tất cả ảnh đưa vào từ [0]->
                if(files.length>5){
                    error+='<p>Bạn chọn tối đa 5 ảnh thôi!! </p>';
                }
                else if(files.length==''){
                    error+='<p>Bạn không được bỏ trống ảnh!! </p>';

                }
                else if(files.size > 2000000){
                    error+='<p>File ảnh lớn quá 2MB!! </p>';

                }
                if(error=='')
                {}
                else{
                    $('#file').val('');
                    $('#error_gallery').html('<span style="color:red" class"text-danger">'+error+'</span>');
                    return false; 
                }
            });
        $(document).on('blur','.edit_gla_name',function(){

            var gal_id =$(this).data('gal_id');
            var gal_text=$(this).text();
            var _token = $('input[name="_token"]').val();

            $.ajax({
                url:"{{url('/update-gallery-name')}}", // gửi tới url này
                method:"POST",                     // phương thức post 
                data:{gal_id:gal_id,gal_text:gal_text,_token:_token}, 
                success:function(data){          // khi thành công thì sẽ trả về #gallery_load với html(data)
                    load_gallery();
                    $('#error_gallery').html('<span style="color:red" class"text-danger">Update tên gallery thành công</span>');

                }
            });
        });
         $(document).on('click','.delete-gallery',function(){

            var gal_id =$(this).data('gal_id');
            var _token = $('input[name="_token"]').val();
            
            if(confirm('Bạn muốn xóa hình ảnh này không?')){
                 $.ajax({
                url:"{{url('/delete-gallery')}}", // gửi tới url này
                method:"POST",                     // phương thức post 
                data:{gal_id:gal_id,_token:_token}, 
                success:function(data){          // khi thành công thì sẽ trả về #gallery_load với html(data)
                    load_gallery();
                    $('#error_gallery').html('<span style="color:red" class"text-danger">Xóa gallery-product thành công</span>');

                }
            });

            }
           
        });
           $(document).on('change','.file_image',function(){

            var gal_id =$(this).data('gal_id');
            var image = document.getElementById('file-'+gal_id).files[0];

            var form_data = new FormData();

            form_data.append("file",document.getElementById('file-'+gal_id).files[0]);
            form_data.append("gal_id",gal_id);

            var _token = $('input[name="_token"]').val();
            
                 $.ajax({
                url:"{{url('/update-gallery')}}", // gửi tới url này
                method:"POST",                     // phương thức post 
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:form_data,
                contentType:false,
                cache:false, 
                processData:false,
                success:function(data){          // khi thành công thì sẽ trả về #gallery_load với html(data)
                    load_gallery();
                    $('#error_gallery').html('<span style="color:red" class"text-danger">Sửa gallery-product thành công</span>');

                }
            });

            
           
        });

    });
    
</script>
<script type="text/javascript"> //VIDEO
    $(document).ready(function(){
        
        load_video();

        function load_video(){
            $.ajax({
                url:"{{url('/select-video')}}", // gửi tới url này
                method:"POST",   // phương thức post 
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },                  
                             
                success:function(data){          // khi thành công thì sẽ trả về #gallery_load với html(data)
                    $('#video_load').html(data);
                }
            });
        }
        $(document).on('click','.btn-add-video',function(){

            var video_title = $('.video_title').val();
            var video_slug = $('.video_slug').val();
            var video_desc = $('.video_desc').val();
            var video_link = $('.video_link').val();

            var form_data = new FormData();

            form_data.append("file",document.getElementById('file_img_video').files[0]);
            form_data.append("video_title",video_title);
            form_data.append("video_slug",video_slug);
            form_data.append("video_desc",video_desc);
            form_data.append("video_link",video_link);

            $.ajax({
                url:"{{url('/insert-video')}}", // gửi tới url này
                method:"POST",                     // phương thức post 
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }, 
                data:form_data, 
                contentType:false,
                cache:false, 
                processData:false,
                success:function(data){          // khi thành công thì sẽ trả về #gallery_load với html(data)
                    load_video();
                    location.reload();


                    $('#notify').html('<span style="color:red">Thêm video thành công</span>');

                    


                }
            });
        });
        $(document).on('blur','.edit_video',function(){
            var video_type = $(this).data('video_type');
            var video_id =$(this).data('video_id');
            if(video_type=='video_title'){
                var video_edit = $('#'+video_type+'_'+video_id).text();
                var video_check = video_type;
            }
            else if(video_type=='video_desc'){
                var video_edit = $('#'+video_type+'_'+video_id).text();
                var video_check = video_type;

            }
            else if(video_type=='video_link'){
                var video_edit = $('#'+video_type+'_'+video_id).text();
                var video_check = video_type;

            }
            else{
                var video_edit = $('#'+video_type+'_'+video_id).text();
                var video_check = video_type;            
            }
              $.ajax({
                url:"{{url('/update-video')}}", // gửi tới url này
                method:"POST",                     // phương thức post 
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }, 
                data:{video_edit:video_edit,video_id:video_id,video_check:video_check}, 
                success:function(data){          // khi thành công thì sẽ trả về #gallery_load với html(data)
                    load_video();
                    $('#notify').html('<span style="color:red" class"text-danger">Sửa thuộc tính video thành công</span>');


                }
            });



        });
        $(document).on('click','.btn-delete-video',function(){
                var video_id =$(this).data('video_id');
                if(confirm('Bạn muốn video này không?')){
                $.ajax({
                url:"{{url('/delete-video')}}", // gửi tới url này
                method:"POST",                     // phương thức post 
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }, 
                data:{video_id:video_id}, 
                success:function(data){          // khi thành công thì sẽ trả về #gallery_load với html(data)
                    load_video();
                    $('#notify').html('<span style="color:red" class"text-danger">Xóa video thành công</span>');
                    $('#notify').fadeOut(2000);

                }
            });
            }
  
        });
        $(document).on('change','.file_img_video',function(){

            var video_id =$(this).data('video_id');
            var image = document.getElementById("file-video-"+video_id).files[0];

            var form_data = new FormData();

            form_data.append("file",document.getElementById("file-video-"+video_id).files[0]);
            form_data.append("video_id",video_id);

            var _token = $('input[name="_token"]').val();
            
                 $.ajax({
                url:"{{url('/update-video-image')}}", // gửi tới url này
                method:"POST",                     // phương thức post 
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:form_data,
                contentType:false,
                cache:false, 
                processData:false,
                success:function(data){          // khi thành công thì sẽ trả về #gallery_load với html(data)
                    load_video();
                    $('#notify').html('<span style="color:red" class"text-danger">Sửa video-image thành công</span>');

                }
            }); 
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){

        fetch_delivery();

        function fetch_delivery(){
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url : '{{url('/select-feeship')}}',
                method: 'POST',
                data:{_token:_token},
                success:function(data){
                    $('#load_delivery').html(data);
                }
            });
        }
        $(document).on('blur','.fee_feeship_edit',function(){

            var feeship_id = $(this).data('feeship_id');
            var fee_value = $(this).text();
            var _token = $('input[name="_token"]').val();
            // alert(feeship_id);
            // alert(fee_value);
            $.ajax({
                url : '{{url('/update-delivery')}}',
                method: 'POST',
                data:{feeship_id:feeship_id, fee_value:fee_value, _token:_token},
                success:function(data){
                    fetch_delivery();
                }
            });

        });
        $('.add_delivery').click(function(){

            var city = $('.city').val();
            var province = $('.province').val();
            var wards = $('.wards').val();
            var fee_ship = $('.fee_ship').val();
            var _token = $('input[name="_token"]').val();
            // alert(city);
            // alert(province);
            // alert(wards);
            // alert(fee_ship);
            $.ajax({
                url : '{{url('/insert-delivery')}}',
                method: 'POST',
                data:{city:city, province:province, _token:_token, wards:wards, fee_ship:fee_ship},
                success:function(data){
                    fetch_delivery();
                    location.reload();
                }
            });


        });
        $('.choose').on('change',function(){
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';
            // alert(action);
            //  alert(matp);
            //   alert(_token);

            if(action=='city'){
                result = 'province';
            }else{
                result = 'wards';
            }
            $.ajax({
                url : '{{url('/select-delivery')}}',
                method: 'POST',
                data:{action:action,ma_id:ma_id,_token:_token},
                success:function(data){
                    $('#'+result).html(data);
                }
            });
        });
    })


</script>
<script type="text/javascript"> //Thống ke tron
    $(document).ready(function(){
    var donut = Morris.Donut({

        element: 'donut',
        resize:true,
        colors:[
            '#a8328e',
            '#61a1ce',
            '#ce8f61',
            '#f5b942',
            '#4842f5'
        ],
        data:[
            {label:"Sản phẩm", value: <?php echo $products ?>},
            {label:"Bài viết", value: <?php echo $posts ?>},
            {label:"Đơn hàng", value: <?php echo $order_ ?>},
            {label:"Video", value: <?php echo $video ?>},
            {label:"Khách hàng", value: <?php echo $customers ?>}

        ]
    });
});
</script>
<script type="text/javascript">
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>
<script type="text/javascript">
        $.validate({

        });
</script>
 <script>
       // Replace the <textarea id="editor1"> with a CKEditor
       // instance, using default configuration.
        CKEDITOR.replace('ckeditor');
        CKEDITOR.replace('ckeditor1');
        CKEDITOR.replace('ckeditor2');
        CKEDITOR.replace('ckeditor3');
        CKEDITOR.replace('id4');
</script>

<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{asset('public/backend/js/jquery.scrollTo.js')}}"></script>
<!-- morris JavaScript -->
<script>
	$(document).ready(function() {
		//BOX BUTTON SHOW AND CLOSE
	   jQuery('.small-graph-box').hover(function() {
		  jQuery(this).find('.box-button').fadeIn('fast');
	   }, function() {
		  jQuery(this).find('.box-button').fadeOut('fast');
	   });
	   jQuery('.small-graph-box .box-close').click(function() {
		  jQuery(this).closest('.small-graph-box').fadeOut(200);
		  return false;
	   });

	    //CHARTS
	    function gd(year, day, month) {
			return new Date(year, month - 1, day).getTime();
		}

		graphArea2 = Morris.Area({
			element: 'hero-area',
			padding: 10,
        behaveLikeLine: true,
        gridEnabled: false,
        gridLineColor: '#dddddd',
        axes: true,
        resize: true,
        smooth:true,
        pointSize: 0,
        lineWidth: 0,
        fillOpacity:0.85,
			data: [
				{period: '2015 Q1', iphone: 2668, ipad: null, itouch: 2649},
				{period: '2015 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
				{period: '2015 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
				{period: '2015 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
				{period: '2016 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
				{period: '2016 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
				{period: '2016 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
				{period: '2016 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
				{period: '2017 Q1', iphone: 10697, ipad: 4470, itouch: 2038},

			],
			lineColors:['#eb6f6f','#926383','#eb6f6f'],
			xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
			pointSize: 2,
			hideHover: 'auto',
			resize: true
		});


	});
	</script>
<!-- calendar -->
	<script type="text/javascript" src="{{asset('public/backend/js/monthly.js')}}"></script>
	<script type="text/javascript">
		$(window).load( function() {

			$('#mycalendar').monthly({
				mode: 'event',

			});

			$('#mycalendar2').monthly({
				mode: 'picker',
				target: '#mytarget',
				setWidth: '250px',
				startHidden: true,
				showTrigger: '#mytarget',
				stylePast: true,
				disablePast: true
			});

		switch(window.location.protocol) {
		case 'http:':
		case 'https:':
		// running on a server, should be good.
		break;
		case 'file:':
		alert('Just a heads-up, events will not work when run locally.');
		}

		});
	</script>
	<!-- //calendar -->
</body>
</html>
