<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!---------Seo--------->
    <meta name="description" content="{{$meta_desc}}">
    <meta name="keywords" content="{{$meta_keywords}}"/>
    <meta name="robots" content="INDEX,FOLLOW"/>
    <meta name="csrf-token" content="{{csrf_token()}}">

    <link  rel="canonical" href="{{$url_canonical}}" />
    <meta name="author" content="">
    <link  rel="icon" type="image/x-icon" href="" />

{{--   <meta property="og:image" content="{{$image_og}}" />
  <meta property="og:site_name" content="http://localhost/tutorial_youtube/shopbanhanglaravel" />
  <meta property="og:description" content="{{$meta_desc}}" />
  <meta property="og:title" content="{{$meta_title}}" />
  <meta property="og:url" content="{{$url_canonical}}" />
  <meta property="og:type" content="website" /> --}}
<!--//-------Seo--------->

    <title>{{$meta_title}}</title>
    <link href="{{asset('public/frontend/laravo/css/sweetalert.css')}}" rel="stylesheet">
    <link rel="shortcut icon" href="{{('public/frontend/images/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="public/frontend/laravo/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="public/frontend/laravo/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="public/frontend/laravo/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="public/frontend/laravo/images/ico/apple-touch-icon-57-precomposed.png">
    <!-- Favicon
       ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="public/frontend/laravo/img/favicon.ico">
    <!-- Fonts
    ============================================ -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
    <!-- CSS  -->
    <script src="https://kit.fontawesome.com/651d0118cf.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS
    ============================================ -->
    <link rel="stylesheet"  href="{{asset('public/frontend/laravo/css/bootstrap.min.css')}}">
    <!-- owl.carousel CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('public/frontend/laravo/css/owl.carousel.css')}}">
    <!-- owl.theme CSS
    ============================================ -->
    <link rel="stylesheet"  href="{{asset('public/frontend/laravo/css/owl.theme.css')}}">
    <!-- owl.transitions CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('public/frontend/laravo/css/owl.transitions.css')}}">
    <!-- font-awesome.min CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('public/frontend/laravo/css/font-awesome.min.css')}}">
    <!-- font-icon CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('public/frontend/laravo/fonts/font-icon.css')}}">
    <!-- animate CSS
   ============================================ -->
    <link rel="stylesheet" href="{{asset('public/frontend/laravo/css/owl.carousel.css')}}">
    <!-- mobile menu CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('public/frontend/laravo/css/animate.css')}}">

    <link rel="stylesheet" href="{{asset('public/frontend/laravo/css/meanmenu.min.css')}}">
    <!-- normalize CSS
   ============================================ -->
    <link rel="stylesheet" href="{{asset('public/frontend/laravo/css/normalize.css')}}">
    <!-- main CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('public/frontend/laravo/css/main.css')}}">
    <!-- style CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('public/frontend/laravo/style.css')}}">
    <!-- responsive CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('public/frontend/laravo/css/responsive.css')}}">

    <link href="{{asset('public/frontend/css/sweetalert.css')}}" rel="stylesheet">
    <!-- gallery -->
    <link href="{{asset('public/frontend/css/lightgallery.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/lightslider.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/prettify.css')}}" rel="stylesheet">
    <!-- gallery -->

    <!-- search DB -->

    <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" type="text/css"/>
     <!-- search DB -->
    <!-- tags s???n ph???m -->
    <link rel="stylesheet" href="{{asset('public/backend/css/bootstrap-tagsinput.css')}}" type="text/css"/>
    <script src="{{asset('public/backend/js/bootstrap-tagsinput.min.js')}}"></script>
     <!-- tags s???n ph???m -->



    <script src="{{asset('public/frontend/laravo/js/vendor/modernizr-2.8.3.min.js')}}"></script>


</head><!--/head-->
<!-- header area start -->
<!-- header area start -->
<!-- header area start -->
<body>
<style type="text/css">
    @media (min-width: 992px)
{
    .col-md-6
    {
    width: 50%;
    padding: 10px 10px;
    }
}
  .col-sm-12 img{
    width: 100% !important;
}
</style>

<header class="header-7 short-stor">
    <div class="container-fluid">
        <div class="row">
            <!-- logo start -->
            <div class="col-md-3 text-center">
                <div class="top-logo">
                    <a href="index.html"><img src="img/logo-2.gif" alt="" /></a>
                </div>
            </div>
            <!-- logo end -->
            <!-- mainmenu area start -->
            <div class="col-md-9 text-center">
                <div class="mainmenu">
                    <nav>
                        <ul>
                            <li class="expand"><a href="{{URL::to('/trang-chu')}}">Trang ch???</a>  </li>
                            <li class="expand"><a href="{{URL::to('/san-pham')}}">S???n ph???m</a>
                                <div class="restrain mega-menu megamenu4">
                                    @foreach($category as $key => $cate)
                                        <span>
                                            @if($cate->category_parent ==0)
                                                <a class="mega-menu-title" href="{{URL::to('/danh-muc/'.$cate->slug_category_product)}}">  {{$cate->category_name}} </a>
                                              <!--   @foreach($category as $key => $cate_sub)
                                                    @if($cate_sub->category_parent == $cate->category_id)
                                                        <a href="{{URL::to('/danh-muc/'.$cate->slug_category_product)}}">{{$cate_sub->category_name}}</a>
                                                    @endif
                                                @endforeach -->
                                            @endif
											</span>
                                    @endforeach
                                </div>
                            </li>
                            <li class="expand"><a href="{{URL::to('/thuong-hieu')}}">Th????ng hi???u<hi???u></hi???u></a>
                                <ul class="restrain sub-menu">
                                    @foreach($brand as $key => $brand)
                                        <li><a href="{{URL::to('/thuong-hieu/'.$brand->brand_slug)}}">{{$brand->brand_name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="expand"><a href="#">Tin t???c</a>
                                <ul class="restrain sub-menu">
                                    @foreach($all_cate_post as $key => $post)
                                        <li><a href="{{URL::to('/danh-muc-bai-viet/'.$post->cate_post_slug)}}">{{$post->cate_post_name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            {{-- <li class="expand"><a href="{{URL::to('/video-shop')}}">Gi???i thi???u</a> --}}

                            </li>
                            <li class="expand"><a href="{{URL::to('/lien-he/')}}">Li??n h???</a></li>
                            <li class="expand">
                                <?php
                                $customer_id = Session::get('customer_id');
                                $shipping_id = Session::get('shipping_id');
                                if($customer_id!=NULL && $shipping_id==NULL){
                                ?>
                                <a href="{{URL::to('/checkout')}}">Thanh to??n</a>

                                <?php
                                }elseif($customer_id!=NULL && $shipping_id!=NULL){
                                ?>
                                <a href="{{URL::to('/payment')}}">Thanh to??n</a>
                                <?php
                                }else{
                                ?>
                                <a href="{{URL::to('/dang-nhap')}}">Thanh to??n</a>
                                <?php
                                }
                                ?>
                            </li>
                            <li class="expand">
                                <a href="{{URL::to('/gio-hang')}}">Gi??? h??ng</a>
                            </li>
                            <li class="expand">
                                <?php
                                $customer_id = Session::get('customer_id');
                                if($customer_id!=NULL){
                                ?>
                                <a style="color: #4a4a4a; font-family: Montserrat;font-weight: 700;" href="{{URL::to('/logout-checkout')}}"><span style="font-weight: bold"> ????ng xu???t</span></a>
                                <?php
                                }else{
                                ?>
                                <a href="{{URL::to('/dang-nhap')}}"><span style="font-weight: bold"> ????ng Nh???p</span></a>
                                <?php
                                }
                                ?>
                            </li>
                            <div class="disflow">
                                <div class="header-search expand" style="width: 70%">
                                    <div class="search-icon fa fa-search"></div>
                                    <div class="product-search restrain">
                                        <div class="container nopadding-right">
                                            <form action="{{URL::to('/tim-kiem')}}" method="POST">
                                                {{csrf_field()}}
                                                <div class="input-group">
                                                    <input type="text" class="form-control" maxlength="128" name="keywords_submit" placeholder="B???n mu???n t??m ki???m s???n ph???m g?? ...">
                                                    <span class="input-group-btn">
													<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
													    </span>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </ul>
                    </nav>
                </div>
                <!-- mobile menu start -->
                <div class="row">
                    <div class="col-sm-12 mobile-menu-area">
                        <div class="mobile-menu hidden-md hidden-lg" id="mob-menu">
                            <span class="mobile-menu-title">Menu</span>
                            <nav>
                                <ul>
                                    <li class="expand"><a href="{{URL::to('/trang-chu')}}">Trang ch???</a></li>
                                    <li><a href="#">S???n ph???m</a>
                                        <ul>
                                        @foreach($category as $key => $cate)
                                                <span>
                                         @if($cate->category_parent ==0)
                                          <a class="mega-menu-title" href="{{URL::to('/danh-muc/'.$cate->slug_category_product)}}">
                                              {{$cate->category_name}} </a>
                                              @foreach($category as $key => $cate_sub)
                                                 @if($cate_sub->category_parent == $cate->category_id)
                                                    <a href="{{URL::to('/danh-muc/'.$cate->slug_category_product)}}">{{$cate_sub->category_name}}</a>
                                                 @endif
                                              @endforeach
                                          @endif
											</span>
                                         @endforeach
                                        </ul>
                                    </li>
                                    <li><a >Th????ng hi???u</a>
                                        <ul>
                                            @foreach($brand as $key2 => $thuonghieu)
                                          {{--
                                    <li><a --}}{{--href="{{URL::to('/thuong-hieu/'.$thuonghieu->brand_slug)}}"--}}{{-->{{$thuonghieu->brand_name}}</a></li>--}}

                                            @endforeach
                                        </ul>
                                    </li>
                                    <li><a>Tin t???c</a>
                                        <ul>  </ul>
                                    </li>

                                    <li><a href="{{URL::to('/lien-he/')}}">Li??n h???</a></li>
                                    <li><a href="{{URL::to('/lien-he/')}}">Li??n h???</a></li>
                                    <li>
                                        <div class="disflow">
                                            <div class="header-search expand">
                                                <div class="search-icon fa fa-search"></div>
                                                <div class="product-search restrain">
                                                    <div class="container nopadding-right">
                                                        <form action="{{URL::to('/tim-kiem')}}" method="POST">
                                                            {{csrf_field()}}
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" maxlength="128" name="keywords_submit" placeholder="B???n mu???n t??m ki???m s???n ph???m g?? ...">
                                                                <span class="input-group-btn">
														<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
													    </span>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- mobile menu end -->
            </div>
            <!-- mainmenu area end -->
            <!-- top details area start -->
        
            <!-- top details area end -->
        </div>
    </div>
</header>
<!-- header area end -->
<div class="slider-area hm-1">
    <!-- slider -->
    <div class="bend niceties preview-2">

            <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#slider-carousel" data-slide-to="1"></li>
                    <li data-target="#slider-carousel" data-slide-to="2"></li>
                    <li data-target="#slider-carousel" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner">

                    @php
                        $i = 0;
                    @endphp
                    @foreach($slider as $key => $slide)
                        @php
                            $i++;
                        @endphp
                        <div class="item {{$i==1 ? 'active' : '' }}">
                            <div class="col-sm-12">
                                <img alt="{{$slide->slider_desc}}" src="{{asset('public/uploads/slider/'.$slide->slider_image)}}"
                                   class="img img-responsive img-slider" style="height: 500px !important">
                            </div>
                        </div>
                    @endforeach

                </div>

        </div>
    </div>
    <!-- slider end-->
</div>
<!-- header area end -->



<section>

    <div class="col-sm-12 padding-right">

        @yield('content')
    </div>
</section>
    <div class="col-sm-12 padding-right">
        <div class="top-footer-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <div class="single-snap-footer">
                            <div class="snap-footer-title">
                                <h4>NPV Technology</h4>
                            </div>
                            <div class="cakewalk-footer-content">
                                <p class="footer-des">C??ng ty C??? ph???n ?????u t?? NPV Technology l?? nh?? b??n l??? s??? 1 Vi???t Nam v??? doanh thu v?? l???i nhu???n, v???i m???ng l?????i h??n 4.500 c???a h??ng tr??n to??n qu???c.</p>
                                <a href="{{URL::to('/video-shop')}}" class="read-more">Read more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 hidden-sm">
                        <div class="single-snap-footer">
                            <div class="snap-footer-title">
                                <h4>Th??ng Tin Li??n H???</h4>
                            </div>
                            <div class="cakewalk-footer-content">
                                <ul>
                                    <li><a href="#">122 Th??i H??, H?? N???i</a></li>
                                    <li><a href="#">188Ter Tr???n Quang Kh???i, TP HCM</a></li>
                                    <li><a href="#">1060 ???????ng 3/2, TP HCM</a></li>
                                    <li><a href="#">243 B???ch ?????ng, Tp HCM</a></li>
                                    <li><a href="#">799 Gi???i Ph??ng, H?? N???i</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 hidden-sm">
                        <div class="single-snap-footer">
                            <div class="snap-footer-title">
                                <h4>Ch??nh S??ch</h4>
                            </div>
                            <div class="cakewalk-footer-content">
                                <ul>
                                    <li><a href="#">Mi???n Ph?? Giao H??ng</a></li>
                                    <li><a href="#">?????i Tr??? Trong V??ng 30 Ng??y</a></li>
                                    <li><a href="#">S???n Ph???m Ch??nh H??ng</a></li>
                                    <li><a href="#">Giao N???i Th??nh HCM Trong 2H</a></li>
                                    <li><a href="#">Th??? T???c ?????i Tr??? D??? D??ng</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 hidden-sm">
                        <div class="single-snap-footer">
                            <div class="snap-footer-title">
                                <h4>Follow Us</h4>
                            </div>
                            <div class="cakewalk-footer-content social-footer">
                                <ul>
                                    <li><a href="https://www.facebook.com" target="_blank"><i class="fa fa-facebook"></i></a><span> Facebook</span></li>
                                    <li><a href="https://plus.google.com/" target="_blank"><i class="fa fa-google-plus"></i></a><span> Google Plus</span></li>
                                    <li><a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a><span> Twitter</span></li>
                                    <li><a href="https://youtube.com/" target="_blank"><i class="fa fa-youtube-play"></i></a><span> Youtube</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="info-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-4">
                        <div class="info-fcontainer">
                            <div class="infof-icon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <div class="infof-content">
                                <h3>Our Address</h3>
                                <p>Main Street, Banasree, Dhaka</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4">
                        <div class="info-fcontainer">
                            <div class="infof-icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="infof-content">
                                <h3>Phone Support</h3>
                                <p>+88 0173 7803547</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4">
                        <div class="info-fcontainer">
                            <div class="infof-icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="infof-content">
                                <h3>Email Support</h3>
                                <p>admin@bootexperts.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 hidden-sm">
                        <div class="info-fcontainer">
                            <div class="infof-icon">
                                <i class="fa fa-clock-o"></i>
                            </div>
                            <div class="infof-content">
                                <h3>Openning Hour</h3>
                                <p>Sat - Thu : 9:00 am - 22:00 pm</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



<!-- footer address area start -->



<!-- FOOTER END -->



{{--
<script src="{{asset('public/frontend/js/jquery.js')}}"></script>
<script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('public/frontend/js/price-range.js')}}"></script>
<script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('public/frontend/js/main.js')}}"></script>

--}}

<!-- JS -->

<!-- jquery-1.11.3.min js
============================================ -->
<script  src="{{asset('public/frontend/laravo/js/vendor/jquery-1.11.3.min.js')}}"></script>

<!-- bootstrap js
============================================ -->
<script  src="{{asset('public/frontend/laravo/js/bootstrap.min.js')}}"></script>

<!-- owl.carousel.min js
============================================ -->
<script  src="{{asset('public/frontend/laravo/js/owl.carousel.min.js')}}"></script>

<!-- jquery scrollUp js
============================================ -->
<script src="{{asset('public/frontend/laravo/js/jquery.scrollUp.min.js')}}"></script>

<!-- wow js
============================================ -->
<script src="{{asset('public/frontend/laravo/js/jquery.countdown.min.js')}}"></script>

<!-- elevateZoom js
============================================ -->
<script  src="{{asset('public/frontend/laravo/js/jquery.elevateZoom-3.0.8.min.js')}}"></script>

<!-- jquery.bxslider.min.js
============================================ -->
<script src="{{asset('public/frontend/laravo/js/jquery.bxslider.min.js')}}"></script>

<!-- mobile menu js
============================================ -->
<script src="{{asset('public/frontend/laravo/js/jquery.meanmenu.js')}}"></script>

<!-- wow js
============================================ -->
<script src="{{asset('public/frontend/laravo/js/wow.js')}}"></script>

<!-- plugins js
============================================ -->
<script src="{{asset('public/frontend/laravo/js/plugins.js')}}"></script>

<!-- main js
============================================ -->
<script src="{{asset('public/frontend/laravo/js/main.js')}}"></script>
<!-- price-slider js
		============================================ -->
<script src="{{asset('public/frontend/laravo/js/price-slider.js')}}"></script>
<!-- Nivo slider js
		============================================ -->
<script src="{{asset('public/frontend/laravo/custom-slider/js/jquery.nivo.slider.js')}}" type="text/javascript"></script>
<script src="{{asset('public/frontend/laravo/custom-slider/home.js')}}"></script>
<!--sweetalert-->
<script src="{{asset('public/frontend/js/sweetalert.min.js')}}"></script>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0&appId=2339123679735877&autoLogAppEvents=1"></script>

<script src="{{asset('public/frontend/js/prettify.js')}}"></script>
<script src="{{asset('public/frontend/js/lightslider.js')}}"></script>
<script src="{{asset('public/frontend/js/lightgallery-all.min.js')}}"></script>

<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>


<script type="text/javascript">//????nh gi?? sao
    function remove_background(product_id)
    {
        for(var count = 1;count<=5;count++)
        {
            $('#'+product_id+'-'+count).css('color','#ccc');
        }
    }
    //hover chu???t ????nh gi?? sao
    $(document).on('mouseenter','.rating',function(){
        var index =$(this).data("index");
        var product_id = $(this).data('product_id');
        remove_background(product_id);
        for(var count = 1;count<=index;count++)
        {
            $('#'+product_id+'-'+count).css('color','#ffcc00');
        }
    });
    // nh??? chu???t ra kh??ng ????nh gi??
      $(document).on('mouseleave','.rating',function(){
        var index =$(this).data("index");
        var product_id = $(this).data('product_id');
        var rating = $(this).data("rating");

        remove_background(product_id);
        for(var count = 1;count<=rating;count++)
        {
            $('#'+product_id+'-'+count).css('color','#ffcc00');
        }
    });
    // click ????nh gi?? sao
    $(document).on('click','.rating',function(){
        var index =$(this).data("index");
        var product_id = $(this).data('product_id');
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url:"{{url('/insert-rating')}}",
            method:"POST",
            data:{index:index,product_id:product_id,_token:_token},
            success:function(data){

                if(data=='done')
                    {alert("B???n ???? ????nh gi?? s???n ph???m l?? "+index+"/5 sao ");}
                else{alert("L???i ????nh gi??");}
                location.reload();
            }
        });


    });


</script>

<script type="text/javascript">//xem nhanh
    $('.xemnhanh').click(function(){
        var product_id = $(this).data('id_product');
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url:"{{url('/quickview')}}",
            method:"POST",
            dataType:"JSON",
            data:{product_id:product_id,_token:_token},
            success:function(data){
                $('#product_quickview_title').html(data.product_name);
                $('#product_quickview_id').html(data.product_id);
                $('#product_quickview_price').html(data.product_price);
                $('#product_quickview_image').html(data.product_image);
                $('#product_quickview_gallery').html(data.product_gallery);
                $('#product_quickview_desc').html(data.product_desc);
                $('#product_quickview_content').html(data.product_content);
                $('#product_quickview_value').html(data.product_quickview_value);
                $('#product_quickview_button').html(data.product_button);
                $('#product_quickview_qty').html(data.product_qty);
            }
        });

    });
</script>
<script type="text/javascript"> //add to cart quickview

            $(document).on('click','.add-to-cart-quickview',function(){


                var id = $(this).data('id_product');
                // alert(id);
                var cart_product_id = $('.cart_product_id_' + id).val();
                var cart_product_name = $('.cart_product_name_' + id).val();
                var cart_product_image = $('.cart_product_image_' + id).val();
                var cart_product_quantity = $('.cart_product_quantity_' + id).val();
                var cart_product_price = $('.cart_product_price_' + id).val();
                var cart_product_qty = $('.cart_product_qty_' + id).val();
                var _token = $('input[name="_token"]').val();
                // alert(cart_product_qty);
                if(parseInt(cart_product_qty)>parseInt(cart_product_quantity)){
                    alert('L??m ??n ?????t nh??? h??n ' + cart_product_quantity);
                }else{

                    $.ajax({
                        url: '{{url('/add-cart-ajax')}}',
                        method: 'POST',
                        data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token,cart_product_quantity:cart_product_quantity},
                        success:function(){

                        swal({
                                title: "???? th??m s???n ph???m v??o gi??? h??ng",
                                text: "B???n c?? th??? mua h??ng ti???p ho???c t???i gi??? h??ng ????? ti???n h??nh thanh to??n",
                                showCancelButton: true,
                                cancelButtonText: "Xem ti???p",
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "??i ?????n gi??? h??ng",
                                closeOnConfirm: false
                            },
                            function() {
                                window.location.href = "{{url('/gio-hang')}}";
                            });

                    }

                    });
                }
            });
            $(document).on('click','.redirect-cart',function(){
                window.location.href="{{url('/gio-hang')}}";
            });

</script>
<script type="text/javascript">
    $(document).on('click','.watch-video',function(){
        var video_id = $(this).attr('id'); //l???y thu???c t??nh id attrpush khi nh???n n??t button($this)
        var _token = $('input[name="_token"]').val();


        $.ajax({
            url:'{{url('/watch-video')}}',
            method:"POST",
            dataType:"JSON",
            data:{video_id:video_id,_token:_token},
            success:function(data){
                $('#video_title').html(data.video_title);
                $('#video_link').html(data.video_link);
                $('#video_desc').html(data.video_desc);
            }
        });
    });
</script>
<script type="text/javascript">//gallery
      $(document).ready(function() {
    $('#imageGallery').lightSlider({
        gallery:true,
        item:1,
        loop:true,
        thumbItem:3,//l???y 3 c??i slider
        slideMargin:0,
        enableDrag: false,
        currentPagerPosition:'left',
        onSliderLoad: function(el) {
            el.lightGallery({
                selector: '#imageGallery .lslide'
            });
        }
    });
  });  //gallery
</script>
<script type="text/javascript">

    $(document).ready(function(){
        $('.send_order').click(function(){
            swal({
                    title: "X??c nh???n ????n h??ng",
                    text: "????n h??ng s??? kh??ng ???????c ho??n tr??? khi ?????t,b???n c?? mu???n ?????t kh??ng?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "C???m ??n, Mua h??ng",

                    cancelButtonText: "????ng,ch??a mua",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm){
                    if (isConfirm) {
                        var shipping_email = $('.shipping_email').val();
                        var shipping_name = $('.shipping_name').val();
                        var shipping_address = $('.shipping_address').val();
                        var shipping_phone = $('.shipping_phone').val();
                        var shipping_notes = $('.shipping_notes').val();
                        var shipping_method = $('.payment_select').val();
                        var order_fee = $('.order_fee').val();
                        var order_coupon = $('.order_coupon').val();
                        var _token = $('input[name="_token"]').val();

                        $.ajax({
                            url: '{{url('/confirm-order')}}',
                            method: 'POST',
                            data:{shipping_email:shipping_email,shipping_name:shipping_name,shipping_address:shipping_address,
                            shipping_phone:shipping_phone,shipping_notes:shipping_notes,
                            _token:_token,order_fee:order_fee,order_coupon:order_coupon,shipping_method:shipping_method},
                            success:function(){
                                swal("????n h??ng", "????n h??ng c???a b???n ???? ???????c g???i th??nh c??ng", "success");
                            }
                        });

                        window.setTimeout(function(){
                            location.reload();
                        } ,3000);

                    } else {
                        swal("????ng", "????n h??ng ch??a ???????c g???i, l??m ??n ho??n t???t ????n h??ng", "error");
                    }
                });
        });
    });


</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.add-to-cart').click(function(){

            var id = $(this).data('id_product');

            var cart_product_id = $('.cart_product_id_' + id).val();
            var cart_product_name = $('.cart_product_name_' + id).val();
            var cart_product_image = $('.cart_product_image_' + id).val();
            var cart_product_quantity = $('.cart_product_quantity_' + id).val();
            var cart_product_price = $('.cart_product_price_' + id).val();
            var cart_product_qty = $('.cart_product_qty_' + id).val();
            var _token = $('input[name="_token"]').val();
            if(parseInt(cart_product_qty)>parseInt(cart_product_quantity)){
                alert('L??m ??n ?????t nh??? h??n ' + cart_product_quantity);
            }else{

                $.ajax({
                    url: '{{url('/add-cart-ajax')}}',
                    method: 'POST',
                    data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token,cart_product_quantity:cart_product_quantity},
                    success:function(){

                        swal({
                                title: "???? th??m s???n ph???m v??o gi??? h??ng",
                                text: "B???n c?? th??? mua h??ng ti???p ho???c t???i gi??? h??ng ????? ti???n h??nh thanh to??n",
                                showCancelButton: true,
                                cancelButtonText: "Xem ti???p",
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "??i ?????n gi??? h??ng",
                                closeOnConfirm: false
                            },
                            function() {
                                window.location.href = "{{url('/gio-hang')}}";
                            });

                    }

                });
            }


        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.choose').on('change',function(){
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';

            if(action=='city'){
                result = 'province';
            }else{
                result = 'wards';
            }
            $.ajax({
                url : '{{url('/select-delivery-home')}}',
                method: 'POST',
                data:{action:action,ma_id:ma_id,_token:_token},
                success:function(data){
                    $('#'+result).html(data);
                }
            });
        });
    });

</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.calculate_delivery').click(function(){
            var matp = $('.city').val();
            var maqh = $('.province').val();
            var xaid = $('.wards').val();
            var _token = $('input[name="_token"]').val();
            if(matp == '' && maqh =='' && xaid ==''){
                alert('L??m ??n ch???n ????? t??nh ph?? v???n chuy???n');
            }else{
                $.ajax({
                    url : '{{url('/calculate-fee')}}',
                    method: 'POST',
                    data:{matp:matp,maqh:maqh,xaid:xaid,_token:_token},
                    success:function(){
                        location.reload();
                    }
                });
            }
        });
    });
</script>

</body>
</html>
